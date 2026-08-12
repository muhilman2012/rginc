/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'rginc-navy': '#0F172A',
        'rginc-gold': '#D4AF37',
      }
    },
  },
  plugins: [],
}