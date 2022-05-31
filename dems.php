<?php 
    $string = 'Ruchika < ruchika@gmail.cm >';
    $pattern = '/[a-z0-9_\-\+\.]+@gmail+\.com/i';
    preg_match_all($pattern, $string, $matches);
    var_dump($matches[0]);
?>