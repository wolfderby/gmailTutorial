<?php

class Yoyo {

    public function __construct() {
        $this->include();
    }


    private function go()
    {
        $conn = new Connection();

        if($conn->is_connected()){
            //
            require_once("gmail.php");
            $gmail = new Gmail($conn->get_client());
            return $gmail->readLabels();
        }
        else {
            return $conn->get_unauthenticated_data();
        }
    }

}

$yoyo = new Yoyo();
echo "<!DOCTYPE html><html>";
echo $yoyo->go();
echo "</html>";