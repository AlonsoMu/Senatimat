<?php

require_once '../models/Colaborador.php';

if (isset($_POST['operacion'])){

  $colaborador = new Colaborador();
  $data = $colaborador->listarColaboradores();

  if ($data){
    $numeroFila = 1;
    $datosColaborador = '';
    $botonNulo = " <a href='#' class='btn btn-sm btn-warning' title='No tiene fotografía'><i class='bi bi-eye-slash-fill'></i></a>";
    
    foreach($data as $registro){
      $datosColaborador = $registro['apellidos'] . ' ' . $registro['nombres'];

      //La primera parte a RENDERIZAR, es lo standard (siempre se muestra)
      echo "
        <tr>
          <td>{$numeroFila}</td>
          <td>{$registro['apellidos']}</td>
          <td>{$registro['nombres']}</td>
          <td>{$registro['cargo']}</td>
          <td>{$registro['sede']}</td>
          <td>{$registro['telefono']}</td>
          <td>{$registro['tipocontrato']}</td>
          <td>{$registro['direccion']}</td>
          <td>
            <a href='#' class='btn btn-sm btn-danger'><i class='bi bi-trash3'></i></a>
            <a href='#' class='btn btn-sm btn-info'><i class='bi bi-pencil-fill'></i></a>";
      
      //La segunda parte a RENDERIZAR, es el botón VER FOTOGRAFÍA
      if ($registro['cv'] == ''){
        echo $botonNulo;
      }else{
        echo " <a href='../views/img/fotografias/{$registro['cv']}' data-lightbox='{$registro['idcolaborador']}' data-title='{$datosColaborador}' class='btn btn-sm btn-warning'><i class='bi bi-eye-fill'></i></a>";
      }

      //La tercera parte a RENDERIZAR, cierre de la fila
      echo "
          </td>
        </tr>
      ";

      $numeroFila++;
    }
  }
}
