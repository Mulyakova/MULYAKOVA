<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календрь</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #F0FFF0, #F8F8FF, #F0FFFF);
        }

        table {
            border-collapse: collapse;
            margin-top: 40px;           
            overflow: hidden;          
            background-color: #FFE4E1;
        }

        th, td {
            border: 1px solid #F0FFFF;
            padding: 15px;
            text-align: center;                       
        }

        th {
            background: #87CEFA;
            color: #FFE4E1;            
        }

        .weekend {
            color: #ff0000;
        }

        .holiday {
            background: #ff0000;
            }
        input {
            padding:10px;
            border:0;
            box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
            border-radius:10px;
         }
         input [type=submit] {
            padding:10px;
            border:0;
            box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
            border-radius:10px;
            background: #00FF7F;
         }
    </style>
</head>
<body>
   <?php
function generateCalendar($month = null, $year = null)
{
    if ($month === null || $year === null) {
        $month = date('n');
        $year = date('Y');
    }

    $firstDay = new DateTime("$year-$month-01");
    $lastDay = new DateTime("$year-$month-" . $firstDay->format('t'));

    echo "<h2>" . $firstDay->format("F Y") . "</h2>";

    echo "<table>";
    echo "<tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th class='weekend'>Сб</th><th class='weekend'>Вс</th></tr>";

    $firstDayOfWeek = $firstDay->format('N') - 1;
    echo "<tr>";
    for ($i = 0; $i < $firstDayOfWeek; $i++) {
        echo "<td></td>";
    }

    $currentDay = clone $firstDay;
    while ($currentDay <= $lastDay) {
        if ($currentDay->format('N') == 1) {
            echo "</tr><tr>";
        }

        $class = '';
        if (in_array($currentDay->format("N"), [6, 7])) {
            $class = 'weekend';
        }
        if ($currentDay->format("n") == $month && isHoliday($currentDay)) {
            $class .= ' holiday';
        }

        echo "<td class='$class'>" . $currentDay->format("j") . "</td>";

        $currentDay->add(new DateInterval('P1D'));
    }

    $lastDayOfWeek = $currentDay->format('N') - 1;
    for ($i = 0; $i < (7 - $lastDayOfWeek) % 7; $i++) {
        echo "<td></td>";
    }

    echo "</tr>";
    echo "</table>";
}

function isHoliday(DateTime $date)
{
    $holidays = [
        '01-01', '01-02', '01-03', '01-04', '01-05', '01-06', '01-07',
        '02-23',
        '03-08',
        '05-01', '05-02', '05-03',
        '05-09',
        '06-01',
        '11-06',
        '12-31',
    ];

    return in_array($date->format('m-d'), $holidays);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMonth = $_POST["month"];
    $userYear = $_POST["year"];
    generateCalendar($userMonth, $userYear);
} else {
    generateCalendar();
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="month">Месяц: </label>
    <input type="number" name="month" min="1" max="12" required>
    <br><br>
    <label for="year">Год: </label>
    <input type="number" name="year" required>
    <br><br>
    <input type="submit" value="Показать календарь">
</form>
</body>
</html>
