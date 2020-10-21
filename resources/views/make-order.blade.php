@extends('layouts.app-pages')



@section('header')
@parent

<title>{{$service->label}}</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/make-order.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

@endsection





@section('content')
@parent





@section('page-content')


<div class="y-col" style="min-height: 500px;">


  <h3 id="page-label">عملية طلب خدمة</h3>

  <div id="feedback">

    @if( session()->has('error'))

    <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>خطأ!</strong> {{session('error')}}
    </div>
    @endif
  </div>

  <div id="order-wrapper">

    <div id="service-image">
      <img
        src="{{ ($service->getMedia('service')->first()) ? $service->getMedia('service')->first()->getUrl('banner') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
        alt="">
    </div>
    <!-- /#service-image -->



    <div id="service-details">

      <div id="details">
        <div id="seller">
          <img
            src="{{ ($service->user->getMedia('avatar')->first()) ? $service->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
            alt="">
          {{ $service->user->name }}
        </div>
        <!-- /#seller -->
        <div id="service-lable">
          <i class="fas fa-tags"></i> &nbsp;{{ $service->label }}
        </div>
        <!-- /#service-lable -->
      </div>


      <div id="requirements">
        <h3><i class="fas fa-receipt"></i> &nbsp;تعليمات البائع</h3>
        <div>
          {{ $service->requirements }}
        </div>
      </div>
      <!-- /#requirements -->

      <form action="/orders/{{$service->id}}" method="POST">
        @csrf
        <div id="order-inputs">

          <input type="number" name="quantity" id="quantity" placeholder="إكتب الكمية المطلوبة" class="form-control"
            style="font-size: 16px;">

          <small style="margin-bottom: 20px;display:block;font-size:14px;color:green;">الكمية المتاحة : {{$service->quantity}}</small>

          <textarea name="message" id="message" class="form-control"
            placeholder="إكتب رسالتك للبائع هنا لتوضيح ما الذى تحتاجه بشكل مفصل ومحدد"></textarea>
        </div>
        <!-- /#order-inputs -->

        <div id="order-btns">
          @if( auth()->check() )
          <button class="btn btn-success" style="font-size:16px;">
            إطلب الآن
          </button>
          @else

          <div class="alert alert-success">
            قم <a href="/users/login?url=/make-order/{{ $service->id }}/{{ $service->label }}"> &nbsp; بتسجيل الدخول</a>
            لكى تتمكن من شراء الخدمة
          </div>

          @endif
          <a href="/services/{{ $service->id }}/{{ $service->label }}" class="btn btn-primary">العودة للخدمة</a>
        </div>
        <!-- /#order-btns -->
      </form>
    </div>
    <!-- /#service-details -->


  </div>
  <!-- /#order-wrapper -->


</div>











@endsection
@endsection





@section('footer')
@parent




<script src="{{ asset($asset_path.'/js/pages/service.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
  AOS.init();
</script>



@endsection