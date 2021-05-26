<?php ob_start(); ?>
<html>
<head>
     <style>
        @page {  margin-top: 150px;  margin-bottom: 80px;  margin-right: 50px;  margin-left: 50px; }
       body { margin: 0px; }
       #header { position: fixed; left: 0px; top: -150px; right: 0px; height: 100px; border-bottom: 2px solid black; text-align: justify; font-weight: bold; text-transform: uppercase; padding-top: 5px;}
       #footer { position: fixed; left: 0px; bottom: -80px; right: 0px; height: 60px; text-align: right; padding-right: 20px; border-top: 2px solid black;}
       #footer .page:after { content: counter(page); }
       .card-header{
           background: #307347; border-bottom: 1px solid rgba(0,0,0,.125);
           padding-top: 2px;
           padding-right: 30px;
           padding-bottom: 2px;
           padding-left: 30px;
           position: relative;
           border-top-left-radius: .25rem;
           border-top-right-radius: .25rem;
           color:white;
         }
       .table {
           clear: both;
           margin-top: 6px !important;
           margin-bottom: 6px !important;
           max-width: none !important;
           border-collapse: separate !important;
           border-spacing: 0;
       }
       .table-bordered {border: 1px solid #dee2e6;}
       .odd{background-color: rgba(0,0,0,.05);}
       .card-body {background: #0000000a;}
       .table > tbody, th, td {
         border: 1px solid #dee2e6;
         border-collapse: collapse;
       }
       .no{border: none;}
       .row{display: flex; justify-content: flex-start; margin-bottom: 5px;}
       .crotaneo{flex-direction: column;}
     </style>
     <body>

    <div id="header"><?php  $image = 'img/logo.png'; $imageData = base64_encode(file_get_contents($image)); $src = 'data:'.mime_content_type($image).';base64,'.$imageData;  echo '<img src="',$src,'" width="325" height="90" style="float:left; padding-right: 20px;">'; ?>
            <h1><?php echo $_REQUEST['variable2']; ?></h1>
    </div>
    <div id="footer"><p class="page">Pag </p></div>
      <div id="content">
        <table class="tabla">
            <tbody>
              <tr><td class="no">Total transacciones dólar compra</td><td  class="no"><b>25</b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Total transacciones dólar venta</td><td  class="no"><b>40</b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Total transacciones euro compra</td><td  class="no"><b>56</b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Total transacciones euro venta</td><td  class="no"><b>23</b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Comision</td><td  class="no"><b>52</b></td><td class="no">RD$</td></tr>
              <tr><td class="no">Total a pagar de comision</td><td  class="no"><b>78</b></td><td class="no">RD$</td></tr>
            </tbody>
          </table>
          <br>
              <div id="completa1" >
                  <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fa-life-ring" aria-hidden="true"></i>  Lista de Transacciones Completadas</h3>
                  </div>
         <div class="card-body"  style="overflow-x: auto;">
   <table  class="table table-bordered table-hover table-striped display" cellpadding="5px" cellspacing="5px" style="width:100%;">
   <thead>
       <tr>
           <th>Name</th>
           <th>Position</th>
           <th>Office</th>
           <th>Age</th>
           <th>Salary</th>
       </tr>
   </thead>
   <tbody>
       <tr class="odd">
           <td>Tiger Nixon</td>
           <td>System Architect</td>
           <td>Edinburgh</td>
           <td>61</td>
           <td style="text-align:center;">$320,800</td>
       </tr>
       <tr>
           <td>Cedric Kelly</td>
           <td>Senior Javascript Developer</td>
           <td>Edinburgh</td>
           <td>22</td>
           <td>$433,060</td>
       </tr>
       <tr class="odd">
           <td>Sonya Frost</td>
           <td>Software Engineer</td>
           <td>Edinburgh</td>
           <td>23</td>
           <td>$103,600</td>
       </tr>
       <tr>
           <td>Quinn Flynn</td>
           <td>Support Lead</td>
           <td>Edinburgh</td>
           <td>22</td>
           <td>$342,000</td>
       </tr>
       <tr class="odd">
           <td>Dai Rios</td>
           <td>Personnel Lead</td>
           <td>Edinburgh</td>
           <td>35</td>
           <td>$217,500</td>
       </tr>
       <tr>
           <td>Gavin Joyce</td>
           <td>Developer</td>
           <td>Edinburgh</td>
           <td>42</td>
           <td>$92,575</td>
       </tr>
       <tr class="odd">
           <td>Martena Mccray</td>
           <td>Post-Sales support</td>
           <td>Edinburgh</td>
           <td>46</td>
           <td>$324,050</td>
       </tr>
       <tr>
           <td>Jennifer Acosta</td>
           <td>Junior Javascript Developer</td>
           <td>Edinburgh</td>
           <td>43</td>
           <td>$75,650</td>
       </tr>
       <tr class="odd">
           <td>Shad Decker</td>
           <td>Regional Director</td>
           <td>Edinburgh</td>
           <td>51</td>
           <td>$183,000</td>
       </tr>
   </tbody>
   <tfoot>
       <tr>
           <th>Name</th>
           <th>Position</th>
           <th>Office</th>
           <th>Age</th>
           <th>Salary</th>
       </tr>
   </tfoot>
</table>



</div>

</div>
<br >
<br >
<div id="completa2">
<div class="card-header">
  <h3 class="card-title titulo2"><i class="fas fa-university"></i> Lista de Transacciones Canceladas</h3>
</div>

   <div class="card-body"  style="overflow-x: auto;">
<table  class="table table-bordered table-hover table-striped display" cellpadding="5px" cellspacing="5px" style="width:100%;">
   <thead>
       <tr>
           <th>ID</th>
           <th>CLIENTE</th>
           <th>TRANSACCION</th>
           <th>MONTO</th>
           <th>ESTADO</th>
       </tr>
   </thead>
   <tbody>
       <tr  class="odd">
           <td>Jena Gaines</td>
           <td>Office Manager</td>
           <td>London</td>
           <td>30</td>
           <td>$90,560</td>
       </tr>
       <tr>
           <td>Haley Kennedy</td>
           <td>Senior Marketing Designer</td>
           <td>London</td>
           <td>43</td>
           <td>$313,500</td>
       </tr>
       <tr  class="odd">
           <td>Tatyana Fitzpatrick</td>
           <td>Regional Director</td>
           <td>London</td>
           <td>19</td>
           <td>$385,750</td>
       </tr>
       <tr>
           <td>Michael Silva</td>
           <td>Marketing Designer</td>
           <td>London</td>
           <td>66</td>
           <td>$198,500</td>
       </tr>
       <tr class="odd">
           <td>Bradley Greer</td>
           <td>Software Engineer</td>
           <td>London</td>
           <td>41</td>
           <td>$132,000</td>
       </tr>
       <tr>
           <td>Angelica Ramos</td>
           <td>Chief Executive Officer (CEO)</td>
           <td>London</td>
           <td>47</td>
           <td>$1,200,000</td>
       </tr>
   </tbody>
   <tfoot>
       <tr>
           <th>Name</th>
           <th>Position</th>
           <th>Office</th>
           <th>Age</th>
           <th>Salary</th>
       </tr>
   </tfoot>
</table>
</div>

<div class="card-body"  style="overflow-x: auto;">
  <?php echo $_REQUEST['variable1']; ?>
</div>

</div>
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
