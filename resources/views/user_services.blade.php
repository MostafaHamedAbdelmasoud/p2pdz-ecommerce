@extends('layouts.app-pages')



@section('header')
@parent

<title>خدمات المستخدم <?= (auth()->check()) ?  " - " . auth()->user()->name :  '' ?></title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/add_service.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />



<style>
  #orders-wrapper {
    display: flex;
  }

  #filters {
    width: 200px;
    text-align: justify;
    padding: 0 10px;
    border-right: 1px solid #DDD;
  }

  [dir='rtl'] #filters {
    border-right: none;
    border-left: 1px solid #DDD;
  }

  #filters h4 {
    display: flex;
    align-items: center;
    font-size: 20px;
    padding: 10px 0;
    color: rgb(129, 184, 80);
    font-weight: 600;
  }

  #filters>div {
    border-top: 1px dashed #DDD;
    padding: 10px;
    font-size: 16px;
  }

  #orders-container {
    width: 100%;
    padding: 10px;
  }

  .order-row a {
    text-align: justify;
    padding: 20px 10px;
    border-bottom: 1px solid #DDD;
    display: flex;
    width: 100%;
  }

  .service-user {
    width: 60px;
  }

  .service-user img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
  }

  .service-info {
    width: calc(100% - 60px);
    padding: 0 10px;
  }

  .service-label {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 100%;
    border-bottom: 1px solid #DDD;
    font-size: 18px;
    padding: 5px 0;
  }

  .order-details {
    display: flex;
    color: dimgrey;
    font-size: 16px;
  }

  .order-details>div {
    margin: 0 10px;
    display: flex;
    align-items: center;
    padding-top: 5px;
  }

  .order-details>div>span {
    font-size: 15px;
    margin: 0 5px;
  }

  #no-records {
    text-align: center;
    font-size: 22px;
    color: salmon;
    padding: 50px 0;
  }

  .offer-user-chat {
    display: none
  }

  .service-state {
    font-size: 14px !important;
    text-align: justify;
    direction: ltr;
    padding: 5px 0;
    display: flex;
    align-items: center;
  }

  [dir='rtl'] .service-state {
    direction: rtl;
  }

  .service-rate {
    text-align: justify;
    direction: ltr;
  }

  [dir='rtl'] .service-rate {
    direction: rtl !important;
  }

  #orders-container {
    justify-content: flex-start !important;
  }

  #user-info-wrapper {
    display: flex;
    border-bottom: 1px dashed #DDD;
    flex-wrap: wrap;
  }

  #user-pic {
    width: 200px;
    text-align: center;
    margin: auto;
  }
  #user-pic img{
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    object-fit: cover;
  }

  #user-info {
    width: calc(100% - 200px);
    min-width: 360px;
    text-align: justify;
    display: flex;
    flex-wrap: wrap;
    text-transform: capitalize;
  }

  #user-info>div {
    
  }
  #user-info>div:nth-of-type(1){
    width: 180px;
  }
  #user-info>div:nth-of-type(1) > div{
    margin: 15px auto;
    font-size: 20px;
  }

  #user-info>div:nth-of-type(2){
    padding: 15px 35px;
    width: calc( 100% - 180px );
    min-width: 200px;
  } 
  #user-info>div:nth-of-type(2) > div{
    margin: 15px auto;
  }

  @media  screen and ( max-width: 1000px ){
    
    #user-info-wrapper > div{
      width: 100%;
    }

    #user-info > div{
      width: 100% !important;
      text-align: center
    }

  }
</style>




@endsection





@section('content')
@parent





@section('page-content')


<div class="y-col">





  <div id="user-info-wrapper">

    <div id="user-pic">
      <img
        src="{{ ($user->getMedia('avatar')->first()) ? $user->getMedia('avatar')->first()->getUrl('card') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
        alt="">
    </div>

    <div id="user-info">

      <div>
        <div>{{$user->name}}</div>
        <div>
          @for($i=1; $i <= 5; $i++) @if($user->rate >= $i)
            @php($starClass = 'active-star')
            @else
            @php($starClass = '')
            @endif


            <i class="fas fa-star {{$starClass}}"></i>
            @endfor
        </div>


        <div>
          @if(auth()->check())
          @if( auth()->user()->id == $user->id )
          @php($joinClass = 'offer-user-chat-false')
          @else
          @php($joinClass = 'offer-user-chat')
          @endif
          @else
          @php($joinClass = 'offer-user-chat')
          @endif

          <button style="font-size: 16px;width: 160px;" class="{{$joinClass}} btn btn-success btn-lg" data-partner="{{$user->id}}" data-partner-name="{{$user->name}}">تواصل مع
            البائع</button>
        </div>


      </div>

      <div>
        <div><i class="fas fa-flag"></i>&nbsp;&nbsp;{{($user->country!="")? $user->country: 'غير محدد'}} , <i class="fas fa-street-view"></i>&nbsp;&nbsp;{{ ($user->city !="")? $user->city : 'غير محدد' }}</div>
        <div>{{($user->bio!="")? $user->bio: ''}}</div>
      </div>

    </div>

  </div>
  <!-- /#user-info-wrapper -->



  <div id="orders-wrapper">


    @if( $services->count() > 0 )





    <div id="orders-container" class="offers-wrapper">


      @foreach( $services as $service )









      <div class="one-offer">


        <div class="offer-user">

          <div class="offer-user-image">
            <div class="user-image-circle">
              <img
                src="{{ ($service->user->getMedia('avatar')->first()) ? $service->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png' }}"
                alt="">
            </div>
            <!-- /.user-image-circle -->
            @if($service->user->verified==1)
            @php($verifiedClass=' verified')
            @else
            @php($verifiedClass='')
            @endif
            <div class="offer-user-verified {{$verifiedClass}}"><span class="material-icons">verified_user</span>
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
                <div class="service-state">

                  <span class="material-icons">show_chart</span> &nbsp;

                  @if($service->availability == 0)
                  جارى المراجعة
                  @elseif( $service->availability == 1 )

                  @if($service->state == 1)
                  فعالة
                  @else
                  متوقفة
                  @endif

                  @endif

                </div>
              </div>
              <div class="offer-user-chat" data-partner="{{$service->user_id}}"
                data-partner-name="{{$service->user->name}}">
                <i class="fab fa-facebook-messenger"></i>
              </div>
            </div>

          </div>



        </div>{{-- /.offer-user --}}


        <a href="/services/{{ $service->id }}/{{$service->label}}">

          <div class="offer-image">
            <div>
              <img src="{{ $service->getMedia('service')->first()->getUrl('card') }}" alt="">
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
    <!-- /#orders-container -->






    @else
    <div id="orders-container">
      <div id="no-records">
        هذا الحساب لا يقدم خدمات حاليا &nbsp;&nbsp;&nbsp;<img style="width: 100px;" src="{{ asset($asset_path.'/images/not-found.svg')}}" alt="">
      </div>
      <!-- /#no-records -->
    </div>
    <!-- /#orders-container -->
    @endif

  </div>
  <!-- /#orders-wrapper -->





</div>

@endsection
@endsection





@section('footer')
@parent

<style>
  body.swal2-toast-shown .swal2-container.swal2-top-end,
  body.swal2-toast-shown .swal2-container.swal2-top-right {
    top: 0px !important;
  }

  .lds-ellipsis div {
    background: #97C371;
  }
</style>


<script>
  $(document).ready(function(){


    

    
  });
</script>

<script src="{{ asset($asset_path.'/js/pages/add_service.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>



@endsection