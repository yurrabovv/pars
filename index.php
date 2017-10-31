<?php
require_once __DIR__ .'/helpers.php';
require_once 'vendor/autoload.php';
require_once __DIR__ .'/functions.php';

// ---------------------------------------------------------------------
// --[ Main code ]------------------------------------------------------
// ---------------------------------------------------------------------
$cookiefile = 'tmp/cookie.txt';//путь для установки куки
$marka = 'honda';
$model = 'logo';
var_dump($marka, $model);


$ch = curl_init('http://www.avito.ru/rossiya/avtomobili/'."$marka".'/'."$model");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile );//путь к файлу
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile );
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

$html = curl_exec ($ch);

phpQuery::newDocument($html);//создаем новый документ
curl_close ($ch);/*закрыть дескриптор */

//$header = pq('.item_table-header')->text();
$href = pq('item-description-title-link')->attr('href');


/* заменяем название и марку-----------------
$sheader = preg_replace("&$marka $model..&i", '!!', $header);
$sheader = preg_replace("&$marka $model..&i", '!!', $header);
$ar_auto = explode('!!', $sheader);
*/
//echo preg_match_all('#a+#', 'eee aaa aa bbb a',  $matches));

//xprint($sheader);
//xd($auto);
echo "<br>";

var_dump($ar_auto);




phpQuery::unloadDocuments();




