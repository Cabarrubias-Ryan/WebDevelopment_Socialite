<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>
<body>
    <main class="container">
        <section class="box">
            <form id="formLogin">
                <div class="title" style="display: flex; justify-content: center; margin-top: 10px;">
                    <img src="{{ asset('images/logo.png')}}" alt="logo" style=" width: 100px; ">
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
                    <button style="margin-top: 20px; width: 100%; height: 40px; background: blue; color: white; border-radius: 14px;" type="button" id="btnSave">Submit</button>
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
    <script>
        $(document).ready(function() {
            $('#btnSave').on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "/login",
                    cache: false,
                    data: $('#formLogin').serialize(),
                    dataType: "json",
                    success: function(data) {
                        if(data.Error == 1){
                            Swal.fire({
                            title: 'Error',
                            icon: "error",
                            text: data.Message,
                            }).then(result => {
                                location.reload();
                            });
                        }
                        else if(data.Error == 0){
                            window.location.href = '{{ url('/home')}}';
                        }
                    },
                    error: function() {
                        alert('Error');
                    }
                })
            } )
        })
    </script>
</body>
</html>
