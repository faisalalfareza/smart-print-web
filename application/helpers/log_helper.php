<?php

function helper_log($tipe = "", $str = "") {
    $CI =& get_instance();
 
    if (strtolower($tipe) == "logout") { $log_tipe = 0; }
    elseif (strtolower($tipe) == "login") { $log_tipe = 1; }
    elseif (strtolower($tipe) == "add") { $log_tipe = 2; }
    elseif (strtolower($tipe) == "update"){ $log_tipe = 3; }
    elseif (strtolower($tipe) == "delete"){ $log_tipe = 4; }
    elseif (strtolower($tipe) == "asign"){ $log_tipe = 5; }
    elseif (strtolower($tipe) == "confirm"){ $log_tipe = 6; }
    else { $log_tipe  = 7; }

    /* column and the data you want to record  */
    $param['log_userid']    = $CI->session->userdata('sc_sess')['UserId'];
    $param['log_useremail'] = $CI->session->userdata('sc_sess')['UserEmail'];
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;
 
    //load model log
    $CI->load->model('home/mlog');
    //save to database
    $CI->mlog->save_log($param);
 
}

?>