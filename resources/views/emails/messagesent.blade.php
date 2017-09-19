<div>
	<h1>Nouveau message !</h1>

	<h3>de {{ $nom }} ({{ $email }})</h3>

	<p>
		{{ $corps }}
	</p>

	@if ($prereservation)
	    <p>
			L'auteur du message souhaite pré-réserver l'oeuvre suivante :
			<br />
			{{ $oeuvre->nom }}
			<br />
			(de la galerie {{ $galerie->nom }})
		</p>
	@else
	    <p>
			L'auteur du message ne souhaite pas pré-réserver d'oeuvre.
		</p>
	@endif
	
</div>