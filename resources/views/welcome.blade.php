<!DOCTYPE html>
<html>
    <head>
        <title>Tasks</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div id="app">
        
            <menu-haut></menu-haut>
            <accueil></accueil>
            <biographie></biographie>
            <galeries></galeries>
            <expositions></expositions>
            <contact></contact>
            
        </div>
        <script src="/js/app.js"></script>
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