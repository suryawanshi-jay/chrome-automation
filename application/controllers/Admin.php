<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('excel');	//load the excel library
		$this->load->model('admin_model');
    }
	public function index() {
		$data['login_success'] = $this->session->flashdata('login_success');
		$data['error'] = $this->session->flashdata('error');
		$data['success'] = $this->session->flashdata('success');
		$this->load->view('admin/dashboard', $data);
	}

	// Function to upload file
	public function upload_file(){
		$data = array();
		if(isset($_FILES['upload_file'])){
			$errors= array();
			$file_name = $_FILES['upload_file']['name'];
			$file_size =$_FILES['upload_file']['size'];
			$file_tmp =$_FILES['upload_file']['tmp_name'];
			$file_type=$_FILES['upload_file']['type'];
			$tmp = (explode('.',$_FILES['upload_file']['name']));
			$file_ext = end($tmp);
			//$file_ext = strtolower(end(explode('.',$_FILES['upload_file']['name'])));
			
			$expensions= array("csv","xlsx");
			
			if(in_array($file_ext,$expensions)=== false){
			   $errors[]="extension not allowed";
			}
			
			if($file_size > 2097152){
			   $errors[]='File size must be excately 2 MB';
			}
			
			if(empty($errors)==true){
			   move_uploaded_file($file_tmp,"uploads/".$file_name);			   
			   $this->session->set_flashdata('success', 'file uploaded');
			   // Before redirect insert file content into database. 
			   $this->insert_file_rows_in_db($file_name);
			   redirect('admin');
			   			   
			}else{
			   //print_r($errors[0]);
			   $this->session->set_flashdata('error', $errors[0]);
			   redirect('admin/index');
			}
		 }
	}

	// Insert records in database
	public function insert_file_rows_in_db($file_name = ''){	
		//$file_name = 'Automation Projects.xlsx';
		$file = './uploads/'.$file_name;
		//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($file);
		
		//get only the Cell Collection
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		
		//extract to a PHP readable array format
		foreach ($cell_collection as $cell) {
			$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
		
			//The header will/should be in row 1 only. of course, this can be modified to suit your need.
			if ($row == 1) {
				$header[$row][$column] = $data_value;
			} else {
				$arr_data[$row][$column] = $data_value;
			}			
		}			
		// send data to admin model to insert in database
		$this->admin_model->save_account_details($arr_data);		
	}

	// Download excel file
	public function download_excel_file(){
		$account_details = $this->admin_model->get_all_account_details();
		if($account_details){
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);					
			// Creating spreadsheet header			
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Analyst Name');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Main Program');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Account Number');	
			$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Customer Name');	
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Address');	
			$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Fuels Serving Home*');	
			$objPHPExcel->getActiveSheet()->setCellValue('G1', 'QHEC for SFH');	
			$objPHPExcel->getActiveSheet()->setCellValue('H1', 'QHEC for Apt');	
			$objPHPExcel->getActiveSheet()->setCellValue('I1', '9w A19 LED');	
			$objPHPExcel->getActiveSheet()->setCellValue('J1', '11 watt LED');	
			$objPHPExcel->getActiveSheet()->setCellValue('K1', '15 watt LED');	
			$objPHPExcel->getActiveSheet()->setCellValue('L1', '9/11/15 Wattt 3-way');
			$objPHPExcel->getActiveSheet()->setCellValue('M1', '17 watt R40 Flood');		
			$objPHPExcel->getActiveSheet()->setCellValue('N1', '11 watt BR30 LED');		
			$objPHPExcel->getActiveSheet()->setCellValue('O1', '5 watt LED candelabra');		
			$objPHPExcel->getActiveSheet()->setCellValue('P1', '6 watt LED globe');		
			$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Hot Water Pipe Insulation');		
			$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Low Flow Shower Heads White - 1.5');		
			$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Low Flow Shower Heads Chrome - 1.5');		
			$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Low Flow Shower Heads White - 1.75');		
			$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Low Flow Shower Heads Chrome - 1.75');		
			$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Low Flow Shower Heads Handheld White - 1.5');		
			$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Low Flow Shower Heads Handheld Chrome - 1.5');		
			$objPHPExcel->getActiveSheet()->setCellValue('X1', 'ShowerStart Adapter');		
			$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Faucet aerators kitchen');		
			$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Faucet aerators bathroom');
			$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'Smart Strips');	
			$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Temperature Turndown');						
		
			$sheet = $objPHPExcel->getActiveSheet();	
			$sheet->getStyle('A1:AB1')->getFont()->setBold(true);				
			$rowCount = 2;			
			foreach($account_details as $row){							
				$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['analyst_name']);
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['main_program']);
				$rowCount++;
			}
			foreach(range('A','Z') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
			}
						
			header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
			header("Content-Disposition: attachment; filename=\"updated_accounts_file.xlsx\"");
			header("Cache-Control: max-age=0");
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$objWriter->save('downloads/updated_accounts_file.xlsx');
			$objWriter->save("php://output");			
			ob_clean();
		}
		//$this->session->set_flashdata('error', 'Records are not present in database !!');
		//redirect(base_url().'admin');
	}

}

/* End of file Admin.php */
/* Location: .//tmp/fz3temp-2/Admin.php */