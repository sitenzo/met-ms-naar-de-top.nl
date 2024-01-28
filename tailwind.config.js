/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {
      animation: {
        tilt: 'tilt 5s infinite linear',
      },
      keyframes: {
        tilt: {
          '0%, 50%, 100%': {
            transform: 'rotate(0deg)',
          },
          '25%': {
            transform: 'rotate(5deg)',
          },
          '75%': {
            transform: 'rotate(-5deg)',
          },
        },
      },
    },
  },
  plugins: [],
}

