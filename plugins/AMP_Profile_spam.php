<?php

// Make sure no one attempts to run this script "directly"
if (!defined('PUN'))
	exit;

$max_age = 60*60*24*30;
$min_age = 60*60*24;
$max_active = 60*60*24;
$limit = 100;

// Tell admin_loader.php that this is indeed a plugin and that it is loaded
define('PUN_PLUGIN_LOADED', 1);

// Display the admin navigation menu
generate_admin_menu($plugin);

$deleted = 0;
if (isset($_POST['delete-users']) && is_array($_POST['delete-users']))
{
	if ($pun_user['g_id'] > PUN_ADMIN)
		message($lang_common['No permission']);

	confirm_referrer('admin_loader.php');

	if (isset($_POST['deleted']))
	{
		$deleted = intval($_POST['deleted']);
	}

	foreach($_POST['delete-users'] as $user)
	{
		if (!preg_match('/^\d+$/', $user))
		{
			continue;
		}

		// Delete any subscriptions
		$db->query('DELETE FROM '.$db->prefix.'subscriptions WHERE user_id='.$user) or error('Unable to delete subscriptions', __FILE__, __LINE__, $db->error());

		// Remove him/her from the online list (if they happen to be logged in)
		$db->query('DELETE FROM '.$db->prefix.'online WHERE user_id='.$user) or error('Unable to remove user from online list', __FILE__, __LINE__, $db->error());

		// Delete the user
		$db->query('DELETE FROM '.$db->prefix.'users WHERE id='.$user) or error('Unable to delete user', __FILE__, __LINE__, $db->error());
		if ($db->affected_rows() > 0)
		{
			$deleted++;
		}

		// Delete user avatar
		delete_avatar($user);
	}
}

?>
	<div class="plugin blockform">
		<h2><span>Profile spam detector</span></h2>
		<?php
			if ($deleted > 0)
			{
			echo '<div class="box"><p>Deleted '.$deleted.' users!</p></div>';
			}
		?>
		<div class="box">
			<div class="inbox">
				<p>Search for users without any posts but URLs in their signature or profiles.</p>
				<p>Current settings:</p>
				<div class="inform">
					<table class="aligntop" style="width:300px;">
						<tr>
							<td>Registered before:</td>
							<td><?php echo gmdate('M d Y H:i:s', time() - $min_age); ?></td>
						</tr>
						<tr>
							<td>Registered after:</td>
							<td><?php echo gmdate('M d Y H:i:s', time() - $max_age); ?></td>
						</tr>
						<tr>
							<td>Active for less than:</td>
							<td><?php echo round(($max_active / (60 * 60))); ?> h</td>
						</tr>
						<tr>
							<td>Limited to:</td>
							<td><?php echo $limit; ?> users</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<h2 class="block2"><span>Possible spammers:</span></h2>
		<div class="box">
			<div class="inbox"><p><?php
			$user_result = $db->query('SELECT id, username, signature, url FROM users WHERE group_id=4 AND (last_visit - registered) < '.$max_active.' AND registered > (UNIX_TIMESTAMP() - '.$max_age.') AND registered < (UNIX_TIMESTAMP() - '.$min_age.') AND num_posts = 0 AND (signature <> "" OR url <> "") ORDER BY registered DESC LIMIT '.$limit) or error('All clear', __FILE__, __LINE__, $db->error());

			if ($db->num_rows($user_result))
			{
				echo '<form method="post" action="'.pun_htmlspecialchars($_SERVER['REQUEST_URI']).'">
				<input type="submit" name="submit" value="Delete Users" />
				<table><tr><th>username</th><th>Delete</th><th>Profile content</th></tr>';
				while ($cur_user = $db->fetch_assoc($user_result))
				{
					foreach (array('http://', 'https://', 'ftp://', 'www.', '.com', '.org', '.net', '.info', '.co.uk', 'href=', '[url') as $pattern)
					{
						if (!empty($cur_user['url']) || stripos($cur_user['signature'], $pattern) !== false)
						{
						echo '<tr>
							<td style="width:150px;"><a href="profile.php?id='.$cur_user['id'].'">'.pun_htmlspecialchars($cur_user['username']).'</a></td>
							<td style="width:50px;"><input type="checkbox" name="delete-users[]" value="'.$cur_user['id'].'" /></td>
							<td> '.pun_htmlspecialchars(wordwrap(stripslashes($cur_user['signature'].$cur_user['url']), 30, ' ', true)).' </td>
						</tr>';
						continue 2;
						}
					}					
				}
				echo '</table>
					<input type="hidden" name="deleted" value="'.$deleted.'" />
					<input type="submit" name="submit" value="Delete Users" />
				</form>';
			}
			?></p></div>
		</div>
	</div>
<?php

