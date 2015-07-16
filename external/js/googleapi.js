/*
* dateTime jest tylko jeśli
* event jest tego tygodnia
* z nieznanych bliżej przyczyn
*/

var CLIENT_ID = "647823329107-nj4chsddrg94o1ivl338dui4ktc2mn5j.apps.googleusercontent.com";
var apiKey = 'AIzaSyDbe73eyg-CyOzv_T1mVrfbSlTScBCe5Zk';
var SCOPES = ["https://www.googleapis.com/auth/calendar"];

function checkAuth() 
{
	gapi.auth.authorize({
    'client_id': CLIENT_ID,
    'scope': SCOPES,
    'immediate': true}, handleAuthResult);
}

/**
* Handle response from authorization server.
*
* @param {Object} authResult Authorization result.
*/
function handleAuthResult(authResult) 
{
  //alert(authResult.access_token);
	var pre_test = document.getElementById('output');
	var calendar = document.getElementById('calendarPanel');
    var authorizeDiv = document.getElementById('authorize-div');
    authorizeDiv.style.display = 'inline';
   	if (authResult && !authResult.error) 
    {
        // Hide auth UI, then load client library.

        gapi.auth.setToken({
          access_token: authResult.access_token,
          expires_in: "3600"
        });

        authorizeDiv.style.display = 'none';
        calendar.style.display = '';
        pre_test.style.display = '';
        loadCalendarApi();
    } 
    else 
    {
        // Show auth UI, allowing the user to initiate authorization by
        // clicking authorize button.
        authorizeDiv.style.display = 'inline';
       	calendar.style.display = 'none';
       	pre_test.style.display = 'none';
    }
}

function handleAuthClick(event) 
{
    gapi.auth.authorize(
    {client_id: CLIENT_ID, scope: SCOPES, immediate: false},
    handleAuthResult);
    return false;
}

function loadCalendarApi() 
{
    gapi.client.load('calendar', 'v3', listUpcomingEvents);
}

function listUpcomingEvents() 
{
    var request = gapi.client.calendar.events.list({
        'calendarId': 'primary',
        'timeMin': (new Date(limitdays[0])).toISOString(),
        'timeMax': (new Date(limitdays[1])).toISOString(),
        'showDeleted': false,
        'singleEvents': true,
        'maxResults': 250,
        'orderBy': 'startTime'
    });

    request.execute(function(resp) 
    {
        var events = resp.items;
        appendPre('Testowe informacje o nadchodzących wydarzeniach:');

        if (events.length > 0) 
        {
            for (i = 0; i < events.length; i++) 
            {
              var event = events[i];
              var when = event.start.dateTime;
              var to_when = event.end.dateTime;
              if (!when) 
                when = event.start.date;

              if(!to_when)
                to_when = event.end.date;

              if (event.start.dateTime && event.end.dateTime)
              {
                var start_ts = Date.parse(limitdays[0]);
                var stop_ts = Date.parse(limitdays[1]);
                var current_ts = Date.parse(when);
                if(current_ts > start_ts || current_ts < stop_ts)
                {
                  var d = new Date(when);
                  var y = new Date(to_when);
                  addEventToCalendar(d.getHours(), y.getHours(), getDayTagFromDate(when), event.id);
                }
              }

              appendPre(event.summary + ' (' + when + ' - ' + to_when + ')')
            }
        } 
        else 
        {
            appendPre('No upcoming events found.');
        }

    });
}


function appendPre(message) {
    var pre = document.getElementById('output');
    var textContent = document.createTextNode(message + '\n');
    pre.appendChild(textContent);
}