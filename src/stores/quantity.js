import { defineStore } from 'pinia';

export const cartQuantities = defineStore('main', {
  state: () => ({
    quantity: null,
  }),
  actions: {
    setQuantity(newQuantity) {
      this.quantity = newQuantity;  // Corrected syntax
    },
  },
});
