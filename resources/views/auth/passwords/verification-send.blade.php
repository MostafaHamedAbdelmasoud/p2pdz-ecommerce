@extends('layouts.app-pages')


@section('header')
@parent



<title>إستعادة الحساب</title>

<style>
  .form-container {
    direction: rtl;
    text-align: right;
    width: calc(100% - 20px);
    margin: 100px auto;
    max-width: 400px;
    box-shadow: 0 0 4px grey;
    padding: 15px;
    border-radius: 5px;
    background-color: #fff;
  }

  small {
    font-size: 14px;
    padding-bottom: 10px;
    font-weight: 600;
  }

  #check_email_container {
    border-bottom: 1px solid #DDD;
    margin-bottom: 15px;
  }

  #check_email_container>div {
    margin-bottom: 5px;
  }

  .form-label{
    padding: 10px 0 15px;
    border-bottom: 1px solid #DDD;
    margin-bottom: 15px;
    color: #3F51B5;
    font-size: 25px;
  }

</style>

@endsection




@section('content')
@parent



@section('page-content')


<div class="form-container">

  @if (\Session::has('error'))
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! \Session::get('error') !!}
  </div>

  @endif

  <div class="form-label">إستعادة الحساب</div>

  <form action="/users/login/forget-password/verify" method="POST">

    @csrf

    <div class="form-group">
      <input type="email" name="email" class="form-control text-center" placeholder="البريد الإلكترونى">
      @error('email')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>


    <button type="submit" class="btn btn-primary">إرسال كود التحقق</button>

  </form>

</div>

@endsection


@endsection



@section('footer')
@parent
<script type="text/javascript">
  function remove() {
  
    document.getElementById('check_email').innerHTML = 'برجاء الإنتظار ...';
  
  }
  
</script>
@endsection