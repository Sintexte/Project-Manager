<?php 
    $title = "";
    $desc = "";
    $status = "";
    if(isset($_GET["title"]) && isset($_GET["description"]) && isset($_GET["status"]))
    {
        $title = $_GET["title"];
        $desc  = $_GET["description"];
        $status = $_GET["status"];
        $json = json_decode(file_get_contents("../projects.json"),true);
        if($json == null){
            $json = [];
            $id = 0;
        }else{
            $id = $json[sizeof($json)-1]["id"]+1;
        }
        array_push($json,array("id"=>$id,"name"=>$title,"description"=>$desc,"status"=>$status));
        $fp = fopen('../projects.json', 'w');
        fwrite($fp, json_encode($json));
        fclose($fp);
        print_r($json);
    }
?>