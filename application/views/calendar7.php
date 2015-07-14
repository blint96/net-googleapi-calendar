<style>
/* centered columns styles */
/* Chrome, Safari, Opera */

@-webkit-keyframes startup
{
    from {
      background-color: rgba(0, 0, 0, 0.0);
      -webkit-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.0); 
      -moz-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.0);
    }
    to {
      background-color: rgba(0, 0, 0, 0.03);
      -webkit-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75); 
      -moz-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75);
    }
}

@keyframes startup
{
    from {
      background-color: rgba(0, 0, 0, 0.0);
      -webkit-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.0); 
      -moz-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.0);
    }
    to {
      background-color: rgba(0, 0, 0, 0.03);
      -webkit-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75); 
      -moz-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75);
    }
}

@-webkit-keyframes fade {
    from {background-color: rgba(0, 0, 0, 0.5);}
    to {background-color: rgba(0, 0, 0, 0.0);}
}

/* Standard syntax */
@keyframes fade {
    from {background-color: rgba(0, 0, 0, 0.5);}
    to {background-color: rgba(0, 0, 0, 0.0);}
}

.day-describe { width: 13%; display: inline-block; text-align: center; padding-top:5px; padding-bottom: 5px; }
.day-hour { border-radius: 3px; padding-top:2px; padding-bottom: 2px; color: rgba(0, 0, 0, 0.25);}
.day-hour:hover {
  color: rgba(0, 0, 0, 0.8); font-weight: bold;
  -webkit-animation-name: fade; /* Chrome, Safari, Opera */
  -webkit-animation-duration: 0.5s; /* Chrome, Safari, Opera */
  animation-name: fade;
  animation-duration: 0.5s;
}
.day-title { font-family:tahoma; font-size: 16px; font-weight: bold; margin-bottom: 10px; border-bottom: 1px rgba(0, 0, 0, 0.2) solid;}
</style>


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
    <!-- Czcionka -->
    <link href="/external/css/start.css" rel="stylesheet"/>
  </head>
  <body>
    <!-- MODAL -->
    <div class="modal fade" id = "mainModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Wydarzenia w dniu</h4>
          </div>
          <div id= "mod_content" class="modal-body">
            <p><img src="https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s320x320/e15/11313649_819656401445679_984723699_n.jpg" /></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Dodaj nowe</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- GOOGLE API -->
    <div class="container" style="margin-bottom: 100px;">
      <div class="row">
        <div id="authorize-div" style="display: none">
          <span>Authorize access to Google Calendar API</span>
          <!--Button for the user to click to initiate auth sequence -->
          <button id="authorize-button" onclick="handleAuthClick(event)">
            Authorize
          </button>
        </div>
        <pre id="output"></pre>
      </div>
    </div>
    <!-- KONIEC GOOGLE API -->

    <div class="container">
      <!-- Responsive calendar - START -->
      <div class="responsive-calendar">
        <div class="controls">
            <a class="pull-left" data-go="prev" onclick="prevWeek();"><div class="btn btn-primary">Poprzedni</div></a>
            <h4><span data-head-year></span> <span id="cweek"></span> <span data-head-month></span></h4>
            <a class="pull-right" data-go="next" onclick="nextWeek();"><div class="btn btn-primary">Następny</div></a>
        </div>
        <br><br><br>
        
        <div id="display" style=" -webkit-animation-name: startup;  -webkit-animation-duration: 0.5s; animation-name: startup; animation-duration: 0.5s;cursor:pointer; background: rgba(0, 0, 0, 0.03); text-align: center; margin-bottom: 100px; -webkit-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75); -moz-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75); box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.75);">
          <div id="describe">
            <!-- Poniedziałek -->
            <div class="day-describe">
              <div id="mon" class="day-title">pn</div>
              <div id="mon-0" class="day-content day-hour">00:00</div>
              <div id="mon-1" class="day-content day-hour">01:00</div>
              <div id="mon-2" class="day-content day-hour">02:00</div>
              <div id="mon-3" class="day-content day-hour">03:00</div>
              <div id="mon-4" class="day-content day-hour">04:00</div>
              <div id="mon-5" class="day-content day-hour">05:00</div>
              <div id="mon-6" class="day-content day-hour">06:00</div>
              <div id="mon-7" class="day-content day-hour">07:00</div>
              <div id="mon-8" class="day-content day-hour">08:00</div>
              <div id="mon-9" class="day-content day-hour">09:00</div>
              <div id="mon-10" class="day-content day-hour">10:00</div>
              <div id="mon-11" class="day-content day-hour">11:00</div>
              <div id="mon-12" class="day-content day-hour">12:00</div>
              <div id="mon-13" class="day-content day-hour">13:00</div>
              <div id="mon-13" class="day-content day-hour">14:00</div>
              <div id="mon-13" class="day-content day-hour">15:00</div>
              <div id="mon-13" class="day-content day-hour">16:00</div>
              <div id="mon-13" class="day-content day-hour">17:00</div>
              <div id="mon-13" class="day-content day-hour">18:00</div>
              <div id="mon-13" class="day-content day-hour">19:00</div>
              <div id="mon-13" class="day-content day-hour">20:00</div>
              <div id="mon-13" class="day-content day-hour">21:00</div>
              <div id="mon-13" class="day-content day-hour">22:00</div>
              <div id="mon-13" class="day-content day-hour">23:00</div>
              <div id="mon-13" class="day-content day-hour">24:00</div>
            </div>

            <!-- WTOREK -->
            <div class="day-describe">
              <div id="mon" class="day-title">wt</div>
              <div id="mon-0" class="day-content day-hour">00:00</div>
              <div id="mon-1" class="day-content day-hour">01:00</div>
              <div id="mon-2" class="day-content day-hour">02:00</div>
              <div id="mon-3" class="day-content day-hour">03:00</div>
              <div id="mon-4" class="day-content day-hour">04:00</div>
              <div id="mon-5" class="day-content day-hour">05:00</div>
              <div id="mon-6" class="day-content day-hour">06:00</div>
              <div id="mon-7" class="day-content day-hour">07:00</div>
              <div id="mon-8" class="day-content day-hour">08:00</div>
              <div id="mon-9" class="day-content day-hour">09:00</div>
              <div id="mon-10" class="day-content day-hour">10:00</div>
              <div id="mon-11" class="day-content day-hour">11:00</div>
              <div id="mon-12" class="day-content day-hour">12:00</div>
              <div id="mon-13" class="day-content day-hour">13:00</div>
              <div id="mon-13" class="day-content day-hour">14:00</div>
              <div id="mon-13" class="day-content day-hour">15:00</div>
              <div id="mon-13" class="day-content day-hour">16:00</div>
              <div id="mon-13" class="day-content day-hour">17:00</div>
              <div id="mon-13" class="day-content day-hour">18:00</div>
              <div id="mon-13" class="day-content day-hour">19:00</div>
              <div id="mon-13" class="day-content day-hour">20:00</div>
              <div id="mon-13" class="day-content day-hour">21:00</div>
              <div id="mon-13" class="day-content day-hour">22:00</div>
              <div id="mon-13" class="day-content day-hour">23:00</div>
              <div id="mon-13" class="day-content day-hour">24:00</div>
            </div>

            <!-- ŚRODA -->
            <div class="day-describe">
              <div id="mon" class="day-title">śr</div>
              <div id="mon-0" class="day-content day-hour">00:00</div>
              <div id="mon-1" class="day-content day-hour">01:00</div>
              <div id="mon-2" class="day-content day-hour">02:00</div>
              <div id="mon-3" class="day-content day-hour">03:00</div>
              <div id="mon-4" class="day-content day-hour">04:00</div>
              <div id="mon-5" class="day-content day-hour">05:00</div>
              <div id="mon-6" class="day-content day-hour">06:00</div>
              <div id="mon-7" class="day-content day-hour">07:00</div>
              <div id="mon-8" class="day-content day-hour">08:00</div>
              <div id="mon-9" class="day-content day-hour">09:00</div>
              <div id="mon-10" class="day-content day-hour">10:00</div>
              <div id="mon-11" class="day-content day-hour">11:00</div>
              <div id="mon-12" class="day-content day-hour">12:00</div>
              <div id="mon-13" class="day-content day-hour">13:00</div>
              <div id="mon-13" class="day-content day-hour">14:00</div>
              <div id="mon-13" class="day-content day-hour">15:00</div>
              <div id="mon-13" class="day-content day-hour">16:00</div>
              <div id="mon-13" class="day-content day-hour">17:00</div>
              <div id="mon-13" class="day-content day-hour">18:00</div>
              <div id="mon-13" class="day-content day-hour">19:00</div>
              <div id="mon-13" class="day-content day-hour">20:00</div>
              <div id="mon-13" class="day-content day-hour">21:00</div>
              <div id="mon-13" class="day-content day-hour">22:00</div>
              <div id="mon-13" class="day-content day-hour">23:00</div>
              <div id="mon-13" class="day-content day-hour">24:00</div>
            </div>

            <!-- CZWARTEK -->
            <div class="day-describe">
              <div id="mon" class="day-title">czw</div>
              <div id="mon-0" class="day-content day-hour">00:00</div>
              <div id="mon-1" class="day-content day-hour">01:00</div>
              <div id="mon-2" class="day-content day-hour">02:00</div>
              <div id="mon-3" class="day-content day-hour">03:00</div>
              <div id="mon-4" class="day-content day-hour">04:00</div>
              <div id="mon-5" class="day-content day-hour">05:00</div>
              <div id="mon-6" class="day-content day-hour">06:00</div>
              <div id="mon-7" class="day-content day-hour">07:00</div>
              <div id="mon-8" class="day-content day-hour">08:00</div>
              <div id="mon-9" class="day-content day-hour">09:00</div>
              <div id="mon-10" class="day-content day-hour">10:00</div>
              <div id="mon-11" class="day-content day-hour">11:00</div>
              <div id="mon-12" class="day-content day-hour">12:00</div>
              <div id="mon-13" class="day-content day-hour">13:00</div>
              <div id="mon-13" class="day-content day-hour">14:00</div>
              <div id="mon-13" class="day-content day-hour">15:00</div>
              <div id="mon-13" class="day-content day-hour">16:00</div>
              <div id="mon-13" class="day-content day-hour">17:00</div>
              <div id="mon-13" class="day-content day-hour">18:00</div>
              <div id="mon-13" class="day-content day-hour">19:00</div>
              <div id="mon-13" class="day-content day-hour">20:00</div>
              <div id="mon-13" class="day-content day-hour">21:00</div>
              <div id="mon-13" class="day-content day-hour">22:00</div>
              <div id="mon-13" class="day-content day-hour">23:00</div>
              <div id="mon-13" class="day-content day-hour">24:00</div>
            </div>

            <!-- PIĄTEK -->
            <div class="day-describe">
              <div id="mon" class="day-title">pt</div>
              <div id="mon-0" class="day-content day-hour">00:00</div>
              <div id="mon-1" class="day-content day-hour">01:00</div>
              <div id="mon-2" class="day-content day-hour">02:00</div>
              <div id="mon-3" class="day-content day-hour">03:00</div>
              <div id="mon-4" class="day-content day-hour">04:00</div>
              <div id="mon-5" class="day-content day-hour">05:00</div>
              <div id="mon-6" class="day-content day-hour">06:00</div>
              <div id="mon-7" class="day-content day-hour">07:00</div>
              <div id="mon-8" class="day-content day-hour">08:00</div>
              <div id="mon-9" class="day-content day-hour">09:00</div>
              <div id="mon-10" class="day-content day-hour">10:00</div>
              <div id="mon-11" class="day-content day-hour">11:00</div>
              <div id="mon-12" class="day-content day-hour">12:00</div>
              <div id="mon-13" class="day-content day-hour">13:00</div>
              <div id="mon-13" class="day-content day-hour">14:00</div>
              <div id="mon-13" class="day-content day-hour">15:00</div>
              <div id="mon-13" class="day-content day-hour">16:00</div>
              <div id="mon-13" class="day-content day-hour">17:00</div>
              <div id="mon-13" class="day-content day-hour">18:00</div>
              <div id="mon-13" class="day-content day-hour">19:00</div>
              <div id="mon-13" class="day-content day-hour">20:00</div>
              <div id="mon-13" class="day-content day-hour">21:00</div>
              <div id="mon-13" class="day-content day-hour">22:00</div>
              <div id="mon-13" class="day-content day-hour">23:00</div>
              <div id="mon-13" class="day-content day-hour">24:00</div>
            </div>

            <!-- SOBOTA -->
            <div class="day-describe">
              <div id="mon" class="day-title">sob</div>
              <div id="mon-0" class="day-content day-hour">00:00</div>
              <div id="mon-1" class="day-content day-hour">01:00</div>
              <div id="mon-2" class="day-content day-hour">02:00</div>
              <div id="mon-3" class="day-content day-hour">03:00</div>
              <div id="mon-4" class="day-content day-hour">04:00</div>
              <div id="mon-5" class="day-content day-hour">05:00</div>
              <div id="mon-6" class="day-content day-hour">06:00</div>
              <div id="mon-7" class="day-content day-hour">07:00</div>
              <div id="mon-8" class="day-content day-hour">08:00</div>
              <div id="mon-9" class="day-content day-hour">09:00</div>
              <div id="mon-10" class="day-content day-hour">10:00</div>
              <div id="mon-11" class="day-content day-hour">11:00</div>
              <div id="mon-12" class="day-content day-hour">12:00</div>
              <div id="mon-13" class="day-content day-hour">13:00</div>
              <div id="mon-13" class="day-content day-hour">14:00</div>
              <div id="mon-13" class="day-content day-hour">15:00</div>
              <div id="mon-13" class="day-content day-hour">16:00</div>
              <div id="mon-13" class="day-content day-hour">17:00</div>
              <div id="mon-13" class="day-content day-hour">18:00</div>
              <div id="mon-13" class="day-content day-hour">19:00</div>
              <div id="mon-13" class="day-content day-hour">20:00</div>
              <div id="mon-13" class="day-content day-hour">21:00</div>
              <div id="mon-13" class="day-content day-hour">22:00</div>
              <div id="mon-13" class="day-content day-hour">23:00</div>
              <div id="mon-13" class="day-content day-hour">24:00</div>
            </div>

            <!-- Niedzial -->
            <div class="day-describe"><div id="mon" class="day-title">nd</div>
              <div id="mon-0" class="day-content day-hour">00:00</div>
              <div id="mon-1" class="day-content day-hour">01:00</div>
              <div id="mon-2" class="day-content day-hour">02:00</div>
              <div id="mon-3" class="day-content day-hour">03:00</div>
              <div id="mon-4" class="day-content day-hour">04:00</div>
              <div id="mon-5" class="day-content day-hour">05:00</div>
              <div id="mon-6" class="day-content day-hour">06:00</div>
              <div id="mon-7" class="day-content day-hour">07:00</div>
              <div id="mon-8" class="day-content day-hour">08:00</div>
              <div id="mon-9" class="day-content day-hour">09:00</div>
              <div id="mon-10" class="day-content day-hour">10:00</div>
              <div id="mon-11" class="day-content day-hour">11:00</div>
              <div id="mon-12" class="day-content day-hour">12:00</div>
              <div id="mon-13" class="day-content day-hour">13:00</div>
              <div id="mon-13" class="day-content day-hour">14:00</div>
              <div id="mon-13" class="day-content day-hour">15:00</div>
              <div id="mon-13" class="day-content day-hour">16:00</div>
              <div id="mon-13" class="day-content day-hour">17:00</div>
              <div id="mon-13" class="day-content day-hour">18:00</div>
              <div id="mon-13" class="day-content day-hour">19:00</div>
              <div id="mon-13" class="day-content day-hour">20:00</div>
              <div id="mon-13" class="day-content day-hour">21:00</div>
              <div id="mon-13" class="day-content day-hour">22:00</div>
              <div id="mon-13" class="day-content day-hour">23:00</div>
              <div id="mon-13" class="day-content day-hour">24:00</div>
            </div>
          </div>
        </div>

      </div>
      <!-- Responsive calendar - END -->
    </div>
    <script src="/external/js/jquery.js"></script>
    <script src="/external/js/bootstrap.min.js"></script>
    <script src="/external/js/calendar7.js"></script>
    <script src="/external/js/googleapi.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=checkAuth"></script>
  </body>
