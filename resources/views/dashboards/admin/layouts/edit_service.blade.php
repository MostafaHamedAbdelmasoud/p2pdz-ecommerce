<h3 class="element_content_container_label" style="position: relative;display:flex;align-items: center;">
  
  <div style="">
    # معاينه خدمة
  </div>
  
  <div style="font-size:15px;margin-right: auto;color: blue;">
    <a class="to_services_link" onclick="document.getElementById('current_services_tab').click()" > الخدمات الحالية</a>
    <a class="to_services_link" onclick="document.getElementById('new_services_tab').click()" >الخدمات الجديدة</a>
  </div> 

</h3>


<div id="edit_service_tab_box" class=" element_content_container">
  <div class="service_box">




    <div class="form-group">
      <label>عنوان الخدمة :</label>
      <input type="text" class="form-control" id="edit_service_label" disabled>
      <small class="form-text text-muted">أدخل عنواناً واضحاً يصف الخدمة التي تريد أن تقدمها</small>
    </div>



    <div class="form-group">

      <label>التصنيف :</label>

      <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 com-xs-6">
          <select name="service_main_cat" id="edit_service_main_cat" class="form-control" style="font-family: 'Tajawal'"
            disabled>
            <option selected disabled>إختر التصنيف الأساسى</option>
            <option value="money">أموال</option>
            <option value="credit">رصيد موبايل</option>
          </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 com-xs-6">

          <select name="service_sub_cat" id="edit_service_sub_cat" class="form-control" style="font-family: 'Tajawal'"
            disabled>
            <option selected disabled>إختر التصنيف الفرعى</option>

            {{-- @if( count($currencies) > 0)
              @foreach( $currencies as $currency )
                <option class="service_sub_cat_opt sub_cat_opt_money" value="{{ $currency->title }}">{{ $currency->title }}
            </option>
            @endforeach
            @else
            <option disabled>لا يوجد تصنيفات فرعية فى هذا القسم حاليا</option>
            @endif --}}



            {{-- @if( count($credits) > 0)
              @foreach( $credits as $credit )
                <option class="service_sub_cat_opt sub_cat_opt_credit" value="{{ $credit->title }}">{{ $credit->title }}
            </option>
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
      <input type="number" class="form-control" id="edit_service_quantity" disabled>
      <small class="form-text text-muted">الكمية المتاحة - مثال : 100 دولار أو 50 دينار .. إلخ - إكتب الرقم فقط</small>
    </div>






    <div class="form-group">
      <label>وصف الخدمة :</label>
      <textarea class="form-control" id="edit_service_desc" rows="3" placeholder="وصف الخدمة" disabled></textarea>
      <small class="form-text text-muted">أدخل وصف الخدمة بدقة يتضمن جميع المعلومات والشروط . يمنع وضع البريد
        الالكتروني،
        رقم الهاتف أو أي معلومات اتصال أخرى.</small>
    </div>






    <div class="form-group">
      <label>الكلمات المفتاحية :</label>
      <input type="text" class="form-control" id="edit_service_tags" disabled>
      <small class="form-text text-muted">ضع فصلة بين الكلمات المفتاحية</small>
    </div>





    <div class="form-group">
      <label>المدة المتوقعه للتسليم :</label>
      <select id="edit_service_time" class="form-control" style="font-family: 'Tajawal'" disabled>
        <option selected disabled>إختر مدة التسليم</option>
        
        
        <option value="1">أقل من ساعة </option>
        <option value="2">ساعة وأكثر</option>
        <option value="3">ساعتين وأكثر</option>
        <option value="5">أقل من 5 ساعات</option>
        <option value="24">أقل من 24 ساعة </option>
        <option value="48">أقل من يومين</option>
      

      </select>
      <small class="form-text text-muted"> يستطيع المشتري إلغاء الخدمة مباشرة في حال التأخر بتسليم الخدمة في الموعد
        المحدد</small>
    </div>






    <div class="form-group">
      <label>تعليمات للمشترى :</label>
      <textarea class="form-control" id="edit_service_requirments" rows="3" disabled></textarea>
      <small class="form-text text-muted">المعلومات التي تحتاجها من المشتري لتنفيذ الخدمة.</small>
    </div>





    <div style="text-align:left;margin:10px 0;padding:10px 0;">



      <button id="accept-service-btn" onclick="window.App.ServiceController().acceptService()"
        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent dash-btn">
        قبول &nbsp;<i class="material-icons">check</i>
      </button>



      <button onclick="window.App.ServiceController().deleteService('new_services_tab')"
        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-danger">
        حذف &nbsp;<i class="material-icons">delete</i>
      </button>



    </div>







  </div>
</div>