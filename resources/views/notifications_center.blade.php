@extends('layouts.app-pages')



@section('header')
@parent

<title>الإشعارات</title>

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
    width: 100%;
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








  #notifications-container {
    max-width: 900px;
    margin: auto;
  }

  .one-notification-row {
    display: flex;
    border-bottom: 1px solid #DDD;
    padding: 20px;
    cursor: pointer;
  }

  .one-notification-row:hover {
    background-color: #fff;
  }

  .one-notification-row>div {
    display: flex;
    align-items: center;
  }

  .one-notification-row>div:nth-of-type(1) {
    font-size: 36px;
    width: 50px;
  }

  .one-notification-row>div:nth-of-type(2) {
    flex-wrap: wrap;
    width: calc(100% - 50px);
  }

  .one-notification-info p {
    width: 100%;
    text-align: justify;
    margin: 0;
    padding: 5px;
  }

  .one-notification-info p:nth-of-type(1) {
    font-size: 16px;
  }
</style>




@endsection





@section('content')
@parent





@section('page-content')



<div class="y-col">



  <h3 id="page-title">
    <img src="https://img.icons8.com/wired/80/000000/appointment-reminders.png" /> &nbsp; مركز الإشعارات
  </h3>



  @if( auth()->check() )

  <div id="orders-wrapper">

    @php( $notifications = \App\Notification::where('user_id', auth()->user()->id)->latest()->get() )

    @if( $notifications->count() > 0 )





    <div id="orders-container">
      <div id="notifications-container">



        @foreach( $notifications as $notification )
        <div class="one-notification-row notification-btn-view" data-notification-id="{{ $notification->id }}">

          <div class="row-notification-icon">
            @if($notification->seen == 0)
            <i class="fas fa-bell"></i>
            @else
            <i class="far fa-bell"></i>
            @endif
          </div>
          <!-- /.row-notification-icon -->

          <div class="one-notification-info">
            <p>{{$notification->content}}</p>
            <p>{{ $notification->created_at->calendar()}}</p>
          </div>
          <!-- /.one-notification-info -->

        </div>
        <!-- /.one-notification-row -->
        @endforeach




      </div>
      <!-- /#notifications-container -->

    </div>
    <!-- /#orders-container -->






    @else
    <div id="orders-container">

      <div id="no-records">
        لا تملك أى إشعارات حاليا
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
    لتتصفح الإشعارات
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

    $(".notification-btn-view").click(function(e){

      ToastLoading.fire({
        icon: 'info',
        html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
      });


      var notificationRow = $(this);

      e.stopPropagation();
      var notificationID = $(this).attr('data-notification-id');

      axios.get('/user/notifications/'+notificationID)
      .then(function (response) {

        $('.loading-notification').removeClass('loading-notification-active');
        if (response.data.error == 0) {

          notificationRow.find('.row-notification-icon').html('<i class="far fa-bell"></i>');

      

          Swal.fire({
            confirmButtonText: 'إغلاق',
            html: response.data.message.content ,
            customClass: {
              content: 'py-5',
              header: 'd-none',
              
            },
          })

        }
      });


      })

  });
</script>

<script src="{{ asset($asset_path.'/js/pages/add_service.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>




@endsection