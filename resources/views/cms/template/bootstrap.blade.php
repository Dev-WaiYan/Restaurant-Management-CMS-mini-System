<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Restaurant</title>

    <link rel="stylesheet" href="css/w3.css" />
    <link rel="stylesheet" href="css/restaurant.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="js/restaurant.js"></script>
</head>
<body>
    <nav class="w3-dark-gray">
        <span class="menu-bar" id="menu-bar" onclick="menuClick()"><i class="glyphicon glyphicon-menu-hamburger"></i></span>
        <span class="menu-close" id="menu-close" onclick="menuClose()"><i class="glyphicon glyphicon-remove"></i></span>
    
        <ul id="menu" class="w3-animate-zoom">
            <a href="/"><li 
            @if($active == 'home') 
                class="active"
            @endif>Home</li></a>
            <a href="menu"><li 
            @if($active == 'menu') 
                class="active"
            @endif>Available Menus</li></a>
            <a href="booking"><li 
            @if($active == 'booking') 
                class="active"
            @endif>Booking</li></a>
        </ul>
    </nav>
 
    @yield('content')

    <footer class="w3-center w3-text-red">
        <p>Developed by <a href="http://codefluid.dx.am/">Code Fluid - TeamCF</a></p>
    </footer>
</body>
</html>