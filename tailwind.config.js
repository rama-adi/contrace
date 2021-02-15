const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    presets: [
        // the preset merges, fonts, variants, plugins, colors and purge content
        require('./vendor/tanthammar/tall-forms/resources/stubs/tailwindcss/2.0/tall-forms-preset.js'),
    ],
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('@tailwindcss/ui')],
};
