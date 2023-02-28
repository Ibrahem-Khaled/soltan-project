<?php use Carbon\Carbon; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/alsoltan project/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="/alsoltan project/bootstrap/js/bootstrap.bundle.js"></script>
  <link href="/alsoltan project/mainCSS/outgoingTransfer-desktop.css" rel="stylesheet" />
  <link href="/alsoltan project/mainCSS/navBarStyle.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen and (max-device-width: 991.5px)"
    href="/alsoltan project/mainCSS/outgoingTransfer-mobile.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');
  </style>
  <title>الحوالات الصادرة</title>
</head>

@extends('layouts.app')

@section('content')
  <div class="content">

        <h2>الحوالات الصادرة</h2>
        <p class="lead">يمكنك الغاء الحولات الصادرة.</p>
            @if (count($transactions) >= 1)
              @foreach ($transactions as $transaction)
                <tr>
                  <td>
                    <div class="transfer not-received">
                      <ul>
                        <li>
                          <div>الي مكتب:
                            <div class="office-name">{{ $transaction->contact_email }}</div>
                          </div>
                          <div>
                          </div>
                          <div>رقم السري:
                            <div class="office-name">{{ $transaction->transaction_no }}</div>
                          </div>
                          <div>وقت الارسال:
                            <div class="office-name">{{ $transaction->updated_at }}</div>
                          </div>
                          <div>
                          </div>
                          <div>رقم العملية:
                            <div class="office-name">{{ $transaction->id }}</div>
                          </div>
                          <div> المبلغ:
                            <div class="office-name">${{ $transaction->amount }} </div>
                          </div>
                          <div>اسم المستلم:
                            <div class="office-name">{{ $transaction->nametransfer }}</div>
                          </div>
                          <div>رقم هاتف المستلم:
                            <div class="office-name">{{ $transaction->phonetransfer }}</div>
                          </div>
                        </li>
                      </ul>
                      <div class="state">
                        <form method="post" action="/transactions/{{ $transaction->id }}">
                          @csrf
                          @method('put')
                          <div>قيد الانتظار</div>
                          <button name="action" @if (Carbon::now()->diffInSeconds($transaction->created_at) > 2 * 60 * 60) disabled @endif>الغاء</button>
                        </form>
                      </div>
                    </div>
    </td>
    </tr>
    @endforeach
  @else
    <tr>
      <td colspan="4"><i>ليس لديك حولات صادرة.</i></td>
    </tr>
    @endif
    </tbody>
    </table>
  </div>
  </div>
@endsection
