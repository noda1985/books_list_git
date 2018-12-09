<?php

$data = "https://spreadsheets.google.com/feeds/list/[ID]/od6/public/values?alt=json";
$json = file_get_contents($data);
$json_decode = json_decode($json);
$posts = $json_decode->feed->entry;

shuffle($posts);

$recomeder = array();
foreach($posts as $post ){    
    array_push($recomeder,$post->{'gsx$推薦者'}->{'$t'});
    }

$recomeder_result = array_values(array_unique($recomeder));

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php for ($i=0; $i < count($recomeder_result) ; $i++) : ?>
            <div class="chip teal lighten-3 waves-effect waves-light" style="cursor: pointer;">
                <span class="tag"><?php echo $recomeder_result[$i];?></span>
                <i class="close material-icons"></i>
            </div>
        <?php endfor; ?>
</body>
</html>
