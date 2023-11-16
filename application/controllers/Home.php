<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Home extends CI_Controller { 
	public function __construct() {
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('home_model');
			
	}
   
	function index()
    {
        $this->load->view('index');
    }
	public function spreadhseet_format_download(){
		header('Content-Type:application/vnd.ms-excel');
		header('Content-Disposition:attachment;filename="data.xlsx"');
		$spreadsheet=new Spreadsheet();
		$sheet=$spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1',"username");
		$sheet->setCellValue('B1',"email");
		$sheet->setCellValue('C1',"password");
		$sheet->setCellValue('D1',"mobile");
		$sheet->setCellValue('E1',"address");

		$writer=new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function spreadsheet_import(){
		$upload_file=$_FILES['upload_file']['name'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
			 $username=$sheetdata[$i][0];
			 $email=$sheetdata[$i][1];
			 $password=$sheetdata[$i][2];
			 $mobile=$sheetdata[$i][3];
			 $address=$sheetdata[$i][4];
			 $data[]=array(
				'username'=>$username,
				'email'=>$email,
				'password'=>$password,
				'mobile'=>$mobile,
				'address'=>$address,
			);
			}

			$insertdata=$this->home_model->insert_batch($data);
			if($insertdata)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
				redirect('home');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
				redirect('home');
			}
		
	}
}

public function spreadsheet_export(){
	$userlist=$this->home_model->user_list();
	
		
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="product.xlsx"');
		$spreadsheet=new Spreadsheet();
		$sheet=$spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1',"username");
		$sheet->setCellValue('B1',"email");
		$sheet->setCellValue('C1',"password");
		$sheet->setCellValue('D1',"mobile");
		$sheet->setCellValue('E1',"address");
        
		$sn=2;
		foreach ($userlist as $user) {
			// echo $user->username;
			$sheet->setCellValue('A'.$sn,$user->username);
			$sheet->setCellValue('B'.$sn,$user->email);
			$sheet->setCellValue('C'.$sn,$user->password);
			$sheet->setCellValue('D'.$sn,$user->mobile);
			$sheet->setCellValue('E'.$sn,$user->address);
			// $sheet->setCellValue('F'.$sn,'=C'.$sn.'*D'.$sn);
			$sn++;
		}
		// exit();
         
		$writer=new Xlsx($spreadsheet);
		$writer->save("php://output");


}
}
?>