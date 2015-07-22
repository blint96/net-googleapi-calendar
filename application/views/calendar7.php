 <head>
    <meta charset="utf-8">
    <meta name="robots" content="All" />
    <meta name="revisit-after" content="7 days" />
    <meta name="description" content="The source of truly unique and awesome jquery plugins." />
    <meta name="keywords" content="slider, carousel, responsive, swipe, one to one movement, touch devices, jquery, plugin, bootstrap compatible, html5, css3" />
    <meta name="author" content="w3widgets.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Respomsive slider -->
    <link href="/external/css/responsive-calendar.css" rel="stylesheet">
    <link href="/external/css/calendar7.css" rel="stylesheet">
    <link href="/external/css/calendar7.css" rel="stylesheet">
    <!-- Czcionka -->
    <link href="/external/css/bootstrap-dialog.css" rel="stylesheet"/>
    <link href="/external/less/bootstrap-dialog.less" rel="stylesheet/less"/>

    <!-- Datetimer picker NOWE -->
    <link href="/external/css/bootstrap-datetimepicker.css" rel="stylesheet" />
    <link href="/external/css/bootstrap-datepicker.css" rel="stylesheet" />
  </head>
  <body>

    <!-- MODAL -->
    <div class="modal fade" id = "mainModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="event-title">Wydarzenia w dniu</h4>
          </div>
          <div id= "mod_content" class="modal-body">
            <div id = "date-placement"></div>
            <div id = "content-placement"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            <div id = "extra-buttons" style="position: relative; float: right; margin-left: 10px;"></div>
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Dodaj nowe</button> -->
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <button onclick="clearWeekEvents(); loadCalendarApiByIDAspx('smigiel.sebastian@gmail.com');"> smigiel.sebastian@gmail.com</button>
    <button onclick="clearWeekEvents(); loadCalendarApiByIDAspx('tyronegmd@gmail.com');"> tyronegmd@gmail.com</button>
    <button onclick="clearWeekEvents(); loadCalendarApiByIDAspx('sobiec1996@gmail.com');"> sobiec1996@gmail.com</button>

    <!-- GOOGLE API -->
    <div class="container" style="margin-bottom: 50px;">
      <div class="row">
        <div id="authorize-div" style="display: none">
          <span>Aby przejrzeć swój kalendarz musisz się zalogować do konta Google.</span><hr>
          <!--Button for the user to click to initiate auth sequence -->
          <button class="btn btn-primary" id="authorize-button" onclick="handleAuthClick(event)">
            Użyj konta Google™
          </button>
        </div>
        <pre id="output" style="display: none;"></pre>
      </div>
    </div>
    <!-- KONIEC GOOGLE API -->

    <div id="calendarPanel" style="display: none;">
      <div class="container">
        <!-- Responsive calendar - START -->
        <div class="responsive-calendar">
          <div class="controls">
              <a class="pull-left" data-go="prev" onclick="changeWeek('left');"><div class="btn btn-primary">Poprzedni</div></a>
              <h4><span data-head-year></span> <span id="cweek"></span> <span data-head-month></span></h4>
              <a class="pull-right" data-go="next" onclick="changeWeek('right');"><div class="btn btn-primary">Następny</div></a>
          </div>
          <br><br><br>
          
          <div id="display" style="position: relative; -webkit-animation-name: startup;  -webkit-animation-duration: 0.5s; animation-name: startup; animation-duration: 0.5s;cursor:pointer; background: rgba(0, 0, 0, 0.03); text-align: center; margin-bottom: 100px; -webkit-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75); -moz-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75); box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75);">
            <div style="border-bottom:1 px #ff0000 solid; background: #333; position: absolute; width: 100%; z-index: -1; height: 35px;"> </div>
            <div id="describe" style="overflow: auto;">
              <!-- Javasript tutaj wsadzi co trzeba -->
            </div>
          </div>

        </div>
        <!-- Responsive calendar - END -->
      </div>
    </div>
    <script>
      var datestart = "<div class='input-group date' id='datetimestart'><input type='text' class='form-control' id='start-input' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>";
      var dateend = "<div class='input-group date' id='datetimeend'><input type='text' class='form-control' id='end-input' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>";
    
      var modal = document.getElementById('date-placement');
      modal.innerHTML = datestart + "<p>" + dateend;
    </script>
    <script src="/external/js/jquery.js"></script>
    <script src="/external/js/moment.js"></script>                      <!-- nowe -->
    <script src="/external/js/bootstrap.min.js"></script>
    <script src="/external/js/bootstrap-dialog.js"></script>
    <script src="/external/js/bootstrap-datetimepicker.js"></script>    <!-- nowe -->
    <script type="text/javascript">
            $(function () {
                $('#datetimestart').datetimepicker();
                $('#datetimeend').datetimepicker();
            });
    </script>
    <script src="/external/js/calendar7.js"></script>
    <script src="/external/js/googleapi.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=checkAuth"></script>
  </body>
