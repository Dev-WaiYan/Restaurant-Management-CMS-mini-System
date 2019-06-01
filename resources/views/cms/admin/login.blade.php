<!-- For default admin login
    username = "admin";
    password = "admin";
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Restaurant</title>
    <link rel="stylesheet" href="/css/w3.css" />
    <link rel="stylesheet" href="/css/restaurant.css" />
</head>
<body>
    <section class="w3-row w3-khaki w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-container">
        <h2>My Restaurant</h2>
        <h4>Admin View</h4> <hr style="background: green;height:1px;">
        @if(isset($error))
            <h4 class="w3-red w3-padding-32 w3-panel">{{$error}}</h4>
        @endif
        <form action="/login" class="w3-padding-64" method="post">
        {{csrf_field()}}
            <label for="username">Name :</label> <br><br>
            <input class="w3-input w3-round-large" type="text" name="username" id="username" value="" placeholder="eg. admin" required> <br><br>
            <label for="password">Password : </label> <br><br>
            <input class="w3-input w3-round-large" type="password" name="password" id="password" value="" placeholder="eg. password" required> <br><br><br>
            <button type="submit" class="w3-button w3-blue w3-round-large">Login</button>
        </form>
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>

    <footer class="w3-center w3-text-red">
        <p>Developed by <a href="http://codefluid.dx.am/">Code Fluid - TeamCF</a></p>
    </footer>
</body>
</html>