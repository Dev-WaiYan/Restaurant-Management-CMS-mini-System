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
            <a href="bookinglist"><li 
            <?php if($active == 'bookinglist'): ?> 
                class="active"
            <?php endif; ?>>Booking List</li></a>
            <a href="addmenu"><li 
            <?php if($active == 'addmenu'): ?> 
                class="active"
            <?php endif; ?>>Add Menu</li></a>
            <a href="editmenu"><li 
            <?php if($active == 'editmenu'): ?> 
                class="active"
            <?php endif; ?>>Edit Menu</li></a>
            <a href="setting"><li 
            <?php if($active == 'setting'): ?> 
                class="active"
            <?php endif; ?>>Setting</li></a>
        </ul>
    </nav>
 
    <?php echo $__env->yieldContent('content'); ?>

    <footer class="w3-center w3-text-red">
        <p>Developed by <a href="http://codefluid.dx.am/">Code Fluid - TeamCF</a></p>
    </footer>
</body>
</html>