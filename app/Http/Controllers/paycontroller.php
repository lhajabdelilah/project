<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// Contrôleur
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;


class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.client_secret')
            )
        );

        $this->apiContext->setConfig(config('services.paypal.settings'));
    }
    public function pay()
    {
        return view('Payment.pay');
    }

    public function payWithPayPal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    

    }}