<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    $conexion = mysqli_connect("localhost", "Sancho", "sanchito", "sancho");

    if($conexion->connect_error){
        print "Fallo al conectar con la base de datos. ".$conexion->connect_error;
        echo 0;
    }else{
        $sql = "INSERT INTO curriculum VALUES('$request->nombre', '$request->mail', '$request->mensaje', now());";
        $resultados=mysqli_query($conexion,$sql) or die(mysqli_error($conexion));

        mysqli_close($conexion);
    }

?>