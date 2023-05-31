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
      screens: {
        'xl': '1200px',
      },
    },
  },
  plugins: [],
}
