<?php

include_once realpath('../control/PerifericosController.php');


  $Periferico = PerifericosController::listByTipoPeriferico(filter_input(INPUT_POST,'Tipo_Periferico_id'));
   $listas = '<option value="">Seleccione </option>';
  for ($index = 0; $index < count($Periferico); $index++) {
      $id = $Periferico[$index]->getId();      
      $serial=$Periferico[$index]->getSerial();
      $listas .= "<option value='$id'>$serial</option>";
  }
  echo $listas;
