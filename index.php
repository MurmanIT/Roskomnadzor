<?php
$url = "http://vigruzki.rkn.gov.ru/services/OperatorRequest/?wsdl"; 


$cliente = new SoapClient($url,array('trace'=>1,'encoding'=>'UTF-8'));

$file_xml = file_get_contents('netsl.xml');
$file_sig =  base64_decode(file_get_contents('esp_sig'));

$send_code = array(
	"requestFile" => $file_xml,
	"signatureFile" => $file_sig
);


$vem = $cliente->__soapCall('sendRequest',array($send_code));
echo $vem->code . "\n";

sleep(1000);

$sample_add = array("code" => $vem->code);
$vem = $cliente->__soapCall('getResult',array($sample_add));
file_put_contents('data.zip',$vem->registerZipArchive);
?>
