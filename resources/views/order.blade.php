@extends('layouts.app-pages')



@section('header')
@parent

<title>طلب رقم - {{ $order->id }} / {{$order->label}}</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/order.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />




@endsection





@section('content')
@parent





@section('page-content')


<div class="y-col">

  @if( auth()->check() )

  @if( auth()->user()->id == $order->user_id or auth()->user()->id == $seller->id )



  <div id="order-container" class="y-col">

    <div id="order-id">

      <div>


        <table>

          <tr>
            <td><i class="fas fa-barcode"></i></td>
            <td>كود الطلب</td>
            <td>: #{{ $order->id }}</td>
          </tr>


          <tr>
            <td><span class="material-icons">schedule</span></td>
            <td>مدة التنفيذ</td>
            <td>:

              @if( $service->duration == 1 )
              يوم أو أقل
              @elseif( $service->duration == 2 )
              يومان
              @elseif( $service->duration == 3 )
              ثلاثة أيام
              @elseif( $service->duration == 4 )
              أربعة أيام
              @elseif( $service->duration == 5 )
              خمسة أيام
              @elseif( $service->duration == 6 )
              ستة أيام
              @elseif( $service->duration == 7 )
              سبعة أيام
              @elseif( $service->duration == 14 )
              أسبوعان
              @elseif( $service->duration == 21 )
              ثلاثة أسابيع
              @elseif( $service->duration == 30 )
              شهر
              @endif

            </td>


          </tr>

          
          <tr>
            <td><span class="material-icons">show_chart</span></td>
            <td> حالة الطلب</td>
            <td id="order-td-state">

              @if( auth()->user()->id == $seller->id )

              <div id="order-state-wrapper">
                @if( $order->state == 1)
                <div id="runningOrder" class="order-state-btn active-seller-state">جارى</div>
                <div id="endOrder" class="order-state-btn ">إنتهى</div>
                <div id="cancelOrder" class="order-state-btn ">إلغاء</div>
                @elseif( $order->state == 2)
                <div id="runningOrder" class="order-state-btn ">جارى</div>
                <div id="endOrder" class="order-state-btn active-seller-state">إنتهى</div>
                <div id="cancelOrder" class="order-state-btn ">إلغاء</div>
                @elseif( $order->state == 3)
                <div id="runningOrder" class="order-state-btn ">جارى</div>
                <div id="endOrder" class="order-state-btn ">إنتهى</div>
                <div id="cancelOrder" class="order-state-btn active-seller-state">إلغاء</div>
                @endif



              </div>

              @else
              @if( $order->state == 1)
              : جارى
              @elseif( $order->state == 2)
              : إنتهى
              @elseif( $order->state == 3)
              : ملغى
              @else
              : غير معلوم
              @endif
              @endif



            </td>
          </tr>


          <tr>
            <td><span class="material-icons">event</span></td>
            <td>تاريخ الطلب </td>
            <td>: {{ $order->created_at->calendar() }}</td>
          </tr>

        </table>





      </div>

      <div>

        <table>

          
          
          <tr>
            <td><span class="material-icons">storefront</span></td>
            <td>البائع</td>
            <td>: {{ $seller->name }}</td>
          </tr>

          <tr>
            <td><span class="material-icons">shopping_basket</span></td>
            <td>المشترى</td>
            <td>: {{$order->user->name}}</td>
          </tr>
          
          <tr>
            <td><i class="fas fa-piggy-bank"></i></td>
            <td>الكمية </td>
            <td>
              {{$order->quantity}}
            </td>
          </tr>


          <tr>
            <td><i class="far fa-credit-card"></i></td>
            <td>السعر </td>
            <td>
              {{$order->price_desc}}
            </td>
          </tr>
          

        </table>


      </div>


    </div>


    <div id="order-conversation">


      <div id="service-info">



        <div class="order-reply post">

          <div class="order-reply-user" style="border-bottom: none;">
            <div class="post-user-image">
              <div class="post-image-circle">
                <img
                  src="{{ ($service->user->getMedia('avatar')->first()) ? $service->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                  alt="">
              </div>
            </div>
            <div class="">
              <p>{{$seller->name}}</p>
            </div>
          </div>
          <!-- /.order-reply-user -->

          <div class="order-reply-text">
            {{ $service->requirements }}
          </div>

        </div>



      </div>
      <!-- /#service-info -->




      <div id="buyer-message" class="order-reply post">



        <div class="order-reply-user">
          <div class="post-user-image">
            <div class="post-image-circle">
              <img
                src="{{ ($order->user->getMedia('avatar')->first()) ? $order->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                alt="">
            </div>
          </div>
          <div class="">
            <p>{{ $order->user->name}}</p>
            <p>{{ $order->created_at->calendar() }}</p>
          </div>
        </div>
        <!-- /.order-reply-user -->

        <div class="order-reply-text">
          {{ $order->message }}
        </div>

      </div>
      <!-- /#buyer-message -->






      <div id="order-replies">
        @foreach( $replies as $reply )
        @if($reply->user_id!=auth()->user()->id)
        @php($user_comment = 'partner-comment')
        @else
        @php($user_comment = '')
        @endif

        <div class="order-reply post {{$user_comment}}" data-comment-id="{{$reply->id}}"
          data-comment-user-id="{{$reply->user_id}}">

          <div class="order-reply-user">
            <div class="post-user-image">
              <div class="post-image-circle">
                <img
                  src="{{ ($reply->user->getMedia('avatar')->first()) ? $reply->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                  alt="">
              </div>
            </div>
            <div class="">
              <p>{{$reply->user->name}}</p>
              <p>{{$reply->created_at->calendar() }}</p>
            </div>
          </div>
          <!-- /.order-reply-user -->

          <div class="order-reply-text">
            {{ $reply->message }}
          </div>


          @if( $reply->getMedia('image')->first() )
          <div class="reply-image-wrapper">

            <div class="reply-image-icon"><i class="far fa-image"></i></div>
            <div class="reply-image-img">
              <a href="{{ $reply->getMedia('image')->first()->getUrl() }}" target="_blank">
                <img class="reply-image" src="{{ $reply->getMedia('image')->first()->getUrl('thumb') }}" alt="">
              </a>
            </div>
          </div>
          @endif

        </div>
        @endforeach
      </div>
      <!-- /#order-replies -->







    </div>
    <!-- /#conversation -->




    <div id="order-footer">

      <div id="new-reply-container">

        <textarea name="reply" id="reply" class="form-control" placeholder="ضع تعليق جديد"></textarea>


        <div class="custom-file" id="attachment">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">إختر صورة</label>
        </div>

        <div class="progress" id="progress">
          <div id="reply-progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div>


        <button class="btn btn-success" id="send-reply">إرسال <i class="far fa-paper-plane"></i></button>
        <button class="btn btn-info mx-3" id="send-image" style="color: #FFF;">+ صورة <i
            class="far fa-image"></i></button>



      </div>

      <div id="ratingAndReport">

        <div id="rateing">
          
          
          @php($orderRate = \App\ServiceRate::where('service_id', $service->id)->where('user_id', auth()->user()->id)->where('order_id', $order->id)->first() );

          @if($orderRate)
          <h3>تقييمك للخدمة</h3>
          <div id="stars">

            @for($i=1; $i <= 5; $i++) @if($orderRate->rate >= $i)
              @php($starClass = 'active-star')
              @else
              @php($starClass = '')
              @endif


              <i class="fas fa-star {{$starClass}} rated-star"></i>
              @endfor

          </div>
          @else

          <h3>قيم الخدمة</h3>
          <p style="margin-bottom: 0px">من فضلك قم بتقييم الخدمة بعد الحصول عليها</p>

          <div id="stars">
            <div id="star-1" class="star"><i class="fas fa-star"></i></div>
            <div id="star-2" class="star"><i class="fas fa-star"></i></div>
            <div id="star-3" class="star"><i class="fas fa-star"></i></div>
            <div id="star-4" class="star"><i class="fas fa-star"></i></div>
            <div id="star-5" class="star"><i class="fas fa-star"></i></div>
          </div>

          @endif



        </div>
        <!-- /#rateing -->

        <div id="report">
          <h3>هل تواجة مشكلة ؟</h3>
          <p>إذا كنت تواجة أى مشكلة تتعلق بالطلب الخاص بك قم بتقديم شكوى</p>
          <button class="btn btn-danger btn-lg" id="report-btn">الإبلاغ عن مشكلة <i
              class="fas fa-exclamation-triangle"></i></button>
        </div>

      </div>
      <!-- /#ratingAndReport -->

    </div>
    <!-- /#order-footer -->



  </div>
  <!-- /#service-container -->


  @if(auth()->user()->id == $order->user_id)
  @php($partnerID = $service->user_id)
  @elseif(auth()->user()->id == $service->user_id)
  @php($partnerID = $order->user_id)
  @endif

 

  @else

  <div style="text-align: center;">
    <p style="font-size: 20px;">
      الصفحة المطلوبة غير موجودة
      <img style="width: 40px;margin:0 10px;" src="{{ asset($asset_path.'/images/not-found.svg')}}" alt="">
    </p>
  </div>
  @php($partnerID = 0)
  @endif

  @else

  <div style="text-align: center;">
    <p>
      قم <a href="/users/login?url=/orders/{{ $order->id }}">بتسجيل الدخول</a> لتتمكن من تصفح الطلب
      <img style="width: 40px;margin:0 10px;" src="{{ asset($asset_path.'/images/not-found.svg')}}" alt="">
    </p>
  </div>

  @php($partnerID = 0)

  @endif

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


<script>
  window.orderID = '{!! $order->id !!}';
  window.orderState = '{!! $order->state !!}';
  window.partnerID = '{!! $partnerID !!}';
  window.serviceID = '{!! $service->id !!}';
  window.serviceLabel = '{!! $service->label !!}';
  window.serviceUserID = '{!! $service->user_id !!}';
  window.userReview = '{!! $userReview !!}';



  $(document).ready(function(){


    


    $(".star").hover(function(){
      
      var starID = $(this).attr('id');
      starID = parseInt(starID.split('-')[1]);
      for(i = 1; i <= starID ; i++ ){
        $('#star-'+i).addClass('active-rating');
      }
      

    },function(){
      $('.star').removeClass('active-rating');
    });

    
  });
</script>

<script src="{{ asset($asset_path.'/js/pages/order.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>





@endsection