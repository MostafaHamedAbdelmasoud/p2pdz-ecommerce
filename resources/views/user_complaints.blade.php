@extends('layouts.app-pages')



@section('header')
@parent

<title>إضافة خدمة جديدة</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/add_service.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />



<style>
  #orders-wrapper {
    display: flex;
  }

  #filters {
    width: 200px;
    text-align: justify;
    padding: 0 10px;
    border-right: 1px solid #DDD;
  }

  [dir='rtl'] #filters {
    border-right: none;
    border-left: 1px solid #DDD;
  }

  #filters h4 {
    display: flex;
    align-items: center;
    font-size: 20px;
    padding: 10px 0;
    color: rgb(129, 184, 80);
    font-weight: 600;
  }

  #filters>div {
    border-top: 1px dashed #DDD;
    padding: 10px;
    font-size: 16px;
  }

  #orders-container {
    width: calc(100% - 200px);
    padding: 10px;
  }

  .order-row a {
    text-align: justify;
    padding: 20px 10px;
    border-bottom: 1px solid #DDD;
    display: flex;
    width: 100%;
  }

  .service-user {
    width: 60px;
  }

  .service-user img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
  }

  .service-info {
    width: calc(100% - 60px);
    padding: 0 10px;
  }

  .service-label {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 100%;
    border-bottom: 1px solid #DDD;
    font-size: 18px;
    padding: 5px 0;
  }

  .order-details {
    display: flex;
    color: dimgrey;
    font-size: 16px;
  }

  .order-details>div {
    margin: 0 10px;
    display: flex;
    align-items: center;
    padding-top: 5px;
  }

  .order-details>div>span {
    font-size: 15px;
    margin: 0 5px;
  }

  #no-records {
    text-align: center;
    font-size: 22px;
    color: salmon;
    padding: 50px 0;
  }

  #filters i {
    width: 25px;
    text-align: center
  }







  #mini-filter {
    display: flex;
    text-align: justify;
    align-items: center;
    border-bottom: 1px dashed #DDD;
    font-size: 18px;
    color: #97C371;
    padding-bottom: 15px;
    margin-bottom: 15px;
  }

  #mini-filter>div {
    background-color: green;
    color: #FFF;
    padding: 3px 10px;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 1px 1px 3px grey;
    display: inline-flex;
    align-items: center;
  }



  #mini-filter-close {
    display: flex;
    align-items: center;
    border-bottom: 1px solid green;
    margin-bottom: 15px;
    cursor: pointer;
    border-top: none !important
  }

  #mini-filter-close>div {
    display: flex;
    align-items: center;
  }

  #mini-filter-close div:last-of-type {
    padding: 0 10px;
    font-size: 18px;
    color: green;
    font-weight: 600;
  }

  #mini-filter-close:hover {
    color: red;
  }

  /* responsive */
  @media screen and (max-width: 900px) {

    #page-content .y-col {
      width: calc(100% - 40px);
    }

  }

  /* /media 900px */


  #mini-filter,
  #mini-filter-close {
    display: none;
  }

  @media screen and (max-width: 800px) {

    #filters {
      display: none;
      position: fixed;
      width: 100%;
      height: 100vh;
      left: 0;
      top: 0;
      z-index: 30;
      border-radius: 0;
      background-color: #fff;
    }

    #mini-filter,
    #mini-filter-close {
      display: flex;
    }

    #orders-container {
      width: 100%;
    }

    .order-row a {
      padding: 20px 0;
    }

    .order-details {
      flex-wrap: wrap;
    }

    .order-details>div:last-of-type {
      width: 100%;
    }

  }

  /* /media 800px */


  @media screen and (max-width: 600px) {

    .order-details>div {
      font-size: 14px
    }

    #page-title,
    #mini-filter {
      text-align: center;
      justify-content: center;
    }

  }

  /* /media 600px */
</style>




@endsection





@section('content')
@parent





@section('page-content')



<div class="y-col">



  <h3 id="page-title">
    <img src="https://img.icons8.com/dotty/80/000000/customer-insight.png" /> &nbsp; الشكاوى
  </h3>



  @if( auth()->check() )

  <div id="orders-wrapper">


    <div id="filters">

      <div id="mini-filter-close">
        <div><span class="material-icons">highlight_off</span></div>
        <div>إغلاق</div>
      </div>

      <h4><span class="material-icons">sort</span> &nbsp;فلتر</h4>

      <div>
        <a href="?state=1"><i class="fas fa-lock-open"></i>&nbsp; شكاوى مفتوحة</a>
      </div>

      <div>
        <a href="?state=2"><i class="fas fa-lock"></i>&nbsp; شكاوى مغلقة</a>
      </div>

      <div>
        <a href="?state=2"><i class="fas fa-user-plus"></i>&nbsp; شكاوى مقدمة</a>
      </div>

      <div>
        <a href="?state=2"><i class="fas fa-user-minus"></i>&nbsp; شكاوى مستقبلة</a>
      </div>

      <div>
        <a href="/my_orders"><i class="fas fa-redo-alt"></i>&nbsp; جميع الشكاوى</a>
      </div>

    </div>
    <!-- /#filters -->



    @if( $myComplaints->count() > 0 )





    <div id="orders-container">

      <div id="mini-filter">
        <div><span class="material-icons">sort</span> &nbsp; فلترة النتائج</div>
      </div>

      @foreach( $myComplaints as $complaints )



      @php($order = \App\Order::find($complaints->order_id))
      @php($service = \App\Service::find($order->service_id))

      <div class="order-row">
        <a href="/complaints/{{$complaints->id}}">

          <div class="service-user">
            <img
              src="{{ ($service->user->getMedia('avatar')->first()) ? $service->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
              alt="">
          </div>
          <!-- /.service-user -->
          <div class="service-info">

            <div class="service-label">
              <p>{{ $service->label }}</p>
              <p style="color:red;">{{ $complaints->issue }}</p>
            </div>

            <div class="order-details">
              <div><span class="material-icons">account_circle</span> {{$service->user->name}}</div>
              <div>
                <span class="material-icons">show_chart</span>
                @if( $complaints->state == 0)
                : مفتوحة
                @elseif( $complaints->state == 1)
                : مغلقة
                @else
                : غير معلوم
                @endif
              </div>
              <div><span class="material-icons">event</span> {{$complaints->created_at->calendar()}}</div>
            </div>
          </div>
        </a>
      </div>
      <!-- /.order-row -->


      @endforeach


    </div>
    <!-- /#orders-container -->






    @else
    <div id="orders-container">

      <div id="mini-filter">
        <div><span class="material-icons">sort</span> &nbsp; فلترة النتائج</div>
      </div>

      <div id="no-records">
        لا تملك أى شكاوى حاليا
      </div>
      <!-- /#no-records -->
    </div>
    <!-- /#orders-container -->
    @endif

  </div>
  <!-- /#orders-wrapper -->

  @else

  <div id="login-register">
    قم <a href="/users/login?url={{ $_SERVER['REQUEST_URI'] }}">بتسجيل الدخول</a>
    لتتصفح الشكاوى
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


    $('#mini-filter').on('click', function(){
      $('#filters').css({
        display: 'block',
      });
    });
    
    $('#mini-filter-close').on('click', function(){
      $('#filters').css({
        display: 'none',
      });
    });

    
  });
</script>

<script src="{{ asset($asset_path.'/js/pages/add_service.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>


@endsection