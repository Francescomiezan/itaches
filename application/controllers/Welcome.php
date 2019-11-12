<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	    parent::__construct();
		$this->load->view('welcome_message');
	}

    public function migrate($version=null)
    {

        if($version != null){
            $this->migration->version($version);
        }

        if($this->migration->current() === FALSE){
            show_error($this->migration->error_string());
        }else{
            show_error("Migration effectué");
        }
	}
}
