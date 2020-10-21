@extends('layouts.app-pages')



@section('header')
@parent

<title>إضافة خدمة جديدة</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/add_service.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />




@endsection





@section('content')
@parent





@section('page-content')



<div class="y-col">



  <h3 id="page-title">
    <i class="fas fa-plus"></i> &nbsp; إضافة خدمة جديدة
  </h3>



  @if( auth()->check() )


  @if(auth()->user()->user_type == 1)








  <div class="service_box">




    <div class="form-group">
      <label>عنوان الخدمة :</label>
      <input type="text" class="form-control" id="service_label">
      <small class="form-text text-muted">أدخل عنواناً واضحاً يصف الخدمة التي تريد أن تقدمها</small>
    </div>



    <div class="form-group">

      <label>التصنيف :</label>

      <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 com-xs-6">
          <select name="service_main_cat" id="service_main_cat" class="form-control" style="font-family: 'Tajawal'">
            <option selected disabled>إختر التصنيف الأساسى</option>
            <option value="money">أموال</option>
            <option value="credit">رصيد موبايل</option>
          </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 com-xs-6">

          <select name="service_sub_cat" id="service_sub_cat" class="form-control" style="font-family: 'Tajawal'">
            <option selected disabled>إختر التصنيف الفرعى</option>

            @if( count($currencies) > 0)
            @foreach( $currencies as $currency )
            <option class="service_sub_cat_opt sub_cat_opt_money" value="{{ $currency->title }}">{{ $currency->title }}
            </option>
            @endforeach
            @else
            <option disabled>لا يوجد تصنيفات فرعية فى هذا القسم حاليا</option>
            @endif



            @if( count($credits) > 0)
            @foreach( $credits as $credit )
            <option class="service_sub_cat_opt sub_cat_opt_credit" value="{{ $credit->title }}">{{ $credit->title }}
            </option>
            @endforeach
            @else
            <option disabled>لا يوجد تصنيفات فرعية فى هذا القسم حاليا</option>
            @endif


          

          </select>

        </div>
      </div>




    </div>




    <div class="form-group">
      <label>الكمية المتاحة :</label>
      <input type="number" class="form-control" id="service_quantity">
      <small class="form-text text-muted">الكمية المتاحة - مثال : 100 دولار أو 50 دينار .. إلخ - إكتب الرقم فقط</small>
    </div>




    <div class="form-group">
      <label>سعر الخدمة :</label>
      <input type="number" class="form-control" id="service_price">
      <small class="form-text text-muted">سعر الخدمة التى تقدمها</small>
    </div>
    
    <div class="form-group">
      <label>تفاصيل سعر الخدمة :</label>
      <input type="text" class="form-control" id="service_price_desc">
      <small class="form-text text-muted">مثال: 5 دولار مقابل تحويل 100 دولار</small>
    </div>






    <div class="form-group">
      <label>وصف الخدمة :</label>
      <textarea class="form-control" id="add_service_desc" rows="3" placeholder="وصف الخدمة"></textarea>
      <small class="form-text text-muted">أدخل وصف الخدمة بدقة يتضمن جميع المعلومات والشروط . يمنع وضع البريد
        الالكتروني،
        رقم الهاتف أو أي معلومات اتصال أخرى.</small>
    </div>




    <div class="form-group">
      <label>صورة الخدمة :</label>
      <input type="file" class="form-control-file" id="service_image">
      <small class="form-text text-muted">اختيار صورة مصممة بشكل جيد ستظهر خدمتك بشكل احترافي وتزيد من مبيعاتك</small>
    </div>






    <div class="form-group">
      <label>الكلمات المفتاحية :</label>
      <input type="text" class="form-control" id="service_tags">
      <small class="form-text text-muted">ضع فصلة بين الكلمات المفتاحية</small>
    </div>





    <div class="form-group">
      <label>المدة المتوقعه للتسليم :</label>
      <select id="service_time" class="form-control" style="font-family: 'Tajawal'">
        <option selected disabled>إختر مدة التسليم</option>
    
        


        <option value="1">أقل من ساعة </option>
        <option value="2">ساعة وأكثر</option>
        <option value="3">ساعتين وأكثر</option>
        <option value="5">أقل من 5 ساعات</option>
        <option value="24">أقل من 24 ساعة </option>
        <option value="48">أقل من يومين</option>
      

      </select>
      {{-- <small class="form-text text-muted"> يستطيع المشتري إلغاء الخدمة مباشرة في حال التأخر بتسليم الخدمة في الموعد
        المحدد</small> --}}
    </div>






    <div class="form-group">
      <label>تعليمات للمشترى :</label>
      <textarea class="form-control" id="service_requirments" rows="3"></textarea>
      <small class="form-text text-muted">المعلومات التي تحتاجها من المشتري لتنفيذ الخدمة.</small>
    </div>


    <div id="addNewNotificationBtnContainer" style="text-align:left;margin:10px 0;padding:10px 0;">
      <button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent dash-btn" style="border-radius: 25px;background-color: #38c172">
        {{ trans('dashboard.add_service') }} &nbsp;<i class="material-icons">add</i>
      </button>
    </div>







  </div>















  @else
  <div id="request-seller">
    لا تملك صلاحية إضافة خدمات تواصل مع الإدارة لترقية حسابك
  </div>
  <!-- /#request-seller -->
  <div id="contact-admin" class="offer-user-chat" data-partner="1" data-partner-name="admin">
    إضغط هنا للتواصل مع الإدارة مباشرة <i class="fab fa-facebook-messenger"></i>
  </div>
  <!-- /#contact-admin -->
  @endif


  @else

  <div id="login-register">
    قم <a href="/users/login?url={{ $_SERVER['REQUEST_URI'] }}">بتسجيل الدخول</a> / <a href="/users/register">إنشاء
      حساب</a>
    لتستطيع إضافة خدمة
  </div>

  <div id="go-home-wrapper">
    <a href="/">العودة إلى الصفحة الرئيسية <span class="material-icons">home</span></a>
  </div>



  @endif



</div>

@endsection
@endsection





@section('footer')
@parent

<style>
  body.swal2-toast-shown .swal2-container.swal2-top-end,
  body.swal2-toast-shown .swal2-container.swal2-top-right {
    top: 0px !important;
  }

  .lds-ellipsis div {
    background: #97C371;
  }
</style>


<script>
  $(document).ready(function(){


    

    
  });
</script>

<script src="{{ asset($asset_path.'/js/pages/add_service.js?ver=2') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>





@endsection