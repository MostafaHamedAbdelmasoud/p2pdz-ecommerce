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
            <a id="account_services_link" href="/account/{{auth()->user()->id}}">
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

                        <a href="/dashboard"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit()">
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