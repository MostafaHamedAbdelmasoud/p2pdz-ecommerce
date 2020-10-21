<h3 class="element_content_container_label"># {{ trans('dashboard.currencies') }}</h3>


<div id="currencies_tab_box" class="currencies_container element_content_container">


  <div class="add_new_button_container">
    <button onclick="App.CurrencyController().addCurrency()"
      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent dash-btn">
      {{ trans('dashboard.add_currency') }} &nbsp;<i class="material-icons">add</i>
    </button>
  </div>

  <table id="currencies_table" class="display table-bordered table dataTable_table table-striped table-hover" style="width:100%;border-radius: 4px;
  overflow: hidden;">
    <thead class="thead-dark">
      <tr>

        <th>ID</th>
        <th>الأيقونة</th>
        <th>العملة</th>
        <th>{{ trans('dashboard.operations') }}</th>

      </tr>
    </thead>
    <tbody>



    </tbody>
    <tfoot>
      <tr>


        <th>ID</th>
        <th>الأيقونة</th>
        <th>العملة</th>
        <th>{{ trans('dashboard.operations') }}</th>


      </tr>
    </tfoot>
  </table>

</div>