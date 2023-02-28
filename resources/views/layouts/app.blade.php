<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/alsoltan project/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="/alsoltan project/bootstrap/js/bootstrap.bundle.js"></script>
  <link href="/alsoltan project/mainCSS/mainpage-desktop.css" rel="stylesheet" />
  <link href="/alsoltan project/mainCSS/navBarStyle.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen and (max-device-width: 991.5px)"
    href="alsoltan project/mainCSS/mainpage-mobile.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');
  </style>
  <script src="alsoltan project/JS/button-toggler.js"></script>
  <title>السلطان للحولات الاموال</title>
</head>

<body>
  <div class="container">
    <div>
      <nav class="navbar navbar-expand-lg sticky-top mb-5">
          <div class="container">
              <a class="navbar-brand" href="#"><img src="/alsoltan project/img/logo.png" alt="logo"></a>
              <button class="navbartoggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="Toggle navigation">
                  <img src="alsoltan project/img/gie5B478T.png" alt="burger menu" class="navbar-toggler-button">
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mt-3">
                      <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="/transfer">الصفحة الرئيسية</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="/transfers/pending/outgoing">الحوالات الصادرة</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="/transfers/pending/incoming">الحوالات الواردة</a>
                          @if (count(request()->user()->transactions->where('status', 'Pending')->where('type', 'Deposit')) > 0)
                          <span
                            class="badge bg-success rounded-pill align-top">{{ count(request()->user()->transactions->where('status', 'Pending')->where('type', 'Deposit')) }}</span>
                        @endif
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link " href="accounting" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              المحاسبة
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/transfers/pending/accounting">الأرصدة والحسابات</a></li>
                              <li>
                                  <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/accounting2">عدد الحركات</a></li>
                              <li>
                                  <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/accounting3">سحب أجور التسليم</a></li>

                          </ul>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/transfers/pending/abouts">المعلومات</a>
                      </li>
                      <li><a class="dropdown-item" href="{{ route('signout') }}">تسجيل خروج</a></li>
                  </ul>
                  <div class="user row ms-lg-2">
                      <div class="col-6 user-pic mt-3 p-0"><img src="/alsoltan project/img/User.png"></div>
                      <div class="col-6 user-info">
                          <h6 class="mt-4">{{ Auth::user()->email }}</h6>
                          <h5>{{ Auth::user()->boxnumber }}</h5>
                      </div>
                  </div>
              </div>
          </div>
      </nav>
  </div>

    <!-- news bar -->

    <div class="news-bar ms-lg-0 me-lg-0">
      <div class="title">أخر اخبار الشركة</div>
      <span class="news">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
        العربى، حيث ي</span>
    </div>
    @if (auth()->check() && !Request::is('home'))
      <div class="container py-5">
        <p style="class: pb-2">
          @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-transition.duration.750ms x-show="show"
              class="justify-content-center row">
              <p class="overlay bg-success col-3 rounded-pill px-4 py-2 text-center text-white">{{ session('success') }}
              </p>
        </p>
      </div>
    @endif
    @if (session()->has('fail'))
      <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-transition.duration.750ms x-show="show"
        class="justify-content-center row">
        <p class="overlay bg-warning col-3 rounded-pill px-4 py-2 text-center text-white">{{ session('fail') }}</p>
      </div>
    @endif
  </div>
  @endif

  <main class="py-4">
    @yield('content')
  </main>

  </div>
</body>

</html>
