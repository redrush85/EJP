<?php
if ($vars['elements']) {
    foreach ($vars['elements'] as $ind => $val) {
        $vars[$ind] = $val;
    }
    unset ($vars['elements']);

}