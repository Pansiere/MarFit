<?php
function dd(...$variavel)
{
    echo "<pre>";
    print_r($variavel);
    echo "</pre>";
    die('');
};
