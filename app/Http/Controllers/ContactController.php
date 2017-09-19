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
            'galerie'             => 'required_if:prereservation,true',
    		'oeuvre'              => 'required_if:prereservation,true',
    		'corps'               => 'required',
    		'grecaptcharesponse'  => 'required|googlerecaptcharesponsetoken'
    	]);

    	$nom = $request->input('nom');
        $email = $request->input('email');
        $prereservation = $request->input('prereservation');
        $galerie = Galerie::find($request->input('galerie'));
    	$oeuvre = Oeuvre::find($request->input('oeuvre'));
    	$corps = $request->input('corps');

	 	Mail::to('timcrespy@hotmail.com')
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
