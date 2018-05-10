<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset( 'css/app.css' )}}">
</head>
<body>
@include( 'inc.nav' )
<div class="container">
    @include( 'inc.messages' )
    @yield( 'content' )
</div>

<footer id="footer" class="footer text-center">
    <p>Copyright &copy; 2018 todolist</p>
</footer>
</body>
</html>