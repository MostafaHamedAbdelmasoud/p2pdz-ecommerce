<h3 class="element_content_container_label"># {{ trans('dashboard.statics') }}</h3>


<div id="statics_tab_box" class="element_content_container">
  <p style="font-size: 20px;margin-bottom: 20px;border-bottom: 1px dashed #DDD;padding-bottom:10px;text-align:justify;">


  {{ \Carbon\Carbon::now()->translatedFormat('l j F Y |  H:i') }}

    {{-- {{date('l jS \of F Y')}} --}}
  </p>
  <div class="statics-wrapper">





    <div class="statics-boxes">



      <div class="one-static-wrapper">
        <div class="one-static">المستخدمون &nbsp;&nbsp;<i class="fas fa-users"></i></div>
        <div class="one-static-info">
          <div class="one-static-total">
            @php( $countUsers = \App\User::all() )
            {{$countUsers->count()}}
          </div>
          <div class="one-static-details">
            <table>
              <tr>
                <td>بائع</td>
                <td>{{$countUsers->where('user_type', 1)->count()}}</td>
              </tr>
              <tr>
                <td>مشترى</td>
                <td>{{$countUsers->where('user_type', 0)->count()}}</td>
              </tr>
              <tr>
                <td>إدارة</td>
                <td>{{$countUsers->where('user_type', 10)->count()}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- /.one-static -->





      <div class="one-static-wrapper">
        <div class="one-static">الخدمات &nbsp;&nbsp;<i class="fas fa-layer-group"></i></div>
        <div class="one-static-info">
          <div class="one-static-total">
            @php($countServices = \App\Service::all())
            {{ $countServices->count() }}
          </div>
          <div class="one-static-details">
            <table>
              <tr>
                <td>جديدة</td>
                <td>{{ $countServices->where('availability', 0)->count() }}</td>
              </tr>
              <tr>
                <td>فعالة</td>
                <td>{{ $countServices->where('availability', 1)->count() }}</td>
              </tr>
              <tr>
                <td>متوقفة</td>
                <td>{{ $countServices->where('availability', 0)->where('reviewed' , 1)->count() }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- /.one-static -->






      <div class="one-static-wrapper">
        <div class="one-static">الزيارات &nbsp;&nbsp;<i class="fas fa-chalkboard-teacher"></i></div>
        <div class="one-static-info">
          <div class="one-static-total">
            500
          </div>
          <div class="one-static-details">
            <table>
              <tr>
                <td>اليوم</td>
                <td>100</td>
              </tr>
              <tr>
                <td>البارحة</td>
                <td>300</td>
              </tr>
              <tr>
                <td>الشهر</td>
                <td>400</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- /.one-static -->



      <div class="one-static-wrapper">
        <div class="one-static">الشكاوى &nbsp;&nbsp;<i class="fas fa-exclamation-triangle"></i></div>
        <div class="one-static-info">
          <div class="one-static-total">
            @php($countIssues = \App\orderIssue::all())
            {{ $countIssues->count() }}
          </div>
          <div class="one-static-details">
            <table>
              <tr>
                <td>جارية</td>
                <td>{{ $countIssues->where('state', 0)->count() }}</td>
              </tr>
              <tr>
                <td>منتهية</td>
                <td>{{ $countIssues->where('state', '<>', 0)->count() }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- /.one-static -->



      
      <div class="one-static-wrapper">
        <div class="one-static"> الأقسام &nbsp;&nbsp;<i class="fas fa-stream"></i></div>
        <div class="one-static-info">
          <div class="one-static-total">
            2
          </div>
          <div class="one-static-details">
            <table>
              <tr>
                <td>أموال</td>
                <td>{{\App\Service::where('main_category', 'money')->count()}} خدمة</td>
              </tr>
              <tr>
                <td>رصيد</td>
                <td>{{\App\Service::where('main_category', 'credit')->count()}} خدمة</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- /.one-static -->



    </div>
    <!-- /.statics-boxes -->




    <div class="statics-rows">


      <div class="static-row">
        <div class="static-row-label">
          الأكثر مشاهدة
        </div>
        <div class="static-row-content">
          <a href="das">بيع رصيد باى بال بيع رصيد باى بال بيع رصيد باى بال بيع رصيد باى بال </a>
        </div>
      </div>
      <!-- /.static-row -->


      <div class="static-row">
        <div class="static-row-label">
          الأكثر مبيعا
        </div>
        <div class="static-row-content">
          <a href="das">بيع رصيد باى بال بيع رصيد باى بال بيع رصيد باى بال بيع رصيد باى بال </a>
        </div>
      </div>
      <!-- /.static-row -->



    </div>
    <!-- /.statics-rows -->




  </div>
  <!-- /.statics-wrapper -->

</div>