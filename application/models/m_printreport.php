<?php

class m_printreport extends CI_Model {

    function __construct() {
        
    }
    public function alldata() {
        $sql = "select * from registration_create_number";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
   public function getDocumentNo($level_institution_id,$level_institution){
        $sql = "select * from registration_receive_document  where instutition_receiver_id = '".$level_institution_id."' and instutition_receiver_level = '".$level_institution."' order by document_no asc ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    /*-----------------------------------------*/
    public function getLevelProvince(){
        $sql = "select institution_province_name as institution_province_name from institution_province  order by province_id asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getLevelAmphur(){
        $sql = "select institution_amphur_name as institution_province_name from institution_amphur  ";//order by province_id asc
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getLevelDistrict(){
        $sql = "select institution_district_name as institution_province_name from institution_district  ";//order by province_id asc
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
     public function getLevelFrom($level_institution_id ='',$level_institution= ''){
        $sql = "select distinct rcn.from as institution_province_name  from registration_create_number rcn  where level_institution_id = '".$level_institution_id."' and level_institution = '".$level_institution."'";//order by province_id asc
       
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    /*-----------------------------------------*/
    public function checkProvince($from = ""){
        $sql = "select distinct  doi.instutition_id  as instutition_id "
             . " ,doi.instutition_level as instutition_level "
             . " from institution_province ip "
             . " left join department_of_instutition doi on ip.province_id = doi.province_id and ip.id = doi.instutition_id "
             . "  where ip.institution_province_name = '".$from."'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
     }
     public function checkAmphur($from = ""){
        $sql = "select distinct doi.instutition_id as instutition_id ,doi.instutition_level as instutition_level"
             . " from  institution_amphur ia "
             . " left join department_of_instutition doi on ia.province_id = doi.province_id and ia.id = doi.instutition_id "
             . "  where ia.institution_amphur_name = '".$from."'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
     }
     
     public function checkDistrict($from = ""){
        $sql = "select distinct doi.instutition_id as instutition_id ,doi.instutition_level as instutition_level"
             . " from  institution_district idi "
             . " left join department_of_instutition doi on idi.province_id = doi.province_id and idi.id = doi.instutition_id "
             . " where idi.institution_district_name = '".$from."'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
     }
    
    
    
    
    public function getDataFromPrintReportBookReceive($department_id,$level_institution_id,$level_institution,$typeSelect,$from_number_of_run,$to_number_of_run,$startDate,$endDate,$subject,$to_receive,$number_of_run_1,$number_of_run_2,$number_of_run_3,$number_of_run_4,$number_of_run_5,$number_of_run_6,$number_of_run_7,$number_of_run_8,/*$from_send_id,$from_send_level*/$form_send){
        $srtWhere = "";
        $chk = false;
        $srtWhere = $srtWhere." rrd.instutition_receiver_id = '".$level_institution_id."'";
        $srtWhere = $srtWhere." and rrd.instutition_receiver_level    = '".$level_institution."'";
        
        //เลขทะเบียน
       if (trim($from_number_of_run) != "" && trim($to_number_of_run) != ""){
           if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rrdr.number_of_run between '".trim($from_number_of_run)."' and '".trim($to_number_of_run)."'";
        }else if (trim($from_number_of_run) == "" && trim($to_number_of_run) != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rrdr.number_of_run <= '".trim($to_number_of_run)."'";
        }else if (trim($from_number_of_run) != "" && trim($to_number_of_run) == ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($from_number_of_run)."'";
        }
        
        //จาก
        //if ($from_send_id != "" && $from_send_level != ""){
           //if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
           // $srtWhere = $srtWhere." rrd.instutition_sender_id = '".$from_send_id."' and rrd.instutition_sender_level = '".$from_send_level."'";
        //}
        
        if ($form_send != ""){
           if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rrd.from like '%".$form_send."%'";
        }
        
        //เอกสารเลขที่
        if (trim($department_id) != ""){
           if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rrd.document_no like '%".trim($department_id)."%'";
        }
        
        //วันที่
        if ($startDate != "" && $endDate != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rrd.receive_date between '".$startDate."' and '".$endDate."'";
        }else if ($startDate == "" && $endDate != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rrd.receive_date <= '".$endDate."'";
             
        }else if ($startDate != "" && $endDate == ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rrd.receive_date = '".$startDate."'";
        }
        
        //เรื่อง
        if (trim($subject) != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere."  rrd.subject like '%".trim($subject)."%'";
        }
        //ถึง
        if ($to_receive != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere."  rrd.to_receive like '%".trim($to_receive)."%'";
        }
         $srtWhere = $srtWhere." and rcn.registration_type     = '".$typeSelect."'";
        
        //เลขที่เอกสารหลายช่อง
        if (trim($number_of_run_1) != ""){
            if ($srtWhere != ""){
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($number_of_run_1)."'";
            $chk = true;
        }
        if (trim($number_of_run_2) != ""){
            if (trim($number_of_run_1) != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($number_of_run_2)."'";
            $chk = true;
        }
        if (trim($number_of_run_3) != ""){
            if (trim($number_of_run_1) != "" || trim($number_of_run_2) != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($number_of_run_3)."'";
            $chk = true;
        }
        if (trim($number_of_run_4) != ""){
             if (trim($number_of_run_1) != "" || trim($number_of_run_2) != "" || trim($number_of_run_3) != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($number_of_run_4)."'";
            $chk = true;
        }
        if (trim($number_of_run_5) != ""){
            if (trim($number_of_run_1) != "" || trim($number_of_run_2) != "" || trim($number_of_run_3) != "" || trim($number_of_run_4) != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($number_of_run_5)."'";
            $chk = true;
        }
        if (trim($number_of_run_6) != ""){
            if (trim($number_of_run_1) != "" || trim($number_of_run_2) != "" || trim($number_of_run_3) != "" || trim($number_of_run_4) != "" || trim($number_of_run_5) != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($number_of_run_6)."'";
            $chk = true;
        }
        if (trim($number_of_run_7) != ""){
            if (trim($number_of_run_1) != "" || trim($number_of_run_2) != "" || trim($number_of_run_3) != "" || trim($number_of_run_4) != "" || trim($number_of_run_5) != "" || trim($number_of_run_6) != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($number_of_run_7)."'";
            $chk = true;
        }
        if (trim($number_of_run_8) != ""){
            if (trim($number_of_run_1) != "" || trim($number_of_run_2) != "" || trim($number_of_run_3) != "" || trim($number_of_run_4) != "" || trim($number_of_run_5) != "" || trim($number_of_run_6) != "" || trim($number_of_run_7) != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rrdr.number_of_run = '".trim($number_of_run_8)."'";
            $chk = true;
        }
        if ($chk){
            $srtWhere = $srtWhere." )";
        }
        
       
        
        
        $sql = " select rrdr.number_of_run as number_of_run "
                //. " ,DATE_FORMAT(DATE_ADD(rrd.receive_date, INTERVAL 543  YEAR),'%d/%m/%Y')  as receive_date  "
                . " ,rrd.receive_date as receive_date "
                . " ,rrd.subject as subject "
                . " ,rrd.to_receive as to_receive "
                . " ,rcn.department_of_instutition_id as department_of_instutition_id "
                . " ,rcn.registration_type as registration_type "
                . " ,rrd.instutition_sender_id as instutition_sender_id "
                . " ,rrd.instutition_sender_level as instutition_sender_level"
                . " ,rrd.document_no as document_no "
                . " ,rrd.from "
                . " ,rrdr.registration_receive_document_id as registration_receive_document_id"
                . " ,rrd.registration_create_number_id as registration_create_number_id "
              
              
                . " from registration_receive_document_of_run rrdr "
                . " inner join registration_receive_document rrd on  "
                . " rrdr.registration_receive_document_id = rrd.registration_receive_document_of_run_id "
                . " inner join registration_create_number rcn on rrd.registration_create_number_id = rcn.id "
                . " where ".$srtWhere;
                
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    
    
    public function getDataFormPrintReportBookSend($from_number_of_run ="",$to_number_of_run ="",$startDate = "",$endDate ="",$subject ="",$to_receive="",$level_institution_id="",$level_institution="",$typeSelect="",$number_of_run_1,$number_of_run_2,$number_of_run_3,$number_of_run_4,$number_of_run_5,$number_of_run_6,$number_of_run_7,$number_of_run_8,$form_send){
        $srtWhere = "";
        $chk = false;
        $srtWhere = $srtWhere." rcnr.level_institution_id = '".$level_institution_id."'";
        $srtWhere = $srtWhere." and rcnr.level_institution    = '".$level_institution."'";
        //เลขทะเบียน
       if ($from_number_of_run != "" && $to_number_of_run != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rcnr.number_of_run between $from_number_of_run and $to_number_of_run";
        }else if ($from_number_of_run == "" && $to_number_of_run != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rcnr.number_of_run <= $to_number_of_run";
        }else if ($from_number_of_run != "" && $to_number_of_run == ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rcnr.number_of_run = $from_number_of_run ";
        }
        //วันที่
        if ($startDate != "" && $endDate != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rcn.dated_send between '".$startDate."' and '".$endDate."'";
        }else if ($startDate == "" && $endDate != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rcn.dated_send <= '".$endDate."'";
             
        }else if ($startDate != "" && $endDate == ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere." rcn.dated_send = '".$startDate."'";
           
        }
        //จาก
        if ($form_send != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere."  rcn.from like '%".$form_send."%'";
        }
        //เรื่อง
        if ($subject != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere."  rcn.subject like '%".$subject."%'";
        }
        //ถึง
        if ($to_receive != ""){
            if ($srtWhere != ""){$srtWhere = $srtWhere." and ";}
            $srtWhere = $srtWhere."  rcn.to_receive like '%".$to_receive."%'";
        }
        
        
        $srtWhere = $srtWhere." and rcn.registration_type     = '".$typeSelect."'";
        
        if ($number_of_run_1 != ""){
            if ($srtWhere != ""){
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rcnr.number_of_run = $number_of_run_1 ";
            $chk = true;
        }
        if ($number_of_run_2 != ""){
            if ($number_of_run_1 != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rcnr.number_of_run = $number_of_run_2 ";
            $chk = true;
        }
        if ($number_of_run_3 != ""){
            if ($number_of_run_1 != "" || $number_of_run_2 != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rcnr.number_of_run = $number_of_run_3 ";
            $chk = true;
        }
        if ($number_of_run_4 != ""){
             if ($number_of_run_1 != "" || $number_of_run_2 != "" || $number_of_run_3 != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rcnr.number_of_run = $number_of_run_4 ";
            $chk = true;
        }
        if ($number_of_run_5 != ""){
            if ($number_of_run_1 != "" || $number_of_run_2 != "" || $number_of_run_3 != "" || $number_of_run_4 != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rcnr.number_of_run = $number_of_run_5 ";
            $chk = true;
        }
        if ($number_of_run_6 != ""){
            if ($number_of_run_1 != "" || $number_of_run_2 != "" || $number_of_run_3 != "" || $number_of_run_4 != "" || $number_of_run_5 != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rcnr.number_of_run = $number_of_run_6 ";
            $chk = true;
        }
        if ($number_of_run_7 != ""){
            if ($number_of_run_1 != "" || $number_of_run_2 != "" || $number_of_run_3 != "" || $number_of_run_4 != "" || $number_of_run_5 != "" || $number_of_run_6 != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rcnr.number_of_run = $number_of_run_7 ";
            $chk = true;
        }
        if ($number_of_run_8 != ""){
            if ($number_of_run_1 != "" || $number_of_run_2 != "" || $number_of_run_3 != "" || $number_of_run_4 != "" || $number_of_run_5 != "" || $number_of_run_6 != "" || $number_of_run_7 != ""){
                $srtWhere = $srtWhere." or ";
            }else{
                $srtWhere = $srtWhere." and( ";
            }
            $srtWhere = $srtWhere." rcnr.number_of_run = $number_of_run_8 ";
            $chk = true;
        }
        if ($chk){
            $srtWhere = $srtWhere." )";
        }
        
        
        
        $srtWhere = $srtWhere." and rcn.registration_type     = '".$typeSelect."'";
        $sql = " select rcnr.number_of_run as number_of_run "
             //. "       ,DATE_FORMAT(DATE_ADD(rcn.dated_send, INTERVAL 543  YEAR),'%d/%m/%Y')     as dated_send    "
             . "       ,rcn.dated_send                   as dated_send    "
             . "       ,rcn.from "
             . "       ,rcn.subject                      as subject       "
             . "       ,rcn.to_receive                   as to_receive    "
             . "       ,rcn.department_of_instutition_id as department_of_instutition_id "
             . "       ,rcn.registration_type            as registration_type "
             . "       ,rcn.level_institution_id         as level_institution_id "
             . "       ,rcn.level_institution            as level_institution "
             . "       ,rcnr.id  "
             . "       ,rcn.use_instutition_id           as use_instutition_id "
             . "       ,rcn.use_instutition_level        as use_instutition_level"
             . " from  registration_create_number_of_run rcnr "
             . " inner join registration_create_number rcn on rcnr.registration_create_number_id = rcn.id "
             . "            and rcnr.id = rcn.registration_create_number_of_run_id "
             . " where ".$srtWhere;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
        
    }

    public  function getDataForPrintReport($level_institution_id = "",$level_institution = "", $startDate = "",$endDate = ""){
        $strWhere = "";
        if ($level_institution_id != ""){
            $strWhere = $strWhere." rcnr.level_institution_id = '".$level_institution_id."'";
        }
        if ($level_institution != ""){
            if ($strWhere != ""){$strWhere = $strWhere." and ";}
            $strWhere = $strWhere." rcnr.level_institution = '".$level_institution."'";
        }
        if ($startDate != "" && $endDate != ""){
            if ($strWhere != ""){$strWhere = $strWhere." and ";}
            $strWhere = $strWhere." rcn.dated_send between '".$startDate."' and '".$endDate."'";
        }else if ($startDate == "" && $endDate != ""){
            if ($strWhere != ""){$strWhere = $strWhere." and ";}
            $strWhere = $strWhere." rcn.dated_send <= '".$endDate."'";
        }else if ($startDate != "" && $endDate == ""){
            if ($strWhere != ""){$strWhere = $strWhere." and ";}
            $strWhere = $strWhere." rcn.dated_send = '".$startDate."'";
        }
        $sql = " select count(rcnr.id) as count_row "
              ." from registration_create_number_of_run rcnr "
              ." inner join registration_create_number rcn on rcnr.registration_create_number_id = rcn.id "
              ." and rcnr.id = rcn.registration_create_number_of_run_id "
              ." where ".$strWhere;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;

      }

}

?>
