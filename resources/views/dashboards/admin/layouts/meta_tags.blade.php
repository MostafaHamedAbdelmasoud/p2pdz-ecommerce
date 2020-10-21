<h3 class="element_content_container_label"># {{ trans('dashboard.seo') }}</h3>


<div id="meta_tab_box" class="all_seo_container element_content_container">


  <div class="add_new_button_container">
    <button onclick="App.MetaTagController().addMeta()"
      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent dash-btn">
      {{ trans('dashboard.add_meta_tag') }} &nbsp;<i class="material-icons">add</i>
    </button>
  </div>

  <table id="meta_tags_table" class="display table-bordered table dataTable_table table-striped table-hover" style="width:100%;border-radius: 4px;
  overflow: hidden;">
    <thead class="thead-dark">
      <tr>

        <th>ID</th>
        <th>وسم الميتا</th>
        <th>{{ trans('dashboard.operations') }}</th>

      </tr>
    </thead>
    <tbody>



    </tbody>
    <tfoot>
      <tr>


        <th>ID</th>
        <th>وسم الميتا</th>
        <th>{{ trans('dashboard.operations') }}</th>


      </tr>
    </tfoot>
  </table>

</div>