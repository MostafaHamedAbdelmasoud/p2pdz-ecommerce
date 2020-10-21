<h3 class="element_content_container_label"># {{ trans('dashboard.questions') }}</h3>



<div id="questions_tab_box" class="questions_container element_content_container">

    <div class="add_new_button_container">
        <button onclick="App.QuestionController().addQuestion()"
            class="dash-btn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            إضافة سؤال &nbsp;<i class="material-icons">add</i>
        </button>
    </div>


    <table id="questions_table" class="display table-bordered table dataTable_table table-striped table-hover" style="width:100%;border-radius: 4px;
  overflow: hidden;">
        <thead class="thead-dark">
            <tr>

                <th>ID</th>
                <th>سؤال</th>
                <th>جواب</th>
                <th>عمليات</th>

            </tr>
        </thead>
        <tbody>



        </tbody>
        <tfoot>
            <tr>


                <th>ID</th>
                <th>سؤال</th>
                <th>جواب</th>
                <th>عمليات</th>


            </tr>
        </tfoot>
    </table>

</div>