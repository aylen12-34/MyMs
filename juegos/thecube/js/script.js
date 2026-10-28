(() => {
'use strict';
const canvas = document.getElementById('chefCanvas');
const ctx = canvas.getContext('2d', { alpha: false, desynchronized: true });
if (!ctx) {
  const panel = document.getElementById('canvasWrap');
  if (panel) panel.textContent = 'Tu navegador no pudo iniciar el juego. Actualiza la página o prueba con Chrome.';
  return;
}
const wrap = document.getElementById('canvasWrap');
const scoreEl = document.getElementById('score');
const bestEl = document.getElementById('best');
const overlay = document.getElementById('gameOverlay');
const titleEl = document.getElementById('overlayTitle');
const textEl = document.getElementById('overlayText');
const iconEl = document.getElementById('overlayIcon');
const eyebrowEl = document.getElementById('overlayEyebrow');
const startButton = document.getElementById('startButton');
const restartButton = document.getElementById('restartButton');
const levelChip = document.getElementById('levelChip');
const speedFill = document.getElementById('speedFill');
const toast = document.getElementById('toastMessage');

const W = 960, H = 360, groundY = 290;
const C = { wine:'#6A253A', dark:'#4F1B2C', pink:'#E64B6B', rose:'#F47D95', blush:'#F5B5C2', cream:'#FFF8F4', sand:'#EFE2DA', muted:'#8D6F76', gold:'#D7A64A' };
const stages = [
  {name:'COCINA', sky:'#FFF8F4', hill:'#F0DCD4', far:'#F8E8E4', accent:'#E64B6B'},
  {name:'DULCERÍA', sky:'#FCE9EC', hill:'#EBC8D0', far:'#F8DDE2', accent:'#D85A79'},
  {name:'HORNO', sky:'#F6EBDD', hill:'#E7D0B9', far:'#F1DDCA', accent:'#B77D55'},
  {name:'HORA DEL TÉ', sky:'#F5EEF4', hill:'#E4D6E3', far:'#EDE2ED', accent:'#99749A'}
];
let state = 'ready', lastTime = 0, elapsed = 0, score = 0, speed = 320, spawnIn = 1.0;
let loopScheduled = false;
let obstacles = [], particles = [], sparkles = [], clouds = [], backgroundBits = [];
let stageIndex = 0, previousStage = 0, stageFlash = 0, screenShake = 0, toastTimer = 0, bonusPulse = 0;
let best = 0;
try { best = Number(localStorage.getItem('mymsChefRunBest') || 0); } catch (_) {}
bestEl.textContent = formatScore(best);

const chef = { x: 112, y: groundY - 74, w: 88, h: 74, vy: 0, grounded: true, duck: false, run: 0, blink: 0, blinkWait: 2.5 };
const spriteFiles = { runA: 'assets/run-a.svg', runB: 'assets/run-b.svg', jump: 'assets/jump.svg', duck: 'assets/duck.svg', dead: 'assets/dead.svg' };
const sprites = {};
for (const [key, src] of Object.entries(spriteFiles)) {
  const img = new Image();
  img.onload = () => { if (state !== 'running' && canvas.isConnected) drawScene(); };
  img.onerror = () => { console.warn('No se pudo cargar el sprite:', src); if (state !== 'running' && canvas.isConnected) drawScene(); };
  img.decoding = 'async';
  img.src = src;
  sprites[key] = img;
}

function formatScore(n) { return String(Math.max(0, Math.floor(n))).padStart(5, '0'); }
function rounded(x,y,w,h,r,fill,stroke,lineWidth=2) {
  ctx.beginPath();
  if (ctx.roundRect) ctx.roundRect(x,y,w,h,r); else ctx.rect(x,y,w,h);
  if (fill) { ctx.fillStyle=fill; ctx.fill(); }
  if (stroke) { ctx.strokeStyle=stroke; ctx.lineWidth=lineWidth; ctx.stroke(); }
}
function ellipse(x,y,rx,ry,fill,stroke=null,lw=2,rot=0) {
  ctx.beginPath(); ctx.ellipse(x,y,rx,ry,rot,0,Math.PI*2);
  if(fill){ctx.fillStyle=fill;ctx.fill();} if(stroke){ctx.strokeStyle=stroke;ctx.lineWidth=lw;ctx.stroke();}
}
function line(points,color,width=2,cap='round') {
  ctx.beginPath(); ctx.moveTo(points[0][0],points[0][1]);
  for(let i=1;i<points.length;i++) ctx.lineTo(points[i][0],points[i][1]);
  ctx.strokeStyle=color;ctx.lineWidth=width;ctx.lineCap=cap;ctx.lineJoin='round';ctx.stroke();
}
function starPath(x,y,r1,r2,points=4) {
  ctx.beginPath();
  for(let i=0;i<points*2;i++) { const a=-Math.PI/2+i*Math.PI/points; const r=i%2?r2:r1; const px=x+Math.cos(a)*r,py=y+Math.sin(a)*r; if(i===0)ctx.moveTo(px,py);else ctx.lineTo(px,py); }
  ctx.closePath();
}
function drawCloud(x,y,s,alpha=.65) {
  ctx.save();ctx.globalAlpha=alpha;ctx.fillStyle='#FFFFFF';
  ellipse(x,y,18*s,9*s,'#FFFFFF');ellipse(x+18*s,y-7*s,22*s,14*s,'#FFFFFF');ellipse(x+39*s,y,16*s,9*s,'#FFFFFF');
  ctx.restore();
}
function drawCupcakeShop(x,y,s,stage) {
  ctx.save();ctx.translate(x,y);ctx.scale(s,s);
  rounded(-20,-28,40,29,5,'#FFF8F4','#D8B8B7',1.5);
  ctx.fillStyle=stage.accent;ctx.beginPath();ctx.moveTo(-23,-29);ctx.lineTo(-14,-42);ctx.lineTo(-5,-29);ctx.lineTo(4,-42);ctx.lineTo(13,-29);ctx.lineTo(23,-42);ctx.lineTo(23,-27);ctx.closePath();ctx.fill();
  rounded(-8,-19,16,20,3,'#F5B5C2','#E5B0B8',1);
  ctx.strokeStyle='#D8B8B7';ctx.lineWidth=1;ctx.beginPath();ctx.moveTo(-15,-22);ctx.lineTo(15,-22);ctx.stroke();
  ctx.restore();
}
function drawBackground(dt=0) {
  const stage = stages[stageIndex];
  const sky = ctx.createLinearGradient(0, 0, 0, H);
  sky.addColorStop(0, stage.sky); sky.addColorStop(1, '#FFFCF9');
  ctx.fillStyle = sky; ctx.fillRect(0, 0, W, H);

  // One quiet landmark per stage; the palette and silhouette change as the run progresses.
  ctx.save(); ctx.globalAlpha = .72;
  if (stageIndex === 0) {
    // Kitchen window and a simple counter.
    rounded(690, 48, 118, 88, 8, '#FFFFFF88', '#FFFFFFB0', 2);
    ctx.strokeStyle = '#EAD9D3'; ctx.lineWidth = 3;
    ctx.beginPath(); ctx.moveTo(749, 50); ctx.lineTo(749, 134); ctx.moveTo(692, 91); ctx.lineTo(806, 91); ctx.stroke();
    rounded(650, 172, 205, 10, 4, '#D9BEB4');
    rounded(672, 182, 10, 43, 3, '#D9BEB4'); rounded(822, 182, 10, 43, 3, '#D9BEB4');
  } else if (stageIndex === 1) {
    // Candy-shop awning: broad clean stripes rather than lots of floating decoration.
    rounded(680, 112, 168, 76, 7, '#FFFFFF88', '#FFFFFFA0', 1.5);
    rounded(670, 99, 188, 22, 5, stage.accent);
    for (let i=0;i<5;i++) { ctx.fillStyle = i%2 ? '#FFF8F4' : '#F5B5C2'; ctx.fillRect(676+i*36,101,18,18); }
    rounded(700, 134, 52, 54, 3, '#F5B5C255'); rounded(765, 134, 60, 54, 3, '#FFFFFF88');
  } else if (stageIndex === 2) {
    // Oven silhouette with a warm, subtle glow.
    rounded(700, 91, 126, 127, 8, '#D9BEB4', '#D9BEB4', 1);
    rounded(712, 103, 102, 17, 4, '#FFF8F4');
    rounded(712, 129, 102, 76, 6, '#B77D55');
    rounded(722, 139, 82, 57, 4, '#F6DCC5');
    ellipse(805, 112, 2.5, 2.5, stage.accent);
  } else {
    // Tea-room silhouette: shelf and a teapot, kept intentionally simple.
    rounded(665, 105, 185, 8, 4, '#D5C5D4');
    rounded(687, 113, 8, 55, 3, '#D5C5D4'); rounded(820, 113, 8, 55, 3, '#D5C5D4');
    ellipse(751, 153, 24, 18, '#FFFFFFB8', '#CBB8CA', 2);
    ellipse(775, 151, 10, 11, '#FFFFFFB8', '#CBB8CA', 2);
    ctx.strokeStyle='#CBB8CA';ctx.lineWidth=3;ctx.beginPath();ctx.arc(728,153,10,Math.PI*.45,Math.PI*1.55);ctx.stroke();
    rounded(737, 132, 29, 4, 2, '#CBB8CA');
  }
  ctx.restore();

  // Soft distant hills give the runner depth without competing with the character.
  ctx.fillStyle = stage.far;
  ctx.beginPath(); ctx.moveTo(0, 232); ctx.bezierCurveTo(155, 192, 260, 239, 390, 215); ctx.bezierCurveTo(530, 186, 650, 237, 790, 211); ctx.bezierCurveTo(860, 199, 915, 208, W, 216); ctx.lineTo(W, groundY); ctx.lineTo(0, groundY); ctx.closePath(); ctx.fill();
  ctx.fillStyle = stage.hill;
  ctx.beginPath(); ctx.moveTo(0, 258); ctx.bezierCurveTo(160, 227, 280, 265, 415, 243); ctx.bezierCurveTo(560, 222, 680, 265, 810, 241); ctx.lineTo(W, 244); ctx.lineTo(W, groundY); ctx.lineTo(0, groundY); ctx.closePath(); ctx.fill();

  // Small sun, with a restrained pulse; its color subtly follows the current stage.
  const sunX = 565 - (elapsed * speed * .025 % 1080);
  ctx.globalAlpha = .78; ellipse(sunX, 58, 19, 19, stageIndex===2 ? '#F1CFA4' : '#FFFFFFB8');
  ctx.globalAlpha = 1;

  // Scrolling ground and short dashes make speed legible at a glance.
  ctx.fillStyle = '#6A253A0A'; ctx.fillRect(0, groundY, W, H-groundY);
  ctx.strokeStyle = C.wine; ctx.lineWidth = 2.5; ctx.beginPath(); ctx.moveTo(0, groundY); ctx.lineTo(W, groundY); ctx.stroke();
  ctx.strokeStyle = '#6A253A30'; ctx.lineWidth = 2;
  for (let x = -(elapsed * speed * .72 % 76); x < W; x += 76) { ctx.beginPath(); ctx.moveTo(x, groundY + 14); ctx.lineTo(x + 22, groundY + 14); ctx.stroke(); }
  rounded(W-143, 14, 123, 24, 12, '#FFFEF4D9', '#FFFFFFA8', 1);
  ctx.fillStyle=C.wine;ctx.font='600 10px Chillax, sans-serif';ctx.textAlign='center';ctx.fillText(stage.name,W-81,30);ctx.textAlign='left';
}
function drawChef(x,y,duck=false,run=0,blink=false) {
  // Sprite poses are separate hand-drawn vector assets, not a stretched generic mascot.
  const pose = state === 'over' ? sprites.dead : (duck ? sprites.duck : (!chef.grounded ? sprites.jump : (Math.floor(run * 7) % 2 ? sprites.runA : sprites.runB)));
  const drawW = 110;
  const drawH = duck ? 72 : 82;
  const drawY = duck ? y + 2 : y - 4;
  ctx.save();
  ctx.globalAlpha = 0.15;
  ellipse(x + 43, groundY + 2, chef.grounded ? 35 : 23, 5, '#4F1B2C');
  ctx.restore();
  if (pose && pose.complete && pose.naturalWidth) ctx.drawImage(pose, x - 10, drawY, drawW, drawH);
  else {
    // Safe loading fallback: unmistakable side-view dinosaur silhouette.
    ctx.save();
    ctx.translate(x, y);
    ctx.fillStyle = C.wine;
    // Tail and rounded body.
    ctx.beginPath();
    ctx.moveTo(26, 48); ctx.lineTo(2, 59); ctx.lineTo(25, 56);
    ctx.lineTo(36, 64); ctx.lineTo(68, 64); ctx.lineTo(79, 51);
    ctx.lineTo(91, 45); ctx.lineTo(91, 31); ctx.lineTo(73, 27);
    ctx.lineTo(63, 17); ctx.lineTo(47, 20); ctx.lineTo(39, 35);
    ctx.closePath(); ctx.fill();
    // Legs and tiny feet.
    rounded(37, 54, 12, 18, 4, C.wine);
    rounded(60, 54, 12, 18, 4, C.wine);
    rounded(32, 68, 21, 5, 2, C.dark);
    rounded(56, 68, 21, 5, 2, C.dark);
    // Chef hat.
    rounded(52, 8, 31, 11, 4, C.cream, '#EAD9D3', 1);
    ellipse(60, 8, 8, 8, C.cream, '#EAD9D3', 1);
    ellipse(72, 5, 9, 9, C.cream, '#EAD9D3', 1);
    // Face and jacket detail.
    ellipse(78, 31, 2.5, 2.5, C.cream);
    line([[49, 38], [49, 53]], C.rose, 2);
    ctx.restore();
  }
}
function drawCupcake(o){ctx.save();ctx.translate(o.x,groundY);ctx.rotate(Math.sin(elapsed*7+o.seed)*.035);
  // wrapper fluted
  ctx.beginPath();ctx.moveTo(-17,-28);ctx.lineTo(18,-28);ctx.lineTo(13,0);ctx.lineTo(-11,0);ctx.closePath();ctx.fillStyle=C.pink;ctx.fill();ctx.strokeStyle=C.wine;ctx.lineWidth=2;ctx.stroke();
  for(let i=-8;i<=8;i+=8)line([[i,-24],[i*.75,-3]],'#FFFFFF75',1.5);
  ellipse(0,-31,17,11,C.cream,C.wine,2);ellipse(-9,-33,9,8,C.cream,C.wine,1.5);ellipse(9,-35,9,8,C.cream,C.wine,1.5);
  ellipse(0,-44,4,4,C.rose,C.wine,1);starPath(1,-45,2,1,4);ctx.fillStyle=C.gold;ctx.fill();
  ellipse(-4,-31,2,2,C.pink);ellipse(6,-32,2,2,C.pink);ctx.restore();}
function drawRollingPin(o){ctx.save();ctx.translate(o.x,groundY-17);ctx.rotate(Math.sin(elapsed*5+o.seed)*.08);line([[-32,0],[-25,0]],C.dark,6);line([[25,0],[32,0]],C.dark,6);rounded(-27,-9,54,18,8,'#D8A77E',C.wine,2);line([[-16,-4],[15,-4]],'#F4D6B6',2);ctx.restore();}
function drawCookieTower(o){ctx.save();ctx.translate(o.x,groundY);for(let i=0;i<3;i++){const y=-10-i*17;ellipse(0,y,15,12,i%2?C.blush:'#D7A77F',C.wine,2);ellipse(-5,y-3,2,2,C.dark);ellipse(4,y+2,2,2,C.dark);ellipse(5,y-4,1.5,1.5,C.dark);ctx.strokeStyle='#FFFFFF8A';ctx.lineWidth=1.5;ctx.beginPath();ctx.arc(-2,y-2,7,3.7,5.4);ctx.stroke();}ctx.restore();}
function drawWhisk(o){ctx.save();ctx.translate(o.x,o.y);ctx.rotate(Math.sin(elapsed*6+o.seed)*.18);line([[-3,10],[14,35]],C.wine,5);line([[-3,10],[14,35]],'#D8A77E',2);ctx.strokeStyle=C.wine;ctx.lineWidth=2.5;ctx.beginPath();ctx.ellipse(-7,0,8,15,-.35,0,Math.PI*2);ctx.ellipse(-7,0,4,15,-.35,0,Math.PI*2);ctx.stroke();ctx.restore();}
function drawSpoon(o){ctx.save();ctx.translate(o.x,o.y);ctx.rotate(.4+Math.sin(elapsed*5+o.seed)*.12);line([[0,8],[22,31]],C.wine,5);line([[0,8],[22,31]],'#D8A77E',2);ellipse(-2,0,7,12,C.cream,C.wine,2,-.3);ctx.restore();}
function drawObstacle(o){if(o.type==='cupcake')drawCupcake(o);else if(o.type==='rolling')drawRollingPin(o);else if(o.type==='tower')drawCookieTower(o);else if(o.type==='whisk')drawWhisk(o);else drawSpoon(o);}
function burst(x,y,color,count=12,power=150){
  const allowed = Math.max(0, 100 - particles.length);
  for(let i=0;i<Math.min(count,allowed);i++){
    const a=Math.random()*Math.PI*2,s=power*(.25+Math.random()*.8),life=.45+Math.random()*.55;
    particles.push({x,y,vx:Math.cos(a)*s,vy:Math.sin(a)*s-35,life,max:life,size:2+Math.random()*4,color,shape:Math.random()<.55?'star':'dot',rot:Math.random()*6,spin:(Math.random()-.5)*8});
  }
}
function addTrail(){
  if(particles.length<70 && Math.random()<.35)
    particles.push({x:chef.x+5+Math.random()*10,y:chef.y+47+Math.random()*15,vx:-30-Math.random()*45,vy:-15+Math.random()*30,life:.22+Math.random()*.18,max:.4,size:1+Math.random()*2.5,color:Math.random()<.5?C.rose:C.gold,shape:'dot',rot:0,spin:0});
}
function drawParticles(){for(const p of particles){ctx.save();ctx.globalAlpha=Math.max(0,p.life/(p.max||1));ctx.translate(p.x,p.y);ctx.rotate(p.rot||0);if(p.shape==='star'){starPath(0,0,p.size,p.size*.4,4);ctx.fillStyle=p.color;ctx.fill();}else{ellipse(0,0,p.size,p.size,p.color);}ctx.restore();}}
function updateParticles(dt){particles=particles.filter(p=>p.life>0);for(const p of particles){p.life-=dt;p.x+=p.vx*dt;p.y+=p.vy*dt;p.vy+=250*dt;p.rot=(p.rot||0)+(p.spin||0)*dt;}}
function spawn(){const flying=score>90&&Math.random()<Math.min(.34,.10+score/2500);let type;if(flying)type=Math.random()<.55?'whisk':'spoon';else{const r=Math.random();type=r<.39?'cupcake':r<.70?'rolling':'tower';}const o={type,x:W+40,seed:Math.random()*10};if(type==='whisk'||type==='spoon'){o.y=groundY-(Math.random()<.48?73:116);o.w=34;o.h=40;}else if(type==='cupcake'){o.w=37;o.h=48;}else if(type==='rolling'){o.w=64;o.h=22;}else{o.w=35;o.h=60;}obstacles.push(o);spawnIn=Math.max(.60,1.28-Math.min(.45,score/1600))+Math.random()*.42;}
function hit(o){const px=chef.x+16,py=chef.duck?chef.y+27:chef.y+10,pw=chef.duck?59:62,ph=chef.duck?34:58;let ox=o.x+5,oy,ow=o.w-10,oh;if(o.type==='whisk'||o.type==='spoon'){oy=o.y-14;oh=36;}else{oy=groundY-o.h;oh=o.h;}return px<ox+ow&&px+pw>ox&&py<oy+oh&&py+ph>oy;}
function updateStage(){const next=Math.floor(score/350)%stages.length;if(next!==stageIndex){previousStage=stageIndex;stageIndex=next;stageFlash=.8;burst(W*.7,85,C.blush,24,190);showToast('✦ ¡Nueva zona: '+stages[stageIndex].name.toLowerCase()+'!');}}
function showToast(message){toast.textContent=message;toast.classList.add('show');toastTimer=1.5;}
function drawScene(){drawBackground();for(const o of obstacles)drawObstacle(o);drawParticles();drawChef(chef.x,chef.y,chef.duck,chef.run,chef.blink<.12);if(stageFlash>0){ctx.save();ctx.globalAlpha=Math.min(.22,stageFlash*.3);ctx.fillStyle='#FFFFFF';ctx.fillRect(0,0,W,H);ctx.restore();}if(state==='ready'){ctx.save();ctx.globalAlpha=.65;ctx.fillStyle=C.wine;ctx.font='600 12px Chillax, sans-serif';ctx.textAlign='center';ctx.fillText('LISTO PARA HORNEAR UNA NUEVA MARCA',W/2,groundY-104);ctx.restore();}}
function resize(){const dpr=Math.min(window.devicePixelRatio||1,2);canvas.width=Math.round(W*dpr);canvas.height=Math.round(H*dpr);ctx.setTransform(dpr,0,0,dpr,0,0);drawScene();}
function reset(){state='ready';elapsed=0;score=0;speed=320;spawnIn=.95;obstacles=[];particles=[];stageIndex=0;previousStage=0;stageFlash=0;screenShake=0;chef.y=groundY-chef.h;chef.vy=0;chef.grounded=true;chef.duck=false;chef.run=0;chef.blink=0;scoreEl.textContent=formatScore(0);speedFill.style.width='12%';levelChip.textContent='NIVEL 01 · COCINA';overlay.classList.remove('is-hidden');iconEl.textContent='🍪';eyebrowEl.textContent='PREPARA · LISTA · ¡CORRE!';titleEl.textContent='¡A hornear la victoria!';textEl.textContent='Salta los dulces, esquiva los utensilios y consigue el récord de la cocina.';startButton.querySelector('span').textContent='¡A jugar!';toast.classList.remove('show');drawScene();}
function start(){if(state==='over')reset();if(state==='running')return;state='running';overlay.classList.add('is-hidden');lastTime=performance.now();scheduleLoop();}
function scheduleLoop(){
  if(loopScheduled || state!=='running') return;
  loopScheduled=true;
  requestAnimationFrame(loop);
}
function jump(){if(state==='ready'){start();}if(state!=='running')return;if(chef.grounded){chef.vy=-710;chef.grounded=false;chef.duck=false;burst(chef.x+24,groundY-3,C.blush,7,70);}}
function duck(on){if(state!=='running')return;chef.duck=!!on&&chef.grounded;}
function endGame(){state='over';screenShake=.28;wrap.classList.remove('is-shaking');void wrap.offsetWidth;wrap.classList.add('is-shaking');burst(chef.x+27,chef.y+32,C.pink,28,230);burst(chef.x+27,chef.y+32,C.gold,12,160);const newRecord=score>best;if(newRecord){best=score;bestEl.textContent=formatScore(best);try{localStorage.setItem('mymsChefRunBest',String(best));}catch(_){}}overlay.classList.remove('is-hidden');iconEl.textContent=newRecord?'🏆':'🍪';eyebrowEl.textContent=newRecord?'¡NUEVO RÉCORD!':'BUENA PARTIDA, CHEF';titleEl.textContent=newRecord?'¡Eres la estrella de la cocina!':'¡Pausa para un dulce!';textEl.textContent=`Conseguiste ${score} puntos. ${newRecord?'Tu mejor marca ya está guardada.':'¿Te animas a superar tu récord de '+best+'?'}`;startButton.querySelector('span').textContent='Otra partida';drawScene();}
function loop(now){
  loopScheduled=false;
  if(state!=='running') return;
  const rawDt=(now-lastTime)/1000;
  const dt=Math.max(0,Math.min(Number.isFinite(rawDt)?rawDt:0,.032));
  lastTime=now;elapsed+=dt;speed=Math.min(690,320+score*.38);score=Math.floor(elapsed*10+Math.max(0,speed-320)*elapsed*.055);scoreEl.textContent=formatScore(score);speedFill.style.width=(12+Math.min(88,(speed-320)/370*88))+'%';
 const level=Math.floor(score/350)+1;levelChip.textContent='NIVEL '+String(level).padStart(2,'0')+' · '+stages[stageIndex].name;
 chef.run+=dt*speed/100;chef.blinkWait-=dt;if(chef.blinkWait<=0){chef.blink=.16;chef.blinkWait=2.1+Math.random()*3.2;}chef.blink=Math.max(0,chef.blink-dt);
 chef.vy+=1850*dt;chef.y+=chef.vy*dt;if(chef.y>=groundY-chef.h){if(!chef.grounded&&chef.vy>250)burst(chef.x+24,groundY-2,'#E64B6B66',5,45);chef.y=groundY-chef.h;chef.vy=0;chef.grounded=true;}else chef.grounded=false;
 if(chef.grounded&&Math.random()<.45)addTrail();spawnIn-=dt;if(spawnIn<=0)spawn();obstacles.forEach(o=>o.x-=speed*dt);obstacles=obstacles.filter(o=>o.x>-100);updateParticles(dt);updateStage();stageFlash=Math.max(0,stageFlash-dt);screenShake=Math.max(0,screenShake-dt);if(toastTimer>0){toastTimer-=dt;if(toastTimer<=0)toast.classList.remove('show');}
 for(const o of obstacles){if(hit(o)){endGame();return;}}
 drawScene();scheduleLoop();}
function onKeyDown(e){if(['Space','ArrowUp','ArrowDown','KeyW','KeyS'].includes(e.code))e.preventDefault();if(e.code==='Space'||e.code==='ArrowUp'||e.code==='KeyW'){if(!e.repeat)jump();}if(e.code==='ArrowDown'||e.code==='KeyS')duck(true);}
function onKeyUp(e){if(e.code==='ArrowDown'||e.code==='KeyS')duck(false);}
window.addEventListener('keydown',onKeyDown);
window.addEventListener('keyup',onKeyUp);
canvas.addEventListener('pointerdown',e=>{e.preventDefault();jump();});
startButton.addEventListener('click',()=>{
  if(state==='paused'){
    state='running';
    overlay.classList.add('is-hidden');
    lastTime=performance.now();
    scheduleLoop();
    return;
  }
  if(state==='over') reset();
  start();
});
restartButton.addEventListener('click',reset);
window.addEventListener('resize',resize);
document.addEventListener('visibilitychange',()=>{
  if(document.hidden && state==='running'){
    state='paused';
    overlay.classList.remove('is-hidden');
    iconEl.textContent='☕';
    eyebrowEl.textContent='UN RESPIRO DE CHEF';
    titleEl.textContent='¡Tomemos un descanso!';
    textEl.textContent='La cocina quedó en pausa. Pulsa continuar para seguir la carrera.';
    startButton.querySelector('span').textContent='Continuar';
  }
});
resize();
reset();
})();
