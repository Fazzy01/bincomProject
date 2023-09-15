<?php

class PollingController {
    protected $model;

    public function __construct() {
        $this->model = new PollingModel ;
    }

    // get All States
    public function getAllStates() {
        $data=$this->model->getAllStates();
        return $data;
    }

    // get All Lga
    public function getAllLga() {
        extract($_POST);
        $data=$this->model->getAllLga($state_id);
        return ( $data) ;

    }

    // get All Lga Polling Unit
    public function getAllLgaPollingUnit() {
        extract($_POST);
        $data=$this->model->getAllLgaPollingUnit($lga_id);
        return ( $data) ;

    }

    // sum Lga Polling Unit
    public function sumLgaPollingUnit() {
        extract($_POST);
        $data=$this->model->sumLgaPollingUnit($lga_id);
        return ( $data) ;

    }

    // getAllPollingUnits
    public function getAllPollingUnits(){
        $data=$this->model->getAllPollingUnits();
		return $data;
    }

    // getAllParties
    public function getAllParties(){
        $data=$this->model->getAllParties();
		return $data;
    }


   

    
}

?>