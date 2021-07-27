<?php
$salida="";
    if(isset($_POST['consulta'])){
        $consulta=$_POST['consulta'];
        if($consulta ==2){
            $salida.="<div class='form-row'>
            <div class='col-md-6'>
            <label>Ruc</label>
            <input id='ruc' name='ruc' type='text'  placeholder='Ingrese RUC' class='form-control' required>
            </div>
                <div class='col-md-6'>
                <label>Razon Social</label>
            <input type='text' id='razonsocial' placeholder='Razon Social' name='razonsocial' class='form-control' required>
                </div>
            </div>";
        }else {
            $salida.="";
        }
    }
    echo $salida;
?>