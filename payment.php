<form method="post" action="process_payment.php" id="payment-form">
  <!-- form inputs -->
</form>

<button id="submit-payment-btn" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Submit Payment</button>

<script>
  // Get the form element
  const form = document.querySelector('#payment-form');

  // Add a submit event listener to the form
  form.addEventListener('submit', function(event) {
    // Prevent the form from submitting normally
    event.preventDefault();

    // Get the card number input element
    const cardNumberInput = document.getElementById('card_number');

    // Validate the card number format
    if (cardNumberInput.value.length < 16) {
      alert('Card number must have at least 16 digits.');
      return;
    }

    // Get the expiration date input element
    const expirationDateInput = document.getElementById('expiration_date');

    // Validate the expiration date format
    if (!expirationDateInput.value.match(/^\d{2}\/\d{2}$/)) {
      alert('Please enter the expiration date in the format MM/YY');
      return;
    }

    // Get the CVC input element
    const cvcInput = document.getElementById('cvc');

    // Validate the CVC format
    if (!cvcInput.value.match(/^\d{3}$/)) {
      alert('Please enter a 3-digit CVC.');
      return;
    }

    // Display a success message
    alert('Payment successful!');

    // Redirect to the invoice page
    window.location.href = 'invoice.php';
  });

  // Get the submit payment button element
  const submitPaymentBtn = document.querySelector('#submit-payment-btn');

  // Add a click event listener to the button
  submitPaymentBtn.addEventListener('click', function() {
    // Submit the payment form
    form.submit();
  });
</script>
