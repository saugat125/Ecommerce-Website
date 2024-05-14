// Get elements
const productCount = document.getElementById('product-count');
const totalItems = document.getElementById('total-items');
const totalPrice = document.getElementById('total-price');
const productBoxes = document.querySelectorAll('.product-box');
const paymentOptions = document.getElementById('payment-options');

// Function to toggle payment options
function togglePaymentOptions() {
    paymentOptions.style.display = paymentOptions.style.display === 'none' ? 'block' : 'none';
}

// Function to update total items and total price
function updateTotal() {
  // Calculate total items
  const items = document.querySelectorAll('.product-box');
  totalItems.textContent = items.length;

  // Calculate total price
  let total = 0;
  items.forEach(item => {
    const priceElement = item.querySelector('.price');
    const price = parseFloat(priceElement.textContent.replace('€', ''));
    const quantityElement = item.querySelector('.amount');
    const quantity = parseInt(quantityElement.textContent);
    total += price * quantity;
  });

  totalPrice.textContent = `${total.toFixed(2)}€`; // Update total price
}

// Event listener for quantity change
const quantityContainers = document.querySelectorAll('.quantity');
quantityContainers.forEach(container => {
  const arrowUp = container.querySelector('.arrow:first-child');
  const arrowDown = container.querySelector('.arrow:last-child');
  const amountElement = container.querySelector('.amount');

  arrowUp.addEventListener('click', () => {
    amountElement.textContent = parseInt(amountElement.textContent) + 1;
    updateTotal();
  });

  arrowDown.addEventListener('click', () => {
    const amount = parseInt(amountElement.textContent);
    if (amount > 0) {
      amountElement.textContent = amount - 1;
      updateTotal();
    }
  });
});

// Event listener for delete product
const deleteButtons = document.querySelectorAll('.delete-product');
deleteButtons.forEach(button => {
  button.addEventListener('click', () => {
    const productBox = button.closest('.product-box');
    productBox.remove();
    updateTotal();
  });
});

// Initial update
updateTotal();