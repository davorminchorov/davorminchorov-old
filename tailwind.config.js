module.exports = {
    target: 'relaxed',
    prefix: '',
    important: false,
    separator: ':',
    theme: {
        typography: (theme) => ({
            default: {
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
        colors: {
            black: '#000',
            white: '#fff',
            gray: {
                100: '#f7fafc',
                200: '#edf2f7',
                300: '#e2e8f0',
                400: '#cbd5e0',
                500: '#a0aec0',
                600: '#718096',
                700: '#4a5568',
                800: '#2d3748',
                900: '#1a202c',
            },
            red: {
                100: '#fff5f5',
                200: '#fed7d7',
                300: '#feb2b2',
                400: '#fc8181',
                500: '#f56565',
                600: '#e53e3e',
                700: '#c53030',
                800: '#9b2c2c',
                900: '#742a2a',
            },
            orange: {
                100: '#fffaf0',
                200: '#feebc8',
                300: '#fbd38d',
                400: '#f6ad55',
                500: '#ed8936',
                600: '#dd6b20',
                700: '#c05621',
                800: '#9c4221',
                900: '#7b341e',
            },
            yellow: {
                100: '#fffff0',
                200: '#fefcbf',
                300: '#faf089',
                400: '#f6e05e',
                500: '#ecc94b',
                600: '#d69e2e',
                700: '#b7791f',
                800: '#975a16',
                900: '#744210',
            },
            green: {
                100: '#f0fff4',
                200: '#c6f6d5',
                300: '#9ae6b4',
                400: '#68d391',
                500: '#48bb78',
                600: '#38a169',
                700: '#2f855a',
                800: '#276749',
                900: '#22543d',
            },
            teal: {
                100: '#e6fffa',
                200: '#b2f5ea',
                300: '#81e6d9',
                400: '#4fd1c5',
                500: '#38b2ac',
                600: '#319795',
                700: '#2c7a7b',
                800: '#285e61',
                900: '#234e52',
            },
            blue: {
                100: '#ebf8ff',
                200: '#bee3f8',
                300: '#90cdf4',
                400: '#63b3ed',
                500: '#4299e1',
                600: '#3182ce',
                700: '#2b6cb0',
                800: '#2c5282',
                900: '#2a4365',
            },
            indigo: {
                100: '#ebf4ff',
                200: '#c3dafe',
                300: '#a3bffa',
                400: '#7f9cf5',
                500: '#667eea',
                600: '#5a67d8',
                700: '#4c51bf',
                800: '#434190',
                900: '#3c366b',
            },
            purple: {
                100: '#faf5ff',
                200: '#e9d8fd',
                300: '#d6bcfa',
                400: '#b794f4',
                500: '#9f7aea',
                600: '#805ad5',
                700: '#6b46c1',
                800: '#553c9a',
                900: '#44337a',
            },
            pink: {
                100: '#fff5f7',
                200: '#fed7e2',
                300: '#fbb6ce',
                400: '#f687b3',
                500: '#ed64a6',
                600: '#d53f8c',
                700: '#b83280',
                800: '#97266d',
                900: '#702459',
            },
        },
        spacing: ['0'],
        backgroundColor: (theme) => theme('colors'),
        backgroundOpacity: (theme) => theme('opacity'),
        borderColor: (theme) => ({
            ...theme('colors'),
            default: theme('colors.gray.300', 'currentColor'),
        }),
        borderOpacity: (theme) => theme('opacity'),
        borderRadius: { none: '0', default: '0.25rem' },
        borderWidth: { default: '1px', 0: '0' },
        boxShadow: {
            xs: '0 0 0 1px rgba(0, 0, 0, 0.05)',
            default: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
            outline: '0 0 0 3px rgba(66, 153, 225, 0.5)',
        },
        divideColor: (theme) => theme('borderColor'),
        divideOpacity: (theme) => theme('borderOpacity'),
        divideWidth: (theme) => theme('borderWidth'),
        flexGrow: { default: '1' },
        flexShrink: { default: '1' },
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
            default: 'background-color, border-color, color, fill, stroke, opacity, box-shadow, transform',
        },
    },
    variants: { extend: { fontWeight: ['hover', 'focus'] } },
    plugins: [require('@tailwindcss/typography')],
}
