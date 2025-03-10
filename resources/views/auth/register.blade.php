<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <main class="container">
        <section class="box">
            <form id="formData">
                <div class="title">
                    <h1>Register</h1>
                </div>
                <div class="textbox">
                    @csrf
                    <input type="text" name="username" class="textbox_input" placeholder="Username" required>
                    <input type="password" name="password" class="textbox_input" placeholder="Password" required>
                    <input type="email" name="email" class="textbox_input" placeholder="Email" required>
                    <input type="text" name="firstname" class="textbox_input" placeholder="Firstname" required>
                    <input type="text" name="middlename" class="textbox_input" placeholder="Middlename" required>
                    <input type="text" name="lastname" class="textbox_input" placeholder="Lastname" required>
                    <button style="margin-top: 20px; width: 100%; height: 40px; background: blue; color: white; border-radius: 14px;" type="button" id="btnSave">Submit</button>
                </div>
            </form>
            <div class="register">
                <span>Already have an account? <a href="{{ route('login') }}">SIGN IN</a></span>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            $('#btnSave').on('click', function() {

                e.defaultPrevented();

                $.ajax({
                    type: "POST",
                    url: "/register/add",
                    cache: false,
                    data: $('#formData').serialize(),
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
                            Swal.fire({
                            title: 'Saved',
                            icon: "success",
                            text: data.Message,
                            }).then(result => {
                                window.location.href = '{{ url('/')}}';
                            });
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
