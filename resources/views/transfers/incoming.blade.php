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
  <div class="content">
          <h1 class="display-5">الحولات المستلمة<small class="text-muted">المعلقة</small></h1>
          <p class="lead">يمكن قبول الحوالة او تركها.</p>
          @if (count($transactions) >= 1)
            @foreach ($transactions as $transaction)
            <div class="transfer not-received">
                <ul>
                    <li>
                        <div>من مكتب:
                            <div class="office-name">{{$transaction->contact_email}}</div>
                        </div>
                        <div>وقت الارسال:
                            <div class="office-name">{{$transaction->updated_at}}</div>
                        </div>
                        <div> 
                        </div>
                        <div>رقم الهوية:
                            <div class="office-name">{{$transaction->idtransfer}}</div>
                        </div>
                        <div>رقم العملية:
                            <div class="office-name">{{$transaction->id}}</div>
                        </div>
                        <div> رقم المستلم:
                            <div class="office-name">{{$transaction->phonetransfer}} </div>
                        </div>
                        <div> المبلغ :
                            <div class="office-name">{{$transaction->amount}} $</div>
                        </div>
                        <div>اسم المستلم:
                            <div class="office-name">{{$transaction->nametransfer}}</div>
                        </div>
                    </li>
                </ul>
                <form method="post" action="/transactions/{{ $transaction->id }}">
                  @csrf
                  @method('put')
                  <div class="state">
                    <button type="submit" name="action" value="accept">تسليم</button>
                  </div>
                </form>
              </div>
            @endforeach
          @else
            <tr>
              <td colspan="5"><i>ليس لديك اي حوالة مستلمة.</i></td>
            </tr>
          @endif
    </div>
@endsection
