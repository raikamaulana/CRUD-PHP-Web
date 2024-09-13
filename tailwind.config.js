/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        handlee: ["Handlee"],
        pixelify: ["Pixelify Sans"],
        justAnotherHand: ["Just Another Hand"],
        nanum: ["Nanum Gothic"],
        inter: ["Inter"],
        chakra: ["Chakra Petch"],
      },
    },
  },
  plugins: [],
};
