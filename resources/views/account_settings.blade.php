@extends('layouts.app-pages')



@section('header')
@parent

<title>إعدادات الحساب</title>

<link rel="stylesheet" href="{{ asset($asset_path.'css/app.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/all-pages.css?v1') }}">
<link rel="stylesheet" href="{{ asset($asset_path.'css/pages/add_service.css?v1') }}">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


<style>
  #settings-wrapper {
    display: flex;
    flex-wrap: wrap;
  }


  .setting-box {
    width: 48%;
    margin: 1%;
    border: 1px solid #DDD;
    min-height: 100px;
    border-radius: 5px;
    padding: 5px 5px 10px;
  }


  .setting-label {
    height: 40px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #DDD;
    width: 100%;
    font-weight: 600;
  }

  .setting-label span {
    margin: 0 10px;
  }


  .setting-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    height: calc(100% - 40px);
    padding-top: 10px;
  }

  .setting-content>div {
    width: 100%;
    justify-content: center;
    text-align: center;
  }

  #profile-picture .progress {
    display: none;
  }


  @media screen and (max-width: 800px) {

    #page-content .y-col {
      width: calc(100% - 20px);
    }

  }

  /* /media 800px */

  @media screen and (max-width: 745px) {

    .setting-box {
      width: 98%;
      margin-top: 20px;
    }



  }

  /* /media 745px */
</style>

@endsection





@section('content')
@parent





@section('page-content')



<div class="y-col">



  <h3 id="page-title">
    <img src="https://img.icons8.com/wired/64/000000/settings.png" /> &nbsp; إعدادات الحساب
  </h3>



  @if( auth()->check() )





  <div id="settings-wrapper">






    <div class="setting-box" id="user-info">

      <div class="setting-label">
        <span class="material-icons">perm_identity</span>
        بيانات المستخدم
      </div>

      <div class="setting-content" style="padding: 20px 20px 10px">


        <div class="form-group" style="margin: 0px auto 10px;">
          <label style="display: block;text-align:justify;font-size: 18px;" for="name">إسم المستخدم</label>
          <input type="email" class="form-control" id="name" value="{{auth()->user()->name}}">
        </div>
        
        <div class="form-group" style="margin: 0px auto 10px;">
          <label style="display: block;text-align:justify;font-size: 18px;" for="name">نبذة مختصرة عن المستخدم</label>
          <textarea name="bio" id="bio" class="form-control" >{{auth()->user()->bio}}</textarea>
       
        </div>



        <button class="btn btn-success btn-lg">حفظ البيانات</button>

      </div>

    </div>
    <!-- /.setting-box -->


    

    <div class="setting-box" id="user-location">

      <div class="setting-label">
        <span class="material-icons">public</span>
        الدولة / المدينه
      </div>

      <div class="setting-content" style="padding: 20px 20px 10px">


        

        <div class="form-group" style="margin: 0px auto 10px;">
          <label style="display: block;text-align:justify;font-size: 18px;" for="user_country">الدولة</label>

          @php($countries = \App\Country::orderBy('name', 'asc')->get())

          <select name="country" id="country" class="form-control">

            @foreach( $countries as $country )

            @if( auth()->user()->country == $country->name )
            <option value="{{$country->name}}" selected>{{$country->name}}</option>
            @else
            <option value="{{$country->name}}">{{$country->name}}</option>
            @endif

            @endforeach
          </select>


        </div>

        <div class="form-group" style="margin: 0px auto 10px;">
          <label style="display: block;text-align:justify;font-size: 18px;" for="city">المدينة</label>
          <input type="email" class="form-control" id="city" value="{{auth()->user()->city}}">

        </div>

        <button class="btn btn-success btn-lg">حفظ البيانات</button>

      </div>

    </div>
    <!-- /.setting-box -->









    <div class="setting-box" id="change-password">

      <div class="setting-label">
        <span class="material-icons">vpn_key</span>
        تغيير الرقم السرى
      </div>

      <div class="setting-content">
        <button class="btn btn-success btn-lg">إضغط هنا لتغير الرقم السرى</button>
      </div>
      <!-- /.setting-content -->

    </div>
    <!-- /.setting-box -->


    <div class="setting-box" id="profile-picture">

      <div class="setting-label">
        <span class="material-icons">wallpaper</span>
        تغيير صورة الحساب
      </div>

      <div class="setting-content">

        <div>
          <input style="line-height: 26px !important;padding: 3px 5px !important;" type="file" name="profile-pic"
            class="form-control" id="profile-picture-input">
        </div>


        <div>
          <div class="progress" style="margin: 10px auto;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
              aria-valuemin="0" aria-valuemax="100" style="width: 75%;background-color: #38c172;"></div>
          </div>
          <button class="btn btn-success btn-lg">حفظ الصورة</button>
        </div>


      </div>

    </div>
    <!-- /.setting-box -->






  </div>
  <!-- /#settings-wrapper -->







  @else

  <div id="login-register">
    قم <a href="/users/login?url={{ $_SERVER['REQUEST_URI'] }}">بتسجيل الدخول</a> / <a href="/users/register">إنشاء
      حساب</a>
    لتتمكن من رؤية الصفحة
  </div>

  <div id="go-home-wrapper">
    <a href="/">العودة إلى الصفحة الرئيسية <span class="material-icons">home</span></a>
  </div>



  @endif



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

  

    $('#change-password button').on('click', function(){
      
      Swal.fire({
        title: "تغيير الرقم السرى",
        showCancelButton: true,
        confirmButtonText:"حفظ",
        cancelButtonText: "إلغاء",
        customClass: {
        confirmButton: 'btn btn-success btn-lg m-3',
        cancelButton: 'btn btn-danger btn-lg',
        },
        buttonsStyling: false,
        showLoaderOnConfirm: true,
        html:
        `<input id="old_password" type="password" placeholder="الرقم السرى القديم" class="form-control change_password_field text-center">
        <input id="new_password" type="password" placeholder="الرقم السرى الجديد" class="form-control change_password_field text-center">
        <input id="new_password_confirmation" type="password" placeholder="تأكيد الرقم السرى الجديد" class="form-control change_password_field text-center">`,

        preConfirm: () => {

        var old_password = $("#old_password").val();
        var new_password = $("#new_password").val();
        var new_password_confirmation = $("#new_password_confirmation").val();

        if (! old_password || ! new_password || ! new_password_confirmation ) {
            Swal.showValidationMessage('Please fill in all fields')   
        } else {
        
            return axios.put('/users/'+window.userID+'/password', {
            logged_in : true,
            user_id   : window.userID,
            old_password : old_password,
            new_password : new_password,
            new_password_confirmation : new_password_confirmation,
            })
            .then(function (response) {
            if(response.data.error==1){
                throw new Error(response.data.message)
            }
            return response.data;
            }).catch(error => {
            Swal.showValidationMessage(
                `${error}`
            )
            });

        }
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.value) {
        window.Toast.fire({
          icon: 'success',
          title: result.value.message
        })
      }
    })
    });
    
    




    $('#profile-picture button').on('click', function(){
      
      $("#profile-picture .progress > div").css({ width: '0%' });

      var form = new FormData();
      form.append('image', $('#profile-picture-input').prop('files')[0]);


      axios.post('/users/profile-picture', form, {
        headers: {
          'Content-Type': 'multipart/form-data'
        },
        onUploadProgress: (progressEvent) => {
          if (progressEvent.lengthComputable) {

            //console.log(progressEvent.loaded + ' ' + progressEvent.total);
            var progress = ((progressEvent.loaded / progressEvent.total) * 100) + '%';

            $("#profile-picture .progress ").addClass('d-block');

            $("#profile-picture .progress > div").css({ width: progress });

          }
        }
      }).then(function (response) {

        $("#profile-picture .progress ").removeClass('d-block');
        $('#profile-picture-input').val(null);
        

        if (response.data.error == 0) {

          window.Toast.fire({
            icon: 'success',
            title: response.data.message,
          })

        } else {

          window.Toast.fire({
            icon: 'error',
            title: response.data.message,
          })

        }
      });

    });




    $("#user-info button").click(function(){
      

   

      var user_name = $("#name").val();
      var user_bio = $("#bio").val();

      axios.post('/users/update-info', {
       
        user_name:user_name,
        user_bio:user_bio,

      }).then(function (response) {

        if (response.data.error == 0) {

          window.Toast.fire({
            icon: 'success',
            title: response.data.message,
          })

        } else {

          window.Toast.fire({
            icon: 'error',
            title: response.data.message,
          })

        }
      });


    });





    $('#user-location button').on('click', function(){
      

      var user_country = $("#country").val();
      var user_city = $("#city").val();

      axios.post('/users/update-location', {

        user_country:user_country,
        user_city:user_city,

      }).then(function (response) {

        if (response.data.error == 0) {

          window.Toast.fire({
            icon: 'success',
            title: response.data.message,
          })

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

<script src="{{ asset($asset_path.'/js/pages/add_service.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>



@endsection