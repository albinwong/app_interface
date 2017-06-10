<?php 
$dom = new DOMDocument('1.0','utf-8');
$element = $dom->createElement('test','This is the root element');
$dom->appendChild($element);
echo $dom->saveXML();