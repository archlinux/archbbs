<?php

$cssSums = '';

foreach (array('arch', 'archnavbar', 'responsive') as $cssFile) {
    $cssSums .= sha1_file(__DIR__ . '/' . $cssFile . '.css');
}
?>
<link rel="stylesheet" media="screen" href="style/ArchLinux/css_loader.php?v=<?= sha1($cssSums) ?>"/>
