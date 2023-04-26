<style>
  form {
    margin: 0 auto;
    width: 50%;
  }
</style>

<title>Zero Waste</title>
<h2>Payment Page</h2>

	<style>
		/* Style for the waste word */
		.orange {
			color: orange;
			font-weight: bold;
            font-size: 50px;
		}

		/* Style for the logo */
		.logo {
			width: 50px;
			height: 50px;
			margin-left: 10px;
		}
	</style>
    <div style="text-align: center;">
    <h2>Zero<span class="orange">Waste</span> <img src="http://localhost/mycartcode/icon.png" alt="Logo" class="logo"></h2>
</div>

<form method="post" action="process_payment.php">
<label for="name">Name:</label>
<input type="text" id="name" name="name" pattern="[A-Za-z]+" required><br>


  <label for="card_number">Card Number:</label>
  <input type="text" id="card_number" name="card_number" maxlength="16" required><br>

  <label for="expiration_date">Expiration Date (MM/YY):</label>
  <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/YY" required><br>

  <label for="cvc">CVC:</label>
  <input type="text" id="cvc" name="cvc" minlength="3" maxlength="3" required><br>

  <input type="submit" value="Submit Payment">
  
</form>
<button onclick="window.location.href='index.php'">Go To Home</button>

<script>
  // Get the form element
  const form = document.querySelector('form');

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

    // Redirect to the home page
    window.location.href = 'invoice.php';
  });
</script>

<form method="post" action="process_payment.php">
  <!-- form inputs -->

</form>

<img src="http://localhost/mycartcode/n.png" alt="payment methods">

<style>
  .cart-buttons input[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

input[type="submit"]:active {
  background-color: #3e8e41;
}
