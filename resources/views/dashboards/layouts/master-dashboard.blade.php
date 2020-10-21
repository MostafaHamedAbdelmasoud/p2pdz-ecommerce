@extends('layouts.app')

@section('header')

<style>
  html,
  body {
    overflow: hidden !important;
    padding: 0 !important;
    margin: 0 !important;
  }
</style>


<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css"
  href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.20/r-2.2.3/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css" />
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<link rel="stylesheet" href="{{ asset($asset_path.'css/dashboards/all-dashboards.css') }}" />








{{-- <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet"> --}}

{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/css/fontawesome-iconpicker.min.css"
  rel="stylesheet">
 --}}


@endsection



@section('content')
@parent



{{-- <div class="btn-group">
  <button data-selected="graduation-cap" type="button"
    class="icp icp-dd btn btn-default dropdown-toggle iconpicker-component" data-toggle="dropdown">
    Dropdown <i class="fa fa-fw"></i>
    <span class="caret"></span>
  </button>
  <div class="dropdown-menu"></div>
</div>

<div style="display:none;">
  <button class="btn btn-danger action-destroy">Destroy instances</button>
  <button class="btn btn-default action-create">Create instances</button>
</div>
 --}}
@endsection

@section('footer')
@parent




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.20/r-2.2.3/datatables.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="{{ asset($asset_path.'js/dashboards/all-dashboards.js') }}"></script>




{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>

 --}}
<script>
  
  /* $(document).ready(function(){

      $('.action-destroy').on('click', function () {
                $.iconpicker.batch('.icp.iconpicker-element', 'destroy');
            });
            // Live binding of buttons
            $(document).on('click', '.action-placement', function (e) {
                $('.action-placement').removeClass('active');
                $(this).addClass('active');
                $('.icp-opts').data('iconpicker').updatePlacement($(this).text());
                e.preventDefault();
                return false;
            });
            $('.action-create').on('click', function () {
                $('.icp-auto').iconpicker();

                $('.icp-dd').iconpicker({
                    //title: 'Dropdown with picker',
                    //component:'.btn > i'
                });
                $('.icp-opts').iconpicker({
                    title: 'With custom options',
                    icons: [
                        {
                            title: "fab fa-github",
                            searchTerms: ['repository', 'code']
                        },
                        {
                            title: "fas fa-heart",
                            searchTerms: ['love']
                        },
                        {
                            title: "fab fa-html5",
                            searchTerms: ['web']
                        },
                        {
                            title: "fab fa-css3",
                            searchTerms: ['style']
                        }
                    ],
                    selectedCustomClass: 'label label-success',
                    mustAccept: true,
                    placement: 'bottomRight',
                    showFooter: true,
                    // note that this is ignored cause we have an accept button:
                    hideOnSelect: true,
                    // fontAwesome5: true,
                    templates: {
                        footer: '<div class="popover-footer">' +
                                '<div style="text-align:left; font-size:12px;">Placements: \n\
                                <a href="#" class=" action-placement">inline</a>\n\
                                <a href="#" class=" action-placement">topLeftCorner</a>\n\
                                <a href="#" class=" action-placement">topLeft</a>\n\
                                <a href="#" class=" action-placement">top</a>\n\
                                <a href="#" class=" action-placement">topRight</a>\n\
                                <a href="#" class=" action-placement">topRightCorner</a>\n\
                                <a href="#" class=" action-placement">rightTop</a>\n\
                                <a href="#" class=" action-placement">right</a>\n\
                                <a href="#" class=" action-placement">rightBottom</a>\n\
                                <a href="#" class=" action-placement">bottomRightCorner</a>\n\
                                <a href="#" class=" active action-placement">bottomRight</a>\n\
                                <a href="#" class=" action-placement">bottom</a>\n\
                                <a href="#" class=" action-placement">bottomLeft</a>\n\
                                <a href="#" class=" action-placement">bottomLeftCorner</a>\n\
                                <a href="#" class=" action-placement">leftBottom</a>\n\
                                <a href="#" class=" action-placement">left</a>\n\
                                <a href="#" class=" action-placement">leftTop</a>\n\
                                </div><hr></div>'
                    }
                }).data('iconpicker').show();
            }).trigger('click');


            // Events sample:
            // This event is only triggered when the actual input value is changed
            // by user interaction
            $('.icp').on('iconpickerSelected', function (e) {
              alert('hello')
                $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                    e.iconpickerInstance.options.iconBaseClass + ' ' +
                    e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
            });

    });
     */
    
    /* /ready() */
            
 
</script>




@endsection