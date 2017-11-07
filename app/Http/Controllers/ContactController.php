<?php

namespace App\Http\Controllers;

use App\Mail\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Galerie;
use App\Oeuvre;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
    	$this->validate($request, [
    		'nom'				  => 'required',
            'email'               => 'required|email',
            'prereservation'      => 'required',
    		'oeuvre'              => 'required_if:prereservation,true',
    		'corps'               => 'required',
    		'grecaptcharesponse'  => 'required|googlerecaptcharesponsetoken'
    	]);

    	$nom = $request->input('nom');
        $email = $request->input('email');
        $prereservation = $request->input('prereservation');
        $galerie_id = $request->input('galerie');
        $oeuvre_id = $request->input('oeuvre');
        $corps = $request->input('corps');

        $galerie = '';
        if (isset($galerie_id)) {
            $galerie = Galerie::find($galerie_id);
        }
        $oeuvre = '';
        if (isset($oeuvre_id)) {
            $oeuvre = Oeuvre::find($oeuvre_id);
        }

	 	Mail::to(env('MAIL_TO_ADDRESS', 'timcrespy@hotmail.com'))
		    // ->cc($moreUsers)
		    // ->bcc($evenMoreUsers)
	 		// ->replyTo($address, $name)
		    ->send(new MessageSent([
                    'nom' => $nom,
                    'email' => $email,
                    'prereservation' => $prereservation,
                    'galerie' => $galerie,
                    'oeuvre' => $oeuvre,
                    'corps' => $corps,
                ]));

		$success = 'Le message a bien été envoyé';
		return $success;
    }
}
