<!DOCTYPE html>
<html>
    <head>
    <title>SMS Sending Web App</title>  
    <meta charset="utf8">
    <meta name="viewport" content="widhth=initial-width, initial-scale=1.0, shrink-to-fit=no" >
    <meta http-equiv="x-ua-compatible" content="ie-edge">

    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" >
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="background">
            <div class="container">
                <h1>Web App to Send Message Using <br>PHP [MSG91 API]</h1>
                <div class="screen"> 
                    <div class="screen-item">
                        <form action="" method="POST">
                            <div class="app-form">
                                <div class="app-form-group">
                                    <label for="number" class="label">Mobile Number</label><br>
                                    <input type="text" id="number" name="number" class="app-form-number" placeholder="Enter Number">
                                </div>
                                <div class="app-form-group">
                                    <label for="message" class="label">Message</label>
                                    <textarea type="text" id="message" name="message" class="app-form-message" placeholder="Enter Your Message here..."></textarea>
                                </div>
                                <div class="app-form-group">
                                    <button type="submit" name="submit" class="app-form-button">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>

</html>
<?php
 $authkey= "352902AFWCtfDz6013049bP1";

 $senderId = "ROKSAN";

if(isset($_POST['submit']))
{
    $mobileNumber= $_POST['number'];
    $msg= $_POST['message'];
   
    $message= urlencode($msg);

    $route='default';

    $postData = array(
        'authkey' => $authkey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'default' => $route
    );
    
    $url="http://api.msg91.com/api/httpsms.php";


    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "$url",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $postData,
    CURLOPT_HTTPHEADER => array(
        "authkey: your_auth_key",
        "content-type: multipart/form-data"
    ),
));

$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} 
else 
{
    echo $response;
}
}

?>
                        
