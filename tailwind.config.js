/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./dist/*.{html,js,php}" ,
    "./components/**/*.{html,js}" ,
    "./database/*.{php}",
],
  theme: {
    fontFamily: {
      clashDisplay : ['Clash Display', 'sans-serif'],
      telma : ['Telma', 'cursive'],
    },
    screens: {
      'xxxs': {'max': '375px'},
      // => @media (max-width: 375px) { ... } 
      'xxs' : '375px',
     // => @media (max-width: 375) { ... } 
      'xs': '475px',
      // => @media (min-width: 475px) { ... }
      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    },
    extend: {
      
    },
  },
  plugins: [],
}

