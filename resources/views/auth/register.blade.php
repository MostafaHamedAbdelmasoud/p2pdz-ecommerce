@extends('layouts.app-pages')



@section('header')
@parent

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css" />

<title>Register</title>

<style>
  .form-container {
    max-width: 400px;
    width: calc(100% - 20px);
    margin: 100px auto;
  }


  .card-footer-item {
    align-items: center;
    display: flex;
    flex-basis: auto !important;
    flex-grow: 0;
    flex-shrink: 0;
    justify-content: center;
    padding: 0px 10px;
    margin-right: 3px;
    border: none !important;
  }

  .card-footer-item:first-of-type {
    text-decoration: none;
    padding-left: 0 !important;
    margin-right: auto;
  }

  [dir="rtl"] .card-footer-item:first-of-type {
    margin-right: 0;
    margin-left: auto
  }

  .card-header-title {
    font-size: 24px;
    font-weight: 400 !important;
    text-shadow: 0 0 2px grey;
    margin: 0;

  }


  .form-group:last-of-type {
    margin-bottom: 0 !important;
  }


  .card-header-icon {
    font-weight: 600;

  }



  ::-webkit-input-placeholder {
    text-align: center;
  }

  :-moz-placeholder {
    /* Firefox 18- */
    text-align: center;
  }

  ::-moz-placeholder {
    /* Firefox 19+ */
    text-align: center;
  }

  :-ms-input-placeholder {
    text-align: center;
  }

  input {
    direction: ltr;
  }

  .card-content small {
    font-size: 14px;
    padding-bottom: 10px;
    font-weight: 600;
  }

  [dir='rtl'] .card-content {
    text-align: right
  }


  @media screen and (max-width: 380px) {
    .card-header {
      padding-bottom: 0;
    }

    .card-header,
    .card-footer {
      display: flex;
      flex-wrap: wrap;
      justify-content: center
    }

    .card-header-title {
      justify-content: center;
      padding: 0 20px 10px 20px;
      border-bottom: 1px dashed #DDD;
    }

    .card-footer-item:nth-of-type(1) {
      border-top: none;
      margin: 10px auto 20px;
      width: 100%;
    }

    .card-footer-item:nth-of-type(2),
    .card-footer-item:nth-of-type(3) {
      border-top: 1px solid #DDD !important;
      padding-top: 10px;
    }
  }



  #page-content {
    margin: 200px auto 150px;
  }

  #wide-nav-logo img {
    height: 150px;
    margin-top: 50px;
  }

  #dark-logo {
    display: block;
  }

  #light-logo {
    display: none;
  }

  #wide-nav-packs {
    display: none !important;
  }

  #side-nav-container {
    display: none;
  }

  #wide-nav-user .active-wide-nav-tab {
    width: 100%;
  }
</style>

@endsection


@section('content')
@parent


@section('page-content')
<div class="form-container">




  <div class="card">

    <header class="card-header">

      <p class="card-header-title">
        {{ trans('auth.register.label') }}
      </p>

      <a href="/" class="card-header-icon" aria-label="more options" data-toggle="tooltip" data-placement="top"
        title="Go Home!">
        <i class="material-icons">home</i>
      </a>
    </header>






    <form action="/users/register" method="POST">
      @csrf




      <div class="card-content">


        @if (\Session::has('error'))
        <small class="text-danger" style="margin-bottom:10px;display:block;">{!! \Session::get('error') !!}</small>
        @endif




        <div class="form-group">

          @error('email')
          <small class="text-danger">{{ $message }}</small>
          @enderror

          <input type="email" name="email" id="email" class="form-control"
            placeholder="{{ trans('auth.email_address') }}" value="{{ old('email') }}" required
            oninvalid="this.setCustomValidity('{{ trans('auth.email_required') }}')" oninput="setCustomValidity('')">


        </div>





        <div class="form-group">
          @error('password')
          <small class="text-danger">{{ $message }}</small>
          @enderror

          <input type="password" name="password" id="password" class="form-control"
            placeholder="{{ trans('auth.password') }}" required
            oninvalid="this.setCustomValidity('{{ trans('auth.password_required') }}')" oninput="setCustomValidity('')">




        </div>




        <div class="form-group">

          @error('password_confirmation')
          <small class="text-danger">{{ $message }}</small>
          @enderror


          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
            placeholder="{{ trans('auth.register.password_confirmation') }}" required
            oninvalid="this.setCustomValidity('{{ trans('auth.register.confirmation_password_required') }}')"
            oninput="setCustomValidity('')">




        </div>


      </div>




      <footer class="card-footer">

        <a href="#" class="card-footer-item">
          <button class="button is-info is-rounded is-focused"
            type="submit">{{ trans('auth.register.create') }}</button>
        </a>

        <a href="/users/login" class="card-footer-item">
          {{ trans('auth.register.login') }} &nbsp; <i class="material-icons">
            supervised_user_circle
          </i>
        </a>

      </footer>

    </form>






  </div>

</div>
<!-- /.form-container -->
@endsection





@endsection


@section('footer')
@parent
@endsection