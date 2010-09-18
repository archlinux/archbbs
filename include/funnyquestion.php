<?php

if (!defined('PUN'))
	exit;

!isset($funnyquestion_hash) && $funnyquestion_hash = dirname(__FILE__);
!isset($funny_questions) && $funny_questions = array(
	'What is the Ultimate Answer to the Ultimate Question of Life, The Universe, and Everything?' => '42'
);
!isset($funnyquestion_timeout) && $funnyquestion_timeout = 3600;
!isset($funnyquestion_remember) && $funnyquestion_remember = 3600*24;
!isset($funnyquestion_wait) && $funnyquestion_wait = 2;

if (file_exists(PUN_ROOT.'lang/'.$pun_user['language'].'/funnyquestion.php')) {
	require PUN_ROOT.'lang/'.$pun_user['language'].'/funnyquestion.php';
} else {
	require PUN_ROOT.'lang/English/funnyquestion.php';
}

function normalize_funnyanswer($answer)
{
	return preg_replace('/[^a-z0-9]/', '', strtolower($answer));
}

function set_funnycookie()
{
	global $funnyquestion_hash, $funnyquestion_remember;

	$time = time();
	forum_setcookie('funnyquestion_hash', sha1($time.get_remote_address().$funnyquestion_hash), $time+$funnyquestion_remember);
	forum_setcookie('funnyquestion_time', $time, $time+$funnyquestion_remember);
}

function has_funnycookie()
{
	global $funnyquestion_hash, $funnyquestion_remember;

	return (!empty($_COOKIE['funnyquestion_hash']) && !empty($_COOKIE['funnyquestion_time'])
		&& time() - $funnyquestion_remember <= $_COOKIE['funnyquestion_time']
		&& sha1($_COOKIE['funnyquestion_time'].get_remote_address().$funnyquestion_hash) == $_COOKIE['funnyquestion_hash']);
}

function get_funnyquestion()
{
	global $funnyquestion_hash, $funny_questions, $lang_funnyquestion, $pun_user, $funnyquestion_remember;

	if (!$pun_user['is_guest'] || has_funnycookie()) {
		return '';
	}

	$time = time();
	$question = array_rand($funny_questions);
	# make sure the user is not able to tell us the question to answer
	$hash = sha1($time.$question.$funnyquestion_hash);

	return '<div class="inform">
			<fieldset>
				<legend>'.$lang_funnyquestion['question-label'].'</legend>
				<div class="infldset">
					<input type="hidden" name="funnyquestion_time" value="'.$time.'" />
					<input type="hidden" name="funnyquestion_hash" value="'.$hash.'" />
					<label class="required">
						<strong>'.$question.'<span>'.$lang_common['Required'].'></span></strong><br />
						<input type="text" name="funny_answer" value="" size="50" /><br />
					</label>
				</div>
			</fieldset>
		</div>';
}

function check_funnyquestion()
{
	global $funnyquestion_hash, $funnyquestion_timeout, $funnyquestion_wait, $funny_questions, $pun_user, $funnyquestion_remember;

	if (!$pun_user['is_guest'] || has_funnycookie()) {
		return true;
	}

	if (!empty($_POST['funnyquestion_time'])
	&& !empty($_POST['funnyquestion_hash'])
	&& !empty($_POST['funny_answer'])) {
		$now = time();
		$time = $_POST['funnyquestion_time'];
		$hash = $_POST['funnyquestion_hash'];
		$user_answer = normalize_funnyanswer($_POST['funny_answer']);
	} else {
		return false;
	}

	if ($now - $time > $funnyquestion_timeout) {
		return false;
	} elseif ($now - $time < $funnyquestion_wait) {
		return false;
	}

	foreach ($funny_questions as $question => $answers) {
		if (!is_array($answers)) {
			$answers = array($answers);
		}
		foreach ($answers as $answer) {
			if (normalize_funnyanswer($answer) == $user_answer
				&& $hash == sha1($time.$question.$funnyquestion_hash)) {
				set_funnycookie();
				return true;
			}
		}
	}

	return false;
}

?>

