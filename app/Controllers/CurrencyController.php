<?php

namespace App\Controllers;

class CurrencyController extends BaseController
{
    public function index()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://v6.exchangerate-api.com/v6/your-api-key/latest/EUR");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($response, true);

        $rate = $data['conversion_rates']['BRL'];

        // Passar o valor da taxa para a view
        return view('shop/createPlan', ['rate' => $rate]);
    }
}
