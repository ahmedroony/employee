import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/js/employee-dashboard.js'
            ],
            refresh: true,
        }),
    ],
});
