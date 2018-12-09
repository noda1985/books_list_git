<?php
/** 共通で使うものを別ファイルにしておきましょう。*/

//DB接続関数（PDO）
function db_con(){
  $dbname='gs_db';
  $host= 'localhost';
  $id='root';
  $pw='';

  try {
    $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host='.$host,$id,$pw);
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

//SQL処理エラー
function queryError($stmt){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

//SessionIDチェックの関数
function chkSsid(){
  if (
    !isset($_SESSION['chk_ssid']) ||
    $_SESSION['chk_ssid'] !=session_id()   
    ) {
      header("Location: books_login.php");
      exit("login error");
  }else{
    session_regenerate_id(true);//Sessionハック対策で、ページ毎にIDを変更させる
    $_SESSION['chk_ssid'] =session_id();
  }
}


//amaozn_API

function amazonApi($title){
  $accessKey = "AKIAIC6HSWUZKFHJT3LQ";
  $secretKey = "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";
  $associateTag =  "hantya-22";
  $endpoint = "webservices.amazon.co.jp";
  $uri = "/onca/xml";
  
  foreach ([
    "Service" => "AWSECommerceService",
    "Operation" => "ItemSearch",
    "AWSAccessKeyId" => $accessKey,
    "AssociateTag" => $associateTag,
    "SearchIndex" => "Books",
    "ResponseGroup" => "Images,ItemAttributes",
    "Keywords" => $title,
    "Timestamp" => gmdate('Y-m-d\TH:i:s\Z')
  ] as $key => $value) {
    $params[rawurlencode($key)] = rawurlencode($value);
  };
  
  ksort($params);
  
  $queries = [];
  foreach ($params as $key => $value) {
    $queries[] = "$key=$value";
  }
  
  $queryString = join("&", $queries);
  $signature = base64_encode(hash_hmac("sha256", join("\n", ["GET", $endpoint, $uri, $queryString]), $secretKey, true));
  
  $json = file_get_contents("https://$endpoint$uri?$queryString&Signature=" . rawurlencode($signature));
  
  
  $amazon_xml = simplexml_load_string($json);
  return $amazon_xml;
}



?>
