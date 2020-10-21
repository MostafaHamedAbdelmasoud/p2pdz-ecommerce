<h3 class="element_content_container_label"># {{ trans('dashboard.notifications') }}</h3>



<div id="notifications_tab_box" class="notifications_container element_content_container">


  <div id="addNewNotificationBtnContainer"
    style="text-align:left;border-bottom:1px solid #DDD;margin:10px 0;padding:10px 0;">
    <button onclick="App.NotificationController().addNotification()"
      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent dash-btn">
      إضافة إشعار &nbsp;<i class="material-icons">add</i>
    </button>
  </div>

  <table id="all_notifications_table" class="display table-bordered table dataTable_table table-striped table-hover"
    style="width:100%;border-radius: 4px;
overflow: hidden;">
    <thead class="thead-dark">
      <tr>

        <th>delete_token</th>
        <th>الإشعار</th>
        <th>تم إشعارهم</th>
        <th>مشاهدات</th>
        <th>التوقيت</th>
        <th>عمليات</th>
        <th>إرسال لكل الإيميلات</th>

      </tr>
    </thead>
    <tbody>



    </tbody>
    <tfoot>
      <tr>


        <th>delete_token</th>
        <th>الإشعار</th>
        <th>تم إشعارهم</th>
        <th>مشاهدات</th>
        <th>التوقيت</th>
        <th>عمليات</th>
        <th>إرسال لكل الإيميلات</th>


      </tr>
    </tfoot>
  </table>


</div>