<footer id="page-footer" style="">

  <div id="page-footer-content" class="y-col">



    <div id="footer-info" style="">
      <div>
        <a href="/common-questions">&#10070; الأسئلة الشائعة</a>
        <a href="/privacy-policy">&#10070; سياسة الخصوصية</a>
        <a href="/terms-conditions">&#10070; الشروط و الأحكام</a>
        <a href="/?location=about">&#10070; عن الموقع</a>
      </div>
      
      <div>
        <a href="/all-services?main_category=money">&#10070; عروض العملات</a>
        <a href="/all-services?main_category=credit">&#10070; عروض الرصيد</a>
        <a href="/?location=packs">&#10070; الباقات</a>
      </div>

      <div>

        <div id="ft-social">

          <div>
            <a target="_blank" href="{{$settings->facebook}}">
              <img class="lazyload blur-up"  data-src="{{ asset($asset_path.'/images/fb-footer.svg')}}" alt="">
            </a>
          </div>
          <div>
            <a target="_blank" href="{{$settings->instagram}}">
              <img class="lazyload blur-up"  data-src="{{ asset($asset_path.'/images/in-footer.svg')}}" alt="">
            </a>
          </div>
          <div>
            <a target="_blank" href="{{$settings->twitter}}">
              <img class="lazyload blur-up"  data-src="{{ asset($asset_path.'/images/tw-footer.svg')}}" alt="">
            </a>
          </div>
          <div>
            <a target="_blank" href="{{$settings->youtube}}">
              <img class="lazyload blur-up"  data-src="{{ asset($asset_path.'/images/yo-footer.svg')}}" alt="">
            </a>
          </div>

          
        </div>



        <div>
          <table>
            <tr>
              <td><i class="fab fa-whatsapp"></i></td>
              <td>{{$settings->phone}}</td>
            </tr>
            <tr>
              <td><i class="far fa-envelope"></i></td>
              <td>{{$settings->email}}</td>
            </tr>
          </table>
        </div>
      

      </div>

    </div>

    <div id="footer-image"
      style='background-image: url({{ asset($asset_path."images/homepage/sect-intro-icon.svg") }})'>

    </div>


  </div>

  <div id="copy-rights" class="y-col">
    <div><a href=""><i class="fas fa-code"></i> WEBBOX</a></div>
    <div>&copy; 2020 , All Rights Reserved</div>
  </div>

</footer>