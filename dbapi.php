<?php
function douban_api($bar_code){
  list($type, $code) =  split(",",$bar_code);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.douban.com/v2/book/isbn/'.$code);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36");
  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  $book_info = json_decode($response,true);
  $url =  urlencode( 'https://api.douban.com/v2/book/isbn/'.$code);
  $author = 'xinfeng';
  $mysql = new SaeMysql();
  $sql = "INSERT  INTO `book` ( `bar_code`, `author`, `title`,'url','book_info') VALUES ('"  . $mysql->escape( $code ) . "' , '" . $author . "' ,'".$mysql->escape( $book_title )."' , '".$mysql->escape($url)."' ,'".$mysql->escape( $response )."'  ); ";
  //  echo $sql;
  //  $sql ="show tables;";
  $mysql->runSql($sql);
  if ($mysql->errno() != 0)
  {
    die("Error:" . $mysql->errmsg());
  }
  $mysql->closeDb();
  //  var_dump($book_info);
  //  return $httpCode."标题:".$book_info['title'];
  if($httpCode!=403){
    return "标题:".$book_info['title'];
  }else{
    return 'https://api.douban.com/v2/book/isbn/'.$code;
  }


}
echo douban_api("EAN_13,9787302378396",'xinfeng');
?>