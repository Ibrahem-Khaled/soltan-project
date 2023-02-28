<!DOCTYPE html>
<html>

<head lang="ar">
    <meta charset="UTF-8">
    <title>لوحة التحكم | الصفحة الرئيسية</title>
    <link rel="stylesheet" href="/dash/css/main.css">
    <link rel="stylesheet" href="/dash/css/home.css">
    <link rel="stylesheet" href="/dash/responsive/responsive-main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

</head>

<body>



    <div class="container">
        <!-- Nav Bar -->
        <nav>
            <!-- Logo -->
            <div class="logo">
                <img src="/dash/img/logo.png" alt="logo">
            </div>
            <!-- End Logo -->
            <!-- ul -->
            <ul>
                <li><a class="activ" href="./indexs">الصفحة الرئيسية</a></li>
                <li><a href="./accounts.html">أسماء المراكز / المراكز المعتمدة</a></li>
                <li><a href="./account_statement.html">كشف حساب</a></li>
                <li><a href="./cut_coins.html">قص العملات</a></li>
                <li><a href="./transformation.html">التحويل من مركز الي مركز</a></li>
                <li><a href="">الاعتمادات</a></li>
                <li><a href="./login.html">تسجيل الخروج</a></li>
            </ul>
            <!-- end ul -->
            <span class="menu"><i class="fa-solid fa-bars"></i></span>
        </nav>

        <!-- End Nav Bar -->

        <div class="content">
            <h3>فتح حساب جديد</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-info">
                    <div class="input-info">
                        <lable for="">اسم المستخدم</lable>
                        <input type="text" id="username" placeholder="username" class="form-control" name="username"
                        value="{{ old('username') }}"  required autofocus>
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>

                    <div class="input-info">
                        <lable for="">رقم الصندوق</lable>
                        <input type="number" id="boxnumber" class="form-control" name="boxnumber" required autofocus
                        value="{{ old('boxnumber') }}"  placeholder="boxnumber">
                        @if ($errors->has('boxnumber'))
                            <span class="text-danger">{{ $errors->first('boxnumber') }}</span>
                        @endif
                    </div>

                    <div class="input-info">
                        <lable for="">اسم المكتب</lable>
                        <input type="text" class="form-control" id="email" placeholder="offece" name="email"
                        value="{{ old('email') }}"  required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="input-info">
                        <lable for="">صاحب المكتب</lable>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name"
                        value="{{ old('name') }}"  required autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="input-info">
                        <lable for="">رقم التواصل</lable>
                        <input type="tel" class="form-control" id="phone" placeholder="phonenumber"
                        value="{{ old('phone') }}"  name="phone" required autofocus>
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="input-info">
                        <lable for="">الدولة</lable>
                        <input type="text" class="form-control" id="contry" placeholder="contry" name="contry"
                        value="{{ old('contry') }}" required autofocus>
                        @if ($errors->has('contry'))
                            <span class="text-danger">{{ $errors->first('contry') }}</span>
                        @endif
                    </div>

                    <div class="input-info">
                        <lable for="">المدينة</lable>
                        <input type="text" class="form-control" id="city" placeholder="city" name="city"
                        value="{{ old('city') }}"  required autofocus>
                        @if ($errors->has('city'))
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        @endif
                    </div>

                    <div class="input-info">
                        <lable>معلومات </lable>
                        <input type="text" class="form-control" id="information" placeholder="information"
                        value="{{ old('information') }}"  name="information" required autofocus>
                        @if ($errors->has('information'))
                            <span class="text-danger">{{ $errors->first('information') }}</span>
                        @endif
                    </div>
                    <div class="input-info">
                      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
      
                      <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                          name="password" required autocomplete="new-password">
      
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
      
                    <div class="input-info">
                      <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
      
                      <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                          required autocomplete="new-password">
                      </div>
                    </div>
                <div class="form-btn">
                    <input class="btn-orange submit" type="submit" value="انشاء حساب">
                </div>
            </form>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>


    </div>

    <!-- <script src="dash/js/main.js" type="module"></script> -->
    <script src="/dash/js/home.js" type="module"></script>
    <script src="/dash/js/main.js" type="module"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>



</body>

</html>
