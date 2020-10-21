@extends('layouts.app-pages')



@section('header')
@parent

<title>Common Questions</title>

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
        <h1>الأسئلة الشائعة</h1>
        <p>قسم الدعم و الإستفسارات</p>

      </div>
    </div>
    <!-- /.sec-intro-side -->

    <div class="sec-intro-side sec-intro-icon-side">
      <img style="width:80%;height:80%;" src="{{ asset($asset_path.'/images/questions/questions.svg') }}" alt="">
    </div>
    <!-- /.sec-intro-side -->

  </div>


</div>




<div id="questions-wrapper" class="y-col">


  @if($questions->count()>0)

  <div class="accordion" id="accordionExample">
    @foreach( $questions as $question )

    <div class="card">
      <div class="card-header" id="heading-{{ $question->id }}">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $question->id }}"
            aria-expanded="true" aria-controls="collapse-{{ $question->id }}">
            <i class="fas fa-genderless"></i> {{$question->question}}
          </button>
        </h2>
      </div>

      <div id="collapse-{{ $question->id }}" class="collapse show" aria-labelledby="heading-{{ $question->id }}"
        data-parent="#accordionExample">
        <div class="card-body">
          {{$question->answer}}
        </div>
      </div>
    </div>

    @endforeach
  </div>

  @else

  <div id="noQuestions">
  {{ trans('pages.questions.no_questions') }} <img src="{{ asset($asset_path.'/images/not-found.svg')}}" alt="">
  </div>

  @endif



  <div id="contact-mod">
    

    إذا كان إستفسارك غير موجود , إضغط هنا <span class="offer-user-chat" data-partner="1" data-partner-name="Admin">
      <i class="fab fa-facebook-messenger" style="color:#97C371;margin:0 7px;font-size: 25px;font-weight:normal;"></i>
    </span>  للتواصل مع الإدارة
  </div>


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