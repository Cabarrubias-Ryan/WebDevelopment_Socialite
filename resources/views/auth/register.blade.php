<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Register</title>
</head>
<body>
    <main class="container">
        <section class="box">
            <form action="{{ route('regiter.auth.add')}}" method="post">
                <div class="title">
                    <h1>Register</h1>
                </div>
                <div class="textbox">
                    @csrf
                    <input type="text" name="username" class="textbox_input" placeholder="Username" style="color: #333; font-size: 1em;">
                    <input type="password" name="password" class="textbox_input" placeholder="Password" style="color: #333; font-size: 1em;">
                    <input type="email" name="email" class="textbox_input" placeholder="Email" style="color: #333; font-size: 1em;">
                    <input type="text" name="firstname" class="textbox_input" placeholder="Firstname" style="color: #333; font-size: 1em;">
                    <input type="text" name="middlename" class="textbox_input" placeholder="Middlename" style="color: #333; font-size: 1em;">
                    <input type="text" name="lastname" class="textbox_input" placeholder="Lastname" style="color: #333; font-size: 1em;">
                    <input type="submit" value="submit" class="textbox_input" style="background: blue; color: #ffff; cursor: pointer;">
                </div>
            </form>
            <div class="register" style="margin-top: 30px ">
                <span>Already have a account?<a href="{{ route('login')}}">SIGN IN</a></span>
            </div>
        </section>
    </main>
</body>
</html>
