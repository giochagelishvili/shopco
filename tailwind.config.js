/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./shop/**/*.{html,js,php}",
    "./inc/**/*.{html,js,php}",
    "./classes/**/*.{html,js,php}",
    "./shop/products/**/*.{html,js,php}",
    "./shop/product/**/*.{html,js,php}"
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