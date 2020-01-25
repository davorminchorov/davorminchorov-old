<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;" charset=utf-8″ />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Davor Minchorov - personal website and blog">
        <meta property="og:title" content="Davor Minchorov"/>
        <meta property="og:image" content="https://avatars3.githubusercontent.com/u/6518995?s=274&v=4"/>
        <meta property="og:site_name" content="Davor Minchorov"/>
        <meta property="og:description" content="Davor Minchorov - personal website and blog"/>

        @if(env('APP_ENV') !== 'local')
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-53NH9B9');</script>
            <!-- End Google Tag Manager -->
        @endif
        <title>Davor Minchorov - personal website and blog</title>

        <link rel="alternate" href="http://www.davorminchorov.com" hreflang="en-gb" />
        <link rel="canonical" href="https://www.davorminchorov.com" />
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="font-sans text-gray-500 antialiased leading-tight bg-gray-900">

        <noscript>
            @if(env('APP_ENV') !== 'local')
                <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-53NH9B9" height="0" width="0" style="display:none;visibility:hidden"></iframe>
            @endif
            <div class="flex items-center justify-center">
                <h2 class="uppercase text-center text-2xl font-semibold text-gray-500 mb-4">
                    I'm 100% JavaScript!
                </h2>
                <img src="https://upload.wikimedia.org/wikipedia/en/a/a6/Bender_Rodriguez.png" alt="Bender Rodriguez">
            </div>
        </noscript>

        <div id="app"></div>
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>
</html>
