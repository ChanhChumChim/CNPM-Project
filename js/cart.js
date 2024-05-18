let itemToRemove = null;
let discountPercentage = 0;

function calculateSubtotal() {
  const items = document.querySelectorAll(".item");
  let subtotal = 0;
  let itemCount = 0;

  items.forEach((item) => {
    const quantity = parseInt(item.querySelector(".quantity").value);
    const price = parseFloat(item.getAttribute("data-price"));
    if (!isNaN(price) && !isNaN(quantity)) {
      subtotal += quantity * price;
      itemCount += quantity;
    }
  });

  const discountAmount = subtotal * (discountPercentage / 100);
  const discountedSubtotal = subtotal - discountAmount;

  let shippingCost = items.length > 0 ? 20 : 0;
  document.getElementById("subtotal").textContent = `$${subtotal.toFixed(2)}`;

  const discountRow = document.getElementById("discount-row");
  if (discountPercentage > 0) {
    document.getElementById(
      "discount"
    ).textContent = `-$${discountAmount.toFixed(2)}`;
    discountRow.style.display = "flex";
  }
  if (discountPercentage == 0) {
    discountRow.style.display = "none";
  }

  const total = discountedSubtotal + shippingCost;
  document.getElementById("total").textContent = `$${total.toFixed(2)}`;
  document.querySelector(".checkout-button").textContent = `$${total.toFixed(
    2
  )}`;

  const itemCountText =
    itemCount === 0
      ? "You have nothing in your cart"
      : `You have ${itemCount} ${
          itemCount === 1 ? "item" : "items"
        } in your cart`;
  document.getElementById("item-count").textContent = itemCountText;
}

function attachEventListeners(item) {
  let increaseBtn = item.querySelector(".increase-btn");
  let decreaseBtn = item.querySelector(".decrease-btn");
  let quantityTextarea = item.querySelector(".quantity");

  increaseBtn.addEventListener("click", () => {
    let quantity = parseInt(quantityTextarea.value);
    quantity++;
    quantityTextarea.value = quantity;
    item.dataset.quantity = quantity;
    playSound("increase");
    calculateSubtotal();
  });

  decreaseBtn.addEventListener("click", () => {
    let quantity = parseInt(quantityTextarea.value);
    if (quantity > 1) {
      quantity--;
      quantityTextarea.value = quantity;
      item.dataset.quantity = quantity;
      playSound("decrease");
      calculateSubtotal();
    }
  });

  quantityTextarea.addEventListener("input", () => {
    let quantity = parseInt(quantityTextarea.value);
    if (!isNaN(quantity) && quantity >= 0) {
      if (quantity === 0) {
        itemToRemove = item;
        document.getElementById("removeModal").style.display = "block";
      } else {
        item.dataset.quantity = quantity;
      }
      calculateSubtotal();
    }
  });
}

document.querySelectorAll(".item").forEach(attachEventListeners);

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

// Modal functionality
document.querySelector(".close").addEventListener("click", () => {
  document.getElementById("removeModal").style.display = "none";
  itemToRemove = null;
});

document.getElementById("cancelRemove").addEventListener("click", () => {
  document.getElementById("removeModal").style.display = "none";
  itemToRemove = null;
});

document.getElementById("confirmRemove").addEventListener("click", () => {
  if (itemToRemove) {
    itemToRemove.closest(".items").remove();
    itemToRemove = null;
    calculateSubtotal();
  }
  document.getElementById("removeModal").style.display = "none";
});

// Close the modal if the user clicks outside of it
window.onclick = function (event) {
  if (event.target == document.getElementById("removeModal")) {
    document.getElementById("removeModal").style.display = "none";
    itemToRemove = null;
  }
};

// Discount code functionality
const validDiscountCodes = {
  HIEU: 10,
  KHANH: 20,
  CHIEN: 30,
  KHUE: 40,
};

function applyDiscountCode() {
  const discountCodeInput = document.getElementById("discount-code").value;
  const discountMessage = document.getElementById("discountMessage");

  if (validDiscountCodes[discountCodeInput]) {
    discountPercentage = validDiscountCodes[discountCodeInput];
    discountMessage.textContent = `Discount applied: ${discountPercentage}% off`;
    discountMessage.style.color = "green";
  } else {
    discountPercentage = 0;
    discountMessage.textContent = "Invalid discount code!";
    discountMessage.style.color = "BLUE";
  }

  calculateSubtotal();
}

// Remove spaces from discount code and handle Enter key press
document.getElementById("discount-code").addEventListener("input", (event) => {
  event.target.value = event.target.value.replace(/\s+/g, "");
});

document
  .getElementById("discount-code")
  .addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent the default action (submitting the form or adding a newline)
      applyDiscountCode(); // Apply the discount code
    }
  });

document
  .getElementById("applyDiscount")
  .addEventListener("click", applyDiscountCode);

// Initialize subtotal on page load
calculateSubtotal();

// document.querySelector(".close").addEventListener("click", () => {
//   document.getElementById("removeModal").style.display = "none";
//   itemToRemove = null;
// });

// document.getElementById("cancelRemove").addEventListener("click", () => {
//   document.getElementById("removeModal").style.display = "none";
//   itemToRemove = null;
// });

// document.getElementById("confirmRemove").addEventListener("click", () => {
//   if (itemToRemove) {
//     itemToRemove.closest(".items").remove();
//     itemToRemove = null;
//     calculateSubtotal();
//   }
//   document.getElementById("removeModal").style.display = "none";
// });

// window.onclick = function (event) {
//   if (event.target == document.getElementById("removeModal")) {
//     document.getElementById("removeModal").style.display = "none";
//     itemToRemove = null;
//   }
// };
