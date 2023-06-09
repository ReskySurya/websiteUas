/** @type {import('tailwindcss').Config} */
module.exports = {
   content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        "color-primary": "#606C5D",
        "color-second": "#F7E6C4",
        "color-tiga": "#557153"
      }
    },
    container: {
      center: true,
      padding: {
        DEFAULT: '1px',
        md: "50px"
      }
    }
  },
  plugins: [],
}

