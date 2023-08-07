module.exports = {
  content: [
    './*/*.php',
    './**/*.php',
    './**/**/*.php',
    './resources/css/*.css',
    './resources/js/*.js',
    './safelist.txt'
  ],
  theme: {
    fontFamily: {
      'poppins': ['poppins', 'serif'],
    },
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '0rem'
      },
    },
    extend: {},
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
    }
  },
  plugins: [],
}
