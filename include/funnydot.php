<?php

function get_funnydot()
{
	global $funnydot_hash;

	!isset($funnydot_hash) && $funnydot_hash = '';
	$time = time();
	$hash = substr(sha1($time.$funnydot_hash), 0, 4);

	return '<div style="background-image:url(funnydot.php?funnydot_time='.$time.');visibility:hidden;position:absolute;z-index:-1">
			<fieldset>
				<legend>CAPTCHA</legend>
				<div>
					<label for="funnydot_hashfield">Please type in the following code: <strong>'.$hash.'</strong></label>
					<input id="funnydot_hashfield" type="text" name="funnydot_hash" size="4" value="" />
					<input type="hidden" name="funnydot_time" value="'.$time.'" />
				</div>
			</fieldset>
		</div>';
}

function check_funnydot()
{
	global $funnydot_hash, $funnydot_timeout, $funnydot_wait;

	# set some sane defaults
	# can be overridden in config.php
	!isset($funnydot_hash) && $funnydot_hash = '';
	!isset($funnydot_timeout) && $funnydot_timeout = 3600;
	!isset($funnydot_wait) && $funnydot_wait = 2;

	if (!empty($_POST['funnydot_time']) && (!empty($_COOKIE['funnydot_hash']) || !empty($_POST['funnydot_hash']))) {
		$now = time();
		$time = $_POST['funnydot_time'];
		$hash = !empty($_POST['funnydot_hash']) ? $_POST['funnydot_hash'] : $_COOKIE['funnydot_hash'];
	} else {
		return false;
	}

	if ($hash != substr(sha1($time.$funnydot_hash), 0, 4)) {
		return false;
	} elseif ($now - $time > $funnydot_timeout) {
		return false;
	} elseif ($now - $time < $funnydot_wait) {
		return false;
	} else {
		return true;
	}
}

?>
