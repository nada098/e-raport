<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Dasboard extends CI_Controller{
	function __construct(){
	parent::__construct();
}
  public function index(){
  	$this->template->display_admin('view_dasboard.php');
  }
}