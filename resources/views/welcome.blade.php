<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Davor Minchorov</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="font-sans text-grey antialiased leading-tight bg-black">
        <div id="app"></div>
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>
</html>
