<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashbordController extends Controller
{


    function printTreeArray($array, $sideMenu = "")
    {
        foreach ($array as $value) {
            $sideMenu .= "<ul class='menu-content'>";
            if (is_array($value)) {

                $this->printTreeArray($value, $sideMenu);
            }

        }
        $sideMenu .= "</ul>";
        var_dump($sideMenu);
    }
    public function index()
    {
        // $sideMenu ="";

        //         foreach (config('nav') as $array) {

        //             $sideMenu .=
//                 "<li class=' nav-item'><a href='" . $array["route"] . "'><i class='" . $array["icon"] . "'></i><span class='menu-title' data-i18n='nav.dash." . $array["title"] . "'>" . $array["title"] . "</span></a>";
//             $str = $this->printTreeArray($array);

        //             return $sideMenu;

        
        return view('dashboard.index');

    }
}