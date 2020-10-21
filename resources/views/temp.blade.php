<!DOCTYPE html>
<html dir="<?php echo App::getLocale()=='ar'? 'rtl' : 'ltr' ?>"
  lang="<?php echo App::getLocale()=='ar'? 'ar' : 'en' ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}" />
  @foreach(\App\MetaTag::all() as $meta)
  {!!$meta->meta_tag!!}
  @endforeach
  <title>موقع P2P DZ تبادل العملات الالكترونية في الجزائر</title>



  <link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}" />

  {{-- @yield('header') --}}
  <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="{{ asset($asset_path.'css/pages/all-pages.css?v3') }}" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="{{ asset($asset_path.'css/pages/home.css?v1') }}">


  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />

  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


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


</head>

<body>



  <div id="app">
    <div id="content-wrapper">

      <div class="blur-content"></div>






      {{-- @yield('content') --}}
      <header class="page-header">


        <div id="fixed-menu">


          <div id="fixed-menu-head">
            <div id="close-fixed-menu"><span class="material-icons">close</span></div>
            <div>القائمة</div>
          </div>
          <!-- /#fixed-menu-head -->








          <div class="one-tab responsive-fixed-manu">
            <a href="/">
              <div><span class="material-icons">house</span></div>
              <div>الرئيسية</div>
            </a>
          </div>

          <div class="one-tab responsive-fixed-manu">
            <a href="/all-services">
              <div><span class="material-icons">dashboard</span></div>
              <div>الخدمات</div>
            </a>
          </div>

          <div class="one-tab responsive-fixed-manu" id="fixed-menu-sellers">
            <a href="/add_service">
              <div><span class="material-icons">people_alt</span></div>
              <div>البائعون</div>
            </a>
          </div>










          <div class="one-tab">
            <a href="/add_service">
              <div><i class="fas fa-plus"></i></div>
              <div>خدمة جديدة</div>
            </a>
          </div>

          @if(auth()->check())
          <div class="one-tab">
            <a href="/account/{{auth()->user()->id}}">
              <div><i class="fas fa-layer-group"></i></div>
              <div>خدماتى</div>
            </a>
          </div>
          @endif

          <div class="one-tab">
            <a href="/cashier">
              <div><i class="fas fa-cash-register"></i></div>
              <div>الطلبات الواردة</div>
            </a>
          </div>

          <div class="one-tab">
            <a href="/my_orders">
              <div><i class="fas fa-shopping-cart"></i></div>
              <div>المشتريات</div>
            </a>
          </div>



          <div class="one-tab">
            <a href="/my_complaints">
              <div><i class="fas fa-headset"></i></div>
              <div>الشكاوى</div>
            </a>
          </div>








        </div>
        <!-- /#fixed-menu -->


        {{-- <form action="/search">
                <input name="keyword" type="text" placeholder="{{ trans('pages.search') }}" class="form-control">
        <button type="submit"><i class="material-icons">search</i></button>
        </form> --}}

        <div id="wide-nav" style="">

          <div class="y-col">

            <div id="open-fixed-menu">
              <i class="fas fa-bars"></i>
            </div>


            <div id="wide-nav-logo">
              <a href="/">
                <img id="light-logo" src="{{ asset($asset_path.'/images/main-logo-light.svg') }}" alt="">
                <img id="dark-logo" src="{{ asset($asset_path.'/images/main-logo-dark.svg') }}" alt="">
              </a>
            </div>


            <div id="wid-nav-responsive">


              <div id="wide-nav-home" class="wide-nav-tab">
                <a href="/"><span>الرئيسية</span> <span class="material-icons">house</span></a>
                <div class="active-wide-nav-tab"></div>
              </div>

              <div id="wide-nav-services" class="wide-nav-tab">
                <a href="/all-services"><span>الخدمات</span> <span class="material-icons">dashboard</span></a>
                <div class="active-wide-nav-tab"></div>
              </div>

              <div id="wide-nav-sellers" class="wide-nav-tab">
                <a href="/all-services"><span>البائعين</span> <span class="material-icons">people_alt</span></a>
                <div class="active-wide-nav-tab"></div>
              </div>

            </div>


            <div id="flex-basis">


              <div id="wide-nav-user" class="wide-nav-tab">

                <div id="user-label">
                  <a>
                    <div>
                      @if( auth()->check() )
                      {{ auth()->user()->name }}
                      @else
                      مستخدم
                      @endif
                    </div>
                    <div><span class="material-icons">person</span></div>
                  </a>
                </div>

                <div id="user-menu">
                  @if( auth()->check() )

                  @if(auth()->user()->user_type==10)
                  <a href="/dashboard">
                    <div>لوحة التحكم</div>
                    <div><span class="material-icons">videogame_asset</span></div>
                  </a>
                  @endif



                  <a href="/account-settings">
                    <div>الإعدادات</div>
                    <div><i class="fas fa-cogs"></i></div>
                  </a>

                  <a href="/dashboard" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                    <div>خروج</div>
                    <div><span class="material-icons">power_settings_new</span></div>
                  </a>

                  <form action="/users/logout" method="POST" style="display:none;" id="logout-form">
                    @csrf
                    <button type="submit">
                      <div><i class="fas fa-power-off"></i></div>
                    </button>
                  </form>

                  @else
                  <a href="/users/login?url={{ $_SERVER['REQUEST_URI'] }}">
                    <div>تسجيل دخول</div>
                    <div><span class="material-icons">how_to_reg</span></div>
                  </a>
                  <a href="/users/register">
                    <div>إنشاء حساب</div>
                    <div><span class="material-icons">person_add</span></div>
                  </a>
                  @endif

                </div>

                <div class="active-wide-nav-tab"></div>

              </div>


              <div id="wide-nav-notification" class="wide-nav-tab">

                <div id="notifications-counter">
                  @if( auth()->check() )
                  @php( $countNotifications = \App\Notification::where('user_id',
                  auth()->user()->id)->where('seen' , 0)->count() )
                  <div>{{$countNotifications}}</div>
                  @else
                  <div>0</div>
                  @endif
                </div>
                <!-- /#notifications-counter -->

                <a href="/#"><span class="material-icons">notifications_active</span></a>
                <div class="active-wide-nav-tab"></div>

                <div id="notifications-wrapper">

                  <div class="one-notification">
                    <div class="notification-icon"><i class="fas fa-bell"></i></div>
                    <div class="notification-icon">أهلا و مرحبا بك</div>
                  </div>
                  <!-- /.one-notification -->

                </div>

              </div>

              <div id="wide-nav-contact" class="wide-nav-tab">
                <a href="/lang/en"><span class="material-icons">perm_phone_msg</span></a>
                <div class="active-wide-nav-tab"></div>
              </div>

              <div id="wide-nav-language" class="wide-nav-tab">
                @if(\App::getLocale() == 'ar')
                <a href="/lang/en"><span class="material-icons">g_translate</span> EN</a>
                @else
                <a href="/lang/ar"><span class="material-icons">g_translate</span> AR</a>
                @endif
                <div class="active-wide-nav-tab"></div>
              </div>

            </div>


          </div>
          <!-- /.y-col -->
        </div>




        <div id="side-nav-container">

          <div id="side-nav-items">

            <div class="side-nav-item" id="side-nav-money"><span class="material-icons">monetization_on</span></div>
            <div class="side-nav-item" id="side-nav-phone"><span class="material-icons">phone_iphone</span></div>
            <div class="side-nav-item" id="side-nav-sellers"><span class="material-icons">people_alt</span></div>
            <div class="side-nav-item" id="side-nav-about"><span class="material-icons">error_outline</span></div>
            <div class="side-nav-item" id="side-nav-contact"><span class="material-icons">perm_phone_msg</span></div>
            <div class="side-nav-item" id="go-up"><span class="material-icons">arrow_upward</span></div>

          </div>
          <!-- /#side-nav-items -->


        </div>
        <!-- /#side-nav-container -->



      </header>





      <div id="page-content">


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
              <img data-src="{{ asset($asset_path.'/images/homepage/sect-intro-icon.svg') }}" alt=""
                class="lazyload blur-up">
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
                    <div class="offer-user-verified {{$verifiedClass}}"><span
                        class="material-icons">verified_user</span>
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
                      </div>
                      @else
                      <div class="offer-user-chat" data-partner="{{$service->user_id}}"
                        data-partner-name="{{$service->user->name}}">
                        <i class="fab fa-facebook-messenger"></i>
                      </div>

                      @endif

                      @else
                      <div class="offer-user-chat" data-partner="{{$service->user_id}}"
                        data-partner-name="{{$service->user->name}}">
                        <i class="fab fa-facebook-messenger"></i>
                      </div>
                      @endif
                    </div>

                  </div>



                </div>{{-- /.offer-user --}}


                <a href="/services/{{ $service->id }}/{{$service->label}}">

                  <div class="offer-image">
                    <div>
                      <img class="lazyload blur-up"
                        data-src="{{ $service->getMedia('service')->first()->getUrl('card') }}" alt="">
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

            <div style="text-align: center;margin: 100px auto 0;color: #6baa34;font-size: 20px;">لا يوجد خدمات فى هذا
              القسم حاليا
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

                        <img class="lazyload blur-up"
                          data-src="{{ $currency->getMedia('icon')->first()->getUrl('card') }}" alt="">
                      </div>
                      <div class="slider-card-label" data-aos="flip-down">{{ $currency->title }}</div>
                      <div class="slider-card-text" data-aos="flip-up"><span class="count">{{$currencyTotal}}</span>
                      </div>

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
                    </div>
                    @else
                    <div class="offer-user-chat" data-partner="{{$service->user_id}}"
                      data-partner-name="{{$service->user->name}}">
                      <i class="fab fa-facebook-messenger"></i>
                    </div>

                    @endif

                    @else
                    <div class="offer-user-chat" data-partner="{{$service->user_id}}"
                      data-partner-name="{{$service->user->name}}">
                      <i class="fab fa-facebook-messenger"></i>
                    </div>
                    @endif





                  </div>

                </div>



              </div>{{-- /.offer-user --}}


              <a href="/services/{{ $service->id }}/{{$service->label}}">

                <div class="offer-image">
                  <div>
                    <img class="lazyload blur-up"
                      data-src="{{ $service->getMedia('service')->first()->getUrl('card') }}" alt="">
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

          <div style="text-align: center;margin: 100px auto 0;color: #6baa34;font-size: 20px;">لا يوجد خدمات فى هذا
            القسم حاليا
            &nbsp; <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/not-found.svg')}}" alt=""
              style="width: 40px;"></div>


        </div>
        <!-- /.currencies_offers-content -->

        @endif




    </div>
    </section>


    @if($credits->count()>0)
    <section id="credit-statics">






      <div id="credit-slider"
        style='background-image: url({{ asset($asset_path."images/currencies-section-bg.svg") }});'>
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
                <img class="lazyload blur-up" data-src="{{ $seller->getMedia('avatar')->first()->getUrl('card') }}"
                  alt="">
                @else
                <div class="image-palce"><span class="material-icons">
                    account_circle
                  </span></div>
                @endif

              </div>
              <div class="seller-name">{{$seller->name}}</div>

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




  {{-- 

<section id="packages-section">
<div class="y-col">

  <div class="section-header">

    <div>
      <div class="section-info">
        <h3>العضويات المميزة</h3>
        <p>عضويات تمنح صلاحيات إضافية</p>
      </div>
    </div>

    <div>
      <div class="section-image">
        <img src="{{ asset($asset_path.'images/homepage/business-men.svg') }}" alt="">
  </div>
  </div>

  </div>
  <!-- /#currencies_offers-header -->

  </div>


  <div id="packs-slider" style='background-image: url({{ asset($asset_path."images/packes-section-bg.svg") }})'>
    <div class="y-col y-col-vh">

      <div class="y-col y-col-vh">

        <div class="wide-slider">
          <div class="wide-slider-arr wide-slider-previous">
            <div><i class="fas fa-chevron-left"></i></div>
          </div>
          <div class="wide-slider-frame">


            <div class="carousel" id="packs_carousal">
              @for($i=0;$i<5;$i++) <div class="wide-slider-card">
                <div class="pack-card">

                  <div class="pack-card-label">
                    <h3>عنوان الباقة</h3>
                  </div>


                  <div class="pack_card-content">

                    <div class="pack-card-price">
                      <h3><span>$</span> 20</h3>
                      <p>شهريا</p>
                    </div>

                    <div class="pack-card-details">
                      <div class="pack-detail">
                        <div class="pack-detail-icon">&#x2714;</div>
                        <div class="pack-detail-text">خاصية رقم 1</div>
                      </div>
                      <div class="pack-detail">
                        <div class="pack-detail-icon">&#x2714;</div>
                        <div class="pack-detail-text">خاصية رقم 2</div>
                      </div>
                      <div class="pack-detail">
                        <div class="pack-detail-icon">&#x2714;</div>
                        <div class="pack-detail-text">خاصية رقم 3</div>
                      </div>
                    </div>


                    <div class="pack-card-subscribe">
                      <a href="">إشترك الآن</a>
                    </div>


                  </div>




                </div>
            </div>
            @endfor


          </div>

        </div>
        <div class="wide-slider-arr wide-slider-next">
          <div><i class="fas fa-chevron-right"></i></div>
        </div>
      </div>

    </div>
  </div>
  </div>

  </section> --}}




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


  <section class="y-col-w" id="reviews-section">

    <div id="reviews-content">
      <h3>آراء المستخدمين</h3>


      <div id="reviews-slider">

        <div class='slider-arr slider-arr-next'>
          <i class="fas fa-chevron-right"></i>
        </div>

        <div class="slider-content">
          <div class="carousel" id="reviews_carousal">




            @for($i=0;$i<5;$i++) <?php
          // images
          $profielX = array("s-1.jpg", "s-2.jpg", 's-3.jpeg', 's-4.jpg', 's-5.jpg', 's-6.jpg', 's-7.jpeg', 's-8.png', 's-9.jpg', 's-10.jpg', 's-11.jpg', 's-12.jpg');
          $profielXIndex = $profielX[$i];
          ?> <div class="user-review-container">

              <div class="review-user-image">
                <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/offer/'.$profielXIndex) }}">
              </div>

              <div class="review-user-text">
                <div class="user-review">
                  يقدم موقع أبجد هوز حطى كلمن سعفص قرشت ثخذ ضظغ يقدم موقع أبجد هوز حطى كلمن سعفص قرشت ثخذ ضظغ
                </div>
                <div class="review-quotes"><i class="fas fa-quote-right"></i></div>
              </div>

          </div>
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

  </div>
  <!-- /#page-content -->





  <footer id="page-footer" style="">

    <div id="page-footer-content" class="y-col">



      <div id="footer-info" style="">
        <div>
          <a href="/common-questions">&#10070; الأسئلة الشائعة</a>
          <a href="/privacy-policy">&#10070; سياسة الخصوصية</a>
          <a href="/terms-conditions">&#10070; الشروط و الأحكام</a>
          <a href="/?location=about">&#10070; عن الموقع</a>
        </div>

        <div>
          <a href="/all-services?main_category=money">&#10070; عروض العملات</a>
          <a href="/all-services?main_category=credit">&#10070; عروض الرصيد</a>
          <a href="/?location=packs">&#10070; الباقات</a>
        </div>

        <div>

          <div id="ft-social">

            <div>
              <a target="_blank" href="{{$settings->facebook}}">
                <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/fb-footer.svg')}}" alt="">
              </a>
            </div>
            <div>
              <a target="_blank" href="{{$settings->instagram}}">
                <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/in-footer.svg')}}" alt="">
              </a>
            </div>
            <div>
              <a target="_blank" href="{{$settings->twitter}}">
                <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/tw-footer.svg')}}" alt="">
              </a>
            </div>
            <div>
              <a target="_blank" href="{{$settings->youtube}}">
                <img class="lazyload blur-up" data-src="{{ asset($asset_path.'/images/yo-footer.svg')}}" alt="">
              </a>
            </div>


          </div>



          <div>
            <table>
              <tr>
                <td><i class="fab fa-whatsapp"></i></td>
                <td>{{$settings->phone}}</td>
              </tr>
              <tr>
                <td><i class="far fa-envelope"></i></td>
                <td>{{$settings->email}}</td>
              </tr>
            </table>
          </div>


        </div>

      </div>

      <div id="footer-image"
        style='background-image: url({{ asset($asset_path."images/homepage/sect-intro-icon.svg") }})'>

      </div>


    </div>

    <div id="copy-rights" class="y-col">
      <div><a href=""><i class="fas fa-code"></i> WEBBOX</a></div>
      <div>&copy; 2020 , All Rights Reserved</div>
    </div>

  </footer>








  <div id="toggleChat">
    <div>
      <i class="fab fa-facebook-messenger"></i>
      <div id="toggleChat-counter">
        @if(auth()->check())
        @php($countUnread = \DB::table('chat_messages')->distinct('chat_message_id')->where('to_user_id',
        auth()->user()->id)->where('seen', 0)->count())
        {{$countUnread}}
        @else
        0
        @endif
      </div>
    </div>
  </div>
  <!-- /#toggleChat -->

  <div id="goUpMini">
    <span class="material-icons">arrow_upward</span>
  </div>
  <!-- /#goUpMini -->

  <div id="chat-widget">

    <div id="chat-container">





      <div id="chat-widget-controls">
        <div id="controls-sub-conversation"><i class="far fa-comments"></i></div>
        <div id="controls-sub-conversation-first-user" class="sub-conversation-user-chat"><i
            class="far fa-comments"></i></div>
        <div id="controls-sub-conversation-second-user" class="sub-conversation-user-chat"><i
            class="far fa-comments"></i></div>
      </div>
      <!-- /#chat-widget-controls -->











      <div id="sub-conversation-container">

        <div class="chat-header">


          <div class="chat-header-label">
            <span class="chat-header-label-icon">



              <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
                <li class="mdl-menu__item"> إبلاغ عن مشكلة &nbsp; <i class="fas fa-exclamation-triangle"></i></li>
              </ul>

            </span>
            <span class="chat-header-label-text">فحص</span>

          </div>
          <!-- /.chat-header-label -->



          <div class="chat-header-icon" id="sub_conversation_scroll-down-go-down">
            <i class="material-icons">keyboard_arrow_down</i>
          </div>
          <div class="chat-header-icon" id="sub_conversation_back-to-conversations">
            <i class="material-icons">arrow_back</i>
          </div>
          <!-- /#back-to-conversations -->
          <div class="chat-header-icon chat-close">
            <i class="material-icons">close</i>
          </div>
          <!-- /.chat-close -->



        </div>
        <!-- /.chat-header -->

        <div id="active-sub-conversation" data-active-sub-conversation-id="0">



          <div id="active-sub-conversation-replies"></div>
          <!-- /#active-sub-conversation-replies -->

          <div id="conversationUsers">

            <div id="conversationUserOne">One</div>
            <div id="conversationUserTwo">Two</div>

          </div>
          <!-- /#conversationUsers -->

          {{-- <div id="new-partner-replies-go-down">
                            <i class="far fa-envelope"></i>
                        </div> --}}

        </div>
        <!-- /#active-conversation -->

      </div>
      <!-- /#sub-conversation-container -->







      <div id="active-conversation-container">




        <div class="chat-header">


          <div class="chat-header-label">

            <span class="chat-header-label-text"></span>

          </div>
          <!-- /.chat-header-label -->



          <div class="chat-header-icon" id="scroll-down-go-down">
            <i class="material-icons">keyboard_arrow_down</i>
          </div>
          <div class="chat-header-icon" id="back-to-conversations">
            <i class="material-icons">arrow_back</i>
          </div>
          <!-- /#back-to-conversations -->
          <div class="chat-header-icon chat-close">
            <i class="material-icons">close</i>
          </div>
          <!-- /.chat-close -->



        </div>
        <!-- /.chat-header -->








        <div id="active-conversation" data-active-conversation-id="0">



          <div id="active-conversation-replies"></div>
          <!-- /#active-conversation-replies -->
          <div id="new-partner-replies-go-down">
            <i class="far fa-envelope"></i>
          </div>

        </div>
        <!-- /#active-conversation -->





        <div id="chat-form-container">

          <div id="chat-users-info">
            users here
          </div><!-- /#chat-users-info -->


          <div id="chat-form-box">

            <div id="uploadingImage">
              <div>
                <div class="progress" id="chat-upload-progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
              </div>
            </div>

            <div id="chat-add-image">

              <!-- Right aligned menu on top of button  -->
              <button id="demo-menu-top-right" class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">add</i>
              </button>

              <ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect"
                data-mdl-for="demo-menu-top-right">
                <li id="chat-add-image-btn" class="mdl-menu__item">إرسال صورة &nbsp; <i class="far fa-image"></i>
                </li>
              </ul>
            </div>
            <!-- /#chat-add-image -->

            <form id="chat_reply_form">
              <div id="chat-reply-input">
                <textarea dir="auto" class="form-control"></textarea>
              </div>
              <!-- /#chat-reply-input -->

              <div id="chat-reply-btn">
                <button type="submit"><i class="material-icons">reply</i></button>
              </div>
              <!-- /#chat-reply-btn -->
            </form>
          </div>
          <!-- /#chat-forn-box -->



        </div>
        <!-- /#chat-form-container -->




      </div>
      <!-- /#active-conversation-container -->




      <div id="all-conversations">




        <div class="chat-header">
          <div class="chat-header-label"><i class="far fa-comments"></i> &nbsp; المحادثات</div>
          <!-- /.chat-header-label -->
          <div class="chat-header-icon chat-close">
            <i class="material-icons">close</i>
          </div>
          <!-- /.chat-close -->
        </div>
        <!-- /.chat-hrader -->



        <div id="conversations-container">

          <div id="conversations-rows">
            @if( ! auth()->check() )

            <div id="chat-ask-guest">
              <div>
                <p style="text-align: center;">لتتمكن من إستخدام المحادثات</p>

                <div>
                  <a href="/users/login?url={{ $_SERVER['REQUEST_URI'] }}" class="btn btn-lg btn-success">
                    تسجيل الدخول
                  </a>
                </div>

                <div>
                  <a href="/users/register" class="btn btn-lg btn-info">
                    إنشاء حساب
                  </a>
                </div>

              </div>
            </div>

            @endif
          </div>

        </div>
        <!-- /#conversations-container -->


      </div>
      <!-- /#all-conversations -->






      <div id="conversations-bottom-label">{{$_SERVER['SERVER_NAME']}}</div>







    </div>
    <!-- /#chat-container -->

  </div>
  <!-- /#chat-widget -->






  </div>{{-- /#content-wrapper --}}
  </div>
  <!-- /#app -->













  @if( ! auth()->check() )
  @php($userID = 0)
  @else
  @php($userID = auth()->user()->id)
  @endif

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    window.userID = '{!! $userID !!}';
        window.ToastLoading = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timerProgressBar: true,
            onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        window.Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
  </script>
  <script src="{{ asset($asset_path.'js/app.js') }}"></script>
  <script src="{{ asset($asset_path.'js/chat.js') }}"></script>


  {{-- @yield('footer') --}}

  <style>
    body.swal2-toast-shown .swal2-container.swal2-top-end,
    body.swal2-toast-shown .swal2-container.swal2-top-right {
      top: 0px !important;
    }

    .lds-ellipsis div {
      background: #97C371;
    }
  </style>


  {{-- scripts --}}
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>

  <script src="{{ asset($asset_path.'/js/pages/all-pages.js?ver=3') }}"></script>

  <script>
    $(document).ready(function(){
    const fixed_menu    = document.querySelector('#fixed-menu');
    const fixed_menu_ps = new PerfectScrollbar(fixed_menu, {
    wheelSpeed: 1,
    wheelPropagation: false,
    minScrollbarLength: 20
    });
  });
  </script>



  <script type="text/javascript" src="{{ asset($asset_path.'/js/pages/home.js') }}"></script>



  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js">
  </script>


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
        },
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


    

  });
  </script>




  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <script>
    AOS.init();
  </script>

</body>

</html>