<?php

require ('config.php');
!isset($funnydot_hash) && $funnydot_hash = '';

if (!empty($_GET['funnydot_time'])) {
	setCookie('funnydot_hash', substr(sha1($_GET['funnydot_time'].$funnydot_hash), 0, 4), 0, '/', null, isset($_SERVER['HTTPS']), true);
}

header('HTTP/1.1 200 OK');
header("Cache-Control: no-cache, must-revalidate, no-store");
header('Content-Type: image/png');
header('Content-Length: 135');

# transparent png (1px*1px)
echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAAXNSR0IArs4c6QAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9gLFxMRGNZyzLoAAAACYktHRAD/h4/MvwAAAAtJREFUCB1j+M8AAAIBAQDFXxteAAAAAElFTkSuQmCC');

?>
