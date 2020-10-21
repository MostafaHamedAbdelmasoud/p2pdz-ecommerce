@extends('layouts.app-pages')



@section('header')
@parent

<title>شكوى رقم - {{ $issue->id }} / {{$order->label}}</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/order.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


<style>
  #issue-title {
    border-bottom: 1px solid #DDD;
    color: red;
    padding-bottom: 15px;
  }

  #buyer-message {
    color: #FFF;
    background-color: #f17575;
  }


  #closed-case{
    text-align: center;
    background-color: #EEE;
    font-size: 20px;
    padding: 20px 0;
    color: red;
  }
  #closed-case img{
    margin: 0 10px;
  }

</style>


@endsection





@section('content')
@parent





@section('page-content')


<div class="y-col">

  @if( auth()->check() )

  @if( auth()->user()->id == $order->user_id or auth()->user()->id == $seller->id or auth()->user()->user_type==10 )



  <div id="order-container" class="y-col">


    <h3 id="issue-title"><img src="https://img.icons8.com/cute-clipart/64/000000/warning-shield.png" /> شكوى</h3>

    <div id="order-id">

      <div>


        <table>

          <tr>
            <td><i class="fas fa-barcode"></i></td>
            <td>كود الطلب</td>
            <td>: #{{ $order->id }}</td>
          </tr>

          <tr>
            <td><span class="material-icons">show_chart</span></td>
            <td> حالة الطلب</td>
            <td>

             
              @if( $order->state == 1)
              : جارى
              @elseif( $order->state == 2)
              : إنتهى
              @elseif( $order->state == 3)
              : ملغى
              @else
              : غير معلوم
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
            <a target="_blank" href="/orders/{{$order->id}}"><i class="fas fa-external-link-alt"></i> &nbsp;
              {{ $service->label }}</a>
          </div>

        </div>



      </div>
      <!-- /#service-info -->




      <div id="buyer-message" class="order-reply post">



        <div class="order-reply-user">
          <div class="post-user-image">
            <div class="post-image-circle">
              @php( $issueUser = \App\User::find($issue->user_id) )
              <img
                src="{{ ($issueUser->getMedia('avatar')->first()) ? $issueUser->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                alt="">
            </div>
          </div>
          <div class="">
            <p>{{ $issueUser->name}}</p>
            <p>{{ $issue->created_at->calendar() }}</p>
          </div>
        </div>
        <!-- /.order-reply-user -->

        <div class="order-reply-text">
          {{ $issue->issue }}
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

      @if($issue->state==0)
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

      @if( auth()->user()->user_type== 10 )

      <hr>

      <button class="btn btn-danger btn-lg" id="close-case">إغلاق الحالة &nbsp; <i class="fas fa-lock"></i></button>

      @endif

      <div class="d-none" id="closed-case">تم إغلاق الحالة بواسطة الإدارة <img src="https://img.icons8.com/color/40/000000/closed-sign.png"/></div>

      @else

      <div id="closed-case">تم إغلاق الحالة بواسطة الإدارة <img src="https://img.icons8.com/color/40/000000/closed-sign.png"/></div>

      @endif



      

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
      قم <a href="/users/login?url=/complaints/{{ $issue->id }}">بتسجيل الدخول</a> لتتمكن من تصفح الشكوى
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




<script>
  window.orderID = '{!! $order->id !!}';
  
  window.issueID = '{!! $issue->id !!}';



  $(document).ready(function(){


    



    
  });
</script>

<script src="{{ asset($asset_path.'/js/pages/issue.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>





@endsection