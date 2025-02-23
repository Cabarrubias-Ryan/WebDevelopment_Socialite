<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <main class="container">
        <section class="box">
            <form action="{{ route('login.auth.process')}}" method="post">
                <div class="title">
                    <h1>Login</h1>
                </div>
                <div>
                    @if ($errors->any())
                        <div style="background: rgb(255, 77, 0); color: white; width: 80%; height: 20px; margin: 0 auto;">
                            <ul style="margin-bottom: 0px">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="textbox">
                    @csrf
                    <input type="text" name="username" class="textbox_input" placeholder="Username" style="color: #333; font-size: 1em;">
                    <input type="password" name="password" class="textbox_input" placeholder="Password" style="color: #333; font-size: 1em;">
                    <input type="submit" value="submit" class="textbox_input btnsumbit" style="background: blue; color: #ffff; cursor: pointer;">
                </div>
            </form>
            <div class="footer">
                <span>OR</span>
            </div>
            <div class="socials">
                <div class="social-box">
                    <a href="{{ route('auth.provider.redirect','facebook')}}"><i class='bx bxl-facebook-circle' style='color:#ffffff; background: blue;' ></i></a>
                </div>
                <div class="social-box">
                    <a href="{{ route('auth.provider.redirect','google')}}"><i class='bx bxl-google' style='color:#ffffff; background: orange;' ></i></a>
                </div>
            </div>
            <div class="register">
                <span>Need an account?<a href="{{ route('regiter.auth')}}">SIGN UP</a></span>
            </div>
        </section>
    </main>
</body>
</html>
