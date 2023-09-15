<?php

class PollingModel extends Server {

    public function getAllStates() {
        $dbh=self::connect();

        $sql = "SELECT * FROM states ORDER BY state_name";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0){return $results;} else{return 1;}

    }

    public function getAllLga($stateid) {
        $dbh=self::connect();

        $stateid=(int) $stateid ;
        $sql = "SELECT lga_name, lga_id FROM lga WHERE state_id =:st ORDER BY lga_name";
       
        $query = $dbh -> prepare($sql);
        $query->bindParam(':st',$stateid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $datas = json_encode((array)$results) ;
        return $datas;

    }

    public function getAllLgaPollingUnit($lga_id) { 
        $dbh=self::connect();

        $lga_id=(int) $lga_id ;
        // $sql = " SELECT a.lga_name, a.lga_id,c.polling_unit_uniqueid, c.party_abbreviation, c.party_score, b.* FROM 
        // lga a ,polling_unit b, announced_pu_results c WHERE (a.lga_id = b.lga_id AND b.uniqueid = c.polling_unit_uniqueid)
       
        // ";
        $sql = "SELECT a.lga_name, a.lga_id, b.* FROM lga a,polling_unit b WHERE a.lga_id = b.lga_id AND b.lga_id=:lga ";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':lga',$lga_id,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $datas = json_encode((array)$results) ;
        return $datas;

    }

    public function sumLgaPollingUnit($lga_id) { 
        $dbh=self::connect();

        $lga_id=(int) $lga_id ;
        $sql = " SELECT a.lga_id, b.lga_id, b.uniqueid, b.polling_unit_name, c.*, SUM(c.party_score) As sumtotal FROM lga a, polling_unit b, announced_pu_results c
         WHERE b.lga_id =a.lga_id AND c.polling_unit_uniqueid= b.uniqueid GROUP BY c.polling_unit_uniqueid 
        ";
       
        $query = $dbh -> prepare($sql);
        // $query->bindParam(':lga',$lga_id,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $datas = json_encode((array)$results) ;
        return $datas;

    }

    public function getAllPollingUnits() {
        $dbh=self::connect();

        $sql = "SELECT * FROM polling_unit ORDER BY polling_unit_name";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0){return $results;} else{return 1;}

    }

    public function getAllParties() {
        $dbh=self::connect();

        $sql = "SELECT * FROM party ORDER BY partyname";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0){return $results;} else{return 1;}

    }





}


?>