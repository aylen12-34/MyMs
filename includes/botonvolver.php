<style>
    .btn-volver-esquina {
        position: fixed;
        top: 25px;
        left: 25px;

        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #E64B6B;
        border: none;
        border-radius: 50%;

        cursor: pointer;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.30);

        transition: all 0.2s ease;
        z-index: 9999;
    }

    /* Flecha */
    .btn-volver-esquina::before {
        content: "";
        width: 12px;
        height: 12px;

        border-left: 3px solid #EFE2DA;
        border-bottom: 3px solid #EFE2DA;

        transform: rotate(45deg);
        margin-left: 6px;
    }

    .btn-volver-esquina:hover {
        background: #6A253A;
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
    }

    .btn-volver-esquina:active {
        transform: scale(0.95);
    }
</style>

<button
    type="button"
    class="btn-volver-esquina"
    onclick="history.back()"
    aria-label="Volver"
    title="Volver">
</button>