<?php
/***********************************************************************

  Copyright (C) 2002-2005  Rickard Andersson (rickard@punbb.org)

  This file is part of PunBB.

  PunBB is free software; you can redistribute it and/or modify it
  under the terms of the GNU General Public License as published
  by the Free Software Foundation; either version 2 of the License,
  or (at your option) any later version.

  PunBB is distributed in the hope that it will be useful, but
  WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston,
  MA  02111-1307  USA

  **********************************************************************/


// The max number of recent posts to show
$max_posts = 10;

// rss feed tittle
$feed_title = 'Archlinux Forum Announcements';
$feed_desc = 'The latest Archlinux Forum Announcements';

// array of forums ID's to pull rss from
$fids = array(24); // 24 = Announcement forum

// where to point the feed link
$feed_url = 'http://bbs.archlinux.org/viewforum.php?id=24';

/***********************************************************************/

// DO NOT EDIT ANYTHING BELOW THIS LINE! (unless you know what you are doing)


define('PUN_ROOT', './');
@include PUN_ROOT.'config.php';

// If PUN isn't defined, config.php is missing or corrupt
if (!defined('PUN'))
	exit('The file \'config.php\' doesn\'t exist or is corrupt. Please run install.php to install PunBB first.');


// Make sure PHP reports all errors except E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);

// Turn off magic_quotes_runtime
#set_magic_quotes_runtime(0);


// Load the functions script
require PUN_ROOT.'include/functions.php';

// Load DB abstraction layer and try to connect
require PUN_ROOT.'include/dblayer/common_db.php';

// load parser
require PUN_ROOT.'include/parser.php';

// Load cached config
@include PUN_ROOT.'cache/cache_config.php';
if (!defined('PUN_CONFIG_LOADED'))
{
    require PUN_ROOT.'include/cache.php';
    generate_config_cache();
    require PUN_ROOT.'cache/cache_config.php';
}

// Make sure we (guests) have permission to read the forums
$result = $db->query('SELECT g_read_board FROM '.$db->prefix.'groups WHERE g_id=3') or error('Unable to fetch group info', __FILE__, __LINE__, $db->error());
if ($db->result($result) == '0')
	exit('No permission');


// Attempt to load the common language file
@include PUN_ROOT.'lang/'.$pun_config['o_default_lang'].'/common.php';
if (!isset($lang_common))
	exit('There is no valid language pack \''.$pun_config['o_default_lang'].'\' installed. Please reinstall a language of that name.');


//
// Converts the CDATA end sequence ]]> into ]]&gt;
//
function escape_cdata($str)
{
	return str_replace(']]>', ']]&gt;', $str);
}


//
// Show recent discussions
//

//only new posts. not active.
$order_by = 't.posted';
$forum_sql = ' AND f.id IN('.implode(',', $fids).')';

// Send XML/no cache headers
header('Content-Type: text/xml');
header('Expires: '.gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');

// It's time for some syndication!
echo '<?xml version="1.0" encoding="'.$lang_common['lang_encoding'].'"?>'."\r\n";
echo '<rss version="2.0">'."\r\n";
echo '<channel>'."\r\n";
echo "\t".'<title>'.pun_htmlspecialchars($feed_title).'</title>'."\r\n";
echo "\t".'<link>'.$feed_url.'</link>'."\r\n";
echo "\t".'<description>'.pun_htmlspecialchars($feed_desc).'</description>'."\r\n";
echo "\t".'<language>en-us</language>'."\r\n";

// Fetch 15 topics
$result = $db->query('SELECT t.id, t.poster, t.subject, t.posted, t.last_post, f.id AS fid, f.forum_name FROM '.$db->prefix.'topics AS t INNER JOIN '.$db->prefix.'forums AS f ON f.id=t.forum_id LEFT JOIN '.$db->prefix.'forum_perms AS fp ON (fp.forum_id=f.id AND fp.group_id=3) WHERE (fp.read_forum IS NULL OR fp.read_forum=1) AND t.moved_to IS NULL'.$forum_sql.' ORDER BY '.$order_by.' DESC LIMIT '.$max_posts) or error('Unable to fetch topic list', __FILE__, __LINE__, $db->error());

while ($cur_topic = $db->fetch_assoc($result))
{
	$first_post_r =  $db->query('SELECT p.id, p.message from '.$db->prefix.'posts as p WHERE p.topic_id='.$cur_topic['id'].' ORDER BY p.id LIMIT 1') or error('Unable to fetch post info', __FILE__, __LINE__, $db->error());
	$first_post =  $db->fetch_assoc($first_post_r);
	if ($pun_config['o_censoring'] == '1') {
		$cur_topic['subject'] = censor_words($cur_topic['subject']);
	} 
	$cur_topic['first_post'] = parse_message($first_post['message'],1);

       	$db->free_result($first_post_r);

	echo "\t".'<item>'."\r\n";
	echo "\t\t".'<title>'.pun_htmlspecialchars($cur_topic['subject']).'</title>'."\r\n";
	echo "\t\t".'<link>'.$pun_config['o_base_url'].'/viewtopic.php?id='.$cur_topic['id'].'</link>'."\r\n";
	echo "\t\t".'<description><![CDATA[';
	$cdata = $cur_topic['first_post'];
	$cdata .= '-- posted by '.$cur_topic['poster']."\r\n";
	echo escape_cdata($cdata);
	echo ']]></description>'."\r\n";
	echo "\t\t".'<pubDate>'.date('r', $cur_topic['posted']).'</pubDate>'."\r\n";
	echo "\t\t".'<guid>'.$pun_config['o_base_url'].'/viewtopic.php?id='.$cur_topic['id'].'</guid>'."\r\n";
	echo "\t".'</item>'."\r\n";
}

echo '</channel>'."\r\n";
echo '</rss>';
$db->free_result($result);
return;
