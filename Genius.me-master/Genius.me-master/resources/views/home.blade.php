@if(isset($errorMsg))
    <script>alert("{{$errorMsg}}")</script>   
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Login and Sign up Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="https://media.discordapp.net/attachments/776385006377107487/802161247540871218/brain.png?width=461&height=461"/>
    <link rel="stylesheet" href="css/homeStyle.css">
</head>
<body>
    <body scroll="no" style="overflow: hidden"></body>
    <div class="hero"> 
        <h1>Genius.me</h1>
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="signUp()">Sign up</button>
            </div>    
            <form id="login" class="input-group" action="/login" method="POST" autocomplete="off">
                @csrf
                <input type="text" class="input-field" placeholder="Username" name="userName" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <button type="submit" class="login-btn">Login</button>
            </form>
            <form id="signUp" class="input-group" action="/signUp" method="POST" autocomplete="off">
                @csrf
                <input type="text" class="input-field" placeholder="Username" name="userName" required>
                <input type="password" class="input-field" placeholder="Password" name="password"required>
                <input type="email" class="input-field" placeholder="Email" name="email" required>
                <button type="submit" class="signup-btn">Sign up</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("signUp");
        var z = document.getElementById("btn");

        function signUp(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>

</body>
</html>