import forms from '@tailwindcss/forms';

export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './app/**/*.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                kemenag: {
                    green: '#2f6b3f',
                    darkgreen: '#255732',
                    blue: '#0f5f7a',
                    gold: '#d6a63a',
                    dark: '#1f2937',
                    soft: '#f8fafc',
                },
            },
            boxShadow: {
                premium: '0 24px 80px rgba(15, 23, 42, 0.14)',
                soft: '0 18px 50px rgba(15, 23, 42, 0.10)',
            },
            borderRadius: {
                '4xl': '2rem',
                '5xl': '2.5rem',
            },
        },
    },
    plugins: [
        forms,
    ],
};
