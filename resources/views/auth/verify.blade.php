@extends('layouts.app-pages')

@section('header')
@parent


<title>تفعيل الحساب</title>

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
    #check_email_container{
        border-bottom: 1px solid #DDD;
        margin-bottom: 15px;
    }
    #check_email_container > div{
        margin-bottom: 5px;
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
   
    <div id="check_email_container">
    <div class="alert alert-success" style="text-align:justify;" id="check_email">
          قم بمراجعة بريدك الإلكترونى للحصول على كود التفعيل
          <p style="margin:5px auto 0;"><a href="/users/register/email/verification/{{$email}}/resend" onclick="remove()">إضغط هنا لإعادة إرسال الكود ؟</a></p>
    </div>
    </div>
    


    <form action="/users/register/email/verification" method="POST">

        @csrf

        <div class="form-group">

            <label for="">البريد الإلكترونى</label>
            <input type="email" name="email" value="{{ $email }}" class="form-control text-left">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        <div class="form-group">

            <label for="">كود التفعيل</label>

            <input 
            type="text" 
            name="verification_key" 
            class="form-control text-center" 
            placeholder="Verification Key"
            >

            @error('verification_key')
            <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">تفعيل الحساب</button>

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