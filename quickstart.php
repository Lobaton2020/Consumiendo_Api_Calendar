<?php
require __DIR__ . '/vendor/autoload.php';

if (isset($_GET["code"])) {
    echo $_GET["code"];
}
// if (php_sapi_name() != 'cli') {
//     throw new Exception('This application must be run on the command line.');
// }

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient($type = "get")
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    // if ($type == "get") {
    //     $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
    // } else {
    // }
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    if ($client->isAccessTokenExpired()) {

        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {

            $authUrl = $client->createAuthUrl();

            $authCode = "TOKEN";
            if (isset($_COOKIE["tokenCalendarGoogle"])) {
                $authCode = $_COOKIE["tokenCalendarGoogle"];
            }

            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
            return $authUrl;
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;

}

function getDataCalendar()
{
    $client = "";
    try {
        $client = getClient();
        $service = new Google_Service_Calendar($client);
        // Print the next 10 events on the user's calendar.
        $calendarId = 'primary';
        $optParams = array(
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => date('c'),
        );
        $results = $service->events->listEvents($calendarId, $optParams);
        $events = $results->getItems();

        return $events;

    } catch (Exception $e) {
        return ["url" => $client, 'error' => "Error: " . $e->getMessage()];
    }
}

function addEventCalendar($datos)
{
    try {
        $client = getClient("save");
        $service = new Google_Service_Calendar($client);
        $event = new Google_Service_Calendar_Event(array(
            'summary' => $datos["titulo"],
            'location' => '800 Howard St., San Francisco, CA 94103',
            'description' => $datos['descripcion'],
            'start' => array(
                'dateTime' => $datos["fechainicio"],
                'timeZone' => 'America/Los_Angeles',
            ),
            'end' => array(
                'dateTime' => $datos["fechafin"],
                'timeZone' => 'America/Los_Angeles',
            ),
            'recurrence' => array(
                'RRULE:FREQ=DAILY;COUNT=1',
            ),
            'attendees' => array(
                array('email' => 'lpage@example.com'),
                array('email' => 'sbrin@example.com'),
            ),
            'reminders' => array(
                'useDefault' => false,
                'overrides' => array(
                    array('method' => 'email', 'minutes' => 24 * 60),
                    array('method' => 'popup', 'minutes' => 10),
                ),
            ),
        ));

        $calendarId = 'primary';
        $event = $service->events->insert($calendarId, $event);
        return $event->htmlLin;
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}
