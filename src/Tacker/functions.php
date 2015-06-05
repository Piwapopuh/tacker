<?php

function tacker_array_map_recursive(array $array, $f) {
    $map = array();

    foreach ($array as $k => $v) {
        $k = is_array($k) ? tacker_array_map_recursive($k, $f) : call_user_func($f, $k);
		$v = is_array($v) ? tacker_array_map_recursive($v, $f) : call_user_func($f, $v);
		$map[$k] = $v;
    }

    return $map;
}
