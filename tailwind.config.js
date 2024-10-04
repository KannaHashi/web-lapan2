module.exports = {
  darkMode: 'selector',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      screens: {
        'tall': { 'raw': '(max-width: 600px)' },
        'tab' : { 'raw' : '(min-width: 768px, max-width: 1440px)' }
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
