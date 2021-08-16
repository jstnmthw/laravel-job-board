module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ['Noto Sans', 'sans-serif'],
      serif: ['Times New Roman', 'serif'],
    },
    extend: {
      colors: {
        orange: {
          light: '#f16c51',
          DEFAULT: '#fd5631',
          dark: '#fd390e',
        },
        peach: '#fc9d8c',
        blue: '#0d6efd',
        indigo: '#6610f2',
        purple: '#6f42c1',
        pink: '#d63384',
        red: '#dc3545',
        yellow: '#ffc107',
        green: '#198754',
        teal: '#20c997',
        cyan: '#0dcaf0',
        white: '#fff',
        primary: '#fd5631',
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
        'sm-alt' : '0.813rem'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
