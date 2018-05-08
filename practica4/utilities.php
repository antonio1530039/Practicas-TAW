<?php
    //Se lee el archivo de maestros y se crea su array correspondiente
    $maestros[] = array();
    $handle = fopen("./databases/maestros.txt", "r");
    $numEmpleado=""; $nombreE=""; $carrera=""; $telefono="";
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $save="";//Variable en la que se guardara caracter por caracter
            $control=0; //Variable que servira para definir que dato; de manera que 0 es num de empleado, 1 es nombre y asi con lo demas.
           for($i=0; $i < strlen($line); $i++){
                $save.=$line[$i];
                if($line[$i]==","){
                    $save[strlen($save)-1]=" ";//Se elimina la coma
                    switch ($control) {
                        case 0:
                            $numEmpleado=$save;$save="";$control++;
                            break;
                        case 1:
                            $nombreE=$save;$save="";$control++;
                            break;
                        case 2:
                            $carrera=$save;$save="";$control++;
                            break;
                        case 3:
                            $telefono=$save;$save="";$control++;
                            break;
                    }
                }
           }
           //Al terminar de leer los datos de la linea se asigna este a un arreglo asociativo
                $maestros[] = [
                    'numero' => $numEmpleado,
                    'nombre' => $nombreE,
                    'carrera' => $carrera,
                    'telefono' => $telefono
                ];
        }

        fclose($handle);
    } else {
        die("Error al leer el archivo");
    } 



    //Se lee el archivo de alumnos y se crea su array correspondiente
    $alumnos[] = array();
    $handle = fopen("./databases/alumnos.txt", "r");
    $matricula=""; $nombre=""; $carrera=""; $correo=""; $telefono="";
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $save="";//Variable en la que se guardara caracter por caracter
            $control=0; //Variable que servira para definir que dato; de manera que 0 es num de empleado, 1 es nombre y asi con lo demas.
           for($i=0; $i < strlen($line); $i++){ //Se lee caracter por caracter para dividir los atributos por ,
                $save.=$line[$i];
                if($line[$i]==","){ //Si se llega al caracter de , se elimina este de la cadena y se asigna la variable correspondiente, para esto sirve la variable $control, en base a este se decide que atributo es
                    $save[strlen($save)-1]=" ";//Se elimina la coma
                    switch ($control) { //En base a la variable $control se define que dato es el que se va guardar
                        case 0:
                            $matricula=$save;$save="";$control++;
                            break;
                        case 1:
                            $nombre=$save;$save="";$control++;
                            break;
                        case 2:
                            $carrera=$save;$save="";$control++;
                            break;
                        case 3:
                            $correo=$save;$save="";$control++;
                            break;
                        case 4:
                            $telefono=$save;$save="";$control++;
                            break;
                    }
                }
           }
           //Al terminar de leer los datos de la linea se asigna este a un arreglo asociativo
                $alumnos[] = [
                    'matricula' => $matricula,
                    'nombre' => $nombre,
                    'carrera' => $carrera,
                    'correo' => $correo,
                    'telefono' => $telefono

                ];
            
        }
        fclose($handle);
    } else {
        die("Error al leer el archivo");
    } 

?>
