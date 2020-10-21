<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Font Awesome Icon Picker plugin for Bootstrap</title>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-85082661-5"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-85082661-5');
  </script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/css/fontawesome-iconpicker.min.css"
    rel="stylesheet">


  <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <style>
    footer {
      font-style: italic;
      background: #f7f7f7;
      padding: 60px;
      text-align: center;
      margin-top: 60px;
    }

    pre {
      text-align: left;
    }

    .form-control,
    .form-group {
      position: relative;
    }

    p.lead {
      max-width: 800px;
      margin: 0 auto 20px auto;
    }

    div.lead {
      margin: 30px 0;
    }

    a.action-placement {
      margin: 0 4px 4px 4px;
      display: inline-block;
      /*border-bottom: 1px dotted #428BCA;*/
      text-decoration: none;
    }

    a.action-placement.active {
      color: #5CB85C;
    }

    .form-group {
      text-align: left;
      margin-bottom: 30px;
    }

    .form-group label {
      display: block;
      margin-bottom: 15px;
    }

    .lead iframe {
      display: inline-block;
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <div class="container" style="text-align: center">
    <h1 class="page-header">Font Awesome Icon Picker</h1>

    <p class="lead">
      Font Awesome Icon Picker is a fully customizable plugin for Twitter Bootstrap,
      with a powerful base API, based on
      <a href="https://itsjavi.com/bootstrap-popover-picker" target="_blank">Bootstrap Popover Picker</a>
    </p>
    <div class="lead">

      <a class="btn btn-warning" href="https://github.com/itsjavi/fontawesome-iconpicker">
        <i class="fab fa-github"></i> Source Code
      </a>

      <a class="btn btn-primary" href="https://github.com/itsjavi/fontawesome-iconpicker/releases">
        <i class="fas fa-download"></i> Download
      </a>

      <a class="btn btn-primary" target="_blank"
        href="https://chrome.google.com/webstore/detail/font-awesome-icon-picker/mcepmpclbgahgbpcgbmnpplcfmlaiopm">
        <i class="fas fa-puzzle-piece"></i> Google Chrome extension
      </a>
    </div>
    <p class="lead">
      You can use Font Awesome or another font icon set of your choice (icon options and items are customizable).
    </p>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Demos</h2>
      </div>
      <div class="panel-body">
        <p class="lead">
          <i class="fa fa-graduation-cap fa-3x picker-target"></i>
        </p>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label>Default</label>
              <input class="form-control icp icp-auto" value="fas fa-anchor" type="text" />
            </div>
            <div class="form-group">
              <label>As a component</label>

              <div class="input-group">
                <input data-placement="bottomRight" class="form-control icp icp-auto" value="fas fa-archive"
                  type="text" />
                <span class="input-group-addon"></span>
              </div>
            </div>
            <div class="form-group">
              <label>With the input as a search box</label>
              <input class="form-control icp icp-auto" data-input-search="true" value="fas fa-plane" type="text" />
            </div>
            <div class="form-group">
              <label>Inside dropdowns</label>
              <div class="btn-group">
                <button data-selected="graduation-cap" type="button"
                  class="icp icp-dd btn btn-default dropdown-toggle iconpicker-component" data-toggle="dropdown">
                  Dropdown <i class="fa fa-fw"></i>
                  <span class="caret"></span>
                </button>
                <div class="dropdown-menu"></div>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-primary iconpicker-component"><i
                    class="fa fa-fw fa-heart"></i></button>
                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fa-car"
                  data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu"></div>
              </div>
              <p class="help-block"><br>
                Note: In dropdowns the placement is controlled by the Bootstrap dropdown plugin
              </p>
            </div>
            <div class="form-group">
              <label data-title="Inline picker" data-placement="inline" class="icp icp-auto"
                data-selected="fa-align-justify">
                Inline mode, without input:
              </label>
            </div>
          </div>
          <div class="col-md-7">
            
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <button class="btn btn-danger action-destroy">Destroy instances</button>
        <button class="btn btn-default action-create">Create instances</button>
      </div>
    </div>
  </div>
  <footer>
    created by <a href="https://itsjavi.com" target="_blank">Javi Aguilar</a>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js">
  </script>
  <script>
    $(document).ready(function(){

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
        
          $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
              e.iconpickerInstance.options.iconBaseClass + ' ' +
              e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
      });

    });/* /ready() */
            
 
  </script>
</body>

</html>