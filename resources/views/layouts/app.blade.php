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

    @yield('header')
    <link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}" />


</head>

<body>

<!--    <div style="height: 80px;
    background-color: #292929;
    font-size: 25px;
    text-align: center;
    color: #FFF;">نعتذر إذا واجهتك بعض المشكلات , جارى تحديث الموقع</div>-->



    <div id="app" class="">

        <div id="content-wrapper">

            <div class="blur-content"></div>

            @yield('content')



            <div id="toggleChat">
                <div>
                    <i class="fab fa-facebook-messenger"></i>
                    <div id="toggleChat-counter">
                        @if(auth()->check())
                        @php($countUnread = \DB::table('chat_messages')->distinct('chat_message_id')->where('to_user_id', auth()->user()->id)->where('seen', 0)->count())
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



                                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                        for="demo-menu-lower-right">
                                        <li class="mdl-menu__item"> إبلاغ عن مشكلة &nbsp; <i
                                                class="fas fa-exclamation-triangle"></i></li>
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
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 75%"></div>
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
                                        <li id="chat-add-image-btn" class="mdl-menu__item">إرسال صورة &nbsp; <i
                                                class="far fa-image"></i></li>
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
                                            <a href="/users/login?url={{ $_SERVER['REQUEST_URI'] }}"
                                                class="btn btn-lg btn-success">
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
        </div>
    </div>
    <!-- /#app -->













    @if( ! auth()->check() )
    @php($userID = 0)
    @else
    @php($userID = auth()->user()->id)
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js">
    </script>
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


    @yield('footer')
</body>

</html>