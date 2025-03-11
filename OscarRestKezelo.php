<?php
include("restKezelo.php");
include("oscar.php");

class OscarRestKezelo extends RestKezelo{
    function getAllOscars(){
        $oscars=new Oscar();
        $sorAdat=$oscars->getAllOscars();

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat=array('error'=>"No oscars found");
        }else {
            $statusCode=200;
        }

        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        $result['Oscars']=$sorAdat;
        $response=$this->encodeJson($result);
        $file_path="OscarsByType.json";
        $this->printfile($response,$file_path);
        echo $response;
    }

    function getOscarsByID($m_ID){
        $oscars=new Oscar();
        $sorAdat=$oscars->getOscarsByID($m_ID);

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat=array('error'=>"No oscars found by ID");
        }else {
            $statusCode=200;
        }

        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        $result['OscarsById']=$sorAdat;
        $response=$this->encodeJson($result);
        $file_path="OscarsById.json";
        $this->printfile($response,$file_path);
        echo $response;
    }

    function getOscarsByType($Mt_name){
        $oscars=new Oscar();
        $sorAdat=$oscars->getOscarsByType($Mt_name);

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat=array('error'=>"No oscars found by this TYPE");
        }else {
            $statusCode=200;
        }

        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        $result['OscarsByType']=$sorAdat;
        $response=$this->encodeJson($result);
        $file_path="OscarsByType.json";
        $this->printfile($response,$file_path);
        echo $response;
    }

    function getFault(){
        $statusCode=400;
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/jon; charset=UTF-8');
        $sorAdat=array('error'=>'Bad request');
        $result['Fault']=$sorAdat;

        $response=$this->encodeJson($result);
        $file_path="Fault.json";
        $this->printfile($response,$file_path);
        echo $response;
    }

    function encodeJson($responseData){
        return json_encode($responseData,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function printfile($responseData,$file_path){
        file_put_contents($file_path,$responseData,LOCK_EX);
    }
}