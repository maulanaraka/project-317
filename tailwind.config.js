/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        "grey": "#5C5C5C",
        "blue": "#074173",
        brand: {
          gray: "#AAAAAA",
          primary: "#074173",
          "primary-darker": "#042039",
          secondary: "#919A71",
          "secondary-lighter": "#BF9C42",
        },
      },
      fontFamily: {
        "fredoka" : "Fredoka"
      },
     
    },
  },
  plugins: [],
}

