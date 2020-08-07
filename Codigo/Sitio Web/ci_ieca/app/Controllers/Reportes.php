<?php namespace App\Controllers;

use App\Models\Alumno;
use App\Models\Becas;
use App\Models\Curso;
use App\Models\Inscrito;
use App\Models\Instructor;
use CodeIgniter\Controller;
use FPDF;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reportes extends Controller{
    private $cursos;
    private $alumnos;
    private $instructores;
    private $inscritos;
    private $becas;

    public function __construct(){
        $this->cursos = new Curso();
        $this->alumnos = new Alumno();
        $this->instructores = new Instructor();
        $this->inscritos = new Inscrito();
        $this->becas = new Becas();
    }

    public function Pdf(){
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Reporte');
        $pdf->Output('hola_mudo.pdf', 'I');
    }

    public function ExcelA(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'CURP');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Apellido Paterno');
        $sheet->setCellValue('D1', 'Apellido Materno');
        $sheet->setCellValue('E1', 'Correo');
        $sheet->setCellValue('F1', 'Codigo postal');
        $registros = $this->alumnos->getListar();
        $e = 2;
        foreach ($registros as $i =>$v){
            $sheet->setCellValue('A'.$e, $v['curp']);
            $sheet->setCellValue('B'.$e, $v['nombreAlumno']);
            $sheet->setCellValue('C'.$e, $v['apellido1']);
            $sheet->setCellValue('D'.$e, $v['apellido2']);
            $sheet->setCellValue('E'.$e, $v['correoAl']);
            $sheet->setCellValue('F'.$e, $v['cpAl']);
            $e++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Reporte de alumnos.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function ExcelC(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'Nombre curso');
        $sheet->setCellValue('C1', 'Fecha Inicio');
        $sheet->setCellValue('D1', 'Fecha Termino');
        $sheet->setCellValue('E1', 'Costo');
        $registros = $this->cursos->getListar();
        $e = 2;
        foreach ($registros as $i =>$v){
            $sheet->setCellValue('A'.$e, $v['idCursos']);
            $sheet->setCellValue('B'.$e, $v['nombre_curso']);
            $sheet->setCellValue('C'.$e, $v['fechaInicio']);
            $sheet->setCellValue('D'.$e, $v['fechaTermino']);
            $sheet->setCellValue('E'.$e, $v['costo']);
            $e++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Reporte de cursos.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function ExcelI(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Apellido Paterno');
        $sheet->setCellValue('D1', 'Apellido Materno');
        $sheet->setCellValue('E1', 'Especialidad');
        $sheet->setCellValue('F1', 'Tipo');
        $registros = $this->instructores->getListar();
        $e = 2;
        foreach ($registros as $i =>$v){
            $sheet->setCellValue('A'.$e, $v['idInstructor']);
            $sheet->setCellValue('B'.$e, $v['nombreInstructor']);
            $sheet->setCellValue('C'.$e, $v['apellidoI1']);
            $sheet->setCellValue('D'.$e, $v['apellidoI2']);
            $sheet->setCellValue('E'.$e, $v['especialidad']);
            $sheet->setCellValue('F'.$e, $v['tipo']);
            $e++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Reporte de Instructores.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}