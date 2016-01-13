<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Image_Model extends CI_Model{
    function do_upload($field_name, $store_path){// return as string | Example: ('img_name', '/public/image/../')
			$config['upload_path'] = './public/temp_image/'; // the name of the folder image in base_url.....
			$config['allowed_types'] = 'gif|jpg|png|icon'; // file type.......
			$config['max_size']	= 10000; // File size as in kilobytes (KB)
			$config['file_name'] = 'STB0';
			$config['override']	= 'false';
			$config['max_width']  = '30000'; // Max width as pixcel
			$config['max_height']  = '30000'; //// Max height as pixcel
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config); // load library upload..........
			if ( ! $this->upload->do_upload($field_name))
			{
				return false;
			}
			else{
				$data_img = array();
				$data_img = $this->upload->data();
				$temp_path = $data_img['full_path'];
				$temp_file_name = $data_img['file_name'];
				if($this->resize($temp_path , $temp_file_name, $store_path)){
					return $temp_file_name;
				}
				else{
					return false;
				}
			}
	}
	public function resize($source_path, $file, $store_path){
		$config['image_library']='gd2';
		$config['source_image']=$source_path;
		$config['create_thumb']=false;
		$config['maintain_ratio']=true;
		$config['width']=400;
		$config['height']=400;
		// $config['new_image']='./public/images/ads_images/'.$file;
		$config['new_image']='.'.$store_path.$file;
		$this->load->library('image_lib',$config );
		if ($this->image_lib->resize()){
			unlink($source_path);
			return true;
		}
		else{
			return false;
		}
	}//end funciton resize
}
