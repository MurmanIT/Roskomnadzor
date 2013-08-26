<?php
$url         = "http://vigruzki.rkn.gov.ru/services/OperatorRequest/?wsdl"; 
$cliente = new SoapClient($url);
$sample_add = array("code" => "151914a30509a8c5391beaea50cdc03a");
$vem = $cliente->__soapCall('getResult',array($sample_add));
echo $vem->resultComment;
print_r($vem);
?>
