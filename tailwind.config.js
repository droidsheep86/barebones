module.exports = {
  content: [
    './header.php',
    './single.php',
    './index.php',
    './page.php',
    './functions.php',
    './template-parts/**/*.php',
    './assets/js/**/*.js',
    './assets/styles/**/*.scss'
  ],
  theme: {
    extend: {
      typography: {
        DEFAULT: {
          css: {
            maxWidth: '100ch', // add required value here
          }
        }
      },
      fontFamily: {
        'roboto': ['Roboto', 'sans-serif'],
        'roboto-condensed': ['Roboto Condensed', 'sans-serif']
      },
      colors: {
        'cup': '#273372',
        'cup2': '#25a8e0'
      }
    },
  },
  plugins: [
    // require('@tailwindcss/typography'),
  ],
}