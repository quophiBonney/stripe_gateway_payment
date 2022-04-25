<?php 
//include autoload
require './vendor/autoload.php';

//This optional because the browser already knows the
header('Content-Type', 'application/json');

//You get the api key at stripe dashboard it is called the secret key
\Stripe\Stripe::setApiKey("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");
 
//Creating a session variable
//$session = Stripe\Checkout\Session::create([]);

//Create a stripe object
$stripe = new Stripe\StripeClient("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");

//Session object
$session = $stripe->checkout->sessions->create([
"success_url" => "http://localhost:8080/success.html",
"cancel_url" => "http://localhost:8080/cancel.html",
"payment_method" => ['card', 'alipay'],
"mode" => 'payment',
"line_items" => [
[
"price_data" => [
"currency" => "usd", 
"product_data" => [
"name" => "Mobile",
"description" => "Latest iphone" 
], 
"unit_amount" => 5000
],
"quantity" => 1, 
]
]

//Another item or product a customer is buying
[
"price_data" => [
"currency" => "usd", 
"product_data" => [
"name" => "Laptop",
"description" => "Latest HP Pavilion" 
], 
"unit_amount" => 10000
],
"quantity" => 2
]
]
]);

echo json_encode($session);
?>
