<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(dirname(__FILE__)."/UniDev.php");
class Overflow extends UniDev {
	public function __construct() {
        parent::__construct(); 
    }
	public function index()
	{
		$this->output($this->overflow.'test');
	}
}
