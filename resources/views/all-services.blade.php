@extends('layouts.app-pages')



@section('header')
@parent

<title>جميع الخدمات</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-services.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


<style>
  * {
    padding: 0;
    margin: 0;
  }

  .ps__rail-x,
  .ps__rail-y {
    opacity: 0.6;
  }
</style>

@endsection





@section('content')
@parent





@section('page-content')




<div class="y-col y-col-w y-col-vh" id="sect-intro"
  style='background-image: url({{ asset($asset_path."images/homepage/sect-intro-bg.svg") }})'>

  <div class="y-col" id="sect-intro-content">


    <div class="sec-intro-side sec-intro-text-side">
      <div>

        <img src="{{ asset($asset_path.'/images/main-logo-light.svg') }}" alt="">
        <h1>مركز الخدمات </h1>
        <p>قسم خدمات البائعين</p>

      </div>
    </div>
    <!-- /.sec-intro-side -->

    <div class="sec-intro-side sec-intro-icon-side">
      <img style="width:80%;height:80%;" src="{{ asset($asset_path.'/images/services/services.svg') }}" alt="">
    </div>
    <!-- /.sec-intro-side -->

  </div>


</div>







<div id="services-wrapper" class="y-col">




  <div id="services">



    @if( $services->count() > 0 )

    <div id="mini-filter">
      <div><span class="material-icons">sort</span> &nbsp; فلترة النتائج</div>
    </div>

    <div class="offers-wrapper">
      @foreach( $services as $service )


      <div class="one-offer" data-aos="zoom-in" data-aos-once="true">


        <div class="offer-user">

          <div class="offer-user-image">
            <div class="user-image-circle">
              <img
                src="{{ ($service->user->getMedia('avatar')->first()) ? $service->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                alt="">
            </div>
            <!-- /.user-image-circle -->
            @if($service->user->verified==1)
            @php($verifiedClass=' verified')
            @else
            @php($verifiedClass='')
            @endif
            <div class="offer-user-verified {{$verifiedClass}}"><span class="material-icons">verified_user</span>
              &nbsp; {{-- Verified --}}
            </div>
          </div>



          <div class="offer-user-details">

            <div class="offer-user-info-chat">
              <div class="offer-user-information">
                <div class="service-rate">
                  
                  @for($i=1; $i <= 5; $i++)
                  
                  @if($service->rate >= $i)
                   @php($starClass = 'active-star')
                  @else
                   @php($starClass = '')
                  @endif


                  <i class="fas fa-star {{$starClass}}"></i>
                  @endfor
                  
                </div>
                <div>{{$service->user->name}}</div>
              </div>


              @if(auth()->check())

              @if(auth()->user()->id == $service->user_id)

              <div class="offer-user-chat-false">
                <i class="fab fa-facebook-messenger"></i>
                <div class="online-circle" data-online-state="{{ $service->user_id }}"></div>
              </div>
              @else
              <div class="offer-user-chat" data-partner="{{$service->user_id}}"
                data-partner-name="{{$service->user->name}}">
                <i class="fab fa-facebook-messenger"></i>
                <div class="online-circle" data-online-state="{{ $service->user_id }}"></div>
              </div>

              @endif

              @else
              <div class="offer-user-chat" data-partner="{{$service->user_id}}"
                data-partner-name="{{$service->user->name}}">
                <i class="fab fa-facebook-messenger"></i>
                <div class="online-circle" data-online-state="{{ $service->user_id }}"></div>
              </div>
              @endif

              
            </div>

          </div>



        </div>{{-- /.offer-user --}}


        <a href="/services/{{ $service->id }}/{{$service->label}}">

          <div class="offer-image">
            <div>
              <img src="{{ $service->getMedia('service')->first()->getUrl('card') }}" alt="">
            </div>
          </div>
          <!-- /.offer-image -->


          <div class="offer-details">
            {{$service->label}}
          </div>
          <!-- /.offer-details -->

        </a>

      </div>{{-- /.one-offer --}}





      @endforeach
    </div>
    {{ $services->links() }}

    @else
    <div class="offers-wrapper">
      <div class="no-offers">
        {{ trans('pages.all.no_orders') }} <img src="{{ asset($asset_path.'/images/not-found.svg')}}" alt="">
      </div>
    </div>
    @endif




  </div>
  <!-- /#services -->


  <div id="filters" data-aos="fade-up">

    <div id="mini-filter-close">
      <div><span class="material-icons">highlight_off</span></div>
      <div>إغلاق</div>
    </div>
    
    <div id="filters-content">
      <h3><i class="fas fa-sliders-h"></i> النوع </h3>

      <table>




        <tr>
          <td><i class="far fa-money-bill-alt"></i></td>
          <td>
            <a href="?main_category=money">الأموال
            </a>
          </td>
        </tr>


         <tr>

          <td><i class="fas fa-mobile-alt"></i></td>
          <td>
            <a href="?main_category=credit">الرصيد
            </a>
          </td>
          </a>
        </tr>



      </table>

      <hr>

      <!-- Slider with Starting Value -->
      <form action="?rate" id="rate-form">
        <div><i class="far fa-star"></i></div>
        <div>
          <input id="rate-input" type="number" name="rate"
            value="<?php if(request()->has('rate')){ echo request('rate'); } else { echo 0;}?>" max="5" min="0"
            class="form-control">

        </div>

        <div>
          <button><i class="fas fa-check"></i></button>
        </div>

      </form>
      <input id="mdl-slider" class="mdl-slider mdl-js-slider" type="range" min="0" max="5"
        value="<?php if(request()->has('rate')){ echo request('rate'); } else { echo 0;}?>" tabindex="0">


      <hr>

      <div id="verified-filter">



        <h3><i class="fas fa-sliders-h"></i> التوثيق </h3>

        <table>




          <tr>
            <td><i class="fas fa-user-check"></i></td>
            <td>
              <a href="?user_verified=1">بائع موثق
              </a>
            </td>
          </tr>


          <tr>

            <td><i class="fas fa-user-alt"></i></td>
            <td>
              <a href="?user_verified=0">بائع غير موثق
              </a>
            </td>
            </a>
          </tr>



        </table>


      </div>

    </div>

    <div id="reset-filters">
      <a href="/all-services">
        الوضع الإفتراضى
        <i class="fas fa-redo-alt"></i>
      </a>
    </div>

  </div>

  <!-- /#filters -->






</div>{{-- /#services-wrapper --}}







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




<script type="text/javascript">
  $(document).ready(function () {
    $('.collapse').collapse();

    $("#mdl-slider").on('change', function(){
      $("#rate-input").val($('#mdl-slider').val());
    });

    $("#rate-input").on('change', function(){
      $('#mdl-slider').get(0).MaterialSlider.change($('#rate-input').val());
    });



    const filters    = document.querySelector('#filters');
    const filters_ps = new PerfectScrollbar(filters, {
      wheelSpeed: 1,
      wheelPropagation: false,
      minScrollbarLength: 20
    });


    $('#mini-filter').on('click', function(){
      $("#filters").css({
        display: 'block'
      });
    });


    $('#mini-filter-close').on('click', function(){
      $("#filters").css({
        display: 'none'
      });
    });

  });
</script>




<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
  AOS.init();
</script>



@endsection