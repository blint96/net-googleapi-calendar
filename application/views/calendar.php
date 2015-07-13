
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

    <!-- <div id="test" style="background: #ccc; color: #000; margin: 30px; padding: 5px;">
      no content
    </div> -->

    <div class="container">
      <!-- Responsive calendar - START -->
      <div class="responsive-calendar">
        <div class="controls">
            <a class="pull-left" data-go="prev"><div class="btn btn-primary">Poprzedni</div></a>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
            <a class="pull-right" data-go="next"><div class="btn btn-primary">Następny</div></a>
        </div><hr/>
        <div class="day-headers">
          <div class="day header">pn</div>
          <div class="day header">wt</div>
          <div class="day header">śr</div>
          <div class="day header">czw</div>
          <div class="day header">pt</div>
          <div class="day header">so</div>
          <div class="day header">nd</div>
        </div>
        <div class="days" data-group="days">
          
        </div>
      </div>
      <!-- Responsive calendar - END -->
    </div>
    <script src="/external/js/jquery.js"></script>
    <script src="/external/js/bootstrap.min.js"></script>
    <script src="/external/js/responsive-calendar.js"></script>
    <script src="/external/js/fillday.js"></script>
    <script type="text/javascript">
      // Aktualna data
      var date = new Date();
      var current = date.getFullYear() + "-" + (date.getMonth() + 1);

      $(document).ready(function () {
        $(".responsive-calendar").responsiveCalendar({
          time: current, 
          onActiveDayClick: function(events) { $(window.location.hash).modal('toggle') },
          events: {
            <?php
              foreach($events as $event)
              {
                $start = $event['start'];
                sscanf($start,"%d-%d-%dT15:30:00+02:00",$year, $month, $day);
                if ($month < 10) { $month = "0".$month; }
                echo '"'.$year.'-'.$month.'-'.$day.'": {"number": 0, "url": "#mainModal"},';
              }
            ?>
            //"2015-07-09": {"number": 2, "url": "#mainModal"},
            //"2015-07-10": {"number": 1, "url": "#mainModal"}}
          }
        });
      });
    </script>
  </body>
