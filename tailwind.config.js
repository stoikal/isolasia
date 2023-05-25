/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  important: true,
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Raleway', 'ui-sans-serif', 'system-ui','sans-serif'],
        'serif': ['Merriweather', 'ui-serif', 'serif'],
        'display': ['Arvo', 'Merriweather']
      },
    },
  },
  plugins: [],
}
