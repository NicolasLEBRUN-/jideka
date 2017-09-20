<!DOCTYPE html>
<html>
    <head>
        <title>Jideka</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://www.google.com/recaptcha/api.js?hl={{ session()->get('applocale') }}"></script>
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