<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=en-us"/>
    <title>Testing Form</title>
    <style>
        body {
            padding: 20px;
        }
        .input {
            width: 400px;
            height: 40px;
            font-size: 20px;
            margin: 10px;
        }
        a {
            color: white !important;
        }
        .btn {
            margin: 10px;
        }
    </style>
    <script>
        var telescopeConfig = {
            debug: true,
            stage: 'production',
        };
    </script>
    <script src="https://cdn.belunar.com/telescope/client.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>

<?php if ( isset( $_REQUEST['your_name']) ) : ?>

    <button class="btn btn-primary"><a href="/local.php">Local Heirial 2 Search</a></button>
    <button class="btn btn-primary"><a href="/test.html">test</a></button>
<form method="post" action="index.php">
        <input class="input" type="text" name="your_name" placeholder="Heirial ID" autofocus/>
        <input name="name" />
        <input name="email" />
        <input name="phone" />
        <textarea name="comments"></textarea>
        <input class="btn btn-danger" type="submit" value="Send Data!"/>
    </form>
    
<?php 
var_dump($_COOKIE);
$telescope = $_COOKIE['telescope'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$comments = $_REQUEST['comments'];
    $ch = curl_init();
    $curlConfig = array(
        CURLOPT_URL => 'https://api-qa.belunar.com/shuttle/intake?api_key=075fe54c-1ef1-41f8-a3ed-a279d2073974',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'test' => $name,
            'but' => 'maybe not',
            'telescope_id' => $telescope,
            'telescopesdg' => $telescope
        ))
    );
    curl_error($ch);
    curl_setopt_array($ch, $curlConfig);
    curl_exec($ch);
    curl_close($ch);

    $ID = str_replace(' ', '', $_REQUEST['your_name']);
    $testID = '-';
    $pos = strpos($ID, $testID);


    $message = '
    <html>
        <head>
            <title>Title Here</title>
        </head>
        <body>
        <p>Name: ' . $name . '</p>
        <p>Email Address: ' . $email . '</p>
        <p>Phone Number: ' . $phone . '</p>
        <p>Comments: ' . $comments . '</p>
    ';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <noreply@KOPhotos.com>' . "\r\n";

    $message = wordwrap($message, 70);
    // mail("johnsdavis95@gmail.com", "New Potential Client on Site!", $message, $headers);
    // $apiUrl = file_get_contents('localhost:3000/visits/1');
    $test = json_decode($apiUrl);
    if ($pos === 9) {
        $api = 'http://heirial-api.herokuapp.com/' . urlencode($ID) . '/visits.json';
        $response  = file_get_contents($api);
        $obj  = json_decode($response, true);
        highlight_string("<?php\n\$data =\n" . var_export($obj, true) . ";\n?>\n");

    } else if ($pos === 8) {
        $api = 'https://api.heirial.com/v2/visitors/' . urlencode($ID) . '/visits';
        $response  = file_get_contents($api);
        $obj  = json_decode($response, true);
        highlight_string("<?php\n\$data =\n" . var_export($obj, true) . ";\n?>\n");

    }
?>

<?php else: ?>

<div id="wrapper">
    <button class="btn btn-primary"><a href="/local.php">Local Heirial 2 Search</a></button>
    <button class="btn btn-primary"><a href="/test.html">test</a></button>
    <form method="post" action="index.php">
        <input class="input" type="text" name="your_name" placeholder="Heirial ID" autofocus/>
        <input name="name" />
        <input name="email" />
        <input name="phone" />
        <textarea name="comments"></textarea>
        <input class="btn btn-danger" type="submit" value="Send Data!"/>
    </form>
    

<?php endif; ?>
</div>
</body>
</html>