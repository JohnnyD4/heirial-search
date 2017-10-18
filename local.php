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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<?php if ( isset( $_REQUEST['your_name']) ) : ?>

    <button class="btn btn-success"><a href="/index.php">Heirial Search</a></button>
<form method="post" action="local.php">
        <input class="input" type="text" name="your_name" placeholder="Local Heirial 2 ID" autofocus/>
        <input class="btn btn-danger" type="submit" value="Send Data!"/>
    </form>
    
<?php
    $ID = $_REQUEST['your_name'];
    $api = 'http://localhost:3000/visitors/' . urlencode($ID) . '/visits?mostRecent=true';
    echo $api; 
    $response  = file_get_contents($api);
    $obj  = json_decode($response, true);
    highlight_string("<?php\n\$data =\n" . var_export($obj, true) . ";\n?>\n");
?>
   
<?php else: ?>

<div id="wrapper">
    <button class="btn btn-success"><a href="/index.php">Heirial Search</a></button>
    <form method="post" action="local.php">
        <input class="input" type="text" name="your_name" placeholder="Local Heirial 2 ID" autofocus/>
        <input class="btn btn-danger" type="submit" value="Send Data!"/>
    </form>
    

<?php endif; ?>
</div>
</body>
</html>