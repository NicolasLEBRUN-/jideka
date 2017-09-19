<!DOCTYPE html>
<html>
    <head>
        <title>Jideka</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <div id="app-accueil">
        </div>
        
        <script src="/js/lang.js"></script>
        <script src="/js/app.js"></script>
        <script type="text/javascript">
            // https://laravel.com/docs/5.4/csrf#csrf-x-csrf-token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log("Traduction : " + window.i18n.accueil.expositions);
            // console.log("Traduction : " + trans(accueil.expositions));
        </script>
    </body>
</html>