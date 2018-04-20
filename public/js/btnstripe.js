/*//check for price value in dom
var price = document.getElementById('price');
var newPrice = parseInt(price.textContent, 10)*100;


var handler = StripeCheckout.configure({
  key: 'pk_test_oiHX9dPsgTdfoOtwAX92WQcI',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: "Musée du Louvre",
    description :"Votre paiement",
    allowRememberMe: false,
    currency: "eur",
    amount: newPrice,
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});*/

