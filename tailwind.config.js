/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./dist/*.{html,js,php}" ,
    "./components/**/*.{html,js}" ,
],
  theme: {
    fontFamily: {
      clashDisplay : ['Clash Display', 'sans-serif'],
      telma : ['Telma', 'cursive'],
    },
    extend: {
      
    },
  },
  plugins: [],
}

