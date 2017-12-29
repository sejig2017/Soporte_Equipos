<?php
require_once '../../dao/ProblemaDao.php';
include_once '../../dto/Problema.php';
include_once '../../dto/Equipo.php';
include_once '../../dao/EquipoDao.php';
include_once '../../dto/Usuario.php';
        /**
         *Insertar un problema         
         *La request debe traer problema, imagen         
         * 
         */        
$ex="";
            $cargo=filter_input(INPUT_POST,'cargoUsuario');
            $nombreUsuario=filter_input(INPUT_POST,'nombreUsuario');
            $idUsuario=filter_input(INPUT_POST,'idUsuario');
            $problema=new Problema();                    
            $usuario=new Usuario();
            $usuario->setId($idUsuario);
            $equipo=new Equipo();
            $equipo->setUsuariousuario($usuario);
            $eDao=new EquipoDao();            
            try{
            $equipo=$eDao->buscarByUsuario($equipo);            
            $problema->setEquipoequipo($equipo);            
            $problema->setProblema(filter_input(INPUT_POST,'problema'));            
            
            $problemaDao = new ProblemaDao();
            $problemaDao->guardar($problema);          
            
            $img=filter_input(INPUT_POST,'imagen');
            //ENVIAR ESO AL CORREO
            }catch(Exception $e){
               $ex='alert("Usted no posee un equipo asociado");';
            }            
            
            
            if($cargo == null){
                echo '<script language="javascript">'.$ex.' window.location="../../vista/login.php"</script>';      
                       
               
            }else{
              
                //var_dump($result);
     if($cargo=="2"||$cargo=="3"){//tipo director 1
         $_SESSION['cargo_id']= $cargo; 
         $_SESSION['id_usuario'] = $idUsuario;
         $_SESSION['nombre_usuario'] = $nombreUsuario;

//         var_dump($cargo.$idUsuario. $nombreUsuario);
          echo '<script language="javascript">'.$ex.'window.location="../../vista/formPrincipal_gerencia.php"</script>';

     }
//     if($cargo==2||$usuario->getCargo_id()==3){//tipo director 1
//           $_SESSION['basededatos'] = $usuario->getCargo_id();
//          echo '<script language="javascript">alert("'.$usuario->getCargo_id().'");window.location="../../vista/formPrincipal_gerencia.php"</script>';
//          
//     }
     
     if($cargo=="29"){//tipo director 1
         $_SESSION['cargo_id']= $cargo; 
         $_SESSION['id_usuario'] = $idUsuario;
         $_SESSION['nombre'] = $nombreUsuario;

           
          echo '<script language="javascript">'.$ex.'window.location="../../vista/formPrincipal_Adm.php"</script>';
          
     } 
     else {         
         $_SESSION['cargo_id']= $cargo; 
         $_SESSION['id_usuario'] = $idUsuario;
         $_SESSION['nombre_usuario'] = $nombreUsuario;
           
//            var_dump($cargo.$idUsuario. $nombreUsuario);
           echo '<script language="javascript">'.$ex.'window.location="../../vista/formPrincipal.php"</script>';
     }
            }
            