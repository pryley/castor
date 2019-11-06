const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  plugins: [
    require('@tailwindcss/custom-forms'), // https://tailwindcss-custom-forms.netlify.com/
    require('tailwindcss-bg-alpha')(),
  ],
  theme: {
    // alphaColors: ['blue.500'],
    // alphaValues: [.1, .2, .3, .4, .5, .75],
    extend: {
      fontFamily: {
        sans: [...defaultTheme.fontFamily.sans],
      },
      minWidth: {
        body: '320px',
      },
    },
    screens: {
      xs: '375px',
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      hd: '1440px',
    },
  },
  variants: {},
}
