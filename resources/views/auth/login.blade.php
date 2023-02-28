<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/alsoltan project/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/alsoltan project/bootstrap/js/bootstrap.bundle.js"></script>
    <link href="/alsoltan project/mainCSS/login-desktop&mobile.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');
    </style>
    <title>Alsoltan Login</title>
</head>

<body>
    <div class="container">
        <header>

            <div class="row">
                <div class="col-lg-6 d-none d-lg-grid">
                    <img src="/alsoltan project/img/1.jpg" alt="globe" class="img ">
                </div>
                <div class="col-12 col-lg-6">
                    <div class="login-card">
                        <div class="row">
                            <img src="/alsoltan project/img/logo.png" alt="logo">
                        </div>
                        <div class="row">
                            <h2>مرحبا بك في شركة السلطان التجارية</h2>
                        </div>
                        <div class="row">
                            <h5>ادخل المعلومات الخاصة بك لتسجيل الدخول</h5>
                        </div>
                        <div class="row">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input id="username" type="username" class="form-control" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                                <span class="text-danger" @error('username') {{ $message }} @enderror></span>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="current-password">
                                <span class="text-danger" @error('password') {{ $message }} @enderror></span>
                                <button type="submit" class="btn btn-primary">
                                    تسجيل دخول
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <footer>
            <a class="d-none d-lg-flex" href="#" alt="facebook">email</a>
            <img src="/alsoltan project/img//facebook-f.svg" href="#" class="facebook" alt="facebook">
            <a class="d-none d-lg-flex" href="#" alt="whatsapp">+000 0000 00 000</a>
            <img src="/alsoltan project/img/whatsapp.svg" href="#" alt="whatsapp">
        </footer>
    </div>
</body>

</html>
