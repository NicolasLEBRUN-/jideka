<?php

namespace App\Http\Controllers\Validation;

use GuzzleHttp\Client as Client;

// Classe enregistrée dans la classe App\Providers\AppServiceProvider
class GoogleRecaptchaResponseTokenValidator extends \Illuminate\Validation\Validator {

    public function validateGoogleRecaptchaResponseToken($attribute, $value, $parameters)
    {
        $client = new Client();
		$response = $client->get(env('GOOGLE_RECAPTCHA_URL', 'https://www.google.com/recaptcha/api/siteverify"'), [
			'query' =>  [
				'secret' => env('GOOGLE_RECAPTCHA_SECRET', '123456'),
				'response' => $value,
			]
		]);

		// \Log::info('Response JSON: ' . json_decode($response->getBody())->success);

		return json_decode($response->getBody())->success == true;
    }

}