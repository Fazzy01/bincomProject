<?php

  ini_set("display_errors",1); 

    //Auto Load Classes
    require_once("auto_loader.php");

    //  Global Variables
    $data= "";
    $page="home.php";
    $msg="";
    $link=explode("/",$_GET["url"]);
    $url=$link[0];
    $controller="";

    if(isset($_GET["get-lga"])){
        $controller = new PollingController;
        $datar =  $controller->getAllLga() ;
        print_r ( $datar);
        exit();
    }

    if(isset($_GET["get-lga-pollingunit"])){
        $controller = new PollingController;
        $datar =  $controller->getAllLgaPollingUnit() ;
        print_r ( $datar);
        exit();
    }

    if(isset($_GET["sum-lga-pollingunit"])){
        $controller = new PollingController ;
        $datar =  $controller->sumLgaPollingUnit() ;
        print_r ( $datar) ;
        exit();
    }


       

    createView($url);
    if($page == "home.php"){createView("home");}

    function createView($url){
        if(file_exists($url.".php")){
            global $data,$page;       
            $page=$url.".php";
            $data= getDataIfAny($url);
        }
    }

    function getDataIfAny($page){
        global $urlAddon;
        $controller = new PollingController;
        switch($page){
            case "home":
                $data=$controller->getAllStates();
                return $data;

                break;
            
            case "question2":
                $data=$controller->getAllStates();
                return $data;
                
                break;

            case "question3":
                $data = array() ;
                $data[0] = $controller->getAllPollingUnits();
                $data[1] = $controller->getAllParties();
                return $data;
                
                break;

        default:
        
            return "";

            
        }
    }





?>