function calculateSubtotal() {
  const items = document.querySelectorAll(".item");
  let subtotal = 0;
  items.forEach((item) => {
    const quantity = parseInt(item.querySelector(".quantity").textContent);
    const price = parseFloat(item.getAttribute("data-price"));
    if (!isNaN(price) && !isNaN(quantity)) {
      subtotal += quantity * price;
    }
  });

  let shippingCost = items.length > 0 ? 20 : 0; // Set shipping cost to 0 if no items
  document.getElementById("subtotal").textContent = `$${subtotal.toFixed(2)}`;
  const total = subtotal + shippingCost;
  document.getElementById("total").textContent = `$${total.toFixed(2)}`;
  document.querySelector(".checkout-button").textContent = `$${total.toFixed(
    2
  )}`;
  const itemCount = items.length;
  const itemCountText =
    itemCount === 0
      ? "You have nothing in your cart"
      : `You have ${itemCount} ${
          itemCount === 1 ? "item" : "items"
        } in your cart`;
  document.getElementById("item-count").textContent = itemCountText;
}

let items = document.querySelectorAll(".item");

items.forEach((item) => {
  let increaseBtn = item.querySelector(".increase-btn");
  let decreaseBtn = item.querySelector(".decrease-btn");

  increaseBtn.addEventListener("click", () => {
    let quantityElement = item.querySelector(".quantity");
    let quantity = parseInt(quantityElement.textContent);
    quantity++;
    quantityElement.textContent = quantity;
    item.dataset.quantity = quantity;
    playSound("increase");
    calculateSubtotal();
  });

  decreaseBtn.addEventListener("click", () => {
    let quantityElement = item.querySelector(".quantity");
    let quantity = parseInt(quantityElement.textContent);
    if (quantity > 1) {
      quantity--;
      quantityElement.textContent = quantity;
      item.dataset.quantity = quantity;
      playSound("decrease");
      calculateSubtotal();
    }
  });
});

document.querySelectorAll(".remove").forEach((button) => {
  button.addEventListener("click", () => {
    const itemElement = button.closest(".items");
    itemElement.remove();
    calculateSubtotal();
  });
});

function playSound(type) {
  let sound;
  if (type === "increase") {
    sound = document.getElementById("increase-sound");
  } else if (type === "decrease") {
    sound = document.getElementById("decrease-sound");
  }
  if (sound) {
    sound.pause();
    sound.currentTime = 0;
    sound.play().catch((error) => console.error(error));
  }
}

// document.addEventListener('DOMContentLoaded', (event) => {
//     playSound('increase');
//     playSound('decrease');

// Initialize subtotal on page load
calculateSubtotal();
