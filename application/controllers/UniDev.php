<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UniDev extends CI_Controller {
    public $template;
    public $overflow;
    public $pdf;
    public function __construct() {
        parent::__construct();  
        $this->overflow="overflow/";
        $this->template="template/";
        $this->pdf="pdf/";   
    }
	public function index()
	{
        $data['header'] = 'UniDev-Header';
        $data['footer'] = "UniDev-Footer";
        $data['content'] = "UniDev-Content";
		$this->output('test',$data);
    }
    public function header()
    {
        $this->load->view($this->template.'header',false);
    }
    public function footer()
    {
        $this->load->view($this->template.'footer',false);
    }
    public function output($view,$data=NULL,$get=false)
    {
        $this->header();
        $this->load->view($view,$data,$get);
        $this->footer();
    }
    public function testPdf()
    {
        $this->Th_pdf($this->load->view($this->pdf.'html_to_pdf',[],true));
    }

    public function Th_pdf($pdf)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->useAdobeCJK = true;
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;

        $mpdf->WriteHTML($pdf);
        $mpdf->Output();
    }
   
}
