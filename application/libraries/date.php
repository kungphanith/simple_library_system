<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Date {
    public function get_date_now(){
    	date_default_timezone_set('Asia/Bangkok');
        return (new \DateTime())->format('Y-m-d H:i:s');
    }
    public function format_date($date_string){
    	return	date("Y/m/d", strtotime($date_string));
    }
}