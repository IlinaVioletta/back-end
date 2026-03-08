<?php

$items = [];

if(!empty($_GET['search'])){

    $search = $_GET['search'];

    $curl = curl_init();

    $data = json_encode([
            "q" => $search,
            "gl" => "ua",
            "hl" => "uk"
    ]);

    curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://google.serper.dev/search',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                    'X-API-KEY: e7a5db7a53c7466bf9cd443ccca4f38978f6845d',
                    'Content-Type: application/json'
            ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($response, true);

    if(isset($result['organic'])){
        $items = $result['organic'];
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>My Browser</title>
</head>

<body>

<h2>My Browser</h2>

<form method="GET" action="/index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search">
    <input type="submit" value="Submit">
</form>

<?php

if(!empty($items)){

    echo "<h3>Search results:</h3>";

    foreach($items as $item){

        echo "<div style='margin-bottom:20px;'>";

        echo "<a href='".$item['link']."' target='_blank'>";
        echo "<h4>".$item['title']."</h4>";
        echo "</a>";

        echo "<p>".$item['snippet']."</p>";

        echo "</div>";
    }
}

?>

</body>
</html>
