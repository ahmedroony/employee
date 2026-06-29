import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/css/admin/global.css',
                'resources/css/admin/sidebar.css',
                'resources/css/admin/dashboard.css',
                'resources/css/admin/shifts.css',
                'resources/css/admin/CreateShift.css',
                'resources/css/admin/users.css',
            ],
            refresh: true,
        }),
    ],
});
