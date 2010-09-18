<?php

$zombie_time = 60*60*24*365;
$max_age = 60*60*24*30;

// Make sure no one attempts to run this script "directly"
if (!defined('PUN'))
	exit;

// Tell admin_loader.php that this is indeed a plugin and that it is loaded
define('PUN_PLUGIN_LOADED', 1);

// Display the admin navigation menu
generate_admin_menu($plugin);

?>
	<div id="exampleplugin" class="blockform">
		<h2><span>Zombie Detector</span></h2>
		<div class="box">
			<div class="inbox">
				<p>Detect Zombies before they do!</p>
				<p>Current settings:
					<table style="width:350px;">
						<tr>
							<td>Last post was posted after:</td>
							<td><?php echo gmdate('M d Y H:i:s', time() - $max_age); ?></td>
						</tr>
						<tr>
							<td>Topic was dead for:</td>
							<td><?php echo round(($zombie_time / (60 * 60 * 24))); ?> d</td>
						</tr>
					</table>
				</p>
			</div>
		</div>

		<h2 class="block2"><span>Undead Topics:</span></h2>
		<div class="box">
			<div class="inbox"><p><?php
			$topic_result = $db->query('SELECT id, subject, last_post FROM topics WHERE closed=0 AND sticky=0 AND moved_to is null AND (last_post - posted) > '.$zombie_time.' AND last_post > (UNIX_TIMESTAMP() - '.$max_age.') ORDER BY last_post DESC') or error('All clear', __FILE__, __LINE__, $db->error());

			if ($db->num_rows($topic_result))
			{
				echo '<ul style="margin-left:20px;">';
				while ($cur_topic = $db->fetch_assoc($topic_result))
				{
					$post_result = $db->query('SELECT id, posted FROM posts WHERE topic_id='.$cur_topic['id'].' ORDER BY id DESC');
					if ($db->num_rows($post_result))
					{
						$last_post = $cur_topic['last_post'];
						while ($cur_post = $db->fetch_assoc($post_result))
						{
							if (abs($cur_post['posted'] - $last_post) > $zombie_time)
							{
								echo '<li><a href="viewtopic.php?pid='.$cur_post['id'].'#p'.$cur_post['id'].'">'.pun_htmlspecialchars($cur_topic['subject']).'</a></li>';
								break;
							}
						$last_post = $cur_post['posted'];
						}
					}
				}
				echo '</ul>';
			}
			?></p></div>
		</div>
	</div>
<?php

