<?php
require 'C:\wamp64\www\repaso\vendor\autoload.php';

//Recuperar los datos del formulario
$nombre_cliente = $_POST['nombre_cliente'];
$descripcion_articulo = $_POST['descripcion_articulo'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

//Creamos una nueva instancia de PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

//Información del documento
$pdf -> SetCreator(PDF_CREATOR);
$pdf -> SetTitle('Factura');

//Cabecera y pie de página
$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);

//Añadimos una página
$pdf -> AddPage();

//Contenido del PDF
$html = <<<EOD
<h1>Factura</h1>
<p>Nombre del Cliente: $nombre_cliente</p>
<p>Descripción del Artículo: $descripcion_articulo</p>
<p>Cantidad: $cantidad</p>
<p>Precio: $precio</p>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

//Cerramos y generamos el PDF
$pdf -> Output('factura.pdf', 'I');
?>