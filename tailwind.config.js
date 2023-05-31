/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  important: true,
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Raleway', 'ui-sans-serif', 'system-ui','sans-serif'],
        'serif': ['Source Serif Pro ', 'ui-serif', 'serif'],
        'display': ['Arvo', 'Source Serif Pro ']
      },
      boxShadow: {
        'bold': '6px 6px 0px 0px rgba(0,0,0,1)',
      }
    },
  },
  plugins: [],
}
