<?php
require('../class/PHPExcel.php');
require('../class/conexion.php');


class generarExcel extends Conexion{   //utilizar variables y métodos dentro la clase conexión

  public function __construct(){

      parent::__construct();

  }

  public function excel(){//despliega listas de usuarios (conferencistas del congreso)
      $resultado = $this->conexion_db->query("SELECT a.nombre, a.apellidos, a.cargo, a.empresa, a.pais, a.ciudad, a.id_credenciales,
                                            b.id_credenciales, b.usuario, b.password
                                            FROM conferencistas AS a
                                            LEFT JOIN credenciales AS b
                                            ON a.id_credenciales = b.id_credenciales
                                            WHERE a.id_congreso = 'CPL2020' ");
      // $usuarios = $sql->fetch_all(MYSQLI_ASSOC);
      $fila = 2; //Establecemos en que fila inciara a imprimir los datos

      //Objeto de PHPExcel
      $objPHPExcel  = new PHPExcel();
      //Propiedades de Documento
      $objPHPExcel->getProperties()->setCreator("TI: Congreso Parques")->setDescription("Reporte de Usuarios");
      //Establecemos la pestaña activa y nombre a la pestaña
    	$objPHPExcel->setActiveSheetIndex(0);
    	$objPHPExcel->getActiveSheet()->setTitle("Usuarios");

      $estiloTituloColumnas = array(
        'font' => array(
      'name'  => 'Arial',
      'bold'  => true,
      'size' =>10,
      'color' => array(
      'rgb' => 'FFFFFF'
      )
        ),
        'fill' => array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('rgb' => '538DD5')
        ),
        'borders' => array(
      'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
      )
        ),
        'alignment' =>  array(
      'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
      );

      $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloColumnas);

      $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
      $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NOMBRE');
      $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
      $objPHPExcel->getActiveSheet()->setCellValue('B1', 'APELLIDOS');
      $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
      $objPHPExcel->getActiveSheet()->setCellValue('C1', 'CARGO');
      $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
      $objPHPExcel->getActiveSheet()->setCellValue('D1', 'EMPRESA');
      $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
      $objPHPExcel->getActiveSheet()->setCellValue('E1', 'PAIS');
      $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
      $objPHPExcel->getActiveSheet()->setCellValue('F1', 'CIUDAD');
      $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
      $objPHPExcel->getActiveSheet()->setCellValue('G1', 'USUARIO');
      $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
      $objPHPExcel->getActiveSheet()->setCellValue('H1', 'PASSWORD');
      // $objPHPExcel->getActiveSheet()->setCellValue('E1', 'PASSWORD');

      while ($rows = $resultado->fetch_assoc()) {
      $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['nombre']);
      $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['apellidos']);
  		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['cargo']);
  		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['empresa']);
  		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['pais']);
      $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['ciudad']);
      $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['usuario']);
      $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['password']);

      $fila++;
      }

      // $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:E".$fila);

      // indicar que se envia un archivo de Excel.
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="usuarios.xls"');
      header('Cache-Control: max-age=0');
      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      $objWriter->save('php://output');
      exit;

      // return $objWriter;
  }

}
$excel = new generarExcel();
$archivo = $excel->excel();


?>
