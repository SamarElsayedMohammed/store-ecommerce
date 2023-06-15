<?php

use Illuminate\Support\Facades\Route;

function getFolder()
{

    return app()->getLocale() == 'ar' ? '-rtl' : '';
}


function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    return $filename;
}

function getRouteName($route)
{

    if (count($route) > 1) {
        return route(array_shift($route), end($route));
    } else {
        return route(array_shift($route));

    }

}
function printTreeArray($array, $allMenu = "")
{
    $sideMenu = "";


    foreach ($array as $value) {

        if (is_array($value['sub_menu']) && count($value['sub_menu']) > 0) {

            $sideMenu .= "<li class=' nav-item'><a href='";
            $sideMenu .= getRouteName($value["route"]);
            $sideMenu .= "'><i class='" . $value["icon"] . "'></i><span class='menu-title' data-i18n='nav.dash." . $value["title"] . "'>" . $value["title"] . "</span></a>";
            $sideMenu .= "<ul class='menu-content'>";
            $sideMenu .= printTreeArray($value['sub_menu'], $sideMenu);
            $sideMenu .= '</ul>';
            $allMenu = $sideMenu;
        } else {
            $sideMenu .= "<li class=' nav-item'><a href='";
            $sideMenu .= getRouteName($value["route"]);
            $sideMenu .= "'><i class='" . $value["icon"] . "'></i><span class='menu-title' data-i18n='nav.dash." . $value["title"] . "'>" . $value["title"] . "</span></a>";
            $allMenu = $sideMenu;
        }
    }
    return $allMenu;
}
function random_string($length)
{
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}