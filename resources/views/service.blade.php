@extends('layouts.app-pages')



@section('header')
@parent

<title>{{$service->label}}</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/service.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style>
  .offer-user-chat i {
    font-size: 18px;
    color: #FFF;
  }

  .offer-user-chat:hover i {
    color: #FFF !important;
  }
</style>

@endsection





@section('content')
@parent





@section('page-content')


<div class="y-col">



  <div id="service-container" class="y-col">



    <div id="service-header">
      <div id="seller-img">
        <div>
          <img
            src="{{ ($service->user->getMedia('avatar')->first()) ? $service->user->getMedia('avatar')->first()->getUrl('card') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
            alt="">
        </div>
      </div>
      <div id="service-label">
        <div>


          <div><i class="fas fa-tags"></i>{{ $service->label }}</div>


          <table id="service_details_table">
            <tr>
              <td><i class="far fa-credit-card"></i>&nbsp; سعر الخدمة</td>
              <td>{{ $service->price}}</td>
            </tr>
            <tr>
              <td><i class="fas fa-piggy-bank"></i>&nbsp; الكمية المتاحة</td>
              <td>{{ $service->quantity }}</td>
            </tr>
            <tr>
              <td><i class="fas fa-user-circle"></i>&nbsp; حساب البائع</td>
              <td>{{ $service->user->name }}</td>
            </tr>
            <tr>
              <td><i class="fas fa-clock"></i>&nbsp; مدة التنفيذ</td>
              <td>
                @if( $service->duration == 1 )
                أقل من ساعة
                @elseif( $service->duration == 2 )
                ساعة وأكثر
                @elseif( $service->duration == 3 )
                ساعتين وأكثر
                @elseif( $service->duration == 5 )
                أقل من 5 ساعات
                @elseif( $service->duration == 6 )
                أقل من 24 ساعة
                @elseif( $service->duration == 24 )
                أقل من 24 ساعة
                @elseif( $service->duration == 48 )
                أقل من يومين
                @endif
              </td>
            </tr>
          </table>




        </div>
      </div>

      <div id="service-buttons">
        <div>
          <a class="btn btn-success btn-lg" href="/make-order/{{ $service->id }}/{{$service->label}}">
            إطلب الخدمة <i class="fas fa-shopping-cart"></i>
          </a>


          @if(auth()->check())
          @if($service->user_id == auth()->user()->id)
          @php($owner = 'offer-user-chat-false')
          @else
          @php($owner = 'offer-user-chat')
          @endif
          @else
          @php($owner = 'offer-user-chat')
          @endif



          <div class="{{$owner}} btn btn-primary btn-lg" data-partner="{{$service->user_id}}"
            data-partner-name="{{$service->user->name}}">
            تواصل مع البائع &nbsp; <i class="fab fa-facebook-messenger"></i>
          </div>

        </div>
      </div>




    </div>



    @if(auth()->check())
    @if( auth()->user()->id == $service->user_id )
    <div id="owner-op" style="border-bottom: 1px dashed #DDD;margin-bottom: 15px;padding-bottom: 10px;">
      <a class="btn btn-primary " href="/services/{{$service->id}}/{{$service->label}}/edit">تعديل &nbsp; <i
          class="fas fa-edit"></i></a>
      <a class="btn btn-danger " href="/#" id="delete_service">حذف &nbsp;<i class="far fa-trash-alt"></i></a>
    </div>
    @endif
    @endif


    <div id="service-body">




      <div id="service-info">

        <div id="service-image">
          <img
            src="{{ ($service->getMedia('service')->first()) ? $service->getMedia('service')->first()->getUrl('banner') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
            alt="">
        </div>


        <div id="description">
          {{ $service->description }}
        </div>

        <div id="price_desc"
          style="background-color: aliceblue;padding: 10px 15px;border: 1px solid #DDD;border-radius: 3px;margin-bottom:10px;">
          سعر الخدمة : {{$service->price_desc}}
        </div>



        <div id="service-buttons-body">

          <a class="btn btn-success btn-lg" href="/make-order/{{ $service->id }}/{{$service->label}}">
            إطلب الخدمة <i class="fas fa-shopping-cart"></i>
          </a>

          <div class="{{$owner}} btn btn-primary btn-lg" data-partner="{{$service->user_id}}"
            data-partner-name="{{$service->user->name}}">
            تواصل مع البائع &nbsp; <i class="fab fa-facebook-messenger"></i>
          </div>




        </div>



        <div id="comments">

          <div id="comments-label">
            <i class="fas fa-comment-dots"></i> التعليقات
          </div>


          <div id="comments-container">


            @if(auth()->check())






            <div class="comment-wrapper">


              @if($replies->count()> 0)

              @foreach( $replies as $reply)
              @php( $reply_user = \App\User::find( $reply->user_id ) )
              <div class="comment">
                <div class="comment-user">
                  <div class="comment-user-img"><img
                      src="{{ ($reply_user->getMedia('avatar')->first()) ? $reply_user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                      alt=""> </div>
                  <div class="comment-user-info">
                    <p>{{ $reply_user->name }}</p>
                    <p>{{ $reply->created_at->calendar() }}</p>
                  </div>
                </div>
                <div class="comment-text">
                  {{ $reply->comment }}
                </div>
              </div>

              @endforeach


              @else
              <div id="no-comments-atm">لا يوجد تعليقات حاليا</div>
              @endif



            </div>






            <div id="comment-form">

              <textarea name="new-comment" id="new-comment" class="form-control" placeholder="إكتب التعليق هنا"
                style="font-size: 16px;margin-top: 50px;"></textarea>
              <hr>
              <button id="add-new-comment" class="btn btn-success btn-lg">إضافة تعليق</button>

            </div>


            @else
            <div id="comment-ask-login">
              قم <a href="/users/login?url={{ $_SERVER['REQUEST_URI'] }}"> بتسجيل الدخول </a> لتتمكن من إضافة تعليق
            </div>
            @endif

            {{-- 
            
             --}}
            {{-- /comment-wrapper --}}







          </div>

        </div>








      </div>



      <div id="serivce-details">


        <div class="serivce-detail" id="users-ratings">
          <div class="serivce-details-label">تقييم المشترين</div>
          <div class="serivce-details-content">

            <div id="stars">

              @for($i=1; $i <= 5; $i++) @if($service->rate >= $i)
                @php($starClass = 'active-star')
                @else
                @php($starClass = '')
                @endif


                <i class="fas fa-star {{$starClass}} rated-star"></i>
                @endfor

            </div>



          </div>
        </div>

        <div class="serivce-detail">
          <div class="serivce-details-label">المبيعات</div>


          <div class="serivce-details-content" id='sales'>

            <table>
              <tr>
                <td>

                  @php($orders = \App\Order::where('service_id', $service->id)->count())
                  {{$orders}}
                </td>
                <td>مرات تم بيع الخدمة</td>
              </tr>
              <tr>
                <td>
                  @php($ordersRuning = \App\Order::where('service_id', $service->id)->where('state', 1)->count())
                  {{$ordersRuning}}
                </td>
                <td>طلبات جارى تنفيذها</td>
              </tr>
            </table>




          </div>


        </div>

        <div class="serivce-detail">
          <div class="serivce-details-label">شارك الخدمة</div>
          <div class="serivce-details-content" id="share">
            @php($actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") .
            "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")

            <a target="_blank" class="fb-share" href="https://www.facebook.com/sharer/sharer.php?u={{$actual_link}}"><i
                class="fab fa-facebook-square"></i></a>


            <?php
            $text = 'I #love #scotch. The URL https://scotch.io is pretty cool!';
            $text = urlencode($text);
            $url = 'https://twitter.com/intent/tweet?text='.$text;
            ?>
            <a target="_blank" class='tw-share' href="http://twitter.com/share?text={{$service->label}}&url={{$actual_link}}
            "><i class="fab fa-twitter-square"></i></a>
            <a target="_blank" class='go-share' href=""><i class="fab fa-google-plus-square"></i></a>
            <a target="_blank" class='li-share'
              href="https://www.linkedin.com/shareArticle?mini=true&url={{$actual_link}}&title={{$service->label}}"><i
                class="fab fa-linkedin"></i></a>
          </div>
        </div>

        <div class="serivce-detail">
          <div class="serivce-details-label">وسوم الخدمة</div>
          <div class="serivce-details-content" id="tags">



            @php( $tags = explode(',', $service->tags) )

            @foreach( $tags as $tag )
            <div class="one-tag">
              # {{ $tag }}
            </div>
            @endforeach


          </div>
        </div>



      </div>




    </div>






  </div>
  <!-- /#service-container -->

</div>







<style>
  body.swal2-toast-shown .swal2-container.swal2-top-end,
  body.swal2-toast-shown .swal2-container.swal2-top-right {
    top: 0px !important;
  }

  .lds-ellipsis div {
    background: #97C371;
  }
</style>





@endsection
@endsection





@section('footer')
@parent


@if(auth()->check())
@php( $userReview = \App\Review::where('user_id', auth()->user()->id)->count() )
@else
@php( $userReview = 1 )
@endif



<script src="{{ asset($asset_path.'/js/pages/service.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
  AOS.init();

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


  window.serviceID = '{!! $service->id !!}';
  window.serviceLabel = '{!! $service->label !!}';
  window.userReview = '{!! $userReview !!}';

  $(document).ready(function(){


    
    if( getQueryVariable("action") ){
      var el = $("#new-comment").offset().top;
      window.scroll({ top: el, left: 0, behavior: "smooth" });
    }




    




    $("#add-new-comment").click(function(){
      

      ToastLoading.fire({
        icon: 'info',
        html: '&nbsp; برجاء الإنتظار<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
      });




      var reply = $("#new-comment").val();



      axios.post('/services/' + window.serviceID + '/comments',  {
        reply: reply,
      }).then(function (response) {

  

        if (response.data.error == 0) {

          window.Toast.fire({
            icon: 'success',
            title: response.data.message,
          })

          $(".comment-wrapper").append(`
            <div class="comment">
              <div class="comment-user">
                <div class="comment-user-img"><img
                  src="`+response.data.image+`"
                  alt=""> </div>
                <div class="comment-user-info">
                  <p>`+response.data.name+`</p>
                  <p>`+response.data.time+`</p>
                </div>
              </div>
              <div class="comment-text">
                `+reply+`
              </div>
            </div>
          `);

          $("#no-comments-atm").remove();
          $("#new-comment").val(null);



          if (window.userReview == 0) {
                Swal.fire({
                  title: "من فضلك قيم الموقع",
                  showCancelButton: true,
                  confirmButtonText:
                    'إرسال <i class="far fa-paper-plane"></i>',
                  cancelButtonText: "إغلاق",
                  customClass: {
                    confirmButton:
                      "btn btn-success btn-lg mx-2",
                    cancelButton:
                      "btn btn-danger btn-lg mx-2"
                  },
                  buttonsStyling: false,
                  showLoaderOnConfirm: true,
                  html: `
                <div id="site_review">
                  <textarea class="form-control" style="text-align:justify;min-height:100px;margin-bottom:15px;font-size:16px;padding:10px;" id="site_review_textarea" placeholder="قم بكتابة تقييمك هنا "></textarea>
                </div>
                `,
                  preConfirm: () => {
                    if (!$("#site_review_textarea").val()) {
                      Swal.showValidationMessage(
                        "بعض الحقول مطلوبة"
                      );
                    } else {
                      return axios
                        .post("/site-reviews", {
                          review: $(
                            "#site_review_textarea"
                          ).val()
                        })
                        .then(function (response) {
                          if (
                            response.data.error == 1
                          ) {
                            throw new Error(
                              response.data.message
                            );
                          }
                          return response.data;
                        })
                        .catch(error => {
                          Swal.showValidationMessage(
                            `${error}`
                          );
                        });
                    }
                  },
                  allowOutsideClick: () => !Swal.isLoading()
                }).then(result => {
                  if (result.value) {
                    if (result.value.error == 1) {
                      window.Toast.fire({
                        icon: "error",
                        title: result.value.message
                      });
                    } else {
                      window.Toast.fire({
                        icon: "success",
                        title: result.value.message
                      });
                    }
                  }
                });
                $("#site_review_textarea").focus();
              }

        } else {

          window.Toast.fire({
            icon: 'error',
            title: response.data.message,
          })

        }
      });
  


    });

  });


</script>





@endsection