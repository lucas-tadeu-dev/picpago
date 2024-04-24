<?php
//don't extend this controller from Pre_loader 
//because this will be called by PayPal 
//and login check is not required since we'll validate the data

namespace App\Controllers;

use CodeIgniter\View\View;
require_once(APPPATH.'ThirdParty/stripe-php/init.php');

class Stripe_payment extends BaseController{

 public function __construct()
    {
        // require_once(APPPATH.'ThirdParty/Stripe/Account.php');
        // Defina suas chaves de API
         \Stripe\Stripe::setApiKey('sk_test_51NH61gKAnvBgk0filBg7YXMYM2J82spmtftz7vje83D6HdiMegCR0G4Mxhuf57F3bFCvAOdPXTzcTs10t8OG1sEX00IGaGFd8a');
    }
    function index(){
        return view('stripe_payment/index');
    }
 public function charge()
    {
        $request = \Config\Services::request();

        $token  = $request->getPost('stripeToken');
        $email  = $request->getPost('stripeEmail');
        $amount = $request->getPost('amount');
        $description = $request->getPost('description');

        try {
            $charge = \Stripe\Charge::create([
                'amount' => 50,
                'currency' => 'brl',
                'description' => 'Exemplo de carga',
                'source' => $token,
            ]);
            
            return view('stripe_payment/index', ['amount' => $amount, 'email' => $email]);
        } catch (\Stripe\Exception\CardException $e) {
            return view('stripe_payment/index', ['message' => $e->getError()->message]);
        }
    }

    public function balance()
    {
       try {
        $balance = \Stripe\Balance::retrieve();
        $available = isset($balance->available) && is_array($balance->available) ? $balance->available : [];
        $pending = isset($balance->pending) && is_array($balance->pending) ? $balance->pending : [];
        return view('stripe_payment/index', ['available' => $available, 'pending' => $pending]);
    } catch (\Stripe\Exception\AuthenticationException $e) {
        return view('stripe_payment/index', ['message' => $e->getMessage()]);
    }
    }

}

/* End of file payments.php */
/* Location: ./app/controllers/Paypal_ipn.php */