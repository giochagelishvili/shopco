/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./shop/**/*.{html,js,php}",
    "./inc/**/*.{html,js,php}"
  ],
  theme: {
    fontFamily: {
      bebas: ["Bebas Neue", "sans-serif"],
      raleway: ["Raleway", "sans-serif"]
    },

    extend: {},
  },
  plugins: [],
}