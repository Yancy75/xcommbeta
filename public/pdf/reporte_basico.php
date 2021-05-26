<?php ob_start();  $a = json_decode($_REQUEST['variable1']); ?>
<html>
<head>
     <style>
        @page {  margin-top: 150px;  margin-bottom: 80px;  margin-right: 50px;  margin-left: 50px; }
       body { margin: 0px; }
       #header { position: fixed; left: 0px; top: -150px; right: 0px; height: 100px; border-bottom: 2px solid black; text-align: justify; font-weight: bold; text-transform: uppercase; padding-top: 5px;}
       #footer { position: fixed; left: 0px; bottom: -80px; right: 0px; height: 60px; text-align: right; padding-right: 20px; border-top: 2px solid black;}
       #footer .page:after { content: counter(page); }
       .card-header{background: #307347; border-bottom: 1px solid rgba(0,0,0,.125); padding-top: 2px; padding-right: 30px; padding-bottom: 2px; padding-left: 30px;
           position: relative; border-top-left-radius: .25rem; border-top-right-radius: .25rem; color:white;}
       .table {clear: both; margin-top: 6px !important; margin-bottom: 6px !important;
           max-width: none !important; border-collapse: separate !important; border-spacing: 0;}
       .table-bordered {border: 1px solid #dee2e6;}
       .odd{background-color: rgba(0,0,0,.05);}
       .card-body {background: #0000000a;}
       .table > tbody, th, td {
         border: 1px solid #dee2e6;
         border-collapse: collapse;}
        th{text-transform: uppercase;}
       .no{border: none;}
       .row{display: flex; justify-content: flex-start; margin-bottom: 5px;}
       .crotaneo{flex-direction: column;}
     </style>
     <body>
    <div id="header"><?php  $image = '../png/no fondo.png'; $imageData = base64_encode(file_get_contents($image)); $src = 'data:'.mime_content_type($image).';base64,'.$imageData;  echo '<img src="',$src,'" width="325" height="90" style="float:left; padding-right: 20px;">'; ?>
            <h1><?php echo $a[0]; ?></h1></div>
    <div id="footer"><p class="page">Pag </p></div>
      <div id="content">
        <table class="tabla">
            <tbody>
              <tr><td class="no">Total transacciones dólar compra</td><td  class="no"><b><?php echo $a[5][0]; ?></b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Total transacciones dólar venta</td><td  class="no"><b><?php echo $a[5][1]; ?></b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Total transacciones euro compra</td><td  class="no"><b><?php echo $a[5][2]; ?></b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Total transacciones euro venta</td><td  class="no"><b><?php echo $a[5][3]; ?></b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Comision</td><td  class="no"><b><?php echo $a[5][4]; ?></b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Total a pagar de comision</td><td  class="no"><b><?php echo $a[5][5]; ?></b></td><td class="no">RD$</td></tr>
            </tbody>
          </table>
          <br>
             <?php if(is_array($a[3])){ ?>
              <div id="completa1" >
                 <div class="card-header"><h3 class="card-title titulo2"><i class="fa-life-ring" aria-hidden="true"></i>  Lista de Transacciones Completadas</h3></div>
                   <div class="card-body"  style="overflow-x: auto;">
                      <table  class="table table-bordered table-hover table-striped display" cellpadding="5px" cellspacing="5px" style="width:100%;">
                         <thead><tr><?php echo $a[1]; ?></tr></thead>
                         <tbody><?php if(is_array($a[3])){$b=true; foreach ($a[3] as &$linea) {if($b){echo '<tr class="odd">'.$linea.'</tr>'; $b=false;}else{echo '<tr>'.$linea.'</tr>'; $b=true;}}}else{ echo '<tr style="text-align">'.$a[3].'</tr>';} ?></tbody>
                         <tfoot><tr><?php echo $a[1]; ?></tr></tfoot>
                       </table>
                   </div>
             </div>
           <?php } ?>
<br >
<br >
          <?php if(is_array($a[4])){ ?>
            <div id="completa2">
               <div class="card-header"><h3 class="card-title titulo2"><i class="fas fa-university"></i> Lista de Transacciones Canceladas</h3></div>
                  <div class="card-body"  style="overflow-x: auto;">
                     <table  class="table table-bordered table-hover table-striped display" cellpadding="5px" cellspacing="5px" style="width:100%;">
                       <thead><tr><?php echo $a[2]; ?></tr></thead>
                       <tbody><?php if(is_array($a[4])){$b=true; foreach ($a[4] as &$linea) {if($b){echo '<tr class="odd">'.$linea.'</tr>'; $b=false;}else{echo '<tr>'.$linea.'</tr>'; $b=true;}}}else {  echo '<tr style="text-align">'.$a[4].'</tr>';} ?></tbody>
                       <tfoot><tr><?php echo $a[2]; ?></tr></tfoot>
                     </table>
                   </div>
             </div><!-- segunda entrada -->
             <?php } ?>
         </div>
</body>
</html>
<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "ejemplo.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
