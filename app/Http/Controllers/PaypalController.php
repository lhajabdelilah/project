<?php

namespace App\Http\Controllers;


use GuzzleHttp\Middleware;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Providers\PayPalServiceProvider;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Exception\PayPalException;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    public function __construct()
    {
        return $this->Middleware('auth');
    }



    public function payment(Request $request)
    {
        $amount = $request->input('amount');
        $description = $request->input('description');
    
        $data = [
            'items' => [
                [
                    'name' => 'rent',
                    'price' => $amount,
                    'description' => $description,
                ],
            ],
            'return_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
            'total' => $amount,
            'invoice_id' => 1,
            'invoice_description' => 'demande for rent',
        ];
    
        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($data, true);
        if (array_key_exists('paypal_link', $response) && filter_var($response['paypal_link'], FILTER_VALIDATE_URL)) {
            return Redirect::away($response['paypal_link']);
        } else {
            return back()->with('error', 'Erreur lors de la redirection vers PayPal.');
        }
    
    
    }
    public function cancel()
    {
        return view('Payment.cancel');
    }
    public function success(Request $request){
        $provider = new ExpressCheckout();
        $responce = $provider->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($responce['ACK']), ['SUCCESS','SUCCESSWITHWARNING'] )) {
        return view('Payment.success');
        }else{
            dd('Plaise try again later ...');
        }
    }









    public function handlePayment($rental_days)
    {

        // Code pour effectuer le paiement via PayPal en utilisant le nombre de jours de location

        // Initialisez la configuration PayPal
        $paypalConfig = config('paypal'); // Assurez-vous que vous avez configuré les informations d'identification PayPal dans votre fichier de configuration

        // Effectuez les appels nécessaires à l'API PayPal pour effectuer le paiement
        // Utilisez la valeur $rental_days pour calculer le montant du paiement en fonction du tarif de location et du nombre de jours

        // Exemple de code pour effectuer un paiement fictif via l'API PayPal (à titre d'illustration)
        $paymentAmount = 10 * $rental_days; // Calcul du montant du paiement fictif

        // Vérifiez la réponse du paiement PayPal et effectuez les actions nécessaires en fonction du résultat


    }
}
