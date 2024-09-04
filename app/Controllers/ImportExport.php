<?php
 namespace App\Controllers;
 use App\Models\EmployeeModel;
 use CodeIgniter\RESTful\ResourceController;
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 use PhpOffice\PhpSpreadsheet\IOFactory;
 class ImportExport extends ResourceController
{
 protected $employeeModel;
 public function __construct()
 {
 $this->employeeModel = new EmployeeModel();
 }
 public function exportEmployees()
 {
 $employees = $this->employeeModel->findAll();
 $spreadsheet = new Spreadsheet();
 $sheet = $spreadsheet->getActiveSheet();
 $sheet->setCellValue('A1', 'ID');
 $sheet->setCellValue('B1', 'Name');
 $sheet->setCellValue('C1', 'Email');
 $sheet->setCellValue('D1', 'Phone');
 $sheet->setCellValue('E1', 'Department');
 $sheet->setCellValue('F1', 'Position');
 $row = 2;
 foreach ($employees as $employee) {
 $sheet->setCellValue('A' . $row, $employee['id']);
 $sheet->setCellValue('B' . $row, $employee['name']);
 $sheet->setCellValue('C' . $row, $employee['email']);
 $sheet->setCellValue('D' . $row, $employee['phone']);
 $sheet->setCellValue('E' . $row,
 $employee['department']);
 $sheet->setCellValue('F' . $row,
 $employee['position']);
 $row++;
 }
 $writer = new Xlsx($spreadsheet);
 $filename = 'employees.xlsx';
 $writer->save($filename);
 return $this->response->download($filename,
 null)->setFileName($filename);
 }
 public function importEmployees()
 {
 $file = $this->request->getFile('file');
 $filePath = WRITEPATH . 'uploads/' . $file->getName();
 $file->move(WRITEPATH . 'uploads');
 $spreadsheet = IOFactory::load($filePath);
 $sheet = $spreadsheet->getActiveSheet();
 $highestRow = $sheet->getHighestRow();
 for ($row = 2; $row <= $highestRow; $row++) {
 $data = [
 'name'=> $sheet->getCell('B' . $row)->getValue(),
'email'=> $sheet->getCell('C' . $row)->getValue(),
 'phone'=> $sheet->getCell('D' .$row)->getValue(),
 'department' => $sheet->getCell('E' . $row)->getValue(),
 'position' => $sheet->getCell('F' . $row)->getValue(),
 ];
 $this->employeeModel->save($data);
 }
 return $this->respondCreated(['message' => 'Employees
 imported successfully']);
 }
 }