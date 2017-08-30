<?php

$cssSums = '';

foreach (array('arch', 'archnavbar') as $cssFile) {
    $cssSums .= sha1_file(__DIR__ . '/' . $cssFile . '.css');
    ?>
    <link rel="stylesheet" media="screen" href="style/ArchLinux/<?= $cssFile ?>.css?v=<?= sha1($cssSums) ?>"/>
    <?php
}
