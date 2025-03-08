<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <section class="box">
            <form action="{{ route('login.auth.process') }}" method="post">
                <div class="title">
                    <h1>Login</h1>
                </div>
                <div>
                    @if ($errors->any())
                        <div class="error-message">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="textbox">
                    @csrf
                    <input type="text" name="username" class="textbox_input" placeholder="Username">
                    <input type="password" name="password" class="textbox_input" placeholder="Password">
                    <input type="submit" value="Submit" class="textbox_input">
                </div>
            </form>
            <div class="footer">
                <span>OR</span>
            </div>
            <div class="socials">
                <div class="social-box">
                    <a href="{{ route('auth.provider.redirect','facebook') }}">
                        <i class='bx bxl-facebook-circle'></i>
                    </a>
                </div>
                <div class="social-box">
                    <a href="{{ route('auth.provider.redirect','google') }}">
                        <i class='bx bxl-google'></i>
                    </a>
                </div>
            </div>
            <div class="register">
                <span>Need an account? <a href="{{ route('regiter.auth') }}">SIGN UP</a></span>
            </div>
        </section>
    </main>
</body>
</html>
