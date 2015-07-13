<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# Trochę rzeczy 
require_once('gapi/src/Google/autoload.php');
$CLIENT_ID = '647823329107-nj4chsddrg94o1ivl338dui4ktc2mn5j.apps.googleusercontent.com';
$CLIENT_SECRET = 'RR2ReyNYxspXk3jbYhl_VeLf';
$REDIRECT_URI = 'http://localhost/main/calendar';

define('APPLICATION_NAME', 'Google Calendar API Quickstart');
define('CREDENTIALS_PATH', '~/.credentials/calendar-api-quickstart.json');
define('CLIENT_SECRET_PATH', 'client_secret.json');

class GoogleAPI 
{
	function getTestFromPrimary($service)
	{
		$calendarId = 'primary';
		$optParams = array(
	  		'maxResults' => 10,
	  		'orderBy' => 'startTime',
	  		'singleEvents' => TRUE,
	  		'timeMin' => date('c'),
		);

		$results = $service->events->listEvents($calendarId, $optParams);
		return $results;
	}

	function createService($client)
	{
		$service = new Google_Service_Calendar($client);
		return $service;
	}

    function getClient() 
    {
	  $client = new Google_Client();
	  $client->setApplicationName(APPLICATION_NAME);
	  $client->setScopes("https://www.googleapis.com/auth/calendar");
	  $client->setAuthConfigFile(CLIENT_SECRET_PATH);
	  $client->setAccessType('offline');

	  // Load previously authorized credentials from a file.
	  $credentialsPath = $this->expandHomeDirectory(CREDENTIALS_PATH);
	  if (file_exists($credentialsPath)) {
	    $accessToken = file_get_contents($credentialsPath);
	  } else {
	    // Request authorization from the user.
	    $authUrl = $client->createAuthUrl();
	    printf("Open the following link in your browser:\n%s\n", $authUrl);
	    header("Location: $authUrl");
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
}

/* End of file GoogleAPI.php */