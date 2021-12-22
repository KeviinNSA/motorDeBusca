<?php

    $valor = $_REQUEST['q'];
    $cont = 0;
    $sugestoes;
    $resultado = "";

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database ="novo";

    $conn = mysqli_connect($hostname,$user,$password,$database) or die("Connection has failed"+mysqli_connet_error());

    $res = mysqli_query($conn, "select sugestao from search");

    if(mysqli_affected_rows($conn) > 0){
        while($novo = mysqli_fetch_assoc($res)){
            $sugestoes[$cont] = $novo["sugestao"];
            $cont ++; 
        }
    }else{
        echo "";
    }

    if($valor == ""){
        echo "";
    }else{
        $valor = strtolower($valor);
        $lengh = strlen($valor);
        foreach( $sugestoes as $pesquisado){
            if(stristr($valor, strtolower(substr($pesquisado,0,$lengh)))){
                if($resultado === ""){
                $resultado =$pesquisado;
            }else{
                $resultado .= "<br/> $pesquisado"; 
            }
        }
    }
}
    
    echo $resultado === "" ? "No Suggestion" : $resultado;
    





















?>