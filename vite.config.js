import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const isCodespaces = !!process.env.CODESPACE_NAME;

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        cors: isCodespaces,

        ...(isCodespaces
            ? {
                  origin: `https://${process.env.CODESPACE_NAME}-5173.${process.env.GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN}`,
                  hmr: {
                      host: `${process.env.CODESPACE_NAME}-5173.${process.env.GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN}`,
                      clientPort: 443,
                  },
              }
            : {
                  hmr: {
                      host: 'localhost',
                  },
              }),

        watch: {
            usePolling: true,
        },
    },
});