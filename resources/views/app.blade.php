<!doctype html>
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

        <title>Davor Minchorov - personal website and blog</title>

        <link rel="alternate" href="http://www.davorminchorov.com" hreflang="en-gb" />
        <link rel="canonical" href="https://www.davorminchorov.com" />
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="font-sans text-grey antialiased leading-tight bg-black">

        <noscript>
            <div class="flex items-center justify-center">
                <h2 class="uppercase text-center text-xl font-semibold text-grey mb-4">
                    I'm 100% JavaScript!
                </h2>
                <img src="https://upload.wikimedia.org/wikipedia/en/a/a6/Bender_Rodriguez.png" alt="Bender Rodriguez">
            </div>
        </noscript>

        <div id="app"></div>
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>
    @if(env('APP_ENV') !== 'local')
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-80366434-1', 'auto');
            ga('send', 'pageview');

        </script>
    @endif
</html>
