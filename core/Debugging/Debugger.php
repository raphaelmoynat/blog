<?php

namespace Core\Debugging;

class Debugger
{

    public static function run()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        echo "<div style='background-color:red'>Debug Mode On</div>";
    }


}