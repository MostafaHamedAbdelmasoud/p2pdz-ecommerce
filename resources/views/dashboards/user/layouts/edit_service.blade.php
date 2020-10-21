<h3 class="element_content_container_label"># {{ trans('dashboard.edit_service') }}</h3>


<div id="edit_service_tab_box" class=" element_content_container">
  <div class="service_box">


    

    <div class="form-group">
      <label>عنوان الخدمة :</label>
      <input type="text" class="form-control" id="edit_service_label">
      <small class="form-text text-muted">أدخل عنواناً واضحاً يصف الخدمة التي تريد أن تقدمها</small>
    </div>



    <div class="form-group">

      <label>التصنيف :</label>

      <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 com-xs-6">
          <select name="service_main_cat" id="edit_service_main_cat" class="form-control" style="font-family: 'Tajawal'">
            <option selected disabled>إختر التصنيف الأساسى</option>
            <option value="money">أموال</option>
            <option value="credit">رصيد موبايل</option>
          </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 com-xs-6">

          <select name="service_sub_cat" id="edit_service_sub_cat" class="form-control" style="font-family: 'Tajawal'">
            <option selected disabled>إختر التصنيف الفرعى</option>

            {{-- @if( count($currencies) > 0)
              @foreach( $currencies as $currency )
                <option class="service_sub_cat_opt sub_cat_opt_money" value="{{ $currency->title }}">{{ $currency->title }}</option>
              @endforeach
            @else 
              <option disabled>لا يوجد تصنيفات فرعية فى هذا القسم حاليا</option>
            @endif --}}



            {{-- @if( count($credits) > 0)
              @foreach( $credits as $credit )
                <option class="service_sub_cat_opt sub_cat_opt_credit" value="{{ $credit->title }}">{{ $credit->title }}</option>
              @endforeach
            @else 
              <option disabled>لا يوجد تصنيفات فرعية فى هذا القسم حاليا</option>
            @endif --}}


            

          </select>

        </div>
      </div>




    </div>



    
    <div class="form-group">
      <label>الكمية المتاحة :</label>
      <input type="number" class="form-control" id="edit_service_quantity">
      <small class="form-text text-muted">الكمية المتاحة - مثال : 100 دولار أو 50 دينار .. إلخ - إكتب الرقم فقط</small>
    </div>






    <div class="form-group">
      <label>وصف الخدمة :</label>
      <textarea class="form-control" id="edit_service_desc" rows="3" placeholder="وصف الخدمة"></textarea>
      <small class="form-text text-muted">أدخل وصف الخدمة بدقة يتضمن جميع المعلومات والشروط . يمنع وضع البريد
        الالكتروني،
        رقم الهاتف أو أي معلومات اتصال أخرى.</small>
    </div>




    <div class="form-group">
      <label>صورة الخدمة :</label>
      <input type="file" class="form-control-file" id="edit_service_image">
      <small class="form-text text-muted">اختيار صورة مصممة بشكل جيد ستظهر خدمتك بشكل احترافي وتزيد من مبيعاتك</small>
    </div>






    <div class="form-group">
      <label>الكلمات المفتاحية :</label>
      <input type="text" class="form-control" id="edit_service_tags">
      <small class="form-text text-muted">ضع فصلة بين الكلمات المفتاحية</small>
    </div>





    <div class="form-group">
      <label>المدة المتوقعه للتسليم :</label>
      <select id="edit_service_time" class="form-control" style="font-family: 'Tajawal'">
        <option selected disabled>إختر مدة التسليم</option>
        <option value="ساعة">ساعه</option>
        <option value="6 ساعات">6 ساعات</option>
        <option value="12 ساعة">12 ساعة</option>
        <option value="يوم">يوم</option>
        <option value="يومان">يومان</option>
        <option value="ثلاثة أيام">ثلاثة أيام</option>
        <option value="أربعة أيام">أربعة أيام</option>
        <option value="خمسة أيام">خمسة أيام</option>
        <option value="ستة أيام">ستة أيام</option>
        <option value="أسبوع">أسبوع</option>
        <option value="أسبوعان">أسبوعان</option>
        <option value="ثلاثة أسابيع">ثلاثة أسابيع</option>
        <option value="شهر">شهر</option>


      </select>
      <small class="form-text text-muted"> يستطيع المشتري إلغاء الخدمة مباشرة في حال التأخر بتسليم الخدمة في الموعد
        المحدد</small>
    </div>






    <div class="form-group">
      <label>تعليمات للمشترى :</label>
      <textarea class="form-control" id="edit_service_requirments" rows="3"></textarea>
      <small class="form-text text-muted">المعلومات التي تحتاجها من المشتري لتنفيذ الخدمة.</small>
    </div>



    {{-- 

    <div id="addNewNotificationBtnContainer"
      style="text-align:left;margin:10px 0;padding:10px 0;">
      <button onclick="window.App.ServiceController().addService()"
        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent dash-btn">
        {{ trans('dashboard.add_service') }} &nbsp;<i class="material-icons">add</i>
      </button>
    </div>


 --}}




  </div>
</div>