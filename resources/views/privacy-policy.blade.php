@extends('layouts.app-pages')



@section('header')
@parent

<title>Privacy Policy</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/questions.css?v1') }}">


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
        <h1>سياسة الخصوصية</h1>
        <p>سياسة الخصوصية الخاصة بالموقع</p>

      </div>
    </div>
    <!-- /.sec-intro-side -->

    <div class="sec-intro-side sec-intro-icon-side">
      <img style="width:80%;height:80%;" src="{{ asset($asset_path.'/images/privpol.svg') }}" alt="">
    </div>
    <!-- /.sec-intro-side -->

  </div>


</div>




<div id="questions-wrapper" class="y-col">


  <h1 class="text-center" style="margin: 50px auto;">يتم تحديدها لاحقا</h1>


</div>


@endsection
@endsection





@section('footer')
@parent



<script type="text/javascript">
  $(document).ready(function () {
    $('.collapse').collapse()
  });
</script>




<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
  AOS.init();
</script>



@endsection