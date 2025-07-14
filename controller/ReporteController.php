<?php
require_once './controller/ProyectoController.php';
require_once './controller/ClienteController.php';
require_once './lib/fpdf.php';
require_once './lib/pdfcustom.php';

class ReporteController {

    public function cargarProyectosReporte() {
        $proyectoController = new ProyectoController();
        $proyectos = $proyectoController->cargarProyectos();
        
        require './view/reporteproyectos.php';
    }
    
    public function generarPDFProyectos() {
    $proyectoController = new ProyectoController();
    $proyectos = $proyectoController->cargarProyectos();

    $pdf = new PDF_Custom();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'Reporte de Proyectos',0,1,'C');
    $pdf->Ln(10);

    // Encabezados
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,'ID',1);
    $pdf->Cell(50,10,'Nombre',1);
    $pdf->Cell(80,10,'Descripcion',1);
    $pdf->Cell(40,10,'Fecha Fin',1);
    $pdf->Ln();

    $pdf->SetFont('Arial','',12);

    foreach ($proyectos as $p) {
        // Preparar los textos
        $id = $p->getIdproyecto();
        $nombre = utf8_decode($p->getNombre());
        $descripcion = utf8_decode($p->getDescripcion());
        $fechafin = $p->getFechafin();

        // Calcular la altura máxima para esta fila
        $height_nombre = $pdf->GetMultiCellHeight(50, 10, $nombre);
        $height_desc = $pdf->GetMultiCellHeight(80, 10, $descripcion);
        $max_height = max($height_nombre, $height_desc, 10); // mínimo 10

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        // ID
        $pdf->MultiCell(20, $max_height, $id, 1, 'C');

        // Nombre
        $pdf->SetXY($x+20, $y);
        $pdf->MultiCell(50, 10, $nombre, 1);

        // Descripcion
        $pdf->SetXY($x+70, $y);
        $pdf->MultiCell(80, 10, $descripcion, 1);

        // Fecha Fin
        $pdf->SetXY($x+150, $y);
        $pdf->MultiCell(40, $max_height, $fechafin, 1, 'C');

        // Mover a la siguiente línea
        $pdf->SetXY($x, $y + $max_height);
    }

    $pdf->Output();
}

    public function cargarClientesReporte() {
        $clienteController = new ClienteController();
        $clientes = $clienteController->cargarClientes();
        
        require './view/reporteclientes.php';
    }

    public function generarPDFClientes() {

    $clienteController = new ClienteController();
    $clientes = $clienteController->cargarClientes(); // Asegúrate de que exista este método público

    $pdf = new PDF_Custom();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'Reporte de Clientes',0,1,'C');
    $pdf->Ln(10);

    // Encabezados
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,'ID',1);
    $pdf->Cell(60,10,'Nombre',1);
    $pdf->Cell(60,10,'Correo',1);
    $pdf->Cell(50,10,'Telefono',1);
    $pdf->Ln();

    $pdf->SetFont('Arial','',12);

    foreach ($clientes as $cli) {
        // Preparar los textos
        $id = $cli->getIdcliente();
        $nombre = utf8_decode($cli->getNombre());
        $correo = utf8_decode($cli->getCorreo());
        $telefono = utf8_decode($cli->getTelefono());

        // Calcular altura máxima de la fila
        $height_nombre = $pdf->GetMultiCellHeight(60, 10, $nombre);
        $height_correo = $pdf->GetMultiCellHeight(60, 10, $correo);
        $height_telefono = $pdf->GetMultiCellHeight(50, 10, $telefono);
        $max_height = max($height_nombre, $height_correo, $height_telefono, 10);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        // ID
        $pdf->MultiCell(20, $max_height, $id, 1, 'C');

        // Nombre
        $pdf->SetXY($x+20, $y);
        $pdf->MultiCell(60, 10, $nombre, 1);

        // Correo
        $pdf->SetXY($x+80, $y);
        $pdf->MultiCell(60, 10, $correo, 1);

        // Telefono
        $pdf->SetXY($x+140, $y);
        $pdf->MultiCell(50, $max_height, $telefono, 1);

        // Mover a la siguiente fila
        $pdf->SetXY($x, $y + $max_height);
    }

    $pdf->Output();
  }
}
?>
