<div class="modal fade" id = "mainModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="event-title">Wydarzenia w dniu</h4>
          </div>
          <div id= "mod_content" class="modal-body">
            <div id = "modal-info"></div>
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

    <!-- GOOGLE API -->
    <div class="container" style="margin-bottom: 50px; margin-top: 25px; ">
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
            <div style="border-bottom:1 px #ff0000 solid; background: #333; position: absolute; width: 100%; z-index: 1; height: 35px;"> </div>
            <div id="describe" style="overflow: auto;">
              <!-- Javasript tutaj wsadzi co trzeba -->
            </div>
          </div>

        </div>
        <!-- Responsive calendar - END -->
      </div>
    </div>