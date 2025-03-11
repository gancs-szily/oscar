<?php
require_once ("OscarRestkezelo.php");
$view="";
if(isset($_GET['view'])){
    $view=$_GET['view'];
    switch ($view) {
        case 'all':
            $Oscarrest= new OscarRestKezelo();
            $Oscarrest->getAllOscars();
            break;
            
        case 'single':
            $Oscarrest= new OscarRestKezelo();
            $Oscarrest->;
            break;

        default:
            # code...
            break;
    }
}