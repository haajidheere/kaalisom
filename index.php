<?php
$accessToken = "EAADlf9Kzz5EBACguUtbfEX7ZAHc92JuA831OtciXsIMmiaZCF5tUb85irsrUpSFgniozJ2iyzlXUbRPG4uou7hKpZBb1sZBa57TvKq6moZApJ2HxWVc8WQyKHLfqXFGffBfRQ4c3eCYTB7rb40Xu9YB6TLIPXZBkozB9DEhijJKl0C6VLr0mkP";

if(isset($_REQUEST['hub_challenge'])){
    $challenge = $_REQUEST['hub_challenge'];
    $token = $_REQUEST['hub_verify_token'];
}
if($token == "myCustomeToken123") {
    echo $challenge;
}
if($token == "myCustomeToken123") {
    echo $challenge;
}
$input = json_decode(file_get_contents('php://input'), true);

$userID = $input['entry'][0]['messaging']['sender']['id'];

$message = $input['entry'][0]['messaging'][0]['message']['text'];

echo $userID;
echo $message;


//------

$url = "http://graph.facebook.com/v2.6/messages?access_token=$accessToken";

$jsonData = "{
    'recipient':  {
        'id': $userID
    },
    'message': {
        'text': 'hello bro!'
    }
}";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonData);
curl_setopt($ch, CURLOPT_HEADER, ['Content-Type: application/json']);

if(!empty($input['entry'][0]['messaging'][0]['message'])) {
    curl_exec($ch);
    
}
?>
