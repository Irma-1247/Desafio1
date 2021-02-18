<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style type="text/css">
    html{
        margin: 3%;
    }
</style>
</head>
<body>
    <h1>Calculadora de Tabla de amortizacion</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <label>Sistema de Seleccion:  </label>
        <select name="Sistema">
            <option value="frances">Frances</option>
            <option value="aleman">Aleman</option>
            <option value="americano">Americano</option>
            <option value="Simple">Sistema simple: Cuota, amortizacion e interes fijo</option>
            <option value="Compuesto">Sistema compuesto: Interes sobre Interes</option>
        </select>
        <br>
        <br>
        <label>Fecha de desembolso (d/m/a): </label>
        <select name="dia" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
        </select>

        <select name="mes" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        <select name="año" required>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
        </select>
        <br> <br>

        <label>Importe del prestamo: </label>
        <input name="cantidad" required>
        <br> <br>

        <label>Periodo: </label>
        <select name="periodo">
            <option value="Diario">Diario</option>
            <option value="Semanal">Semanal</option>
            <option value="Quincenal">Quincenal</option>
            <option value="Mensual">Mensual</option>
            <option value="Anual">Anual</option>
        </select>
        <br><br>

        <label>Interes Diario: </label>
        <input type="text" name="IntDiario" required>
        <br> <br>

        <label>Plazo</label>
        <input name="plazo" required>
        <label> dias</label>
        <br> <br>

        <button type="submit" name="Calcular">Calcular</button>
    </form>

    <?php
    if (isset($_POST['Calcular'])):
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $año = $_POST['año'];
        $metodo = $_POST['Sistema'];
        $cantidad = $_POST['cantidad'];
        $periodo = $_POST['periodo'];
        $interesdiario = $_POST['IntDiario'];
        $plazo = $_POST['plazo'];

        #echo $dia, $mes, $año, $metodo, $plazo;

        //validando la correcta introduccion de la fecha
        if ($dia == "" || $mes == "" || $año == "") {
            echo "Seleccione una fecha correcta";
        }

        if($mes == "2" && $dia>28){
            echo "No puede Seleccionar un dia que no existe en Febrero";
        }

        //Calculando las tablas
        if($metodo == "frances"){
            if($periodo =="Diario"){
                $cuota = round(($cantidad*($interesdiario/100))/(1-(pow((1+($interesdiario/100)),-$plazo))),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                for ($i=1; $i <= $plazo ; $i++) {
                    $dia = $dia + 1;
                    if ($dia>30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interesdiario2 . "</td>";
                    echo "<td>" . ($cuota - $interesdiario2) . "</td>";
                    $cantidad2 = round($cantidad2 - $cuota + $interesdiario2,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Semanal"){
                $cuota = round(($cantidad*($interesdiario/100))/(1-(pow((1+($interesdiario/100)),-$plazo))),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                for ($i=1; $i <= $plazo ; $i++) {
                    $dia = $dia + 7;
                    if ($dia>30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interesdiario2 . "</td>";
                    echo "<td>" . ($cuota - $interesdiario2) . "</td>";
                    $cantidad2 = round($cantidad2 - $cuota + $interesdiario2,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Quincenal"){
                $cuota = round(($cantidad*($interesdiario/100))/(1-(pow((1+($interesdiario/100)),-$plazo))),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                for ($i=1; $i <= $plazo ; $i++) {
                    $dia = $dia + 15;
                    if ($dia>30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interesdiario2 . "</td>";
                    echo "<td>" . ($cuota - $interesdiario2) . "</td>";
                    $cantidad2 = round($cantidad2 - $cuota + $interesdiario2,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Mensual"){
                $cuota = round(($cantidad*($interesdiario/100))/(1-(pow((1+($interesdiario/100)),-$plazo))),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                for ($i=1; $i <= $plazo ; $i++) {
                    $mes = $mes + 1;
                    if ($mes > 12) {
                        $mes = 1;
                        $año = $año + 1;
                    }
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interesdiario2 . "</td>";
                    echo "<td>" . ($cuota - $interesdiario2) . "</td>";
                    $cantidad2 = round($cantidad2 - $cuota + $interesdiario2,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Anual"){
                $cuota = round(($cantidad*($interesdiario/100))/(1-(pow((1+($interesdiario/100)),-$plazo))),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                for ($i=1; $i <= $plazo ; $i++) {
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . ($año + $i) . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interesdiario2 . "</td>";
                    echo "<td>" . ($cuota - $interesdiario2) . "</td>";
                    $cantidad2 = round($cantidad2 - $cuota + $interesdiario2,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        else if($metodo == "aleman"){
            if($periodo =="Diario"){
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=1; $i <= $plazo ; $i++) {
                    $interes = round($cantidad2 * ($interesdiario/100),2);
                    $dia = $dia + 1;
                    if ($dia > 30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . ($capital + $interes) . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . $interes . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Semanal"){
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=1; $i <= $plazo ; $i++) {
                    $interes = round($cantidad2 * ($interesdiario/100),2);
                    $dia = $dia + 7;
                    if ($dia>30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . ($capital + $interes) . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . $interes . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Quincenal"){
                $cuota = round($cantidad*(1+$interesdiario)^($plazo/15)/((1+$interesdiario)^($plazo/15)-1),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=1; $i <= $plazo ; $i++) {
                    $interes = round($cantidad2 * ($interesdiario/100),2);
                    $dia = $dia + 15;
                    if ($dia>30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . ($capital + $interes) . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . $interes . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Mensual"){
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=1; $i <= $plazo ; $i++) {
                    $interes = round($cantidad2 * ($interesdiario/100),2);
                    $mes = $mes + 1;
                    if ($mes > 12) {
                        $mes = 1;
                        $año = $año + 1;
                    }
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . ($capital + $interes) . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . $interes . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Anual"){
                $cuota = round($cantidad*(1+$interesdiario)^($plazo/365)/((1+$interesdiario)^($plazo/365)-1),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=1; $i <= $plazo ; $i++) {
                    $interes = round($cantidad2 * ($interesdiario/100),2);
                    $interesdiario2 = round($cantidad2 * ($interesdiario/100),2);
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . ($año + $i) . "</td>";
                    echo "<td>" . ($capital + $interes) . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . $interes . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    if ($cantidad2 < 1) {
                        $cantidad2 = 0;
                    }
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

        }
        else if($metodo == "americano"){       //aqui
            if($periodo =="Diario"){
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $interes = $cantidad * ($interesdiario/100);
                $aporte = 0;
                for ($i=1; $i <= $plazo ; $i++) {
                    if ($i == $plazo) {
                        $aporte = $cantidad;
                    }
                    $cuota = $interes + $aporte;
                    $dia = $dia + 1;
                    if ($dia>30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interes . "</td>";
                    echo "<td>" . $aporte . "</td>";
                    $cantidad2 = $cantidad - $aporte;
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Semanal"){
                $cuota = round($cantidad*(1+$interesdiario)^($plazo/7)/((1+$interesdiario)^($plazo/7)-1),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $interes = $cantidad * ($interesdiario/100);
                $aporte = 0;
                for ($i=1; $i <= $plazo ; $i++) {
                    if ($i == $plazo) {
                        $aporte = $cantidad;
                    }
                    $cuota = $interes + $aporte;
                    $dia = $dia + 7;
                    if ($dia>30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interes . "</td>";
                    echo "<td>" . $aporte . "</td>";
                    $cantidad2 = $cantidad - $aporte;
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Quincenal"){
                $cuota = round($cantidad*(1+$interesdiario)^($plazo/15)/((1+$interesdiario)^($plazo/15)-1),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $interes = $cantidad * ($interesdiario/100);
                $aporte = 0;
                for ($i=1; $i <= $plazo ; $i++) {
                    if ($i == $plazo) {
                        $aporte = $cantidad;
                    }
                    $cuota = $interes + $aporte;
                    $dia = $dia + 15;
                    if ($dia>30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interes . "</td>";
                    echo "<td>" . $aporte . "</td>";
                    $cantidad2 = $cantidad - $aporte;
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Mensual"){
                $cuota = round($cantidad*(1+$interesdiario)^($plazo/30)/((1+$interesdiario)^($plazo/30)-1),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $interes = $cantidad * ($interesdiario/100);
                $aporte = 0;
                for ($i=1; $i <= $plazo ; $i++) {
                    if ($i == $plazo) {
                        $aporte = $cantidad;
                    }
                    $cuota = $interes + $aporte;
                    $mes = $mes + 1;
                    if ($mes > 12) {
                        $mes = 1;
                        $año = $año + 1;
                    }
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interes . "</td>";
                    echo "<td>" . $aporte . "</td>";
                    $cantidad2 = $cantidad - $aporte;
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($periodo == "Anual"){
                $cuota = round($cantidad*(1+$interesdiario)^($plazo/365)/((1+$interesdiario)^($plazo/365)-1),2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Interés</th><th>Aporte</th><th>Saldo</th></tr>";
                $cantidad2= $cantidad;
                $interes = $cantidad * ($interesdiario/100);
                $aporte = 0;
                for ($i=1; $i <= $plazo ; $i++) {
                    if ($i == $plazo) {
                        $aporte = $cantidad;
                    }
                    $cuota = $interes + $aporte;
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . ($año + $i) . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $interes . "</td>";
                    echo "<td>" . $aporte . "</td>";
                    $cantidad2 = $cantidad - $aporte;
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        else if($metodo == "Simple"){
            if($periodo =="Diario"){
                $cuota = round($cantidad * ($interesdiario/100) * $plazo ,2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
                $cantidad2 = $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=1; $i <= $plazo ; $i++) {
                    $dia = $dia + 1;
                    if ($dia > 30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . (($interesdiario/100)*$cantidad) . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            if($periodo =="Semanal"){
                $cuota = round($cantidad * ($interesdiario/100) * $plazo ,2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

                //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
                $cantidad2 = $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=0; $i < $plazo ; $i++) {
                    $dia = $dia + 7;
                    if ($dia > 30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . (($interesdiario/100)*$cantidad) . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            if($periodo =="Quincenal"){
                $cuota = round($cantidad * ($interesdiario/100) * $plazo ,2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

                //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
                $cantidad2 = $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=0; $i < $plazo ; $i++) {
                    $dia = $dia + 15;
                    if ($dia > 30) {
                        $dia = $dia - 30;
                        $mes = $mes + 1;
                        if ($mes > 12) {
                            $mes = 1;
                            $año = $año + 1;
                        }
                    }
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . (($interesdiario/100)*$cantidad) . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            if($periodo =="Mensual"){
                $cuota = round($cantidad * ($interesdiario/100) * $plazo ,2);
                echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
                echo "<br>Método: ( " . $metodo . ")";
                echo "<br>Monto: " . $cantidad;
                echo "<br>Interés: " . $interesdiario;
                echo "<br>Perido: " . $periodo;
                echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
                echo "<br><table class=\"table\">";
                echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
                $cantidad2 = $cantidad;
                $capital = round($cantidad / $plazo,2);
                for ($i=1; $i <= $plazo ; $i++) {
                    $mes = $mes + 1;
                    if ($mes > 12) {
                        $mes = 1;
                        $año = $año + 1;
                    }
                    echo "<tr>";
                    echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                    echo "<td>" . $cuota . "</td>";
                    echo "<td>" . $capital . "</td>";
                    echo "<td>" . (($interesdiario/100)*$cantidad) . "</td>";
                    $cantidad2 = round($cantidad2 - $capital,2);
                    echo "<td>" . $cantidad2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            if($periodo =="Anual"){
             $cuota = round($cantidad * ($interesdiario/100) * $plazo ,2);
             echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
             echo "<br>Método: ( " . $metodo . ")";
             echo "<br>Monto: " . $cantidad;
             echo "<br>Interés: " . $interesdiario;
             echo "<br>Perido: " . $periodo;
             echo "<br>Plazo: " . $plazo;

                //Imprimiendo tabla
             echo "<br><table class=\"table\">";
             echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
             $cantidad2 = $cantidad;
             $capital = round($cantidad / $plazo,2);
             for ($i=1; $i <= $plazo ; $i++) {
                $año = $año + 1;
                echo "<tr>";
                echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                echo "<td>" . $cuota . "</td>";
                echo "<td>" . $capital . "</td>";
                echo "<td>" . (($interesdiario/100)*$cantidad) . "</td>";
                $cantidad2 = round($cantidad2 - $capital,2);
                echo "<td>" . $cantidad2 . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    else if($metodo = "Compuesto"){
        if($periodo =="Diario"){
            echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
            echo "<br>Método: ( " . $metodo . ")";
            echo "<br>Monto: " . $cantidad;
            echo "<br>Interés: " . $interesdiario;
            echo "<br>Perido: " . $periodo;
            echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
            echo "<br><table class=\"table\">";
            echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
            $cantidad2 = $cantidad;
            $interes = $cantidad * $interesdiario/100;
            $capital = round($cantidad / $plazo,2);
            for ($i=1; $i <= $plazo ; $i++) {
                $cuota = $capital + $interes;
                $dia = $dia + 1;
                if ($dia > 30) {
                    $dia = $dia - 30;
                    $mes = $mes + 1;
                    if ($mes > 12) {
                        $mes = 1;
                        $año = $año + 1;
                    }
                }
                echo "<tr>";
                echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                echo "<td>" . $cuota . "</td>";
                echo "<td>" . $capital . "</td>";
                echo "<td>" . $interes . "</td>";
                $cantidad2 = round($cantidad2 - $capital,2);
                echo "<td>" . $cantidad2 . "</td>";
                echo "</tr>";
                $interes = round($interes + ($interes * ($interesdiario/100)),2);
            }
            echo "</table>";
        }

        if($periodo =="Semanal"){
            echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
            echo "<br>Método: ( " . $metodo . ")";
            echo "<br>Monto: " . $cantidad;
            echo "<br>Interés: " . $interesdiario;
            echo "<br>Perido: " . $periodo;
            echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
            echo "<br><table class=\"table\">";
            echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
            $cantidad2 = $cantidad;
            $interes = $cantidad * $interesdiario/100;
            $capital = round($cantidad / $plazo,2);
            for ($i=1; $i <= $plazo ; $i++) {
                $cuota = $capital + $interes;
                $dia = $dia + 7;
                if ($dia > 30) {
                    $dia = $dia - 30;
                    $mes = $mes + 1;
                    if ($mes > 12) {
                        $mes = 1;
                        $año = $año + 1;
                    }
                }
                echo "<tr>";
                echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                echo "<td>" . $cuota . "</td>";
                echo "<td>" . $capital . "</td>";
                echo "<td>" . $interes . "</td>";
                $cantidad2 = round($cantidad2 - $capital,2);
                echo "<td>" . $cantidad2 . "</td>";
                echo "</tr>";
                $interes = round($interes + ($interes * ($interesdiario/100)),2);
            }
            echo "</table>";
        }

        if($periodo =="Quincenal"){
            echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
            echo "<br>Método: ( " . $metodo . ")";
            echo "<br>Monto: " . $cantidad;
            echo "<br>Interés: " . $interesdiario;
            echo "<br>Perido: " . $periodo;
            echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
            echo "<br><table class=\"table\">";
            echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
            $cantidad2 = $cantidad;
            $interes = $cantidad * $interesdiario/100;
            $capital = round($cantidad / $plazo,2);
            for ($i=1; $i <= $plazo ; $i++) {
                $cuota = $capital + $interes;
                $dia = $dia + 15;
                if ($dia > 30) {
                    $dia = $dia - 30;
                    $mes = $mes + 1;
                    if ($mes > 12) {
                        $mes = 1;
                        $año = $año + 1;
                    }
                }
                echo "<tr>";
                echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                echo "<td>" . $cuota . "</td>";
                echo "<td>" . $capital . "</td>";
                echo "<td>" . $interes . "</td>";
                $cantidad2 = round($cantidad2 - $capital,2);
                echo "<td>" . $cantidad2 . "</td>";
                echo "</tr>";
                $interes = round($interes + ($interes * ($interesdiario/100)),2);
            }
            echo "</table>";
        }

        if($periodo =="Mensual"){
            echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
            echo "<br>Método: ( " . $metodo . ")";
            echo "<br>Monto: " . $cantidad;
            echo "<br>Interés: " . $interesdiario;
            echo "<br>Perido: " . $periodo;
            echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
            echo "<br><table class=\"table\">";
            echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
            $cantidad2 = $cantidad;
            $interes = $cantidad * $interesdiario/100;
            $capital = round($cantidad / $plazo,2);
            for ($i=1; $i <= $plazo ; $i++) {
                $cuota = $capital + $interes;
                $mes = $mes + 1;
                if ($mes > 12) {
                    $mes = 1;
                    $año = $año + 1;
                }
                echo "<tr>";
                echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                echo "<td>" . $cuota . "</td>";
                echo "<td>" . $capital . "</td>";
                echo "<td>" . $interes . "</td>";
                $cantidad2 = round($cantidad2 - $capital,2);
                echo "<td>" . $cantidad2 . "</td>";
                echo "</tr>";
                $interes = round($interes + ($interes * ($interesdiario/100)),2);
            }
            echo "</table>";
        }

        if($periodo =="Anual"){
            echo "<br>Fecha del préstamo: " . $dia . "-" . $mes . "-" . $año;
            echo "<br>Método: ( " . $metodo . ")";
            echo "<br>Monto: " . $cantidad;
            echo "<br>Interés: " . $interesdiario;
            echo "<br>Perido: " . $periodo;
            echo "<br>Plazo: " . $plazo;

            //Imprimiendo tabla
            echo "<br><table class=\"table\">";
            echo "<tr><th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interés</th><th>Saldo</th></tr>";
            $cantidad2 = $cantidad;
            $interes = $cantidad * $interesdiario/100;
            $capital = round($cantidad / $plazo,2);
            for ($i=1; $i <= $plazo ; $i++) {
                $cuota = $capital + $interes;
                $año = $año + 1;
                echo "<tr>";
                echo "<td>" . $dia . "-" . $mes . "-" . $año . "</td>";
                echo "<td>" . $cuota . "</td>";
                echo "<td>" . $capital . "</td>";
                echo "<td>" . $interes . "</td>";
                $cantidad2 = round($cantidad2 - $capital,2);
                echo "<td>" . $cantidad2 . "</td>";
                echo "</tr>";
                $interes = round($interes + ($interes * ($interesdiario/100)),2);
            }
            echo "</table>";
        }
    }
endif;
?>
</body>
</html>