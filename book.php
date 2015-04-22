<?php



$table = "book";
$tday=date("Y-m-d");
$date_past = date(' H:i:s',time() - 30 * 60);
$mday = date('Y-m-d', strtotime(' +1 day'));
$yday = date('Y-m-d', strtotime(' -1 day'));
$wday = date('Y-m-d', strtotime(' -8 day'));
ini_set('date.timezone', 'Asia/Shanghai');

$db=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

if($db)
{
  mysql_select_db(SAE_MYSQL_DB,$db);
  //your code goes here
}

$query = "desc ".$table;
$result = mysql_query($query);
$column = array();
while($row = mysql_fetch_assoc($result)){
  $column[]=$row['Field'];
}

$query = "SELECT * FROM ".$table;

//echo $query;
$result = mysql_query($query);
//var_dump($result);
$res = array();

while($row = mysql_fetch_assoc($result)){
  //  var_dump($row);
  $res[]=$row;
}

//var_dump($column);

?>
<html>

<head>
<meta charset="UTF-8" />
    <title>P2P图书馆</title>
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="author" content="xinfeng"/>
    <meta name="email" content="xinfeng@staff.weibo.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="css/style01.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <body>
    <table id="resultTable" class="table  tablesorter">
    <colgroup>
<?php foreach($column as $col){ ?>
                                <col  class="left" />
<?php } ?>
       </colgroup>
       <thead>
       <tr>
<?php foreach($column as $col){ ?>
  <th scope="col" class="right"><?php echo $col ?></th>
<?php } ?>
       </tr>
       </thead>
       <tbody>
<?php
       foreach($res as $row){
         ?>
         <tr>
<?php foreach($row as $key=>$val){ ?>
           <td class="right"><?php echo $val ?></td>
<?php } ?>
         </tr>
<?php } ?>
            </tbody>
        </table>
    </body>

 <script src="js/jquery.tablesorter.min.js"></script>
<script>
	$(document).ready(function(){
	    $(function(){
		$("#resultTable").tablesorter();
	      });
	  });
</script>


</html>
