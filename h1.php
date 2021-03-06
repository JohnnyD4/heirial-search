<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=en-us"/>
    <title>Testing Form</title>
    <style>
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
        const telescopeConfig = {
            debug: true,
            stage: 'http://localhost:3000',
        };
    </script>
    <script src="https://cdn.belunar.com/telescope/client.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<?php if ( isset( $_REQUEST['your_name']) ) : ?>
<!-- <style>
        .input {
            width: 400px;
            height: 40px;
            font-size: 20px;
        }
        .btn {
            width: 100px;
            margin: 20px;
        }
    </style> -->
    <!-- <!-- <button class="btn btn-success"><a href="/h1.php">Heirial 1 Search</a></button> -->
    <button class="btn btn-primary"><a href="/local.php">Local Heirial 2 Search</a></button>
<form method="post" action="h1.php">
        <input class="input" type="text" name="your_name" placeholder="Heirial 1 ID" />
        <input class="btn btn-danger" type="submit" value="Send Data!"/>
    </form>
    
<?php 
    $ID = $_REQUEST['your_name'];
    $testID = '-';
    $pos = strpos($ID, $testID);
    if ($pos === 9) {
        $api = 'http://heirial-api.herokuapp.com/' . urlencode($ID) . '/visits.json'; 
        
            // echo $api;
            $response  = file_get_contents($api);
            $obj  = json_decode($response, true);
            // echo gettype($obj);
            // echo json_encode($obj, JSON_PRETTY_PRINT);
            highlight_string("<?php\n\$data =\n" . var_export($obj, true) . ";\n?>\n");
            // print_r($obj);
            // var_dump($obj);
    } else if ($pos === 8) {
        $api = 'https://api.heirial.com/v2/visitors/' . urlencode($ID) . '/visits?mostRecent=true';
        
            // echo $api;
            $response  = file_get_contents($api);
            $obj  = json_decode($response, true);
            // echo gettype($obj);
            // echo json_encode($obj, JSON_PRETTY_PRINT);
            highlight_string("<?php\n\$data =\n" . var_export($obj, true) . ";\n?>\n");
            // print_r($obj);
            // var_dump($obj);
    }

    
    
    
?>

   
<?php else: ?>

<div id="wrapper">
    <button class="btn btn-success"><a href="/index.php">Heirial 2 Search</a></button>
    <button class="btn btn-primary"><a href="/local.php">Local Heirial 2 Search</a></button>
    <form method="post" action="h1.php">
        <input class="input" type="text" name="your_name" placeholder="Heirial 1 ID"/>
        <input class="btn btn-danger" type="submit" value="Send Data!"/>
    </form>
    
</div>
<?php endif; ?>

</body>
</html>