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

************************************************************************/


if (!isset($bbcode_form))
	$bbcode_form = 'post';
if (!isset($bbcode_field))
	$bbcode_field = 'req_message';

?>
						<script type="text/javascript">
						<!--
							function insert_text(open, close)
							{
								msgfield = (document.all) ? document.all.req_message : document.forms['<?php echo $bbcode_form ?>']['<?php echo $bbcode_field ?>'];

								// IE support
								if (document.selection && document.selection.createRange)
								{
									msgfield.focus();
									sel = document.selection.createRange();
									sel.text = open + sel.text + close;
									msgfield.focus();
								}

								// Moz support
								else if (msgfield.selectionStart || msgfield.selectionStart == '0')
								{
									var startPos = msgfield.selectionStart;
									var endPos = msgfield.selectionEnd;

									msgfield.value = msgfield.value.substring(0, startPos) + open + msgfield.value.substring(startPos, endPos) + close + msgfield.value.substring(endPos, msgfield.value.length);
									msgfield.selectionStart = msgfield.selectionEnd = endPos + open.length + close.length;
									msgfield.focus();
								}

								// Fallback support for other browsers
								else
								{
									msgfield.value += open + close;
									msgfield.focus();
								}

								return;
							}
						-->
						</script>
						<div style="padding-top: 4px">
							<input type="button" value=" B " name="B" onclick="insert_text('[b]','[/b]')" /> 
							<input type="button" value=" I " name="I" onclick="insert_text('[i]','[/i]')" />
							<input type="button" value=" U " name="U" onclick="insert_text('[u]','[/u]')" />
							<input type="button" value="http://" name="Url" onclick="insert_text('[url]','[/url]')" />
							<input type="button" value="Img" name="Img" onclick="insert_text('[img]','[/img]')" />
							<input type="button" value="Code" name="Code" onclick="insert_text('[code]','[/code]')" />
							<input type="button" value="Quote" name="Quote" onclick="insert_text('[quote]','[/quote]')" />
						</div>
						<div style="padding-top: 4px">
<?php

// Display the smiley set
require_once PUN_ROOT.'include/parser.php';

$smiley_dups = array();
$num_smilies = count($smiley_text);
for ($i = 0; $i < $num_smilies; ++$i)
{
	// Is there a smiley at the current index?
	if (!isset($smiley_text[$i]))
		continue;

	if (!in_array($smiley_img[$i], $smiley_dups))
		echo "\t\t\t\t\t\t\t".'<a href="javascript:insert_text(\''.$smiley_text[$i].'\', \'\');"><img src="img/smilies/'.$smiley_img[$i].'" width="15" height="15" alt="'.$smiley_text[$i].'" /></a>'."\n";

	$smiley_dups[] = $smiley_img[$i];
}

?>
						</div>
