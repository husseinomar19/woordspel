
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="\asset\img\icons8-pizza-16.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('asset/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ URL::asset('asste/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Open+Sans:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>{{ $pageTitle }}</title>
</head>
<body>
    <header>
        <nav>
            <a href="/">Woordenspel</a>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/inloggen">Inloggen</a></li>
            </ul>
            
        </nav>
    </header>

    @yield('content')


    
    <footer>
        <div class="footer-menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/">Menu</a></li>
                <li><a href="/">Over ons</a></li>
                <li><a href="/">Contact</a></li>
            </ul>
        </div>
        <div class="privcy">
         <ul>
            <li><a href="/">Voorwaarden</a></li>
            <li><a href="/">Bestellen</a></li>
            <li><a href="/">Privacybeleid</a></li>
            <li><a href="/">Sitemap</a></li>
         </ul>
        </div>
    </footer>
</body>
</html>
