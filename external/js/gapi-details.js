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

function handleAuthResult(authResult) 
{
  //alert(authResult.access_token);
	//var pre_test = document.getElementById('output');
	//var calendar = document.getElementById('calendarPanel');
    //var authorizeDiv = document.getElementById('authorize-div');
    //authorizeDiv.style.display = 'inline';
   	if (authResult && !authResult.error) 
    {
        // Hide auth UI, then load client library.

        gapi.auth.setToken({
          access_token: authResult.access_token,
          expires_in: "3600"
        });

        //authorizeDiv.style.display = 'none';
        //calendar.style.display = '';
        //pre_test.style.display = '';
        loadCalendarApi();
    } 
    else 
    {
        // Show auth UI, allowing the user to initiate authorization by
        // clicking authorize button.
        //authorizeDiv.style.display = 'inline';
       	//calendar.style.display = 'none';
       	//pre_test.style.display = 'none';
    }
}

function loadCalendarApi() 
{
    gapi.client.load('calendar', 'v3', getDetailsOfItem);
}

function getDetailsOfItem()
{
	var id = getUrlVars()["id"];
	var request = gapi.client.calendar.events.get({calendarId: 'primary', eventId: id});
	
	// Jest
	request.execute(function(resp) 
	{
		var agent007 = {start: resp.start.dateTime, end: resp.end.dateTime, summary: resp.summary};
		document.getElementById('result').innerHTML = JSON.stringify(agent007);
	});
}

function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	vars[key] = value;
	});
	return vars;
}