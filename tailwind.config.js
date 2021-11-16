module.exports = {
  mode: 'jit',
  purge: [
    './resources/**/*.{blade.php,js,vue}',
  ],
  darkMode: 'class',
  theme: {
    fontFamily: {
      sans: ['Inter', 'sans-serif'],
      serif: ['Times New Roman', 'serif'],
    },
    extend: {
      colors: {
        orange: {
          50: '#ffefe7',
          100: '#ffd6bf',
          200: '#ffbb9c',
          300: '#fca082',
          400: '#ff8c63',
          500: '#ff7747',
          600: '#ff2d20',
          700: '#ff2d20',
        },
        gray: {
          100: '#f1f1fa',
          200: '#e7e8f2',
          300: '#b5b5bd',
          400: '#8e91a4',
          500: '#61626e',
          600: '#43444f',
          700: '#242733',
          800: '#171923',
          900: '#12141c',
        },
        jade: {
          light: '#d2ffee',
          dark: '#0acf97',
        },
        peach: '#fc9d8c',
        accent: '#5d3cf2',
        secondary: '#f5f4f8',
        success: '#07c98b',
        info: '#3c76f2',
        warning: '#fdbc31',
        danger: '#f23c49',
        light: '#fff',
        slate: '#454056',
        dark: '#1f1b2d',
        charcoal: '#666276'
      },
      lineHeight: {
        icon: '1.45rem',
      },
      borderWidth: {
        '10': '10px',
        '15': '15px',
        '20': '20px',
      },
      maxWidth: {
        '8xl' : '90rem'
      },
      boxShadow: {
        'input' : 'inset 0 1px 2px transparent, 0 0 0 .125rem rgba(253,86,49,.25)'
      },
      fontSize: {
        'sm-alt' : '0.813rem',
      },
      letterSpacing: {
        'submenu' : '.25rem'
      }
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
