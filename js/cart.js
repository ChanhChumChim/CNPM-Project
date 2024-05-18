let items = document.querySelectorAll(".item");

items.forEach((item) => {
  let quantity = item.dataset.quantity;
  let increaseBtn = item.querySelector(".increase-btn");
  let decreaseBtn = item.querySelector(".decrease-btn");

  increaseBtn.addEventListener("click", () => {
    quantity = parseInt(quantity) + 1;
    item.dataset.quantity = quantity;
    item.querySelector(".quantity").textContent = quantity;
  });

  decreaseBtn.addEventListener("click", () => {
    if (parseInt(quantity) > 1) {
      quantity = parseInt(quantity) - 1;
      item.dataset.quantity = quantity;
      item.querySelector(".quantity").textContent = quantity;
    }
  });
});
