<?php
session_start();
require_once '../Logica/Connexio.php';
require_once '../Logica/Atraccions.php';
    $Connexio = new Connexio('pau','pau','');
    $Connexio->connectar();
    $Connexio->selectdb("socialtravel");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table id="taulaCistella">
            <tr>
                <td><b>Numero</b></td>
                <td><b>Nombre</b></td>
                <td><b>Cantidad</b></td>
                <td><b>Importe</b></td>
                <td><b>Borrar</b></td>
            </tr>
            <?php
            if($_SESSION["carro"]){
                $numCompres = sizeof($_SESSION["carro"]);
                $atr = new Atraccions();
                for ($i = 0; $i < $numCompres; $i++){
                    $resultAtr = $atr->getAtraccionByID($_SESSION["carro"][$i]["idAtraccio"]);
                    echo "<tr>";
                        echo "<td>". ($i+1) ."</td>";
                        echo "<td>".utf8_encode(mysql_result($resultAtr,0,1))."</td>";
                        echo "<td> <input type='text' size = 2 value = '".$_SESSION["carro"][$i]["quantitat"]."'> </td>";
                        echo "<td>".$_SESSION["carro"][$i]["preu"]."</td>";
                        echo "<td><a href='#' id = 'borraTuplaCompra'> <img src='img/drop.png' width=20px; height=20px; /> </a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <input type="submit" value="Comprar!" style="position: right">
    </body>
</html>
<?php
    //echo "<pre>Sesio: ";
    //print_r($_SESSION);
?>