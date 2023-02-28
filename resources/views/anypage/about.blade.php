
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/alsoltan project/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/alsoltan project/bootstrap/js/bootstrap.bundle.js"></script> 
    <link href="/alsoltan project/mainCSS/about-desktop.css" rel="stylesheet"/>
    <link href="/alsoltan project/mainCSS/navBarStyle.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen and (max-device-width: 991.5px)" href="/alsoltan project/mainCSS/about-mobile.css" />
    <style>@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');</style>
    <title>المعلومات</title>
</head>
@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <!-- navigation bar -->
  
          <div class="content">
              <h2>المعلومات</h2>
            <div class="transactions">
                <div class="box">
                    <div class="label">الحركات المرسلة</div>
                    <div class="number">500</div>
                </div>
                <div class="box">
                <div class="label">الحركات المسلمة</div>
                <div class="number">650</div>
            </div>
          </div>
          <h5 class="label">عنوان المكتب:</h5>
          <h5>{{ Auth::user()->contry }} - {{ Auth::user()->city }} - {{ Auth::user()->email }} - {{ Auth::user()->information }}</h5>
          <h5 class="label">رقم المكتب:</h5>
          <h5>{{ Auth::user()->boxnumber }}</h5>
          <h4>وسائل التواصل</h4>
          </div>
          <footer>
                <span class="d-flex">
              <img src="/alsoltan project/img/whatsapp.svg" href="#" alt="whatsapp">
              <a class="d-lg-flex" href="#" alt="whatsapp">+000 0000 00 000</a>
            </span>
            <span class="d-flex">
              <img src="/alsoltan project/img//facebook-f.svg"  href="#" class="facebook" alt="facebook">
              <a class="d-lg-flex" href="#" alt="facebook">username</a>
            </span>
    </footer>
    </div>
</body>
</html>

@endsection