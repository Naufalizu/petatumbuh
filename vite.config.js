import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/styleFEmail.css",
                "resources/css/styleLogin.css",
                "resources/css/styleReg.css",
                "resources/css/styleProfile.css",
                "resources/css/styleLupaPas.css",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        rollupOptions: {
            output: {
                assetFileNames: "images/[name][extname]", // agar gambar tidak hilang saat build
            },
        },
    },
});
