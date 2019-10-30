const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  plugins: [
    require('@tailwindcss/custom-forms'), // https://tailwindcss-custom-forms.netlify.com/
  ],
  theme: {
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
