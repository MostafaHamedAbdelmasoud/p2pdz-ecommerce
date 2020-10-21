@extends('layouts.app-pages')



@section('header')
@parent

<title>موقع P2P DZ تبادل العملات الالكترونية في الجزائر</title>



<style>
  * {
    padding: 0;
    margin: 0;
  }

  html,
  body {
    overflow-X: hidden
  }

  .wrapper {
    width: 100%;
    padding-top: 20px;
    text-align: center;

  }

  h2 {
    font-family: sans-serif;
    color: #fff;
  }

  .carousel {
    width: 100%;
    display: flex;
  }

  .slick-slide {
    margin: 10px;
  }

  .slick-slide img {
    width: 90%;
    height: 90%;
    object-fit: contain;
  }




  .slider-card {
    display: flex !important;
    justify-content: center;
    align-items: center;
    height: 100%;
  }

  .slick-list.draggable {
    direction: ltr !important;
  }

  #packs-slider .slick-list.draggable {
    padding: 30px 60px !important;
  }
</style>



<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/home.css?v1') }}">


<link rel="stylesheet" type="text/css"
  href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


<style>
  
  #slider-container{
    width: 100%;
    height: 100vh;
    background-color: red;
    display: flex;
    position: relative;
    z-index: 9;
  }


  #slider-container > div{
    height: 100%;
  }

  .slider-arr{
    width: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center !important;
    color: #FFF;
  }

  .slider-content{
    flex: 1;
    /*background-color: green;*/
    position: relative;
    flex-direction: column-reverse;
  }

  .slider-box{
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 50px;
  }

</style>




@endsection





@section('content')
@parent





@section('page-content')


<!--<div id="slider-container">
  
  <div class="slider-arr slider-arr-n">
    <span class="material-icons">
      arrow_forward_ios
     </span>
  </div>

  <div class="slider-content">
    <div class="slider-box" style="background-color: salmon;">1</div>
    <div class="slider-box" style="background-color: rgb(16, 177, 94);">2</div>
    <div class="slider-box" style="background-color: rgb(125, 114, 250);">3</div>
  </div>

  <div class="slider-arr slider-arr-p">
    <span class="material-icons">
     arrow_back_ios
    </span>
  </div>

  

</div>-->

<div class="y-col y-col-w y-col-vh" id="sect-intro"
  style='background-image: url({{ asset($asset_path."images/homepage/sect-intro-bg.svg") }})'>

  <div class="y-col" id="sect-intro-content">


    <div class="sec-intro-side sec-intro-text-side">
      <div>
        <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/main-logo-light.svg') }}" alt="">
        <h1>تبادل الأموال أونلاين</h1>

        <p>خدمات تبادل الأموال بين الأفراد</p>

        <button id="know-more">معرفة المزيد</button>
      </div>
    </div>
    <!-- /.sec-intro-side -->

    <div class="sec-intro-side sec-intro-icon-side">
      <img data-src="{{ asset($asset_path.'/images/homepage/sect-intro-icon.svg') }}" alt="" class="lazyload blur-up">
    </div>
    <!-- /.sec-intro-side -->

  </div>


</div>


<section class="y-col y-col-vh" id="currencies_offers">

  <div id="currencies_offers">

    <div class="section-header">

      <div>
        <div class="section-info">
          <h3>عروض العملات</h3>
          <p>عروض العملات الرقمية, البنوك الإلكترونية و العملات المحلية</p>
        </div>
      </div>

      <div>
        <div class="section-image">
          <img class="lazyload blur-up" data-src="{{ asset($asset_path.'images/homepage/crypto.svg') }}" alt="">
        </div>
      </div>

    </div>
    <!-- /#currencies_offers-header -->

    <div class="currencies_offers-content">

      @if($moneyOffers->count()>0)
      @foreach($moneyOffers as $service)
      <div class="one-offer" data-aos="zoom-in">


        <div class="offer-user">

          <div class="offer-user-image">
            <div class="user-image-circle">
              <img class="lazyload blur-up"
                data-src="{{ ($service->user->getMedia('avatar')->first()) ? $service->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
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


                  @for($i=1; $i <= 5; $i++) @if($service->rate >= $i)
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
              <img class="lazyload blur-up" data-src="{{ $service->getMedia('service')->first()->getUrl('card') }}"
                alt="">
            </div>
          </div>
          <!-- /.offer-image -->


          <div class="offer-details">
            {{$service->label}}
          </div>
          <!-- /.offer-details -->

          <div class="offer-price"
            style="display: flex;justify-content: space-around;border-top: 1px dashed #DDD;padding-top: 8px;color:green;">
            <div>السعر : {{$service->price}} $</div>
            <div>متوفر : {{$service->quantity}} $</div>
          </div>

        </a>

      </div>{{-- /.one-offer --}}
      @endforeach

    </div>
    <!-- /.currencies_offers-content -->

    <div class="currencies_offers-footer" data-aos="zoom-in-up">
      <a href="/all-services?main_category=money">جميع عروض الأموال <i class="fas fa-chevron-left"></i></a>
    </div>
    <!-- /.currencies_offers-footer -->

    @else

    <div style="text-align: center;margin: 100px auto 0;color: #6baa34;font-size: 20px;">لا يوجد خدمات فى هذا القسم
      حاليا
      &nbsp; <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/not-found.svg')}}" alt=""
        style="width: 40px;"></div>


  </div>
  <!-- /.currencies_offers-content -->



  @endif




  </div>

</section>


<section id="currencies-statics">





  @if($currencies->count()>0)

  <div id="currencies-slider"
    style='background-image: url({{ asset($asset_path."images/currencies-section-bg.svg") }});'>
    <div class="y-col y-col-w">

      <div class="y-col">

        <div class="wide-slider">
          <div class="wide-slider-arr wide-slider-previous">
            <div><i class="fas fa-chevron-left"></i></div>
          </div>
          <div class="wide-slider-frame">


            <div class="carousel" id="currencies_carousal">



              @foreach($currencies as $currency) <div class="currencies-slider-card">

                @php($currencyTotal = \App\Service::where('sub_category', $currency->title)->sum('quantity') )

                <div class="slider-card-image">

                  <img class="lazyload blur-up" data-src="{{ $currency->getMedia('icon')->first()->getUrl('card') }}"
                    alt="">
                </div>
                <div class="slider-card-label" data-aos="flip-down">{{ $currency->title }}</div>
                <div class="slider-card-text" data-aos="flip-up"><span class="count">{{$currencyTotal}}</span></div>

              </div>

              @endforeach


            </div>

          </div>
          <div class="wide-slider-arr wide-slider-next">
            <div><i class="fas fa-chevron-right"></i></div>
          </div>
        </div>

      </div>
    </div>
  </div>

  @endif

</section>



<section class="y-col y-col-vh">

  <div id="credit_offers">

    <div class="section-header">

      <div>
        <div class="section-info">
          <h3>عروض الرصيد</h3>
          <p>عروض رصيد شبكات الهواتف المختلفة</p>
        </div>
      </div>

      <div>
        <div class="section-image">
          <img class="lazyload blur-up" style="margin: 10px 0;"
            data-src="{{ asset($asset_path.'images/homepage/phone-icon.svg') }}" alt="">
        </div>
      </div>

    </div>
    <!-- /#currencies_offers-header -->

    <div class="currencies_offers-content">

      @if($creditOffers->count()>0)
      @foreach($creditOffers as $service)
      <div class="one-offer" data-aos="zoom-in">


        <div class="offer-user">

          <div class="offer-user-image">
            <div class="user-image-circle">
              <img class="lazyload blur-up"
                data-src="{{ ($service->user->getMedia('avatar')->first()) ? $service->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                alt="">
            </div>
            <!-- /.user-image-circle -->

            <div class="offer-user-verified "><span class="material-icons">verified_user</span>
              &nbsp; {{-- Verified --}}
            </div>
          </div>



          <div class="offer-user-details">

            <div class="offer-user-info-chat">
              <div class="offer-user-information">
                <div class="service-rate">




                  @for($i=1; $i <= 5; $i++) @if($service->rate >= $i)
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
              <img class="lazyload blur-up" data-src="{{ $service->getMedia('service')->first()->getUrl('card') }}"
                alt="">
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
    <!-- /.currencies_offers-content -->

    <div class="currencies_offers-footer" data-aos="zoom-in-up">
      <a href="/all-services?main_category=credit">جميع عروض الرصيد <i class="fas fa-chevron-left"></i></a>
    </div>
    <!-- /.currencies_offers-footer -->
    @else

    <div style="text-align: center;margin: 100px auto 0;color: #6baa34;font-size: 20px;">لا يوجد خدمات فى هذا القسم
      حاليا
      &nbsp; <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/not-found.svg')}}" alt=""
        style="width: 40px;"></div>


  </div>
  <!-- /.currencies_offers-content -->

  @endif




  </div>
</section>


@if($credits->count()>0)
<section id="credit-statics">






  <div id="credit-slider" style='background-image: url({{ asset($asset_path."images/currencies-section-bg.svg") }});'>
    <div class="y-col y-col-w">

      <div class="y-col">

        <div class="wide-slider">
          <div class="wide-slider-arr wide-slider-previous">
            <div><i class="fas fa-chevron-left"></i></div>
          </div>
          <div class="wide-slider-frame">


            <div class="carousel" id="currencies_carousal">
              @foreach($credits as $credit) <div class="currencies-slider-card">

                @php($creditTotal = \App\Service::where('sub_category', $credit->title)->sum('quantity') )

                <div class="slider-card-image">

                  <img class="lazyload blur-up" data-src="{{ $credit->getMedia('icon')->first()->getUrl('card') }}"
                    alt="">
                </div>
                <div class="slider-card-label" data-aos="flip-down">{{ $credit->title }}</div>
                <div class="slider-card-text" data-aos="flip-up"><span class="count">{{$creditTotal}}</span></div>

              </div>

              @endforeach


            </div>

          </div>
          <div class="wide-slider-arr wide-slider-next">
            <div><i class="fas fa-chevron-right"></i></div>
          </div>
        </div>

      </div>
    </div>
  </div>



</section>
@endif





@php($sellers = \App\User::where('user_type', 1)->inRandomOrder()->limit(12)->get())




<section class="y-col y-col-vh" id="sellers_container_mini">

  <div id="" style="width: 100%;">

    <div class="section-header">

      <div>
        <div class="section-info">
          <h3>حسابات البائعين</h3>
          <p>بائعى الموقع الذين يقدمون الخدمات مختلفة</p>
        </div>
      </div>

      <div>
        <div class="section-image">
          <img class="lazyload blur-up" data-src="{{ asset($asset_path.'images/homepage/saleman.svg') }}" alt=""
            style="margin-bottom:10px;">
        </div>
      </div>

    </div>





    <div class="sellers_boxes">

      @if($sellers->count()>0)



      <div class="wide-slider">
        <div class="wide-slider-arr wide-slider-previous">
          <div><i class="fas fa-chevron-left"></i></div>
        </div>
        <div class="wide-slider-frame">


          <div class="carousel" id="sellers_carousal">
            @foreach($sellers as $seller)


            <div class="seller-card" data-aos="zoom-in-up">
              <a href="/account/{{$seller->id}}">
                <div class="seller-image">

                  @if($seller->getMedia('avatar')->first())
                  <img class="lazyload blur-up" data-src="{{ $seller->getMedia('avatar')->first()->getUrl('card') }}"
                    alt="">
                  @else
                  <div class="image-palce"><span class="material-icons">
                      account_circle
                    </span></div>
                  @endif

                </div>
                <div class="seller-name"><div class="online-circle" data-online-state="{{$seller->id}}" style=""></div>{{$seller->name}}</div>

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

        </div>
        <div class="wide-slider-arr wide-slider-next">
          <div><i class="fas fa-chevron-right"></i></div>
        </div>
      </div>






    </div>


    <div class="currencies_offers-footer" data-aos="zoom-in-up" style="margin: 30px auto 50px;">
      <a href="/all-sellers">جميع حسابات البائعين <i class="fas fa-chevron-left"></i></a>
    </div>


    @else

    <div style="text-align: center;margin: 100px auto 0;color: #6baa34;font-size: 20px;">لا يوجد بائعون فى هذا القسم
      حاليا
      &nbsp; <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/not-found.svg')}}" alt=""
        style="width: 40px;"></div>


  </div>




  @endif




  </div>





</section>





































<section class="y-col y-col-vh" id="sellers_container">

  <div id="currencies_offers">

    <div class="section-header">

      <div>
        <div class="section-info">
          <h3>حسابات البائعين</h3>
          <p>بائعى الموقع الذين يقدمون الخدمات مختلفة</p>
        </div>
      </div>

      <div>
        <div class="section-image">
          <img class="lazyload blur-up" data-src="{{ asset($asset_path.'images/homepage/saleman.svg') }}" alt=""
            style="margin-bottom:10px;">
        </div>
      </div>

    </div>





    <div class="sellers_boxes">

      @if($sellers->count()>0)











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
          <div class="seller-name"> <div class="online-circle" data-online-state="{{ $seller->id }}" style=""></div> {{$seller->name}}</div>

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


    <div class="currencies_offers-footer" data-aos="zoom-in-up">
      <a href="/all-sellers">جميع حسابات البائعين <i class="fas fa-chevron-left"></i></a>
    </div>


    @else

    <div style="text-align: center;margin: 100px auto 0;color: #6baa34;font-size: 20px;">لا يوجد بائعون فى هذا القسم
      حاليا
      &nbsp; <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/not-found.svg')}}" alt=""
        style="width: 40px;"></div>


  </div>




  @endif




  </div>





</section>


<div id="if-you-wanna-sell">
  <div class="y-col">
    <div id="join-info">
      <p>إذا أردت الحصول على صلاحيات البيع عبر موقعنا</p>

      @if(auth()->check())
      @if( auth()->user()->id == 1 )
      @php($joinClass = 'offer-user-chat-false')
      @else
      @php($joinClass = 'offer-user-chat')
      @endif
      @else
      @php($joinClass = 'offer-user-chat')
      @endif


      <p style="cursor: pointer;" class="{{$joinClass}}" data-partner="1" data-partner-name="Admin">إضغط هنا لمراسلة
        الإدارة &nbsp;<i class="fab fa-facebook-messenger"
          style="color:#97C371;margin:0 7px;font-size: 25px;font-weight:normal;"></i>
      </p>

      <p>جميع الحسابات الجديدة لا تملك صلاحيات البيع</p>

    </div>

    <div id="join-image">
      <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/join.svg')}}" alt="" style="width: 40px;">
    </div>
  </div>
</div>





<section class="y-col y-col-vh" id="about-site">

  <div id="about-site-text">
    <h3>عن موقع P2PDZ</h3>
    <p>{{$settings->about}} </p>
  </div>


  <div id="about-site-icon">
    <img class="lazyload blur-up" data-aos="fade-right" data-src="{{ asset($asset_path.'images/homepage/team.svg')}}"
      alt="">
    <img class="circle-animation lazyload blur-up"
      data-src="{{ asset($asset_path.'images/homepage/animated-circle.png')}}" alt="">
  </div>

</section>



<section class="y-col-w" id="steps-section"
  style='background-image: url({{ asset($asset_path."images/steps-section-bg.svg") }})'>


  <div>
    <div class="y-col" id="steps-wrapper">

      <div class="one-step" data-aos="zoom-in-left">
        <div class="one-step-icon">
          <img class="lazyload blur-up" data-src="{{ asset($asset_path.'images/homepage/step-1.svg') }}" alt="">
        </div>
        <div class="one-step-label">أنشئ حسابك المجانى</div>
        <div class="one-step-text">فى وقت قصير ستحصل على حسابك و تبدأ فى الحصول على الخدمات</div>
      </div>

      <div class="one-step" data-aos="zoom-in-left">
        <div class="one-step-icon">
          <img class="lazyload blur-up" data-src="{{ asset($asset_path.'images/homepage/step-2.svg') }}" alt="">
        </div>
        <div class="one-step-label">إختر الخدمة المناسبة</div>
        <div class="one-step-text">فى قسم الخدمات إبحث عن الخدمة التي تحتاجها و إفحص العرض جيدا</div>
      </div>

      <div class="one-step" data-aos="zoom-in-left">
        <div class="one-step-icon">
          <img class="lazyload blur-up" data-src="{{ asset($asset_path.'images/homepage/step-3.svg') }}" alt="">
        </div>
        <div class="one-step-label">تواصل مع مقدم الخدمة</div>
        <div class="one-step-text">يمكنك بسهولة التواصل مع مقدم الخدمة لتطلب الحصول عليها</div>
      </div>

      <div class="one-step" data-aos="zoom-in-left">
        <div class="one-step-icon">
          <img class="lazyload blur-up" data-src="{{ asset($asset_path.'images/homepage/step-4.svg') }}" alt="">
        </div>
        <div class="one-step-label">إحصل على خدمتك</div>
        <div class="one-step-text">فى دقائق معدودة ستحصل على خدمتك ويمكنك تقييم الخدمة التي حصلت عليها</div>
      </div>


    </div>
  </div>
</section>



@php( $reviews = \App\Review::latest()->take(5)->get() )

@if( $reviews->count() > 0 )
<section class="y-col-w" id="reviews-section">

  <div id="reviews-content">
    <h3>آراء المستخدمين</h3>


    <div id="reviews-slider">

      <div class='slider-arr slider-arr-next'>
        <i class="fas fa-chevron-right"></i>
      </div>

      <div class="slider-content">
        <div class="carousel" id="reviews_carousal">


          @foreach( $reviews as $review )

          <div class="user-review-container">

            <div class="review-user-image">
              <img class="lazyload blur-up"
                data-src="{{ ($review->user->getMedia('avatar')->first()) ? $review->user->getMedia('avatar')->first()->getUrl('card') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                alt="">
                
            </div>

            <p style="font-size: 20px;text-transform: capitalize;padding-top: 15px;border-bottom: 1px dashed #DDD;padding-bottom: 10px;color:green;">{{$review->user->name}}</p>

            <div class="review-user-text">
              <div class="user-review">
                {{$review->review}}
                {{-- يقدم موقع أبجد هوز حطى كلمن سعفص قرشت ثخذ ضظغ يقدم موقع أبجد هوز حطى كلمن سعفص قرشت ثخذ ضظغ --}}
              </div>
              <div class="review-quotes"><i class="fas fa-quote-right"></i></div>
            </div>

          </div>
          <!-- /.user-review -->

          @endforeach

          @for($i=0;$i<5;$i++) <?php
            // images
            /* $profielX = array("s-1.jpg", "s-2.jpg", 's-3.jpeg', 's-4.jpg', 's-5.jpg', 's-6.jpg', 's-7.jpeg', 's-8.png', 's-9.jpg', 's-10.jpg', 's-11.jpg', 's-12.jpg');
            $profielXIndex = $profielX[$i]; */
            ?> {{-- <div class="user-review-container">

            <div class="review-user-image">
              <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/offer/'.$profielXIndex) }}">
        </div>

        <div class="review-user-text">
          <div class="user-review">
            يقدم موقع أبجد هوز حطى كلمن سعفص قرشت ثخذ ضظغ يقدم موقع أبجد هوز حطى كلمن سعفص قرشت ثخذ ضظغ
          </div>
          <div class="review-quotes"><i class="fas fa-quote-right"></i></div>
        </div>

      </div> --}}
      <!-- /.user-review -->


      @endfor


    </div>
  </div>
  <div class='slider-arr slider-arr-previous'><i class="fas fa-chevron-left"></i></div>

  </div>
  <!-- /#reviews-slider -->


  </div>
  <!-- /#reviews-content -->

</section>

@endif



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





<script type="text/javascript" src="{{ asset($asset_path.'/js/pages/home.js') }}"></script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>


<script type="text/javascript">
  function getQueryVariable(variable)
  {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
                var pair = vars[i].split("=");
                if(pair[0] == variable){return pair[1];}
        }
        return(false);
  }
  
  $(document).ready(function () {
  

   // alert('hello world');




    if( getQueryVariable("location") == 'about' ){
      var el = $("#about-site-text").offset().top;
      window.scroll({ top: el, left: 0, behavior: "smooth" });
    }
    if( getQueryVariable("location") == 'packs' ){
      var el = $("#packs-slider").offset().top;
      window.scroll({ top: el, left: 0, behavior: "smooth" });
    }


    $('.count').each(function () {
      $(this).prop('Counter',0).animate({
          Counter: $(this).text()
      }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
      });
    });



    $('#packs-slider .carousel').slick({
      slidesToShow: 3,
      centerMode: true,
      focusOnSelect: true,
      arrows: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 5000,
      prevArrow: $('#packs-slider .wide-slider-previous'),
      nextArrow: $('#packs-slider .wide-slider-next'),
      pauseOnHover: false,
      responsive: [
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        
        {
          breakpoint: 900,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        ,
        
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        }
        ,
        
        {
          breakpoint: 750,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
    });
    
    $('#currencies-slider .carousel').slick({
      slidesToShow:4,
      arrows: true,
      prevArrow: $('#currencies-slider .wide-slider-previous'),
      nextArrow: $('#currencies-slider .wide-slider-next'),
      pauseOnHover: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        
        {
          breakpoint: 550,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
    });
    
    
    
    
    $('#credit-slider .carousel').slick({
      slidesToShow:4,
      arrows: true,
      prevArrow: $('#credit-slider .wide-slider-previous'),
      nextArrow: $('#credit-slider .wide-slider-next'),
      pauseOnHover: false,
      centerPadding: '100px',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        }
        ,
        
        {
          breakpoint: 550,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
    });
    
    
    
    
    $('#reviews-slider .carousel').slick({
      slidesToShow:1,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: $('#reviews-slider .slider-arr-previous'),
      nextArrow: $('#reviews-slider .slider-arr-next'),
      pauseOnHover: false,
      centerMode: false,
      centerPadding: '0px',
    });



    $('#sellers_carousal').slick({
      slidesToShow:4,
      slidesToScroll: 4,
      arrows: true,
      prevArrow: $('#sellers_container_mini .wide-slider-previous'),
      nextArrow: $('#sellers_container_mini .wide-slider-next'),
      pauseOnHover: false,
      centerMode: false,
      centerPadding: '0px',
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        
        {
          breakpoint: 1000,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        }
        ,
        
        {
          breakpoint: 550,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '10px',
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
    });
    



    

  });
</script>




<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
  AOS.init();
</script>



@endsection