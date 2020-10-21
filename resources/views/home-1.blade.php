@extends('layouts.app-pages')



@section('header')
@parent

<title>Home Page</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/home.css') }}">

@endsection





@section('content')
@parent





@section('page-content')








<div id="first-section" class="page-section">


  <div class="page-section-container" id="top-four-squares">

    <div class="top-square">1</div>
    <div class="top-square">2</div>
    <div class="top-square">3</div>
    <div class="top-square">4</div>

  </div>
  <!-- /.page-section-container -->


</div>
<!-- /#first-section -->





<div id="second-section" class="page-section-container">


  <div class="page-section-side">
    
    <h1>ما هى الخدمات التى يقدمها الموقع ؟</h1>
    <p>يقدم موقع أبجد هوز خدمات تبادل الأموال عبر البنوك الإلكترونية المختلفة و الوسائل المحلية المتنوعة , بإستطاعة أى شخص أن يقوم ببيع أو شراء الأموال بسهولة عبر موقع أبجد هوز .</p>

  </div>

  <div class="page-section-side">
    <img src="{{ asset($asset_path.'/images/homepage/section-2-main-image.svg')}}" alt="">
    <img class="rotated-circle" src="{{ asset($asset_path.'/images/homepage/animated-circle.png')}}" alt="">
  </div>



</div>
<!-- /#second-section -->







@endsection
@endsection





@section('footer')
@parent




@endsection