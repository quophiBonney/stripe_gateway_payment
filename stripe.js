const stripe = Stripe("pk_live_51KSX4qLlJtrYkH1sabDp5eJC98EEkFfssUrJubfvnNYBPNDCHq2wUzA97ZNz9SuLCP8PeOF34PWcq7CjCrnmpiKU00q2CiIqlA");
const btn = document.querySelector('#btn');
btn.addEventListener('click', () => {
fetch('checkout.php', {
method: "POST",
headers: {
'Content-Type' : 'application/json',
}, 
body: JSON.stringify({})
}).then(res=> res.json())
.then(payload => {
stripe.redirectToCheckout({sessionId: payload.id})
})
});
