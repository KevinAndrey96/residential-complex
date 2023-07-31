<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <img src="{{getenv('APP_URL').'/'.App\Models\Setting::find(1)->logo}}" width="100px">
        <p><h3 style="color:#8A0829;">{!! $text !!} </h3></p>
    </body>
    <footer><img src="http://portal.portoamericas.com/assets/images/red-footer.png" width="100%" height="250px"></footer>
</html>
