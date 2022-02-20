<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * filename: utilities_helper.php
 * date: 2019/03/20
 * description: Utilites helper. contains all helper functions
 */

if(!function_exists("renderTemplate")) {
    function renderTemplate($page,$data=null) {
        $ci =& get_instance();

        $ci->load->view("template/header",$data);
        $ci->load->view($page,$data);
        $ci->load->view("template/footer",$data);
    }
}

if(!function_exists("getTypeOfConduits")) {
    function getTypeOfConduits($id) {
        $CI =& get_instance();
        $CI->load->model("conduits_model");
        $result = $CI->conduits_model->retrieveTypeConduitsById($id);
        return isset($result->name) ? $result->name : "";
    }
}

if(!function_exists("getTypeOfInsulation")) {
    function getTypeOfInsulation($id) {
        $CI =& get_instance();
        $CI->load->model("insulation_model");
        $result = $CI->insulation_model->retrieveTypeInsulationById($id);
        return isset($result->name) ? $result->name : "";
    }
}

if(!function_exists("getLoadTypeByName")) {
    function getLoadTypeByName($name) {
        $CI =& get_instance();
        $CI->load->model("loadtype_model");
        $result = $CI->loadtype_model->retrieveLoadTypeByName($name);
        return isset($result) ? $result->id : "";
    }
}

if(!function_exists("getSARByValue")) {
    function getSARByValue($value,$opt="") {
        $CI =& get_instance();
        $CI->load->model("sar_model");
        if ($opt == 1) {
            $result = $CI->sar_model->retrieveSARByValue2($value);
        } else {
            $result = $CI->sar_model->retrieveSARByValue($value);
        }
        
        return isset($result) ? $result[0]->value : "";
    }
}

if(!function_exists("getOccupancies")) {
    function getOccupancies($id) {
        $CI =& get_instance();
        $CI->load->model("occupancies_model");
        $result = $CI->occupancies_model->retrieveTypeOccupanciesById($id);
        return isset($result->name) ? $result->name : "";
    }
}

if(!function_exists("getLoadDescById")) {
    function getLoadDescById($id) {
        $CI =& get_instance();
        $CI->load->model("loaddescription_model");
        $result = $CI->loaddescription_model->retrieveAllLoadDescriptionByPanelId($id);
        return $result;
    }
}

if(!function_exists("isWireConduitValid")) {
    function isWireConduitValid($wire, $tempRating, $insulation) {
        $CI =& get_instance();
        $CI->load->model("wireconduit_model");
        //echo "insulation: $insulation, tempRating: $tempRating, wire: $wire, cbAT: $cbAT<br/>";
        
        //insulation: thhn, temp rating: 90, wire: aluminum
        $result = false;
        if ($insulation == 7 && $tempRating == 3 && $wire == 2) {
            $result = true;
            //insulation: thhn, temp rating: 90, wire: copper
        } else if ($insulation == 7 && $tempRating == 3 && $wire == 1) {
            $result = true;
            //insulation: thhw, temp rating: 75, wire: aluminum
        } else if ($insulation == 4 && $tempRating == 2 && $wire == 2) {
            $result = true;
            //insulation: thhw, temp rating: 75, wire: copper
        } else if ($insulation == 4 && $tempRating == 2 && $wire == 1) {
            $result = true;
            //insulation: thhw, temp rating: 90, wire: aluminum
        } else if ($insulation == 4 && $tempRating == 3 && $wire == 2) {
            $result = true;
            //insulation: thhw, temp rating: 90, wire: copper
        } else if ($insulation == 4 && $tempRating == 3 && $wire == 1) {
            $result = true;
            //insulation: thw, temp rating: 75, wire: aluminum
        } else if ($insulation == 5 && $tempRating == 2 && $wire == 2) {
            $result = true;
            //insulation: thw, temp rating: 75, wire: copper
        } else if ($insulation == 5 && $tempRating == 2 && $wire == 1) {
            $result = true;
            //insulation: thw, temp rating: 90, wire: aluminum
        } else if ($insulation == 5 && $tempRating == 3 && $wire == 2) {
            $result = true;
            //insulation: thw, temp rating: 90, wire: copper
        } else if ($insulation == 5 && $tempRating == 3 && $wire == 1) {
            $result = true;
            //insulation: tw, temp rating: 60, wire: aluminum
        } else if ($insulation == 2 && $tempRating == 1 && $wire == 2) {
            $result = true;
            //insulation: tw, temp rating: 60, wire: copper
        } else if ($insulation == 2 && $tempRating == 1 && $wire == 1) {
            $result = true;
            //insulation: xhhw, temp rating: 75, wire: aluminum
        } else if ($insulation == 6 && $tempRating == 2 && $wire == 2) {
            $result = true;
            //insulation: xhhw, temp rating: 75, wire: copper
        } else if ($insulation == 6 && $tempRating == 2 && $wire == 1) {
            $result = true;
            //insulation: xhhw, temp rating: 90, wire: aluminum
        } else if ($insulation == 6 && $tempRating == 3 && $wire == 2) {
            $result = true;
            //insulation: xhhw, temp rating: 90, wire: copper
        } else if ($insulation == 6 && $tempRating == 3 && $wire == 1) {
            $result = true;
        }
        return $result;
    }
}

if(!function_exists("getWireConduit")) {
    function getWireConduit($wire, $tempRating, $insulation, $cbAT) {
        $CI =& get_instance();
        $CI->load->model("wireconduit_model");
        //echo "insulation: $insulation, tempRating: $tempRating, wire: $wire, cbAT: $cbAT<br/>";
        //insulation: thhn, temp rating: 90, wire: aluminum
        if ($insulation == 7 && $tempRating == 3 && $wire == 2) {
            $result = $CI->wireconduit_model->retrieveTHHN90DegAluminum($cbAT);
            //insulation: thhn, temp rating: 90, wire: copper
        } else if ($insulation == 7 && $tempRating == 3 && $wire == 1) {
            $result = $CI->wireconduit_model->retrieveTHHN90DegCopper($cbAT);
            //insulation: thhw, temp rating: 75, wire: aluminum
        } else if ($insulation == 4 && $tempRating == 2 && $wire == 2) {
            $result = $CI->wireconduit_model->retrieveTHHW75DegAluminum($cbAT);
            //insulation: thhw, temp rating: 75, wire: copper
        } else if ($insulation == 4 && $tempRating == 2 && $wire == 1) {
            $result = $CI->wireconduit_model->retrieveTHHW75DegCopper($cbAT);
            //insulation: thhw, temp rating: 90, wire: aluminum
        } else if ($insulation == 4 && $tempRating == 3 && $wire == 2) {
            $result = $CI->wireconduit_model->retrieveTHHW90DegAluminum($cbAT);
            //insulation: thhw, temp rating: 90, wire: copper
        } else if ($insulation == 4 && $tempRating == 3 && $wire == 1) {
            $result = $CI->wireconduit_model->retrieveTHHW90DegCopper($cbAT);
            //insulation: thw, temp rating: 75, wire: aluminum
        } else if ($insulation == 5 && $tempRating == 2 && $wire == 2) {
            $result = $CI->wireconduit_model->retrieveTHW75DegAluminum($cbAT);
            //insulation: thw, temp rating: 75, wire: copper
        } else if ($insulation == 5 && $tempRating == 2 && $wire == 1) {
            $result = $CI->wireconduit_model->retrieveTHW75DegCopper($cbAT);
            //insulation: thw, temp rating: 90, wire: aluminum
        } else if ($insulation == 5 && $tempRating == 3 && $wire == 2) {
            $result = $CI->wireconduit_model->retrieveTHW90DegAluminum($cbAT);
            //insulation: thw, temp rating: 90, wire: copper
        } else if ($insulation == 5 && $tempRating == 3 && $wire == 1) {
            $result = $CI->wireconduit_model->retrieveTHW90DegCopper($cbAT);
            //insulation: tw, temp rating: 60, wire: aluminum
        } else if ($insulation == 2 && $tempRating == 1 && $wire == 2) {
            $result = $CI->wireconduit_model->retrieveTW60DegAluminum($cbAT);
            //insulation: tw, temp rating: 60, wire: copper
        } else if ($insulation == 2 && $tempRating == 1 && $wire == 1) {
            $result = $CI->wireconduit_model->retrieveTW60DegCopper($cbAT);
            //insulation: xhhw, temp rating: 75, wire: aluminum
        } else if ($insulation == 6 && $tempRating == 2 && $wire == 2) {
            $result = $CI->wireconduit_model->retrieveXHHW75DegAluminum($cbAT);
            //insulation: xhhw, temp rating: 75, wire: copper
        } else if ($insulation == 6 && $tempRating == 2 && $wire == 1) {
            $result = $CI->wireconduit_model->retrieveXHHW75DegCopper($cbAT);
            //insulation: xhhw, temp rating: 90, wire: aluminum
        } else if ($insulation == 6 && $tempRating == 3 && $wire == 2) {
            $result = $CI->wireconduit_model->retrieveXHHW90DegAluminum($cbAT);
            //insulation: xhhw, temp rating: 90, wire: copper
        } else if ($insulation == 6 && $tempRating == 3 && $wire == 1) {
            $result = $CI->wireconduit_model->retrieveXHHW90DegCopper($cbAT);
        }

        //$result = $CI->wireconduit_model->retrieveTypeOccupanciesById($id);
        return isset($result) ? $result : "";
    }
}

if(!function_exists("getGroundingConduit")) {
    function getGroundingConduit($insulation, $wire, $value) {
        $CI =& get_instance();
        $CI->load->model("groundingconduit_model");
        //wire 1 is copper, 2 is aluminum
        if($insulation == 2) { //insulation = tw
            $data = $CI->groundingconduit_model->retrieveGroundingTw($value);
            $result = $wire == 1 ? $data->copper : $data->aluminum;
        } else if ($insulation == 5) { //insulation thw
            $data = $CI->groundingconduit_model->retrieveGroundingThw($value);
            $result = $wire == 1 ? $data->copper : $data->aluminum;
        } else if ($insulation == 4) { //insulation thhw
            $data = $CI->groundingconduit_model->retrieveGroundingThhw($value);
            $result = $wire == 1 ? $data->copper : $data->aluminum;
        } else if ($insulation == 7) { //insulation thhn
            $data = $CI->groundingconduit_model->retrieveGroundingThhn($value);
            $result = $wire == 1 ? $data->copper : $data->aluminum;
        } else if ($insulation == 6) {
            $data = $CI->groundingconduit_model->retrieveGroundingXhhw($value);
            $result = $wire == 1 ? $data->copper : $data->aluminum;
        }
        return $result;
    }
}

if(!function_exists("getAFRatingsByAT")) {
    function getAFRatingsByAT($value) {
        if($value >= 15 && $value <= 50) {
            $afValue = 50;
        } else if ($value >= 60 && $value <= 100) {
            $afValue = 100;
        } else if ($value >= 110 && $value <= 225) {
            $afValue = 225;
        } else if ($value >= 250 && $value <= 500) {
            $afValue = 500;
        } else if ($value >= 600 && $value <= 1000) {
            $afValue = 1000;
        } else if ($value >= 1200 && $value <= 2500) {
            $afValue = 2500;
        } else if ($value >= 3000) {
            $afValue = 6000;
        }
        return $afValue;
    }
}

if(!function_exists("voltageArray")) {
    function voltageArray() {
        return array(1 => 230, 2 => 460);
    }
}

if(!function_exists("getVoltageValueByIndex")) {
    function getVoltageValueByIndex($id) {
        foreach (voltageArray() as $k => $value) {
            if($id == $k) return $value;
        }
    }
}

if(!function_exists("typeProtectionArray")) {
    function typeProtectionArray() {
        return array(1 => "Non time delay fuse",
                     2 => "Inverse time");
    }
}

if(!function_exists("typeWireArray")) {
    function typeWireArray() {
        return array(1 => "Copper",
                     2 => "Aluminum");
    }
}

if(!function_exists("tempRatingArray")) {
    function tempRatingArray() {
        return array(1 => 60,
                     2 => 75,
                     3 => 90);
    }
}

if(!function_exists("numberOfGangPerOutlet")) {
    function numberOfGangPerOutlet() {
        return array(1,2,3,4);
    }
}

if(!function_exists("loadSupply")) {
    function loadSupply() {
        return array(1,2,3,4);
    }
}

if(!function_exists("typeOfRating")) {
    function typeOfRating() {
        return array(1 => "HP",
                     2 => "KW");
    }
}

if(!function_exists("fireAlarmConductorSize")) {
    function fireAlarmConductorSize() {
        return array("0.75 sq mm","1.25 sq mm");
    }
}

if(!function_exists("fireAlarmInsulationTypes")) {
    function fireAlarmInsulationTypes() {
        return array("KF-2","KFF-2","PAFF","PTFF","PF","PFF",
            "PGF","PGFF","RFH-2","RFHH-2","RFHH-3","SF-2",
            "SFF-2","TF","TFF","TFN","TFFN","ZF","ZFF");
    }
}




/*function getSoftwareCateryValueById($id) {
    $CI =& get_instance();
    $CI->load->model("category_model");
    $result = $CI->category_model->getSoftwareCategoryById($id);
    //var_dump($result->name);
    return isset($result->name) ? $result->name : "";
}*/