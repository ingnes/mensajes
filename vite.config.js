import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue()
    ],
    css: {
        postcss: {
            plugins: [
                tailwindcss,                
            ],
        },
    },
    resolve: {
        alias: {
          '@': path.resolve(__dirname, 'resources/js'), // Ajusta la ruta según tu estructura de proyecto
        },
      },
});
