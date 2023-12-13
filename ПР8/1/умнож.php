<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 40px;           
            overflow: hidden;          
            background: linear-gradient(to right, #F0FFF0, #F8F8FF, #F0FFFF);
            border: 1px solid #00FA9A;
        }
        }

        table, th, td {
            border: #00FA9A;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #00FA9A;
        }
    </style>
</head>
<body>   
    <table>
        <tr>
            <th>&nbsp;</th>
            <?php 
                for ($i = 0; $i <= 10; $i++) 
                {echo "<th>$i</th>";}
            ?>
        </tr>
        <?php           
            for ($i = 0; $i <= 10; $i++) {
                echo "<tr><th>$i</th>";
                for ($j = 0; $j <= 10; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
                }echo "</tr>";}
        ?>
    </table>
</body>
</html>