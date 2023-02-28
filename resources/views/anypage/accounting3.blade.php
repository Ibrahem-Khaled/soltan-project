<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/alsoltan project/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/alsoltan project/bootstrap/js/bootstrap.bundle.js"></script> 
    <link href="/alsoltan project/mainCSS/accounting3-desktop&mobile.css" rel="stylesheet"/>
    <link href="/alsoltan project/mainCSS/navBarStyle.css" rel="stylesheet"/>
    <style>@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');</style>
    <script src="/alsoltan project/JS/button-toggler.js"></script>
    <title>الصفحة الرئيسية</title>
</head>
@extends('layouts.app')

@section('content')
<body>
  <div class="container">
        <div class="content">
            <h2>كشف حساب بحسب التاريخ لعملة الدولار</h2>
            <label for="from-date">من تاريخ</label>
                <input type="text" name="from-date" id="from-date">
            <label for="to-date">الى تاريخ</label>
                <input type="text" name="to-date" id="to-date">
            <div class="buttons">
                <button>تنفيذ</button>
                <button>طباعة</button>
            </div>
        </div>
    </div>
</body>
</html>
@endsection