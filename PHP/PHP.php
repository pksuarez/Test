<?php
    /*$x = "Contenido variable x   ";
    $y = "<br>Contenido variable y   ";
    echo $x;
    echo $y;

    echo "<br>Intercambiando...   ";

    $z = $x;
    $x = $y;
    $y = $z;


    echo $x . "<br>";
    echo $y; */

    /*
    echo '<table border="1">';
    echo "<tr>";
    echo "<th>Grupo/mes</th>";
    echo "<th>Diciembre</th>";
    echo "<th>Enero</th>";
    echo "<th>Septiembre</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Padres</th>";
    echo "<td>:(</td>";
    echo "<td>:)</td>";
    echo "<td>:)</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Estudiantes</th>";
    echo "<td>:)</td>";
    echo "<td>:(</td>";
    echo "<td>:(</td>";
    echo "</tr";
    echo "</table>";
    */

    for ($i = 1; $i<=10; $i++)
    {
        if ($i<10)
            echo $i.'-' ;

        else
            echo $i;
    }

    echo "<br>";

    for ($i = 1; $i<=10; $i++)
    {
        for ($j = 1; $j<=$i; $j++)
        {
         echo '*';
        }
        echo '<br>';
    }

    for ($i = 10; $i>=1; $i--)
    {
            for ($j = 1; $j<=$i; $j++)
            {
             echo '*';
        }
            echo '<br>';
    }

?>