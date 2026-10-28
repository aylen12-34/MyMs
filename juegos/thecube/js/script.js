(() => {
'use strict';
const canvas=document.getElementById('chefCanvas');
const ctx=canvas.getContext('2d');
const scoreEl=document.getElementById('score');
const bestEl=document.getElementById('best');
const overlay=document.getElementById('gameOverlay');
const titleEl=document.getElementById('overlayTitle');
const textEl=document.getElementById('overlayText');
const iconEl=document.getElementById('overlayIcon');
const startButton=document.getElementById('startButton');
const restartButton=document.getElementById('restartButton');
const W=960,H=320,groundY=258;
const colors={wine:'#6A253A',dark:'#4F1B2C',pink:'#E64B6B',light:'#F5B5C2',cream:'#FFF8F4',sand:'#EFE2DA',muted:'#80656A'};
let state='ready',last=0,elapsed=0,score=0,speed=330,spawnIn=1.1,obstacles=[],particles=[],clouds=[],rafId=0;
let best=0;try{best=Number(localStorage.getItem('mymsChefRunBest')||0)}catch(e){}
bestEl.textContent=String(best).padStart(5,'0');
const chef={x:105,y:groundY-68,w:49,h:68,vy:0,grounded:true,duck:false,run:0};
function resize(){const dpr=Math.min(window.devicePixelRatio||1,2);canvas.width=W*dpr;canvas.height=H*dpr;ctx.setTransform(dpr,0,0,dpr,0,0);draw();}
function rounded(x,y,w,h,r,fill,stroke){ctx.beginPath();if(typeof ctx.roundRect==='function'){ctx.roundRect(x,y,w,h,r);}else{const rr=Math.min(r,w/2,h/2);ctx.moveTo(x+rr,y);ctx.arcTo(x+w,y,x+w,y+h,rr);ctx.arcTo(x+w,y+h,x,y+h,rr);ctx.arcTo(x,y+h,x,y,rr);ctx.arcTo(x,y,x+w,y,rr);ctx.closePath();}ctx.fillStyle=fill;ctx.fill();if(stroke){ctx.strokeStyle=stroke;ctx.lineWidth=2;ctx.stroke();}}
function drawCloud(x,y,s){ctx.fillStyle='#FFFFFFB8';ctx.beginPath();ctx.arc(x,y,13*s,0,Math.PI*2);ctx.arc(x+17*s,y-8*s,18*s,0,Math.PI*2);ctx.arc(x+36*s,y,12*s,0,Math.PI*2);ctx.fill();}
function drawChef(x,y,duck=false,run=0){ctx.save();ctx.translate(x,y);if(duck)ctx.translate(0,24);const h=duck?43:68;
 // legs and little running feet
 ctx.strokeStyle=colors.dark;ctx.lineWidth=7;ctx.lineCap='round';const swing=Math.sin(run*13)*5;
 ctx.beginPath();ctx.moveTo(17,h-13);ctx.lineTo(15+swing,h-3);ctx.lineTo(6+swing,h-3);ctx.moveTo(34,h-13);ctx.lineTo(36-swing,h-3);ctx.lineTo(45-swing,h-3);ctx.stroke();
 // tail
 ctx.fillStyle=colors.wine;ctx.beginPath();ctx.moveTo(10,36);ctx.lineTo(-3,46);ctx.lineTo(12,49);ctx.closePath();ctx.fill();
 // body jacket
 rounded(5,24,40,37,11,colors.wine);rounded(18,28,15,31,4,colors.cream);ctx.strokeStyle=colors.pink;ctx.lineWidth=2;ctx.beginPath();ctx.moveTo(25,30);ctx.lineTo(25,55);ctx.stroke();
 // arms
 ctx.strokeStyle=colors.wine;ctx.lineWidth=7;ctx.beginPath();ctx.moveTo(8,32);ctx.lineTo(0,43+swing*.2);ctx.moveTo(42,32);ctx.lineTo(49,41-swing*.2);ctx.stroke();
 // head
 ctx.fillStyle='#E9B18E';ctx.beginPath();ctx.ellipse(26,20,20,19,0,0,Math.PI*2);ctx.fill();
 // snout
 ctx.fillStyle='#E9B18E';ctx.beginPath();ctx.ellipse(39,25,10,7,.15,0,Math.PI*2);ctx.fill();
 // eye and nostril
 ctx.fillStyle=colors.dark;ctx.beginPath();ctx.arc(30,15,2.6,0,Math.PI*2);ctx.arc(45,24,1.7,0,Math.PI*2);ctx.fill();
 // chef hat
 rounded(13,1,27,12,5,colors.cream,'#E9D8D0');ctx.fillStyle=colors.cream;ctx.beginPath();ctx.arc(18,2,8,0,Math.PI*2);ctx.arc(26,-3,10,0,Math.PI*2);ctx.arc(35,2,8,0,Math.PI*2);ctx.fill();ctx.strokeStyle='#E9D8D0';ctx.lineWidth=1.5;ctx.beginPath();ctx.moveTo(14,9);ctx.lineTo(39,9);ctx.stroke();
 ctx.restore();}
function drawCupcake(o){const x=o.x,y=groundY;ctx.save();ctx.translate(x,y);ctx.fillStyle=colors.pink;ctx.beginPath();ctx.moveTo(0,-25);ctx.lineTo(36,-25);ctx.lineTo(30,0);ctx.lineTo(7,0);ctx.closePath();ctx.fill();ctx.strokeStyle=colors.wine;ctx.lineWidth=2;ctx.stroke();ctx.fillStyle=colors.cream;ctx.beginPath();ctx.arc(18,-28,14,Math.PI,Math.PI*2);ctx.arc(9,-30,8,Math.PI,Math.PI*2);ctx.arc(26,-32,8,Math.PI,Math.PI*2);ctx.fill();ctx.fillStyle=colors.wine;ctx.beginPath();ctx.arc(18,-44,3,0,Math.PI*2);ctx.fill();ctx.restore();}
function drawRollingPin(o){ctx.save();ctx.translate(o.x,groundY-19);ctx.rotate(-.08);rounded(-25,-9,50,18,8,colors.sand,colors.wine);ctx.strokeStyle=colors.wine;ctx.lineWidth=5;ctx.beginPath();ctx.moveTo(-31,0);ctx.lineTo(-24,0);ctx.moveTo(24,0);ctx.lineTo(31,0);ctx.stroke();ctx.restore();}
function drawCookieTower(o){ctx.save();ctx.translate(o.x,groundY);for(let i=0;i<3;i++){ctx.fillStyle=i%2?colors.light:colors.sand;ctx.strokeStyle=colors.wine;ctx.lineWidth=2;ctx.beginPath();ctx.arc(0,-9-i*17,15,0,Math.PI*2);ctx.fill();ctx.stroke();ctx.fillStyle=colors.dark;for(let j=0;j<3;j++){ctx.beginPath();ctx.arc(-6+j*6,-10-i*17+(j%2)*4,1.7,0,Math.PI*2);ctx.fill();}}ctx.restore();}
function drawWhisk(o){ctx.save();ctx.translate(o.x,o.y);ctx.rotate(Math.sin(elapsed*5)*.12);ctx.strokeStyle=colors.wine;ctx.lineWidth=4;ctx.lineCap='round';ctx.beginPath();ctx.moveTo(-5,12);ctx.lineTo(10,35);ctx.stroke();ctx.lineWidth=2.5;ctx.beginPath();ctx.ellipse(-8,0,8,16,-.5,0,Math.PI*2);ctx.ellipse(-8,0,4,16,-.5,0,Math.PI*2);ctx.stroke();ctx.restore();}
function drawSpoon(o){ctx.save();ctx.translate(o.x,o.y);ctx.rotate(.3);ctx.strokeStyle=colors.wine;ctx.lineWidth=5;ctx.lineCap='round';ctx.beginPath();ctx.moveTo(0,8);ctx.lineTo(22,31);ctx.stroke();ctx.fillStyle=colors.sand;ctx.strokeStyle=colors.wine;ctx.lineWidth=2;ctx.beginPath();ctx.ellipse(-2,0,7,12,-.3,0,Math.PI*2);ctx.fill();ctx.stroke();ctx.restore();}
function drawBackground(){const stage=Math.floor(score/350)%4;const sky=[colors.cream,'#FCE8E9','#F4E8D8','#F8F0F4'][stage];ctx.fillStyle=sky;ctx.fillRect(0,0,W,H);
 // soft sun / moon and distant rolling hills
 ctx.fillStyle=stage===1?'#F5B5C2':'#FFFFFFB8';ctx.beginPath();ctx.arc(790,62,28,0,Math.PI*2);ctx.fill();
 ctx.fillStyle=stage%2?'#EBC8D0':'#F0DCD4';ctx.beginPath();ctx.moveTo(0,215);ctx.quadraticCurveTo(140,160,290,218);ctx.quadraticCurveTo(440,170,580,218);ctx.quadraticCurveTo(760,165,960,215);ctx.lineTo(960,groundY);ctx.lineTo(0,groundY);ctx.fill();
 clouds.forEach(c=>drawCloud(c.x,c.y,c.s));ctx.strokeStyle=colors.wine;ctx.lineWidth=3;ctx.beginPath();ctx.moveTo(0,groundY);ctx.lineTo(W,groundY);ctx.stroke();
 // repeating tiny floor marks
 ctx.strokeStyle='#6A253A30';ctx.lineWidth=2;for(let x=-(elapsed*speed*.6%75);x<W;x+=75){ctx.beginPath();ctx.moveTo(x,groundY+14);ctx.lineTo(x+25,groundY+14);ctx.stroke();}
 // stage sign
 const labels=['COCINA','DULCERÍA','REPOSTERÍA','HORA DEL TÉ'];ctx.fillStyle=colors.wine;ctx.globalAlpha=.65;ctx.font='600 12px Chillax, sans-serif';ctx.fillText(labels[stage],W-145,25);ctx.globalAlpha=1;}
function draw(){if(!ctx)return;drawBackground();obstacles.forEach(o=>{if(o.type==='cupcake')drawCupcake(o);else if(o.type==='rolling')drawRollingPin(o);else if(o.type==='tower')drawCookieTower(o);else if(o.type==='whisk')drawWhisk(o);else drawSpoon(o);});drawChef(chef.x,chef.y,chef.duck,chef.run);
 if(state==='ready'){ctx.fillStyle=colors.wine;ctx.globalAlpha=.75;ctx.font='600 14px Chillax, sans-serif';ctx.fillText('PREPARADO…',W/2-49,groundY-90);ctx.globalAlpha=1;}}
function reset(){if(rafId){cancelAnimationFrame(rafId);rafId=0;}state='ready';elapsed=0;score=0;speed=330;spawnIn=.9;obstacles=[];particles=[];chef.y=groundY-chef.h;chef.vy=0;chef.grounded=true;chef.duck=false;chef.run=0;last=0;scoreEl.textContent='00000';overlay.classList.remove('is-hidden');iconEl.textContent='🍪';titleEl.textContent='¡A cocinar y correr!';textEl.textContent='Salta los cupcakes y rodillos. Pulsa espacio, ↑ o toca el juego para empezar.';startButton.textContent='¡Empezar!';draw();}
function start(){if(state==='running')return;if(state==='over')reset();state='running';overlay.classList.add('is-hidden');last=performance.now();if(rafId)cancelAnimationFrame(rafId);rafId=requestAnimationFrame(loop);}
function jump(){if(state==='ready'){start();}if(state!=='running')return;if(chef.grounded){chef.vy=-690;chef.grounded=false;chef.duck=false;}}
function duck(on){if(state!=='running')return;chef.duck=!!on&&chef.grounded;}
function spawn(){const flying=score>100&&Math.random()<Math.min(.28,.1+score/3000);let type;if(flying)type=Math.random()<.55?'whisk':'spoon';else{const r=Math.random();type=r<.43?'cupcake':r<.75?'rolling':'tower';}const o={type,x:W+30};if(type==='whisk'||type==='spoon'){o.y=groundY-(Math.random()<.5?70:105);o.w=35;o.h=39;}else if(type==='cupcake'){o.w=36;o.h=48;}else if(type==='rolling'){o.w=64;o.h=22;}else{o.w=34;o.h=58;}obstacles.push(o);spawnIn=Math.max(.58,1.25-Math.min(.45,score/1500))+Math.random()*.45;}
function hit(o){let px=chef.x+8,py=chef.duck?chef.y+25:chef.y+6,pw=chef.duck?43:42,ph=chef.duck?39:59;let ox=o.x+4,oy,ow=o.w-8,oh;if(o.type==='whisk'||o.type==='spoon'){oy=o.y-15;oh=37;}else{oy=groundY-o.h;oh=o.h;}return px<ox+ow&&px+pw>ox&&py<oy+oh&&py+ph>oy;}
function endGame(){state='over';if(rafId){cancelAnimationFrame(rafId);rafId=0;}if(score>best){best=score;bestEl.textContent=String(best).padStart(5,'0');try{localStorage.setItem('mymsChefRunBest',String(best))}catch(e){}}overlay.classList.remove('is-hidden');iconEl.textContent=score>=best?'🏆':'🍪';titleEl.textContent='¡Fin de la carrera!';textEl.textContent=`Conseguiste ${score} puntos. ${score>=best?'¡Nuevo récord de MyMs!':'¿Puedes superar tu récord?'}`;startButton.textContent='Volver a jugar';}
function loop(now){rafId=0;if(state!=='running')return;const dt=Math.min(Math.max((now-last)/1000,0),.035);last=now;elapsed+=dt;speed=Math.min(700,330+score*.42);score=Math.floor(elapsed*10+Math.max(0,speed-330)*elapsed*.06);scoreEl.textContent=String(score).padStart(5,'0');chef.run+=dt*speed/100;
 chef.vy+=1750*dt;chef.y+=chef.vy*dt;if(chef.y>=groundY-chef.h){chef.y=groundY-chef.h;chef.vy=0;chef.grounded=true;}else chef.grounded=false;
 spawnIn-=dt;if(spawnIn<=0)spawn();obstacles.forEach(o=>o.x-=speed*dt);obstacles=obstacles.filter(o=>o.x>-90);clouds.forEach(c=>{c.x-=c.s*12*dt;if(c.x<-70){c.x=W+50;c.y=30+Math.random()*90;}});
 for(const o of obstacles){if(hit(o)){draw();endGame();return;}}draw();if(state==='running'&&!rafId)rafId=requestAnimationFrame(loop);}
function actionKey(e){if(['Space','ArrowUp','ArrowDown','KeyW','KeyS'].includes(e.code))e.preventDefault();if(e.code==='Space'||e.code==='ArrowUp'||e.code==='KeyW')jump();if(e.code==='ArrowDown'||e.code==='KeyS')duck(true);}
function releaseKey(e){if(e.code==='ArrowDown'||e.code==='KeyS')duck(false);}
window.addEventListener('keydown',actionKey);window.addEventListener('keyup',releaseKey);
canvas.addEventListener('pointerdown',e=>{e.preventDefault();jump();});startButton.addEventListener('click',()=>{if(state==='over')reset();start();});restartButton.addEventListener('click',reset);
clouds=Array.from({length:5},(_,i)=>({x:80+i*205,y:35+(i%3)*35,s:.7+(i%2)*.35}));window.addEventListener('resize',resize);resize();reset();
})();
