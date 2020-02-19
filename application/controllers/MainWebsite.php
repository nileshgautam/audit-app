<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainWebsite extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Audit_model');
		$this->load->helper('filter');
	}

	// private function common_view($views = [], $vars = [])
	// {
	// 	/* you can call model here */

	// 	$vars['CURRENT_METHOD'] = $this->router->fetch_method();
	// 	$this->load->view('template/layout/header.php', $vars);

	// 	if (is_array($views)) {
	// 		foreach ($views as $view) {
	// 			$this->load->view('template/' . $view, $vars);
	// 		}
	// 	} else {
	// 		$this->load->view('template/' . $views, $vars);
	// 	}
	// 	$this->load->view('template/layout/footer.php', $vars);
	// }


	public function upload_excel()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidenav');
		$this->load->view('template/uploadExcel');
		$this->load->view('layout/footer');
	}

	public function excel_reader()
	{
		if (empty($_FILES['sample_file']['tmp_name'])) {
			$this->session->set_flashdata('error', "Please Choose file");
			redirect(__CLASS__.'/upload_excel');
		}

		$file = $_FILES['sample_file']['tmp_name'];
		$filename = $_FILES['sample_file']['name'];
		$extension = pathinfo($filename, PATHINFO_EXTENSION);

		if (!empty($extension)) {
			if ($extension != 'csv' && $extension != 'xlsx' && $extension != 'XLSX') {
				$this->session->set_flashdata("error", "System Error, Only CSV and Xlsx files are allowed.");
				redirect(__CLASS__.'/upload_excel');
			}
		}
		if (!is_readable($file)) {
			$this->session->set_flashdata('error', "File is not readable.");
			redirect(__CLASS__.'/upload_excel');
		}

		$objPHPExcel = PHPExcel_IOFactory::load($file);
		//get only the Cell Collection

		//extract to a PHP readable array format
		foreach ($objPHPExcel->getWorksheetIterator() as $key => $worksheet) {
			$cell_collection = $worksheet->getCellCollection();
			for ($i = 0; $i < count($cell_collection); $i++) {
				$column = $worksheet->getCell($cell_collection[$i])->getColumn();
				$row = $worksheet->getCell($cell_collection[$i])->getRow();
				$data_value = $worksheet->getCell($cell_collection[$i])->getValue();
				//header will/should be in row 1 only. of course this can be modified to suit your need.
				$arr_data[$key][$row][$column] = $data_value;
			}
		}

		$data = $this->excel_data($arr_data);
		// print_r($data);
		// die;
		// get all unique processes
		$processes = $this->get_all_unique($data[0], 'process');
		$count = 0;
		// iterate processes
		foreach ($processes as $key => $value) {
			
			if (!empty($value)) {
				// find process exist or not
				$res = $this->Audit_model->find_process_id('tbl_process', 'process_name', $value);
				// initialize 0 for id of find process record
				$next_id = 0;
				if ($res) {
					// id save 
					$next_id = $res[0]['process_id'];
				} else {
					// if not found then save process
					$next_id = $this->Audit_model->getNewIDorNo('p', 'tbl_process');
					$tbl_data = array('process_name' => $value, 'status' => 0, 'process_id' => $next_id);
					$this->Audit_model->insertData('tbl_process', $tbl_data);
				}
			

				///////////////sub_process/////////////////////////////

				// find sub_processs for each process
				$sub_process = $this->get_data_by_filter($data['0'], $value, 'process');
				// find unique sub_process
				$unique_sub_process = $this->get_all_unique($sub_process, 'sub_process');
				
				// iterate sub_process
				foreach ($unique_sub_process as $key => $sc) {
					if (!empty($sc)) {
						// make a condition array
						$condition = array('sub_process_name' => $sc, 'process_id' => $next_id);
						$next_sub_process_id = 0;
						// check the data exist already or not 
						$res = $this->Audit_model->select_table_Where_data('tbl_sub_process', $condition);

						if ($res) {
							// if added then save id
							$next_sub_process_id = $res[0]['sub_process_id'];
						} else {
							
								// otherwise add new sub_process
								$next_sub_process_id = $this->Audit_model->getNewIDorNo('sp', 'tbl_sub_process');
								$tbl_data = array('sub_process_name' => $sc, 'status' => 0, 'process_id' => $next_id, 'sub_process_id' => $next_sub_process_id);
								$this->Audit_model->insertData('tbl_sub_process', $tbl_data);
							} 
					}
					else {
						$next_sub_process_id=$next_id;
						$count++;
					}
				

					/////////////////Data Required/////////////////
					
					// filter those records which mach with process and sub_process
					$Data_required = $this->get_data_by_multiple_column_filter($data['0'], [$value, $sc], ['process', 'sub_process']);

					// find unique records of data required		
					$Data_required = $this->get_all_unique($Data_required, 'Data_required');
					// iterate unique records
					foreach ($Data_required as $key => $dr) {
						if (!empty($dr)) {
						// make a condition array
						$condition = array('data_required' => $dr, 'sub_process_id' => $next_sub_process_id);
						// check the data exist already or not 
						$res = $this->Audit_model->select_table_Where_data('tbl_data_required', $condition);
						if ($res) {
							// if added then save id
							$next_Data_required_id = $res[0]['id'];
						} else {
							
								// otherwise add new data required
								$tbl_data = array('data_required' => $dr, 'status' => 0, 'sub_process_id' => $next_sub_process_id);
								$this->Audit_model->insertData('tbl_data_required', $tbl_data);
							
						}
					} else {
						$count++;
					}
				}

					//////////////////work steps//////////////

					// filter those records which mach with process and sub_process
					$workSteps = $this->get_data_by_multiple_column_filter($data['0'], [$value, $sc], ['process', 'sub_process']);
					// find unique records of work step name	
					$step_name = $this->get_all_unique($workSteps, 'step_name');
					// iterate unique records
					foreach ($step_name as $key => $sn) {
						if (!empty($sn)) {
						// make a condition array
						$condition = array('steps_name' => $sn, 'sub_process_id' => $next_sub_process_id);
						// check the data exist already or not
						$res = $this->Audit_model->select_table_Where_data('tbl_work_steps', $condition);
						if ($res) {
							// if added then save id
							$next_step_name_id = $res[0]['work_seteps_id'];
						} else {
							
							// otherwise add new data required
							$tbl_data = array('steps_name' => $sn, 'status' => 0, 'sub_process_id' => $next_sub_process_id);
							$this->Audit_model->insertData('tbl_work_steps', $tbl_data);
							
						}
					}
					else{
						$count++;
					}
					}

					///////////////////Risk /////////////

					// filter those records which mach with process and sub_process
					$risk = $this->get_data_by_multiple_column_filter($data['0'], [$value, $sc], ['process', 'sub_process']);
					// find unique records of work step name
					$risk_name = $this->get_all_unique($risk, 'risk_name');
					// iterate unique records
					foreach ($risk_name as $key => $rn) {
						if (!empty($rn)) {
							// make a condition array
							$condition = array('risk_name' => $rn, 'sub_process_id' => $next_sub_process_id);
							// check the data exist already or not
							$res = $this->Audit_model->select_table_Where_data('tbl_risk', $condition);

							if ($res) {
								// if added then save id
								$next_step_name_id = $res[0]['risk_id'];
							} 
							else {
								
								// otherwise add new data required
								$tbl_data = array('risk_name' => $rn, 'sub_process_id' => $next_sub_process_id);
								$this->Audit_model->insertData('tbl_risk', $tbl_data);	
							}
						}
						else{ 

						$count++; 

						}
					}
				}
			}else {
					$count++;
				}	
		}

		if ($count > 0) {
			$this->session->set_flashdata('error',  " There are ". $count . " empty cell, so that data not entered");
			redirect(__CLASS__.'/upload_excel');
		} else {
			$this->session->set_flashdata('success', "Uploded Successfully");
			redirect(__CLASS__.'/upload_excel');
		}
	}

	private function get_all_unique($data, $column_name)
	{
		$unique_columns = array_unique(array_column($data, $column_name));
		return $unique_columns;
	}
	private function get_data_by_filter($data, $process, $col_name)
	{
		$data = array_filter($data, array(new Filter($col_name, $process), "filter_callback"));
		return $data;
	}
	private function get_data_by_multiple_column_filter($data, $values, $col_names)
	{
		$data = array_filter($data, array(new Filter($col_names, $values), "filter_callback_array"));
		return $data;
	}
	private function excel_data($arr_data)
	{
		$final_data = [];
		foreach ($arr_data as $sheetkey => $value) {
			$header = $arr_data[$sheetkey][1];
			$len = count($arr_data[$sheetkey]);
			$data = [];
			for ($i = 2; $i <= $len; $i++) {
				$ob = [];
				foreach ($header as $key => $value) {
					$ob[$header[$key]] =	isset($arr_data[$sheetkey][$i][$key]) ? $arr_data[$sheetkey][$i][$key] : "";
				}
				$data[] = $ob;
			}
			$final_data[$sheetkey] = $data;
		}
		return $final_data;
	}
}
