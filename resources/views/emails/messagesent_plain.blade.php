Nouveau message !\r\n
\r\n
de {{ $nom }} ({{ $email }})\r\n
\r\n
{{ $corps }}\r\n
\r\n
@if ($prereservation)
	L'auteur du message souhaite pré-réserver l'oeuvre suivante :\r\n
	{{ $oeuvre->nom }}\r\n
	(de la galerie {{ $galerie->nom }})\r\n
@else
	L'auteur du message ne souhaite pas pré-réserver d'oeuvre.\r\n
@endif
