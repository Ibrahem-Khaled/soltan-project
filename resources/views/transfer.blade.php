<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="{{ asset('js/drobdownjs.js') }}"></script>


  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
  
  







</head>

<body>
  @extends('layouts.app')
  @section('content')
    <div class="container">
    </div>
    <div class="exchange-prices row ms-lg-0 me-lg-0">
      <div class="col-lg-4">
        <div class="row currency bordered">
          <div class="col-lg-12 title">دولار</div>
          <div class="col-lg-12 balance">
            @foreach ($user->accounts as $account)
              <h5 data-balance="{{ $account->balance }}" value="{{ $account->account_no }}">
                {{ "$$account->balance " }}</h5>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row currency bordered">
          <div class="col-lg-12 title">ليرة تركية</div>
          <div class="col-lg-12 me-4 balance">0</div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row currency">
          <div class="col-lg-12 title">يورو</div>
          <div class="col-lg-12 balance">0</div>
        </div>
      </div>
    </div>

    <!-- buttons -->

    <div class="buttons">
      <div class="button">
        <button data-page="New-transfer">حوالة جديدة</button>
      </div>
      <div class="button">
        <button data-page="Exchange-voucher">سند صرف</button>
      </div>
      <div class="button">
        <button data-page="New-transfer-syria" disabled>حوالة جديدة (سوريا)</button>
      </div>
    </div>

    <!-- pages -->

    <div class="pages">

      <!-- page 1 -->

      <div class="page" id="New-transfer">
        <form action="/transfer/confirmation" method="post">
          @csrf
          <div>
            <label for="name1">اسم المستفيد</label>
            <input type="text" name="nametransfer" id="" placeholder="اسم المستفيد">
          </div>
          <div>
            <label for="phone1">رقم الجوال</label>
            <input type="number" name="phonetransfer" id="phone1" placeholder="رقم الجوال">
          </div>
          <div>
            <label for="phone1">رقم الهوية</label>
            <input type="number" name="idtransfer" id="phone1" placeholder="رقم الهوية">
          </div>
          <div>
            <label for="recived-currency1">العملة المرسلة</label>
            <select id="account_nos" class="form-select" name="account_no">
              @foreach ($user->accounts as $account)
                <option data-balance="{{ $account->balance }}" value="{{ $account->account_no }}">
                  {{ " ($account->type) | $$account->balance " }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label for="sent-amount1">المبلغ</label>
            <input type="number" name="amount" id="sent-amount1" placeholder="المبلغ">
          </div>
          <div>
            <label for="recived-currency1">العملة المسلمة</label>
            <select id="recived-currency1" disabled>
              <option class="placeholder" value="" disabled selected hidden>العملة المستلمة
              </option>
              <option value="دولار">دولار</option>
              <option value="ليرة تركية">ليرة تركية</option>
              <option value="يورو">يورو</option>
            </select>
          </div>
          <div>
            <label for="recived-amount1">المبلغ الاجمالي</label>
            <h5>0</h5>
          </div>
          <div class="select">
            <label for="office1">الوجهة</label>
            <select class="form-control selectpicker" data-live-search="true" name="contact_email">
              @foreach ($userse as $user)
                <option value="{{ $user->email }}">{{ $user->email }}
                  - {{ $user->contry }}
                  - {{ $user->city }} -
                  {{ $user->information }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label for="note">ملاحظة</label>
            <textarea type="text" name="info" id="note" style="height: 48px;" placeholder="ملاحظة"></textarea>
          </div>
          <div class="submit d-flex justify-content-between">

            <input type="submit" value="ارسال الحوالة">
            <div class="d-flex">
              <h5>الاجور:</h5>
              <h5> $5</h5>
            </div>
          </div>
        </form>
      </div>

      <!-- page2 -->

      <div class="page" id="Exchange-voucher">
        <form class="page2">
          <div>
            <label for="from-currency2">من عملة</label>
            <select id="from-currency2">
              <option class="placeholder" value="" disabled selected hidden>تحديد العملة</option>
              <option value="دولار">دولار</option>
              <option value="ليرة تركية">ليرة تركية</option>
              <option value="يورو">يورو</option>
            </select>
          </div>
          <div>
            <label for="sent-amount2">المبلغ</label>
            <input type="number" name="" id="sent-amount2" placeholder="المبلغ">
          </div>
          <div>
            <label for="to-currency2">الي عملة</label>
            <select id="to-currency2">
              <option class="placeholder" value="" disabled selected hidden>تحديد العملة</option>
              <option value="دولار">دولار</option>
              <option value="ليرة تركية">ليرة تركية</option>
              <option value="يورو">يورو</option>
            </select>
          </div>
          <div>
            <label for="recived-amount2">المبلغ</label>
            <input type="number" name="" id="recived-amount2" placeholder="المبلغ">
          </div>
          <div>
            <label for="exchange-prices">أسعار الصرف</label>
            <div id="exchange-prices2">
              <div>
                <div class="row currency bordered">
                  <div class="title">دولار</div>
                  <div class="balance">0</div>
                </div>
              </div>
              <div>
                <div class="row currency">
                  <div class="title">ليرة تركية</div>
                  <div class="balance">0</div>
                </div>
              </div>
              <div>
                <div class="row currency bordered">
                  <div class="title">يورو</div>
                  <div class="balance">0</div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <h7>1 يورو يساوي</h7>
            <h7>1.00 دولار</h7>
          </div>
        </form>
      </div>

      <!-- page3 -->
    @endsection
</body>

</html>


<script>
  $(document).ready(function() {
    $('#example').hierarchySelect({
      hierarchy: false,
      width: 'auto'
    });
  });
</script>