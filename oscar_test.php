<?php
require_once("oscar.php");


function testGetAllOscars() {

    $oscarObj = new Oscar();

    $oscars = $oscarObj->getAllOscars();

    if(empty($oscars)) {
        echo "Nincs adat <br>";
    } else {
        echo "Oscarok listája: <br>";
        foreach ($oscars as $oscar) {
            echo "ID: " . $oscar['m_ID'] . " | Cím: " . $oscar['title'] . "<br>";
        }
    }
}

testGetAllOscars();
?>