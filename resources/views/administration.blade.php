<!doctype html>
<html lang="{{ app()->getLocale() }}"><html>
    <head>
        <title>Jocelyne Deschamps-Kus - Administration</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div id="app-administration">
        </div>
        
        <script src="/js/lang.js"></script>
        <script src="/js/app-administration.js"></script>
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