<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51JClUNJmUNLaeMK5XQgvSNGYnYeMYKIR83EJeEMu3VDwdHhj7PAGzSHBeGxaAmreRu9QsKUp6NKyhWtKzUnkWf2s00w14kIuPt";

$secretKey="sk_test_51JClUNJmUNLaeMK5xODCRHSzjs7QPehpWwYrAToHpxSAuZT0ROnSQNseVKVJdaMw10EpLgBjlMzo14FnHN3dBpZJ00JYQyKMuM"; //M

\Stripe\Stripe::setApiKey($secretKey);
?>