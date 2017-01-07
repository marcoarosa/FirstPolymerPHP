
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes" />

    <title>SHOP</title>

    <link rel="shortcut icon" sizes="32x32" href="/images/shop-icon-32.png" />

    <meta name="theme-color" content="#fff" />
    <link rel="manifest" href="/manifest.json" />

    <link rel="import" href="/src/home-app.html" async />

    <style>
        body {
            margin: 0;
            font-family: 'Roboto', 'Noto', sans-serif;
            font-size: 13px;
            line-height: 1.5;
            min-height: 100vh;
        }
        /* styling for render while resources are loading */
        home-app[unresolved] {
            display: block;
            min-height: 101vh;
            line-height: 68px;
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.3em;
            color: #202020;
            padding: 0 16px;
            overflow: visible;
        }
    </style>

</head>
<body>

    <home-app unresolved>SHOP</home-app>

    <script>
    window.performance && performance.mark && performance.mark('index.html');
    Polymer = {lazyRegister: true, dom: 'shadow'};
    (function() {
      if ('registerElement' in document
          && 'import' in document.createElement('link')
          && 'content' in document.createElement('template')) {
        // platform is good!
      } else {
        // polyfill the platform!
        var e = document.createElement('script');
        e.src = '/bower_components/webcomponentsjs/webcomponents-lite.min.js';
        document.body.appendChild(e);
      }
    })();
    </script>

</body>
</html>