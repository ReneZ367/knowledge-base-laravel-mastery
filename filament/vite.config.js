import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

const ddevPrimaryUrl = process.env.DDEV_PRIMARY_URL_WITHOUT_PORT;

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/filament/secret-admin/theme.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
        ...(ddevPrimaryUrl
            ? {
                  host: '0.0.0.0',
                  port: 5173,
                  strictPort: true,
                  origin: `${ddevPrimaryUrl}:5173`,
                  cors: {
                      origin: /https?:\/\/([A-Za-z0-9\-\.]+)?(\.ddev\.site)(?::\d+)?$/,
                  },
              }
            : {}),
    },
});
