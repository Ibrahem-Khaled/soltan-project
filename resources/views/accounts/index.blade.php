@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row justify-content-center">
      <div class="col-10">
          <h1 class="display-5">تفاصيل الحساب والحولات</h1>
          <p class="lead">يمكنك مراجعة حميع الحولات.</p>
          <table class="table table-hover mt-3 text-center">
              <thead>
                  <tr>
                      <th scope="col">المكتب</th>
                      <th scope="col">نوع العملة</th>
                      <th scope="col">المبلغ</th>
                      <th scope="col">تفاصيل</th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($user->accounts as $key => $value)
                  <tr>
                      <td class="align-middle">{{ Auth::user()->email }}</td>
                      <td class="align-middle">{{ $value->type . ' account ' }}</td>
                      <td class="align-middle">{{ '$'.number_format($value->balance, 2, '.', ',') }}</td>
                      <td class="align-middle"><a href="/accounts/{{ $value->account_no }}" class="btn btn-info btn-sm">عرض الحساب</a>
                      <td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
  </div>
@endsection
