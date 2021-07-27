const colors = require('tailwindcss/colors')

module.exports = {
    target: 'relaxed',
    prefix: '',
    important: false,
    separator: ':',
    theme: {
        spacing: ['0'],
        backgroundColor: (theme) => theme('colors'),
        backgroundOpacity: (theme) => theme('opacity'),
        borderColor: (theme) => ({
            ...theme('colors'),
            default: theme('colors.gray.300', 'currentColor'),
        }),
        borderOpacity: (theme) => theme('opacity'),
        borderRadius: { none: '0', DEFAULT: '0.25rem' },
        borderWidth: { 0: '0', DEFAULT: '1px' },
        boxShadow: {
            xs: '0 0 0 1px rgba(0, 0, 0, 0.05)',
            outline: '0 0 0 3px rgba(66, 153, 225, 0.5)',
            DEFAULT: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
        },
        divideColor: (theme) => theme('borderColor'),
        divideOpacity: (theme) => theme('borderOpacity'),
        divideWidth: (theme) => theme('borderWidth'),
        flexGrow: { DEFAULT: '1' },
        flexShrink: { DEFAULT: '1' },
        fontFamily: {
            sans: [
                'Roboto',
                'system-ui',
                '-apple-system',
                'BlinkMacSystemFont',
                '"Segoe UI"',
                '"Helvetica Neue"',
                'Arial',
                '"Noto Sans"',
                'sans-serif',
                '"Apple Color Emoji"',
                '"Segoe UI Emoji"',
                '"Segoe UI Symbol"',
                '"Noto Color Emoji"',
            ],
            serif: ['Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
            mono: ['Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
        },
        fontSize: {
            xs: '0.75rem',
            sm: '0.875rem',
            base: '1rem',
            lg: '1.125rem',
            xl: '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.875rem',
            '4xl': '2.25rem',
            '5xl': '3rem',
            '6xl': '4rem',
        },
        fontWeight: { hairline: '100', thin: '200' },
        height: (theme) => ({
            auto: 'auto',
            ...theme('spacing'),
            full: '100%',
            screen: '100vh',
        }),
        inset: { 0: '0', auto: 'auto' },
        letterSpacing: { normal: '0' },
        maxHeight: { full: '100%', screen: '100vh' },
        minHeight: ['0'],
        minWidth: ['0'],
        padding: (theme) => theme('spacing'),
        placeholderColor: (theme) => theme('colors'),
        placeholderOpacity: (theme) => theme('opacity'),
        textColor: (theme) => theme('colors'),
        textOpacity: (theme) => theme('opacity'),
        width: (theme) => ({
            auto: 'auto',
            ...theme('spacing'),
            '1/2': '50%',
            '1/3': '33.333333%',
            '2/3': '66.666667%',
            '1/4': '25%',
            '2/4': '50%',
            '3/4': '75%',
            '1/5': '20%',
            '2/5': '40%',
            '3/5': '60%',
            '4/5': '80%',
            '1/6': '16.666667%',
            '2/6': '33.333333%',
            '3/6': '50%',
            '4/6': '66.666667%',
            '5/6': '83.333333%',
            '1/12': '8.333333%',
            '2/12': '16.666667%',
            '3/12': '25%',
            '4/12': '33.333333%',
            '5/12': '41.666667%',
            '6/12': '50%',
            '7/12': '58.333333%',
            '8/12': '66.666667%',
            '9/12': '75%',
            '10/12': '83.333333%',
            '11/12': '91.666667%',
            full: '100%',
            screen: '100vw',
        }),
        gap: (theme) => theme('spacing'),
        rotate: ['0'],
        skew: ['0'],
        transitionProperty: {
            DEFAULT: 'background-color, border-color, color, fill, stroke, opacity, box-shadow, transform',
        },
        extend: {
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        code: {
                            color: theme('color.gray.300'),
                        },
                        color: theme('colors.gray.300'),
                        h1: {
                            color: theme('colors.gray.500'),
                        },
                        h2: {
                            color: theme('colors.gray.500'),
                        },
                        h3: {
                            color: theme('colors.gray.500'),
                        },
                        h4: {
                            color: theme('colors.gray.500'),
                        },
                        h5: {
                            color: theme('colors.gray.500'),
                        },
                        h6: {
                            color: theme('colors.gray.500'),
                        },
                        a: {
                            color: theme('colors.green.300'),
                            '&:hover': {
                                color: theme('colors.green.500'),
                            },
                            'text-decoration': 'none',
                        },
                        strong: {
                            color: theme('colors.gray-100'),
                            fontWeight: '600',
                        },
                        blockquote: {
                            color: theme('colors.white'),
                        },
                    },
                },
            }),
            colors: { gray: colors.blueGray, green: colors.green },
        },
    },
    variants: { extend: { fontWeight: ['hover', 'focus'] } },
    plugins: [require('@tailwindcss/typography')],
}
