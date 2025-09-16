import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
<<<<<<< HEAD
import tailwindcss from '@tailwindcss/vite';
=======
>>>>>>> 7b4576f0b8207ed5eadcfba117c919de531cd3bf

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
<<<<<<< HEAD
        tailwindcss(),
=======
>>>>>>> 7b4576f0b8207ed5eadcfba117c919de531cd3bf
    ],
});
