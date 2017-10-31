<?php

/*---------------pars---------------------*/
$cookiefile = 'tnp/cookie.txt';//путь для установки куки
$marka = 'honda';
$model = 'logo';
var_dump($marka);

$ch = curl_init('http://www.avito.ru/rossiya/avtomobili/'."$marka".'/'."$model");/* инициализируем курл ,
                                        указывае в параметре ресурс который нужно получить---------------*/
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
/* CURLOPT_RETURNTRANSFER,возвращает данные, true чтобы данные сохранялись в $ -----*/


/*----------заголовки сохраняем в ту-же $----------*/
//curl_setopt($ch,CURLOPT_HEADER,true);

/*-----------------опции для куки------------*/
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile );//путь к файлу
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile );

/*-------Получаем только заголовки и не получаем тело-----*/
//curl_setopt($ch,CURLOPT_NOBODY,true);




curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
/* Опция что-бы курл следовал за редиректом */


/* -----------------Для HTTPS еще 2 функции----------- */
/*через setopt отключаем 2 опции для возможности загрузки ч/з HTTPS */
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	/*--------------------------------------------------*/


$html = curl_exec ($ch); /*    команда -"выполнить запрос" */

phpQuery::newDocument($html);//создаем новый документ

$auto = pq('.item-description-title-link')->text();
//var_dump($auto);
$ar_auto = explode('Honda Logo,', $auto);


$cena = pq('.about')->text();
$param = pq('.params > .param')->text();
//$href = pq('.title item-description-title')->attr('href');
$id = pq('avito-ads-container avito-ads-container_context_1')->attr('id');

var_dump($id);
//var_dump($param);




phpQuery::unloadDocuments();
curl_close ($ch);/*закрыть дескриптор */
//xprint($html);
xprint($auto);
xprint($cena);
//var_dump($ar_auto);


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
//var_dump($cena);
$ar_cena = explode('руб.', $cena);


//xprint($href);

/*------------end pars-----------------*/
//////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////


/*------------pogoda-----------------*/

/*$html = file_get_contents( 'http://pogoda.yandex.ru' );
//xprint($html, '$html');
phpQuery::newDocument($html);//создаем новый документ


$temper =pq('.current-weather__thermometer_type_now')->text();

xd($temper);

$wind = pq('.current-weather__info-row current-weather__info-row_type_wind > abbr.icon-abbr')->attr('title');
xd($wind);
var_dump($wind);


phpQuery::unloadDocuments();//выгрузит из памяти все документы
*/

/*-------------------зегулярки--------------
//xprint($html);
preg_match_all('#<h3(.+?)/>#su', $html, $res);
curl_close ($ch);

$ar_res = preg_split('#honda.logo(.+?)бензин|дизель#su', $res);
print_r($ar_res);
xprint($res);
*/