<?php

define('PAGINATION_COUNT', 10);

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


function printTreeArray($array, $allMenu = "")
{
$sideMenu = "";

    foreach ($array as $value) {
        if (is_array($value['sub_menu']) && count($value['sub_menu']) > 0) {
            // $sideMenu = "";
            $sideMenu .= "<li class=' nav-item'><a href='" . $value["route"] . "'><i class='" . $value["icon"] . "'></i><span class='menu-title' data-i18n='nav.dash." . $value["title"] . "'>" . $value["title"] . "</span></a>";
            $sideMenu .= "<ul class='menu-content'>";
            $sideMenu .= printTreeArray($value['sub_menu'], $sideMenu);
            $sideMenu .= '</ul>';
            $allMenu = $sideMenu;
        }else{
            $sideMenu .= "<li class=' nav-item'><a href='" . $value["route"] . "'><i class='" . $value["icon"] . "'></i><span class='menu-title' data-i18n='nav.dash." . $value["title"] . "'>" . $value["title"] . "</span></a>";
            $allMenu = $sideMenu;
        }
    }
    return $allMenu;
}


function printMenuSidelList()
{
    $sideMenu = "";

    foreach (config('nav') as $array) {

        $sideMenu .=
            "<li class=' nav-item'><a href='" . $array["route"] . "'><i class='" . $array["icon"] . "'></i><span class='menu-title' data-i18n='nav.dash." . $array["title"] . "'>" . $array["title"] . "</span></a>";

        if (is_array($array['sub_menu']) && count($array['sub_menu']) > 0) {
            $sideMenu .= "<ul class='menu-content'>";
            $sideMenu .= printTreeArray($array, $sideMenu);
            $sideMenu .= '</ul>';
        }


    }
    return $sideMenu;
}