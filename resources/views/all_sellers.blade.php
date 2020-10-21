@extends('layouts.app-pages')



@section('header')
@parent

<title>منطقة البائعين</title>

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

  .sellers_boxes {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    padding: 50px 0 0;
  }

  .seller-card {
    width: 220px;
    height: 300px;
    box-shadow: 0px 0px 3px grey;
    margin: 20px;
    border-radius: 22px;
    overflow: hidden;
    padding: 0 5px;
  }

  #sellers_container_mini .seller-card {
    margin: 0 !important;
  }

  .seller-card:hover {
    box-shadow: 0px 0px 8px #00800061;
  }

  .seller-card a {
    color: #383838 !important;
  }

  .seller-card a:hover {
    color: #383838;
    text-decoration: none;
  }

  .seller-image {
    width: 150px;
    height: 150px;
    border: 2px dashed #dddd;
    border-radius: 50%;
    margin: 10px auto;
    overflow: hidden;
    text-align: center;
  }

  .seller-image img {
    width: calc(100% - 10px);
    height: calc(100% - 10px);
    object-fit: cover;
    border-radius: 50%;
    margin: 5px auto;
    overflow: hidden;
  }

  .image-palce {
    width: 100%;
    height: 100%;
    font-size: 50px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .image-palce span {
    font-size: 164px !important;
    opacity: 0.5;
  }


  .seller-name {
    font-size: 20px;
    color: green;
    text-align: center;
    text-transform: capitalize;
    display: flex;
    justify-content: center;
    padding-right: 10px;
    align-items: center;
    direction: ltr !important;
  }

  .seller-rate {
    text-align: center;
    color: rgba(128, 128, 128, 0.496);
  }

  .seller-country {
    display: flex;
    padding: 2px 10px;
    justify-content: center;
    padding-top: 10px;
    border-top: 1px dashed #ddd;
    margin-top: 5px;
  }

  .seller-country>div:nth-of-type(1) {
    width: 30px;
    text-align: center;
  }

  .seller-country>div:nth-of-type(2) {
    text-align: justify;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    padding: 0 5px;
  }

  .seller-city {
    display: flex;
    padding: 2px 10px;
    justify-content: center;
  }

  .seller-city>div:nth-of-type(1) {
    width: 30px;
    text-align: center;
  }

  .seller-city>div:nth-of-type(2) {
    text-align: justify;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    padding: 0 5px;
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
        <h1>منطقة البائعين</h1>
        <p>بائعى الموقع الذين يقدمون الخدمات المختلفة</p>

      </div>
    </div>
    <!-- /.sec-intro-side -->

    <div class="sec-intro-side sec-intro-icon-side">
      <img style="width:80%;height:80%;" src="{{ asset($asset_path.'/images/sellers.svg') }}" alt="">
    </div>
    <!-- /.sec-intro-side -->

  </div>


</div>







<div id="services-wrapper" class="y-col">




  <div id="services">



    @if( $sellers->count() > 0 )

    <div id="mini-filter">
      <div><span class="material-icons">sort</span> &nbsp; فلترة النتائج</div>
    </div>

    <div class="offers-wrapper">
      @foreach( $sellers as $seller )



      <div class="seller-card" data-aos="zoom-in-up">
        <a href="/account/{{$seller->id}}">
          <div class="seller-image">

            @if($seller->getMedia('avatar')->first())
            <img class="lazyload blur-up" data-src="{{ $seller->getMedia('avatar')->first()->getUrl('card') }}" alt="">
            @else
            <div class="image-palce"><span class="material-icons">
                account_circle
              </span></div>
            @endif

          </div>
          <div class="seller-name">
            <div class="online-circle" data-online-state="{{ $seller->id }}" style=""></div> {{$seller->name}}
          </div>

          <div class="seller-rate">


            @for($i=1; $i <= 5; $i++) @if($seller->rate >= $i)
              @php($starClass = 'active-star')
              @else
              @php($starClass = '')
              @endif


              <i class="fas fa-star {{$starClass}}"></i>
              @endfor

          </div>

          <div class="seller-country">
            <div><i class="fas fa-flag"></i></div>

            <div>

              @if($seller->country != '')
              {{$seller->country}}
              @else
              غير محدد
              @endif

            </div>
          </div>


          <div class="seller-city">
            <div><i class="fas fa-street-view"></i></div>

            <div>


              @if( $seller->city != '' )
              {{$seller->city}}
              @else
              غير محدد
              @endif


            </div>

          </div>
        </a>

      </div>

      @endforeach
    </div>
    {{ $sellers->links() }}

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


      <div id="verified-filter">



        <h3><i class="fas fa-sliders-h"></i> التوثيق </h3>

        <table>




          <tr>
            <td><i class="fas fa-user-check"></i></td>
            <td>
              <a href="?verified=1">بائع موثق
              </a>
            </td>
          </tr>


          <tr>

            <td><i class="fas fa-user-alt"></i></td>
            <td>
              <a href="?verified=0">بائع غير موثق
              </a>
            </td>
            </a>
          </tr>



        </table>


      </div>

    </div>

    <div id="reset-filters">
      <a href="/all-sellers">
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