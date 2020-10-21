@extends('layouts.app-pages')



@section('header')
@parent

<title>تعديل بيانات خدمة</title>

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
    <i class="fas fa-edit"></i> &nbsp; تعديل بيانات خدمة
  </h3>



  @if( auth()->check() )


  @if($service && $service->count() > 0)

  @if(auth()->user()->id == $service->user_id)








  <div class="service_box">




    <div class="form-group">
      <label>عنوان الخدمة :</label>
      <input type="text" class="form-control" id="service_label" value="{{$service->label}}">
      <small class="form-text text-muted">أدخل عنواناً واضحاً يصف الخدمة التي تريد أن تقدمها</small>
    </div>



    <div class="form-group">

      <label>التصنيف :</label>

      <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 com-xs-6">
          <select name="service_main_cat" id="service_main_cat" class="form-control" style="font-family: 'Tajawal'">
            <option disabled>إختر التصنيف الأساسى</option>
            <option value="money" <?php if($service->main_category == 'money') {  echo 'selected'; } else {  echo ''; } ?> >أموال</option>
            <option value="credit" <?php if($service->main_category == 'credit') {  echo 'selected'; } else {  echo ''; } ?>>رصيد موبايل</option>
          </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 com-xs-6">

          <select name="service_sub_cat" id="service_sub_cat" class="form-control" style="font-family: 'Tajawal'">
            <option selected disabled>إختر التصنيف الفرعى</option>

            @if( count($currencies) > 0)
            @foreach( $currencies as $currency )
            @if( $currency->title == $service->sub_category )
            <option selected class="service_sub_cat_opt sub_cat_opt_money" value="{{ $currency->title }}">{{ $currency->title }}
            </option>
            @else
            <option class="service_sub_cat_opt sub_cat_opt_money" value="{{ $currency->title }}">{{ $currency->title }}
            </option>
            @endif
            
            @endforeach
            @else
            <option disabled>لا يوجد تصنيفات فرعية فى هذا القسم حاليا</option>
            @endif



            @if( count($credits) > 0)
            @foreach( $credits as $credit )
            @if( $credit->title == $service->sub_category )
            <option selected class="service_sub_cat_opt sub_cat_opt_credit" value="{{ $credit->title }}">{{ $credit->title }}
            </option>
            @else
            <option class="service_sub_cat_opt sub_cat_opt_credit" value="{{ $credit->title }}">{{ $credit->title }}
            </option>
            @endif
            
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
      <input type="number" class="form-control" id="service_quantity" value="{{$service->quantity}}">
      <small class="form-text text-muted">الكمية المتاحة - مثال : 100 دولار أو 50 دينار .. إلخ - إكتب الرقم فقط</small>
    </div>




    <div class="form-group">
      <label>سعر الخدمة :</label>
      <input type="number" class="form-control" id="service_price" value="{{$service->price}}">
      <small class="form-text text-muted">سعر الخدمة التى تقدمها</small>
    </div>

    <div class="form-group">
      <label>تفاصيل سعر الخدمة :</label>
      <input type="text" class="form-control" id="service_price_desc" value="{{$service->price_desc}}">
      <small class="form-text text-muted">مثال: 5 دولار مقابل تحويل 100 دولار</small>
    </div>






    <div class="form-group">
      <label>وصف الخدمة :</label>
    <textarea class="form-control" id="add_service_desc" rows="3" placeholder="وصف الخدمة">{{$service->description}}</textarea>
      <small class="form-text text-muted">أدخل وصف الخدمة بدقة يتضمن جميع المعلومات والشروط . يمنع وضع البريد
        الالكتروني،
        رقم الهاتف أو أي معلومات اتصال أخرى.</small>
    </div>




    <div class="form-group">
      <label>صورة الخدمة :</label>
      <input type="file" class="form-control-file" id="service_image">
      <small class="form-text text-muted">قم بإختيار صورة فى حالة أردت تغييرها فقط</small>
    </div>






    <div class="form-group">
      <label>الكلمات المفتاحية :</label>
      <input type="text" class="form-control" id="service_tags" value="{{$service->tags}}">
      <small class="form-text text-muted">ضع فصلة بين الكلمات المفتاحية</small>
    </div>





    <div class="form-group">
      <label>المدة المتوقعه للتسليم :</label>
      <select id="service_time" class="form-control" style="font-family: 'Tajawal'">
        <option selected disabled>إختر مدة التسليم</option>




        <option value="1" <?php echo ($service->duration == 1 ?  ' selected ' :  '') ?> >أقل من ساعة </option>
        <option value="2" <?php echo ($service->duration == 2 ? ' selected ' :  '') ?>>ساعة وأكثر</option>
        <option value="3" <?php echo ($service->duration == 3 ? ' selected ' :  '') ?>>ساعتين وأكثر</option>
        <option value="5" <?php echo ($service->duration == 5 ? ' selected ' :  '') ?>>أقل من 5 ساعات</option>
        <option value="24" <?php echo ($service->duration == 24 ? ' selected ' :  '') ?>>أقل من 24 ساعة </option>
        <option value="48" <?php echo ($service->duration == 48 ? ' selected ' :  '') ?>>أقل من يومين</option>


      </select>
      {{-- <small class="form-text text-muted"> يستطيع المشتري إلغاء الخدمة مباشرة في حال التأخر بتسليم الخدمة في الموعد
        المحدد</small> --}}
    </div>






    <div class="form-group">
      <label>تعليمات للمشترى :</label>
      <textarea class="form-control" id="service_requirments" rows="3">{{$service->requirements}}</textarea>
      <small class="form-text text-muted">المعلومات التي تحتاجها من المشتري لتنفيذ الخدمة.</small>
    </div>


    <div id="addNewNotificationBtnContainer" style="text-align:left;margin:10px 0;padding:10px 0;">
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent dash-btn"
        style="border-radius: 25px;background-color: #38c172">
        حفظ التعديلات &nbsp;<i class="far fa-save"></i>
      </button>
    </div>







  </div>






  @else
  <div id="login-register" style="font-size: 20px;">
    هذه الصفحة غير موجودة &nbsp;&nbsp;&nbsp;<img style="width: 100px;"
      src="{{ asset($asset_path.'/images/not-found.svg')}}" alt="">
  </div>

  <div id="go-home-wrapper">
    <a href="/">العودة إلى الصفحة الرئيسية <span class="material-icons">home</span></a>
  </div>
  @endif


  @else
  <div id="login-register" style="font-size: 20px;">
    هذه الصفحة غير موجودة &nbsp;&nbsp;&nbsp;<img style="width: 100px;"
      src="{{ asset($asset_path.'/images/not-found.svg')}}" alt="">
  </div>

  <div id="go-home-wrapper">
    <a href="/">العودة إلى الصفحة الرئيسية <span class="material-icons">home</span></a>
  </div>
  @endif












  @else

  <div id="login-register">
    قم <a href="/users/login?url={{ $_SERVER['REQUEST_URI'] }}">بتسجيل الدخول</a> / <a href="/users/register">إنشاء
      حساب</a>
    لتستطيع تصفح الصفحة
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


    window.serviceID = '{!! $service->id !!}';
    window.serviceLabel = '{!! $service->label !!}';

    
  });
</script>

<script src="{{ asset($asset_path.'/js/pages/edit_service.js?ver='.$version) }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>





@endsection