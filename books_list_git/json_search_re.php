<?php

set_time_limit(120);

include("include/funcs.php");
include("class.php");

$sarchpage ="";

$url = "https://spreadsheets.google.com/feeds/list/[ID]/od6/public/values?alt=json";
$bookdata = new Bookdata($url);
$data = $bookdata->getData();
$posts = $bookdata->fileGet($data);

if(!isset($_POST["search"]) && $_POST["search"]==""){
    $s = "";

}else{

        $s = $_POST["search"];

        $search = new Search();
        $posts_base = $search->getpost_base();
        $posts_base = $search->arraypush($posts,$posts_base);

        $result = array();

        for ($i=0; $i < count($posts_base) ; $i++) { 
        if (strpos($posts_base[$i][0], $s) !== false){
        $result[] = $posts_base[$i];
        }

    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<body>
    <?php include('listdata.php');?>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
</body>
</html>
