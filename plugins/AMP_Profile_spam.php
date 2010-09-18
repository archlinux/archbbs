<?php

$max_age = 60*60*24*30;
$max_active = 60*60*24;

// Make sure no one attempts to run this script "directly"
if (!defined('PUN'))
	exit;

// Tell admin_loader.php that this is indeed a plugin and that it is loaded
define('PUN_PLUGIN_LOADED', 1);

// Display the admin navigation menu
generate_admin_menu($plugin);

?>
	<div id="exampleplugin" class="blockform">
		<h2><span>Profile spam detector</span></h2>
		<div class="box">
			<div class="inbox">
				<p>Search for users without any posts but URLs in their signature or profiles.</p>
				<p>Current settings:
					<table style="width:300px;">
						<tr>
							<td>Registered after:</td>
							<td><?php echo gmdate('M d Y H:i:s', time() - $max_age); ?></td>
						</tr>
						<tr>
							<td>Active for less than:</td>
							<td><?php echo round(($max_active / (60 * 60))); ?> h</td>
						</tr>
					</table>
				</p>
			</div>
		</div>

		<h2 class="block2"><span>Possible spammers:</span></h2>
		<div class="box">
			<div class="inbox"><p><?php
			$user_result = $db->query('SELECT id, username, signature, url FROM users WHERE group_id=4 AND (last_visit - registered) < '.$max_active.' AND registered > (UNIX_TIMESTAMP() - '.$max_age.') AND num_posts = 0 AND (signature <> "" OR url <> "") ORDER BY registered DESC') or error('All clear', __FILE__, __LINE__, $db->error());

			if ($db->num_rows($user_result))
			{
				echo '<table><tr><th>username</th><th>Administration</th><th>Profile content</th></tr>';
				while ($cur_user = $db->fetch_assoc($user_result))
				{
					foreach (array('http://', 'https://', 'ftp://', 'www.', '.com', '.org', '.net', 'href=', '[url') as $pattern)
					{
						if (!empty($cur_user['url']) || stripos($cur_user['signature'], $pattern) !== false)
						{
						echo '<tr>
							<td><a href="profile.php?id='.$cur_user['id'].'">'.pun_htmlspecialchars($cur_user['username']).'</a></td>
							<td style="width:100px;"><a href="profile.php?id='.$cur_user['id'].'&amp;section=admin">Delete</a> </td>
							<td> '.pun_htmlspecialchars(wordwrap(stripslashes($cur_user['signature'].$cur_user['url']), 30, ' ', true)).' </td>
						</tr>';
						continue 2;
						}
					}					
				}
				echo '</table>';
			}
			?></p></div>
		</div>
	</div>
<?php

