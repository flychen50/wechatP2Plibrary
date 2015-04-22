<?php
include "qywechat.class.php";
//include "douban_api.php";

function logg($text){
  //    file_put_contents('./log.txt',$text."\r\n\r\n",FILE_APPEND);
  echo $text;
};

$options = array(
    'token'=>'', //填写应用接口的Token
 			'encodingaeskey'=>'', //填写加密用的EncodingAESKey
 			'appid'=>'', //填写高级调用功能的app id
 			'appsecret'=>'', //填写高级调用功能的密钥
 			'agentid'=>'', //应用的id
    'debug'=>true, //调试开关
    'logcallback'=>'logg', //调试输出方法，需要有一个string类型的参数
 		);

//logg("GET参数为：\n".var_export($_GET,true));
$weObj = new Wechat($options);
// $ret=$weObj->valid();
// //echo $ret;
// if (!$ret) {
// 	logg("验证失败！");
// 	var_dump($ret);
// 	exit;
// }

var_dump($weObj->getUserList(1,0,0)) ;
// $ret=$weObj->valid();
// //echo $ret;
// if (!$ret) {
// 	logg("验证失败！");
// 	var_dump($ret);
// 	exit;
// }
// $f = $weObj->getRev()->getRevFrom();
// $t = $weObj->getRevType();
// $d = $weObj->getRevData();
// $e = $weObj->getRevScanInfo() ;
// if($e){
//   $res = $weObj->getRevScanInfo();
//   $book_code = $res['ScanResult'];
//   $book_title = douban_api($book_code);
//      $mysql = new SaeMysql();
//      $sql = "INSERT  INTO `book` ( `bar_code`, `author`, `title`) VALUES ('"  . $mysql->escape( $book_code ) . "' , '" . $f . "' ,'".$book_title."'  ) ";
//      $mysql->runSql($sql);
//      if ($mysql->errno() != 0)
//      {
//        die("Error:" . $mysql->errmsg());
//        $weObj->text("mysql error".$mysql->errmsg())->reply();
//      }

//      $mysql->closeDb();
//      $weObj->text($f.":\n 您要共享的图书信息：\n".$book_title."\n您的图书已经入库，感谢您的支持\n共享后图书依然归属于您，只是共享给大家借阅，您随时可以收回。")->reply();


//      $brodcast =   array(
//          "touser" => "@all",
//          "safe"=>"0",
//          "agentid" => "7",	//应用id
//          "msgtype" => "text",  //根据信息类型，选择下面对应的信息结构体
//          "text" => array(
//              "content" => $f.":\n 共享了图书：\n".$book_title."\n 欢迎借阅"
//                          )
//                          );
//      $weObj->sendMessage($brodcast);
// }else{
//   //  $weObj->text("你好！来自星星的：".$f."\n你发送的".$t."类型信息：\n原始信息如下：\n".var_export($d,true))->reply();
// }
//logg("-----------------------------------------");
?>