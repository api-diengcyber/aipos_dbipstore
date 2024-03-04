<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function images($path, $title, $files, $thumb=true)
    {
        if ($this->security->xss_clean($files, TRUE) === FALSE){
            header('HTTP/1.0 403 Forbidden');
            die('The file you requested is not an image.');
        }
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|gif|png',                     
        );

        $this->load->library('upload', $config);

        $images = array();
        $_FILES['images']['name']= $files['name'];
        $_FILES['images']['type']= $files['type'];
        $_FILES['images']['tmp_name']= $files['tmp_name'];
        $_FILES['images']['error']= $files['error'];
        $_FILES['images']['size']= $files['size'];

        $fileName = $this->clean($files['name']);

        $images = $fileName;

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('images')) {
            $images = $this->upload->data()['file_name'];
            if($thumb ==  true){
            $this->make_thumb($images);
            }
        } else {
            return '';
        }

        return $images;
    }
    public function image($path, $title, $files, $thumb=true)
    {
        if ($this->security->xss_clean($files, TRUE) === FALSE){
            header('HTTP/1.0 403 Forbidden');
            die('The file you requested is not an image.');
        }
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|gif|png',                     
        );

        $this->load->library('upload', $config);

        $images = array();
        $_FILES['images']['name']= $files['name'];
        $_FILES['images']['type']= $files['type'];
        $_FILES['images']['tmp_name']= $files['tmp_name'];
        $_FILES['images']['error']= $files['error'];
        $_FILES['images']['size']= $files['size'];

        $fileName = $this->clean($files['name']);

        $images = $fileName;

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('images')) {
            $images = $this->upload->data()['file_name'];
            if($thumb ==  true){
            $this->make_thumb($images);
            }
        } else {
            return '';
        }

        return $images;
    }
    public function upload_files($path, $title, $files , $thumb = false)
    {
        if ($this->security->xss_clean($files, TRUE) === FALSE){
            header('HTTP/1.0 403 Forbidden');
            die('The file you requested is not an image.');
        }
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|gif|png|txt|doc|docx|xls|xlsx|ppt|pptx|pdf',                  
        );

        $this->load->library('upload', $config);

        $images = array();
        $_FILES['images']['name']= $files['name'];
        $_FILES['images']['type']= $files['type'];
        $_FILES['images']['tmp_name']= $files['tmp_name'];
        $_FILES['images']['error']= $files['error'];
        $_FILES['images']['size']= $files['size'];

        $fileName = $files['name'];

        $images = $this->clean($fileName);

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('images')) {
            $images = $this->upload->data()['file_name'];
            if($thumb == true){
                $this->make_thumb($images);
            }
        } else {
        }

        return $images;
    }

    public function make_thumb($images = '')
    {
        if ($this->security->xss_clean($images, TRUE) === FALSE){
            header('HTTP/1.0 403 Forbidden');
            die('The file you requested is not an image.');
        }
        if (!empty($images)) {
			$width = 300;
			$size = getimagesize(FCPATH.'assets/images/thumbnail/'.$images);
			$resize_height=($size[1]*$width)/$size[0];
            $this->load->library('image_lib');
            $configer = array(
                'image_library'   => 'gd2',
                'source_image'    => FCPATH.'assets/images/thumbnail/'.$images,
                'create_thumb'    => TRUE,
                'maintain_ratio'  => TRUE,
                'width'           => $width,
				'height'		  => $resize_height,
				'quality'   	  => 85,
                'new_image'       => FCPATH.'assets/images/thumbnail/thumb/',
                'thumb_marker'    => '_thumb',
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
            $this->image_lib->clear();
            return true;
        } else {
            return false;
        }
    }

    public function upload_cropped($path, $img_width, $img_height, $files)
    {   
        if ($this->security->xss_clean($files, TRUE) === FALSE){
            header('HTTP/1.0 403 Forbidden');
            die('The file you requested is not an image.');
        }
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|gif|png|txt|doc|docx|xls|xlsx|ppt|pptx|pdf',
        );

        $this->load->library('upload', $config);

        $images = array();
        $_FILES['images']['name']= $files['name'];
        $_FILES['images']['type']= $files['type'];
        $_FILES['images']['tmp_name']= $files['tmp_name'];
        $_FILES['images']['error']= $files['error'];
        $_FILES['images']['size']= $files['size'];

        $fileName = $files['name'];

        $images = $this->clean($fileName);

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('images')) {
            $images = $this->upload->data()['file_name'];

            $res['image_library'] = 'gd2';
            $res['source_image'] = $path.'/'.$images;
            $res['create_thumb'] = FALSE;
            $res['maintain_ratio'] = FALSE;
            $res['width']         = $img_width;
            //$res['height']       = $img_height;

            $this->load->library('image_lib', $res);
            $this->image_lib->resize();
            $this->image_lib->clear();

            $cfg['image_library'] = 'gd2';
            $cfg['source_image'] = $path.'/'.$images;
            $cfg['create_thumb'] = FALSE;
            $cfg['maintain_ratio'] = FALSE;
            $cfg['width']         = $img_width;
            $cfg['height']       = $img_height;

            $this->load->library('image_lib', $cfg);
            $this->image_lib->crop();
            $this->image_lib->clear();
        } else {
        }

        return $images;
    }
    public function upload_zip($path, $title, $files){
        if ($this->security->xss_clean($files, TRUE) === FALSE){
            header('HTTP/1.0 403 Forbidden');
            die('The file you requested is not an image.');
        }
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'zip',                  
        );

        $this->load->library('upload', $config);

        $images = array();
        $_FILES['images']['name']= $files['name'];
        $_FILES['images']['type']= $files['type'];
        $_FILES['images']['tmp_name']= $files['tmp_name'];
        $_FILES['images']['error']= $files['error'];
        $_FILES['images']['size']= $files['size'];

        $fileName = $files['name'];

        $images = $fileName;

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('images')) {
            $images = $this->upload->data()['file_name'];
        } else {
            return $this->upload->display_errors();
        }

        return $images;
    }
    public function mupload_files($path, $title, $files)
    {
        if ($this->security->xss_clean($files, TRUE) === FALSE){
            header('HTTP/1.0 403 Forbidden');
            die('The file you requested is not an image.');
        }
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|gif|png|txt|doc|docx|xls|xlsx|ppt|pptx',                  
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = strtolower(str_replace('--','-',str_replace(' ','-',$image)));

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $images = $this->upload->data()['file_name'];
            } else {
                return false;
            }
        }

        return $images;
    }
    public function tinymce_upload()
    {  
    if ($this->security->xss_clean($_FILES, TRUE) === FALSE){
        header('HTTP/1.0 403 Forbidden');
        die('The file you requested is not an image.');
    }
      $this->load->helper('url');
       /*******************************************************
       * Only these origins will be allowed to upload images *
       ******************************************************/
      $accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com", "http://aipos.id");

      /*********************************************
       * Change this line to set the upload folder *
       *********************************************/
      $imageFolder = 'assets/images/post/';

      reset ($_FILES);
      $temp = current($_FILES);
      if (is_uploaded_file($temp['tmp_name'])){
        header('Access-Control-Allow-Origin: *'); // tambahan
        if (isset($_SERVER['HTTP_ORIGIN'])) {
          // same-origin requests won't set an origin. If the origin is set, it must be valid.
          if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
            //header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
          } else {
            //header("HTTP/1.1 403 Origin Denied");
            //return;
          }
        }

        /*
          If your script needs to receive cookies, set images_upload_credentials : true in
          the configuration and enable the following two headers.
        */
        // header('Access-Control-Allow-Credentials: true');
        // header('P3P: CP="There is no P3P policy."');

        // Sanitize input
        if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
            header("HTTP/1.1 400 Invalid file name.");
            return;
        }

        // Verify extension
        if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
            header("HTTP/1.1 400 Invalid extension.");
            return;
        }
        $filetowrite = $imageFolder . 'tinymce_'. $temp['name'];
        // upload //
        move_uploaded_file($temp['tmp_name'], $filetowrite);
        echo json_encode(array('location' => site_url().$filetowrite));
      } else {
        header("HTTP/1.1 500 Server Error");
      }
    }
    public function clean($string) {
       $r = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
       $string = str_replace(' ', '-', $r); // Replaces all spaces with hyphens.
       return strtolower(str_replace('--','-',str_replace('--','-',$string)));
    }

    public function generate_slug($name,$table)
    {
        $slug = $this->clean($name);
        $this->db->where('url', $slug);
        $row = $this->db->get($table)->row();
        if($row){
            return $slug.rand(1,100);
        }else{
            return $slug;
        }
    }
}

/* End of file Upload_model.php */
/* Location: ./application/models/Upload_model.php */