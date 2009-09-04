<?php

define('PUN_CONFIG_LOADED', 1);

$pun_config = array (
  'o_cur_version' => '1.2.17',
  'o_board_title' => 'Arch Linux Forums',
  'o_board_desc' => 'Discussion forums for <a href=\'http://www.archlinux.org\'>Arch Linux</a>, a simple, lightweight linux distribution.',
  'o_server_timezone' => '-5',
  'o_time_format' => 'H:i:s',
  'o_date_format' => 'Y-m-d',
  'o_timeout_visit' => '1800',
  'o_timeout_online' => '300',
  'o_redirect_delay' => '1',
  'o_show_version' => '0',
  'o_show_user_info' => '1',
  'o_show_post_count' => '1',
  'o_smilies' => '1',
  'o_smilies_sig' => '1',
  'o_make_links' => '1',
  'o_default_lang' => 'English',
  'o_default_style' => 'Archer',
  'o_default_user_group' => '4',
  'o_topic_review' => '15',
  'o_disp_topics_default' => '30',
  'o_disp_posts_default' => '25',
  'o_indent_num_spaces' => '4',
  'o_quickpost' => '1',
  'o_users_online' => '1',
  'o_censoring' => '0',
  'o_ranks' => '0',
  'o_show_dot' => '0',
  'o_quickjump' => '1',
  'o_gzip' => '0',
  'o_additional_navlinks' => '',
  'o_report_method' => '0',
  'o_regs_report' => '0',
  'o_mailing_list' => NULL,
  'o_avatars' => '1',
  'o_avatars_dir' => 'img/avatars',
  'o_avatars_width' => '80',
  'o_avatars_height' => '80',
  'o_avatars_size' => '10240',
  'o_search_all_forums' => '1',
  'o_base_url' => 'http://bbs.archlinux.org',
  'o_admin_email' => 'simo@archlinux.org',
  'o_webmaster_email' => 'forum@archlinux.org',
  'o_subscriptions' => '1',
  'o_smtp_host' => NULL,
  'o_smtp_user' => '',
  'o_smtp_pass' => '',
  'o_regs_allow' => '1',
  'o_regs_verify' => '1',
  'o_announcement' => '0',
  'o_announcement_message' => '<em>Important Notice for English Archers</em>
<br /><br />
Over the past two months, great discussion has passed on the private
development list, and we have come to the conclusion that keeping Arch
as a primarily English distro is a disservice to our largest
user-base.  As such, we have decided in majority vote to change the
official, primary language of Arch Linux to German.
<br /><br />
Please bear with us during this transition - we are working closely
with archlinux.de to facilitate the switch, at which point we plan to
merge the websites. Knowing the great community behind Arch, we are
sure a community project will arise quickly to fill the small void
left when we completely discontinue the English site.
<br /><br />
Also, please note we\'re now using the German pronunciation for "Arch".<br />
 Don\'t worry, you\'ll get used to it - 90% of our devs already are!<br />
<img title="Das Flag" src="http://bbs.archlinux.org/img/60px-Nuvola_German_flag.svg.png" />',
  'o_rules' => '0',
  'o_rules_message' => 'FORUM ETIQUETTE

These guidelines have been developed over time based on the extensive experience of the moderation team with input by the community. They are updated from time to time, but in general, they conform to the Arch Philosophy.
 PERSONAL DISPUTES

Please do not use these forums for personal disputes, heated debates, flame wars etc. You are expected to treat each other with respect in the forums and take any personal disputes to a private mode of discussion off the forums. If you should find that your discussion is becoming too heated or someone is becoming far too passionate about their argument, please take the discussion to private message or email.
 PERSONAL TOPICS

Personal topics are threads that, whilst posted in public forum, are intended for a discussion between only a few members. These kinds of topics are frowned on and will be locked/removed as soon as they are discovered. Public posts should be open and inviting to all members. Personal discussions among a select group of users should take place in private message.
INEFFECTIVE DISCUSSION ("BIKESHED")

Questioning or discussing the methods used by the Arch Linux development team will be monitored closely and locked if deemed unhelpful. Harsh, unproductive criticism is also uncalled for.

If you have a question regarding Arch development, please ensure that your topic poses a specific question, and be open-minded to responses. If possible, provide a solution or partial solution. Submitting code and patches for discussion is always more pragmatic than asking others to do it for you.

Threads stating the equivalent of "there is a problem, we need to discuss it" have been repeatedly proven ineffective and inflammatory and will usually be locked after a warning from the moderation team. Arch is a Do It Yourself community. If you have a problem, find a solution first, then post.
 RESPECT OTHER USERS

Sometimes people can post marerial that you may find offensive. Before launching into a public condemnation though, please consider the possibility that the person may not have intended to cause offense. It is very easy to misinterpret a post on a forum, especially when dealing with multinational citizens. There is no need to resort to insults. Respect others\' views even if you disagree with them.
RESPECT OTHER DISTRIBUTIONS and OPERATING SYSTEMS

These forums are not provided for the purpose of bashing other GNU/Linux distributions/OS\'s. The staff are happy to volunteer their time and energy to provide you with the Arch Linux distribution. Kindly show respect toward the volunteers, users and communities of other distros as well. Views, experiences and opinions are always welcome, but please refrain from unproductive slander.
ADVERTISING/SOLICITATION

Advertising for the sake of advertising is not allowed. Posts of this kind will be locked/deleted.
NO TROLLING

What is a troll? It\'s a person who posts something which is bound to stir people up and then sits back and watches as dozens of people jump in and start arguing. Sometimes trolls get their friends to join in or post under different names. Generally they will do anything it takes to get attention. If you see a message like this, please try and refrain from replying to it - it may well be locked/deleted anyway.

Trolls are generally deceitful and may use ambivalence as a method of covertly insulting, intimidating, or inciting a person or persons for their own sadistic pleasure. They often pick their words very carefully and are therefore able to defend their masked attempts at creating unrest, often redirecting the blame onto the community and its failure to understand them properly.

Trolling is further considered one of two things; Either running a topic into the ground incessantly, or dragging up old arguments against a specific user/group/etc. long after the original discussion gas been put to rest and then targeting them/it specifically and needlessly. Trolling is the first step toward outright harassment of other members. This is the single biggest no-no in the community. Letting every argument drop isn\'t always a possibility, but learning when to let things go is a valuable tool, and not just in this community.

There is no explicit list of topics considered to be trollish, but in the past, questions pertaining to Religion, Sports, and Politics have been closed. GNU/Linux related threads are usually not closed, but monitored closely.
POWER-POSTING

Power-posting is when board members post \'empty\' messages to the board, in order to simply increase their number of posts more quickly. Examples of power-posting are replying to a message with only \'+1\', \'LOL\' or \'I agree\', but failing to contribute anything further to the discussion. If you reply to a message, make sure you have something to say. Power posting clutters up the forums, clutters up the \'new posts\' function, and uses extra bandwidth and server space. While we don\'t mind people using bandwidth to chat usefully on the board, we do mind people using it just because they want a more impressive \'post counter\'. If you\'re not sure if you\'re power-posting, take a moment and think it over before you post. If all your post contains is an emoticon, it\'s a power-post. If it adds something to the discussion, it isn\'t.
CROSS-POSTING

Cross-posting is posting the same question to multiple Arch Linux forums (for example, posting in both Newbie Corner and Workstation User). This is a waste of resources and is not permitted. Any cross-posted topic will be immediately locked or deleted.
MISPLACED POSTS

Try to place your posts in the correct forum for the topic. Our forums have been carefully categorized so that most topics fit in one logical location. Any post that is deemed by the staff to be in the wrong forum will be moved to the correct location without warning. Most users can find these on your own but if you lose your thread, it is acceptable to contact one of the forum advisers asking where it has been moved.
THREAD HIJACKING

Thread hijacking is the process of replying to an existing thread with a different topic. This is tolerated but generally discouraged. It is better to start a new thread if you have a problem that is related to an existing posted issue but clearly different. On the other hand, it is better to respond to the existing thread with additional information if you have what appears to be the same problem.

Posts that hijack a serious thread with off-topic discussion are strongly discouraged and will often be deleted or edited by forum staff.
IGNORE SPAMMERS

Spam is a blight upon the face of the net. Nobody likes it. However, it is hard to avoid. Despite our best efforts, you will very occasionally see spam on the forums. Complaining about spam in public increases noise, but not signal. It may make you feel better, but it doesn\'t help. PM a moderator and they will review it for removal.

Repetitive posts by one user, or posting a new thread when one is already easily accessible can be considered spam. It\'s hard enough to let community members easily track this forum as days go on, they don\'t need to wade through two dozen threads about the same thing every day. Try searching first.
DO NOT FLAME

Flaming, in the most common sense definition, is saying something negative in an attempt to get a more negative response. This is completely and totally unacceptable. It will not be tolerated, and in most cases will be punished severely. Never resort to personal insults, never extend a debate beyond the topic on hand needlessly, and try to avoid patronizing language.
DO NOT FLAME THE STAFF

They have the final say. This forum isn\'t a democracy. Your vote doesn\'t always count. They try to please everyone they can, but in the end, they\'re charged with making this community as enjoyable for as many people as they possibly can. They can not always be right, nor can they please everyone with the decisions made, but they\'re doing their "jobs" and hopefully we can all agree that they\'re doing their best to ensure a good community here.

If you feel that an egregious oversight has been made, then pm the moderator group. Do not post complaints on the forum.
WARNINGS, USER LOCKING, BANNING

If the ArchLinux Form Moderation Team feels that a user has "crossed the line", they will typically issue the user a private warning. This warning will not be discussed on the ArchLinux Forums, ArchLinux IRC channels, or ArchLinux mailing lists by the Moderation Team (further, see above DO NOT FLAME THE STAFF).

If the warning goes unheeded, further action will be taken. This can be anything from locking the offending user account, to deletion and banning of the user. Action is generally on a case by case basis.

If a user is apologetic, interested in a peaceful solution and wishes to have their account reinstated, a general consensus will be formed by the moderation team for or against such a request.
HOW TO POST

Choose clear, informative subjects. This is more likely to elicit response from experienced users who have knowledge about that particular topic. It also makes the topic easy to reference and find in forum searches by future users with similar problems.

When asking questions, provide as much information as possible, including error messages, terminal output, logs, what you have previously tried, what documentation and searches you have attempted, and related configuration files. Read How To Ask Questions The Smart Way for more helpful advice.

Choose one topic per thread. Long many-paged threads are typically discouraged except in Off Topic/Try This. Try not to post multiple questions in a single topic -- this makes it difficult to search for specific problems. Post your question in only one forum; pick the most relevant forum and post there.

Stay on topic. When responding to an existing thread, attempt to focus on the original topic. If something comes up and you\'re inclined to post "that reminds me," or "we also need to consider..." determine whether it might be better to start a new thread, or if your statement even needs to be said at all.

\'Bumping\' a thread is frowned upon. Use time wisely and update the thread by providing details of other steps you have taken to resolve the issue, rather than calling further attention to the thread without adding any further useful information.

Finally, mark your thread as [SOLVED] by editing the original post title when a solution is found.

LEGALITY

Do not post, discuss, or link to illegal content or topics. This includes, but is not limited to, pirated software, warez, or sites which provide torrents to such content.',
  'o_maintenance' => '0',
  'o_maintenance_message' => 'The forums are down for some very brief maintenance. Check back in a few minutes!<br />
<br />
-S',
  'p_mod_edit_users' => '0',
  'p_mod_rename_users' => '0',
  'p_mod_change_passwords' => '0',
  'p_mod_ban_users' => '1',
  'p_message_bbcode' => '1',
  'p_message_img_tag' => '1',
  'p_message_all_caps' => '0',
  'p_subject_all_caps' => '0',
  'p_sig_all_caps' => '0',
  'p_sig_bbcode' => '1',
  'p_sig_img_tag' => '0',
  'p_sig_length' => '400',
  'p_sig_lines' => '4',
  'p_allow_banned_email' => '0',
  'p_allow_dupe_email' => '0',
  'p_force_guest_email' => '1',
);

?>