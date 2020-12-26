<?php

class Yoyo {

    public function __construct() {
        $this->include();
    }

    private function include() {
        require __DIR__ . '/vendor/autoload.php';
        include "connection.php";
    }

    public function go()
    {
        $conn = new Connection();

        if($conn->is_connected()){
            //
            require_once("gmail.php");
            $gmail = new Gmail($conn->get_client());
            //return $gmail->readLabels();
            return $gmail->listMessages();
        }
        else {
            //return "<p>test success</p>";
            return $conn->get_unauthenticated_data();
        }
    }

}

$yoyo = new Yoyo();

$out = $yoyo->go();

foreach($out as $disp){
    echo $disp;
}