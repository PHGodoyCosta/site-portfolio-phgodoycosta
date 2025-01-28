import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/home.css",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
            ],
            refresh: true,
        }),
    ],

    server: {
        host: '0.0.0.0', // Permite acesso de outros dispositivos na rede
        port: 5173,      // Porta padrão do Vite (pode mudar se necessário)
        hmr: {
            host: '192.168.3.26', // Substitua pelo IP da máquina (ex: 192.168.1.10)
        },
    },
});
