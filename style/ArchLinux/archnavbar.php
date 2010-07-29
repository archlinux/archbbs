<div id="archnavbar" class="anb-forum">
	<div id="archnavbarlogo"><h1><a href="<?php if (isset($arch_home)) { echo $arch_home; } ?>">Arch Linux</a></h1></div>
	<div id="archnavbarmenu">
		<ul id="archnavbarlist">
			<?php
			if (isset($arch_navbar)) {
				foreach ($arch_navbar as $name => $url) {
					echo '<li id="anb-'.strtolower($name).'"'
						.(isset($arch_navbar_selected) && $arch_navbar_selected == $name ? ' class="anb-selected"' : '')
						.'><a href="'.$url.'">'.$name.'</a></li>';
				}
			}
			?>
		</ul>
	</div>
</div>
