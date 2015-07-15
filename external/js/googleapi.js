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
	var pre_test = document.getElementById('output');
	var calendar = document.getElementById('calendarPanel');
    var authorizeDiv = document.getElementById('authorize-div');
    authorizeDiv.style.display = 'inline';
   	if (authResult && !authResult.error) 
    {
        // Hide auth UI, then load client library.
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
        'timeMin': (new Date()).toISOString(),
        'showDeleted': false,
        'singleEvents': true,
        'maxResults': 10,
        'orderBy': 'startTime'
    });

    //alert((new Date()).toISOString());

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
              if (!when) 
              {
                when = event.start.date;
              }
              appendPre(event.summary + ' (' + when + ')')
            }
        } 
        else 
        {
            appendPre('No upcoming events found.');
        }

    });
}

      /**
       * Append a pre element to the body containing the given message
       * as its text node.
       *
       * @param {string} message Text to be placed in pre element.
       */
function appendPre(message) {
    var pre = document.getElementById('output');
    var textContent = document.createTextNode(message + '\n');
    pre.appendChild(textContent);
}