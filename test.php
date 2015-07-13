<?php
	// CFG
	require_once('gapi/src/Google/autoload.php');
	session_start();
	$CLIENT_ID = '647823329107-nj4chsddrg94o1ivl338dui4ktc2mn5j.apps.googleusercontent.com';
	$CLIENT_SECRET = 'RR2ReyNYxspXk3jbYhl_VeLf';
	$REDIRECT_URI = 'http://localhost/test.php';

	define('APPLICATION_NAME', 'Google Calendar API Quickstart');
	define('CREDENTIALS_PATH', '~/.credentials/calendar-api-quickstart.json');
	define('CLIENT_SECRET_PATH', 'client_secret.json');

	/**
	 * Returns an authorized API client.
	 * @return Google_Client the authorized client object
	 */
	function getClient() {
	  $client = new Google_Client();
	  $client->setApplicationName(APPLICATION_NAME);
	  $client->setScopes("https://www.googleapis.com/auth/calendar");
	  $client->setAuthConfigFile(CLIENT_SECRET_PATH);
	  $client->setAccessType('offline');

	  // Load previously authorized credentials from a file.
	  $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
	  if (file_exists($credentialsPath)) {
	    $accessToken = file_get_contents($credentialsPath);
	  } else {
	    // Request authorization from the user.
	    $authUrl = $client->createAuthUrl();
	    printf("Open the following link in your browser:\n%s\n", $authUrl);
	    print 'Enter verification code: ';
	    $authCode = $_GET['code'];

	    // Exchange authorization code for an access token.
	    $accessToken = $client->authenticate($_GET['code']);

	    // Store the credentials to disk.
	    if(!file_exists(dirname($credentialsPath))) {
	      mkdir(dirname($credentialsPath), 0700, true);
	    }
	    file_put_contents($credentialsPath, $accessToken);
	    printf("Credentials saved to %s\n", $credentialsPath);
	  }
	  $client->setAccessToken($accessToken);

	  // Refresh the token if it's expired.
	  if ($client->isAccessTokenExpired()) {
	    $client->refreshToken($client->getRefreshToken());
	    file_put_contents($credentialsPath, $client->getAccessToken());
	  }
	  return $client;
	}

	function expandHomeDirectory($path) {
	  $homeDirectory = getenv('HOME');
	  if (empty($homeDirectory)) {
	    $homeDirectory = getenv("HOMEDRIVE") . getenv("HOMEPATH");
	  }
	  return str_replace('~', realpath($homeDirectory), $path);
	}

	// Get the API client and construct the service object.
	$client = getClient();
	$service = new Google_Service_Calendar($client);
	echo "<h2>Nadchodzące zdarzenia</h2>";

	// Wyloguj sie
	if (isset($_REQUEST['logout'])) 
	{
  		unset($_SESSION['access_token']);
	}

	if (isset($_GET['code'])) 
	{
  		$client->authenticate($_GET['code']);
  		$_SESSION['access_token'] = $client->getAccessToken();
  		$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  		header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
	}


	// Print the next 10 events on the user's calendar.
	$calendarId = 'primary';
	$optParams = array(
	  'maxResults' => 10,
	  'orderBy' => 'startTime',
	  'singleEvents' => TRUE,
	  'timeMin' => date('c'),
	);
	$results = $service->events->listEvents($calendarId, $optParams);

	if (count($results->getItems()) == 0) {
	  print "No upcoming events found.\n";
	} else {
	  print "Upcoming events:\n";
	  foreach ($results->getItems() as $event) {
	    $start = $event->start->dateTime;
	    if (empty($start)) {
	      $start = $event->start->date;
	    }
	    printf("%s (%s)\n", $event->getSummary(), $start);
	  }
	}


?>