<?php

if (!defined('PUN')) exit;
define('PUN_QJ_LOADED', 1);

?>				<form id="qjump" method="get" action="viewforum.php">
					<div><label><?php echo $lang_common['Jump to'] ?>

					<br /><select name="id" onchange="window.location=('viewforum.php?id='+this.options[this.selectedIndex].value)">
						<optgroup label="General">
							<option value="24"<?php echo ($forum_id == 24) ? ' selected="selected"' : '' ?>>Announcements, Package and Security Advisories</option>
							<option value="1"<?php echo ($forum_id == 1) ? ' selected="selected"' : '' ?>>Arch Discussion</option>
							<option value="13"<?php echo ($forum_id == 13) ? ' selected="selected"' : '' ?>>Forum &amp; Wiki discussion</option>
						</optgroup>
						<optgroup label="Arch Help">
							<option value="23"<?php echo ($forum_id == 23) ? ' selected="selected"' : '' ?>>Newbie Corner</option>
							<option value="18"<?php echo ($forum_id == 18) ? ' selected="selected"' : '' ?>>Desktop Environments</option>
							<option value="7"<?php echo ($forum_id == 7) ? ' selected="selected"' : '' ?>>Workstation User</option>
							<option value="44"<?php echo ($forum_id == 44) ? ' selected="selected"' : '' ?>>Pacman &amp; Package Upgrade Issues</option>
							<option value="49"<?php echo ($forum_id == 49) ? ' selected="selected"' : '' ?>>[testing] Repo Forum</option>
							<option value="22"<?php echo ($forum_id == 22) ? ' selected="selected"' : '' ?>>Kernel &amp; Hardware Issues</option>
							<option value="8"<?php echo ($forum_id == 8) ? ' selected="selected"' : '' ?>>Networking, Server, and Protection</option>
							<option value="32"<?php echo ($forum_id == 32) ? ' selected="selected"' : '' ?>>Multimedia and Games</option>
							<option value="17"<?php echo ($forum_id == 17) ? ' selected="selected"' : '' ?>>Installation</option>
							<option value="31"<?php echo ($forum_id == 31) ? ' selected="selected"' : '' ?>>Laptop Issues</option>
							<option value="30"<?php echo ($forum_id == 30) ? ' selected="selected"' : '' ?>>Other Languages</option>
							<option value="35"<?php echo ($forum_id == 35) ? ' selected="selected"' : '' ?>>Arch64 &amp; Other Architectures</option>
						</optgroup>
						<optgroup label="Creating &amp; Building Packages">
							<option value="38"<?php echo ($forum_id == 38) ? ' selected="selected"' : '' ?>>AUR Discussion and AUR Package Requests</option>
							<option value="4"<?php echo ($forum_id == 4) ? ' selected="selected"' : '' ?>>PKGBUILDs &amp; ABS Support</option>
						</optgroup>
						<optgroup label="Contributions and Userspace">
							<option value="20"<?php echo ($forum_id == 20) ? ' selected="selected"' : '' ?>>GNU/Linux Discussion</option>
							<option value="27"<?php echo ($forum_id == 27) ? ' selected="selected"' : '' ?>>Community Contributions</option>
							<option value="33"<?php echo ($forum_id == 33) ? ' selected="selected"' : '' ?>>General Programming Forum</option>
							<option value="47"<?php echo ($forum_id == 47) ? ' selected="selected"' : '' ?>>Artwork and Screenshots</option>
							<option value="29"<?php echo ($forum_id == 29) ? ' selected="selected"' : '' ?>>Off-Topic</option>
							<option value="42"<?php echo ($forum_id == 42) ? ' selected="selected"' : '' ?>>Try This</option>
							<option value="48"<?php echo ($forum_id == 48) ? ' selected="selected"' : '' ?>>Topics Going Nowhere</option>
							<option value="36"<?php echo ($forum_id == 36) ? ' selected="selected"' : '' ?>>Dust/troll-bin</option>
					</optgroup>
					</select>
					<input type="submit" value="<?php echo $lang_common['Go'] ?>" accesskey="g" />
					</label></div>
				</form>
