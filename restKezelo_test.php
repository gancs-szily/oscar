<?php
require_once 'restKezelo.php';

function RestKezeloTeszt(){
    $sr = new RestKezelo();
    $sr->sethttpFejlec(200);

    $responseData = array(
        'status' => 'OK',
        'message' => 'Sikeres válasz',
        'http_status_message' =>$sr->gethttpStatusUzenet(200)

    );
    echo json_encode($responseData);
}

RestKezeloTeszt();