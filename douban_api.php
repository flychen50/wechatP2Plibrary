<?php
function douban_api($bar_code){
  list($type, $code) =  split(",",$bar_code);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.douban.com/v2/book/isbn/'.$code."?apikey=06557a2033761a5513006e609a624eff");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36");
  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  $book_info = json_decode($response,true);
  //var_dump($book_info);
  if($httpCode!=403){
    return "标题:".$book_info['title']."\n作者:".implode($book_info['author']);
  }else{
    return 'https://api.douban.com/v2/book/isbn/'.$code;
  }


}
//echo douban_api("EAN_13,9787302378396");
?>