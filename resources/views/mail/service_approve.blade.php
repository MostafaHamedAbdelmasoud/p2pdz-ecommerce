<div style="padding:10px 15px 25px 15px;background-color:#EEE;">

<h1 style="text-align:right;border-bottom:1px solid #DDD;direction:rtl;color: #3F51B5;padding-bottom:5px;">مرحبا {{ $data['name'] }}</h1>
<div style="text-align: center;padding:5px;direction:rtl;margin-bottom: 20px;color:dimgrey; background-color: #fff;" >
    <img src="{{ asset($asset_path.'images/main-logo1.png') }}" style="max-height: 200px">
    <h3 style="text-align: center;padding:5px;direction:rtl;margin-bottom: 20px;color:dimgrey;">{{$data['message']}}</h3>
@if(isset($data['link']))
<a href="{{ $data['link'] }}" style="border-radius:5px;text-align: center;padding: 10px 20px;color:#3f51b5;display:inline-block;margin:auto;background-color:#3f51b5;color:#FFF;direction:ltr;margin-bottom: 20px;">{{ $data['link'] }}</a>
@endif
</div>
  
  <div style="text-align: center;direction:rtl;">

   
  </div>


  <p style="direction:rtl;text-align:center;border-top:1px solid #DDD;padding-top: 15px;color: #607D8B;margin-bottom: 0;">شكرا لك على إستخدامك موقع &nbsp;  P2PDZ.com</p>

</div>
