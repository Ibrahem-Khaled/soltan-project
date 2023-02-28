@extends('layouts.app')

@section('content')
  <div class="container">

      <div class="row justify-content-center">
          <div class="col-10">
              <h1 class="display-5">تفاصيل الحساب</h1>
              <p class="lead"></p>
              @if ($account != null)
              <table class="table table-borderless mt-3 text-center">
                  <thead>
                      <tr>
                          <th class="h4">المكتب</th>
                          <th class="h4"> نوع العملة</th>
                          <th class="h4">المبلغ</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>{{ Auth::user()->email }}</td>
                          <td>{{ $account->type . ' account ' }}</td>
                          <td>{{ '$'.number_format($account->balance, 2, '.', ',') }}</td>
                      </tr>
                  </tbody>
              </table>
              @endif
              <div class="row mt-4 display-7">
                  <div class="col">
              <h2 >سجل المعاملات</h2>
                  </div>
                  <div class="col text-end">
              <form action="/accounts/{{$account->account_no}}" method="get">
{{--                <input type="text" name="query_email" placeholder="Search by Email"/>--}}
                  <input list="emails" name="query_email" id="query_email" placeholder="Search by اسم المكتب">

                  <datalist id="emails">
                      @foreach( $account->transactions->unique('contact_email') as $transaction)
                        <option value="{{$transaction->contact_email}}">
                      @endforeach
                  </datalist>
                <input type="submit" value="Search">
              </form>
                  </div>
              </div>
              <table class="table-hover table table-sm text-center mt-3">
                  <thead>
                      <tr class="table-secondary">
                          <th> رقم الاشعار</th>
                          <th> رقم الصندوق</th>
                          <th>نوع العملية</th>
                          <th>المكتب</th>
                          <th>المبلغ</th>
                          {{-- <th>New Balance</th> --}}
                          <th>الحالة</th>
                          <th>تاريخ والوقت</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if (!is_null($account->transactions))
                          @if (!empty(request()->query_email))
                              @foreach ($account->transactions->where('contact_email','like', request()->query_email)->sortByDESC('updated_at') as $transaction)
                                  <tr>
                                      <td>{{ $transaction->id}}</td>
                                      <td>{{ $transaction->account_no }}</td>
                                      <td>{{ $transaction->type}}</td>
                                      <td>{{ $transaction->contact_email }}</td>
                                      <td>${{ $transaction->amount }}</td>
                                      {{-- <td>${{ $account->new_balance }}</td> --}}
                                      <td>{{ $transaction->status }}</td>
                                      <td>{{ $transaction->updated_at }}</td>
                                  </tr>
{{--                                  @endif--}}
                              @endforeach
                          @else
                              @foreach ($account->transactions as $transaction)
                                  <tr>
                                      <td>{{ $transaction->transaction_no}}</td>
                                      <td>{{ $transaction->account_no }}</td>
                                      <td>{{ $transaction->type}}</td>
                                      <td>{{ $transaction->contact_email }}</td>
                                      <td>${{ $transaction->amount }}</td>
{{--                                       <td>${{ $account->new_balance }}</td>--}}
                                      <td>{{ $transaction->status }}</td>
                                      <td>{{ $transaction->updated_at }}</td>
                                  </tr>
                              @endforeach
                          @endif
                      @else
                          <tr>
                              <td colspan="8"><i>No transactions to display.</i></td>
                          </tr>
                      @endif
                  </tbody>
              </table>
              <div class="row justify-content-center mt-5">
                  @if (request()->query_email)
                      <a href="/accounts/{{ Request::segment(2) }}" class="btn btn-secondary col-2 me-2">الرجوع</a>
                  @else
                      <a href="/accounts" class="btn btn-secondary col-2 me-2">الرجوع للحساب</a>
                  @endif
              </div>
          </div>
      </div>
</div>
@endsection
