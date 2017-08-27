<?php

header('Content-type: text/css; charset=UTF-8');
header('Cache-Control: public, max-age=' . (6 * 30 * 24 * 60 * 60));

foreach (array('arch', 'archnavbar', 'responsive') as $cssFile) {
    include __DIR__ . '/' . $cssFile . '.css';
}
