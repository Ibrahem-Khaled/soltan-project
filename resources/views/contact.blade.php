<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/alsoltan project/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="/alsoltan project/bootstrap/js/bootstrap.bundle.js"></script>
  <link href="/alsoltan project/mainCSS/navBarStyle.css" rel="stylesheet" />
  <link href="/alsoltan project/mainCSS/incomingTransfer-desktop.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen and (max-device-width: 991.5px)"
    href="/alsoltan project/mainCSS/incomingTransfer-mobile.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');
  </style>
  <script src="/alsoltan project/JS/button-toggler.js"></script>
  <title>الحوالات الواردة</title>
</head>

@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <h1 class="display-5">اختر المكتب المراد تحويل عليه</h1>
        <p class="lead">مع العلم انه يمكن اختيار المكتب مرة واحدة</p>
        <form action="/transfer/contact" method="post">
          @csrf
          <div class="form-group row">
            <div class="col-sm-8">
              <select class="form-control" id="selectUser" name="email" required focus>
                @foreach ($users as $user)
                  <option value="{{ $user->email }}">{{ $user->email }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-success btn-lg mt-5">اضافة المكتب الان</button>
            <a href="/transfer" class="btn btn-danger btn-lg mt-5">الغاء</a>
        </form>
      </div>
    </div>
  </div>
@endsection
