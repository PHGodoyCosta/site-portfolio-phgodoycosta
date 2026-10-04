import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import os from "node:os";

/*
 * Host que vai parar no public/hot e, portanto, nas URLs dos assets em dev.
 * Precisa ser o IP da LAN para abrir o site no celular, mas o DHCP troca esse
 * IP de tempos em tempos — fixar no arquivo faz o CSS parar de carregar sem
 * aviso. Então detecta a cada start. Para forçar um host: VITE_DEV_HOST=...
 */
function devHost() {
    if (process.env.VITE_DEV_HOST) {
        return process.env.VITE_DEV_HOST;
    }

    const ignored = /^(docker|br-|veth|lo|tun|tap|virbr)/;

    for (const [name, addresses] of Object.entries(os.networkInterfaces())) {
        if (ignored.test(name)) continue;

        for (const address of addresses ?? []) {
            if (address.family === "IPv4" && !address.internal) {
                return address.address;
            }
        }
    }

    return "localhost";
}

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

    /*
     * O laravel-vite-plugin desliga o publicDir, então em dev o servidor do
     * Vite não serve /fonts/*, que o tokens.css pede — as fontes caíam para o
     * fallback do sistema. Religa aqui, e desliga a cópia no build para o
     * public/ não ser copiado para dentro de public/build.
     */
    publicDir: "public",

    build: {
        copyPublicDir: false,
    },

    server: {
        host: "0.0.0.0", // Permite acesso de outros dispositivos na rede
        port: 5173,
        hmr: {
            host: devHost(),
        },
    },
});
