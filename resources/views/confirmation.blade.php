<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/invo/styles.css" />
  <title>فاتورة</title>
</head>

<body>
  <div class="container">
    <header>
      <img src="/invo/logo.png" alt="logo" />

      <div class="header-content">
        <p class="notice-number">{{ $transaction->transaction_no }}</p>
        <p class="Receipt-code">{{ $transaction->id }}</p>
      </div>
    </header>
    <main>
      <section class="transfer-content">
        <table>
          <tr>
            <th>من مكتب:</th>
            <td>{{ Auth::user()->email }} - {{ Auth::user()->contry }} - {{ Auth::user()->city }}</td>
          </tr>
          <tr>
            <th>الي مكتب:</th>
            <td>{{ $transaction->contact_email }}</td>
          </tr>
        </table>
        <table>
          <tr>
            <th>وقت الارسال:</th>
            <td>{{ $transaction->updated_at }}</td>
          </tr>
          <tr>
            <th>تاريخ الارسال:</th>
            <td>{{ $transaction->updated_at }}</td>
          </tr>
        </table>
      </section>
      <section class="transfer-info">
        <table>
          <tr>
            <th>اسم المستلم:</th>
            <td>{{ $transaction->nametransfer }}</td>
          </tr>
          <tr>
            <th>رقم الهوية:</th>
            <td>{{ $transaction->idtransfer }}</td>
          </tr>
          <tr>
            <th> رقم هاتف المستلم:</th>
            <td>{{ $transaction->phonetransfer }}</td>
          </tr>
        </table>
        <table class="amount">
          <tr>
            <th>المبلغ</th>
          </tr>
          <tr>
            <td>{{ $transaction->amount }}$</td>
          </tr>
        </table>
      </section>
      <div class="btn-print">
        <button>طباعة</button>
        
        <a href="/transfer">ارسال مبلغ اخر</a>
        
        <a href="/transfers/pending/outgoing">العمليات المرسلة</a>
      </div>
    </main>
  </div>
</body>

</html>
