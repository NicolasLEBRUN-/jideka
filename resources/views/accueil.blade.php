<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Jocelyne Deschamps-Kus</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google_recaptcha_data_sitekey" content="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
        <script src="https://www.google.com/recaptcha/api.js?hl={{ app()->getLocale() }}"></script>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div id="app-accueil">
        </div>
        
        <script src="/js/lang.js"></script>
        <script src="/js/app-accueil.js"></script>
        <script type="text/javascript">
            // https://laravel.com/docs/5.4/csrf#csrf-x-csrf-token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </body>
</html>