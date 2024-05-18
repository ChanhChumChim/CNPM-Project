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
  document.getElementById("subtotal").textContent = `$${subtotal.toFixed(2)}`;
  const total = subtotal + 20; // Assuming $20 is the shipping cost
  document.getElementById("total").textContent = `$${total.toFixed(2)}`;
  document.querySelector(".checkout-button").textContent = `$${total.toFixed(
    2
  )}`; // Update checkout button
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
    calculateSubtotal(); // Recalculate subtotal
  });

  decreaseBtn.addEventListener("click", () => {
    let quantityElement = item.querySelector(".quantity");
    let quantity = parseInt(quantityElement.textContent);
    if (quantity > 1) {
      quantity--;
      quantityElement.textContent = quantity;
      item.dataset.quantity = quantity;
      calculateSubtotal(); // Recalculate subtotal
    }
  });
});

document.querySelectorAll(".remove").forEach((button) => {
  button.addEventListener("click", () => {
    const itemElement = button.closest(".item");
    itemElement.remove();
    calculateSubtotal(); // Recalculate subtotal
  });
});

// Initialize subtotal on page load
calculateSubtotal();
