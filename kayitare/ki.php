<!DOCTYPE html>
<html lang="rw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Ikora neza</title>
    <style>
        .calculator {
            width: 300px;
            height: auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            margin: 0 auto;
            text-align: center;
        }
        input[type="text"] {
            width: 280px;
            height: 40px;
            margin-bottom: 20px;
            text-align: right;
            font-size: 18px;
            border-radius: 5px;
            padding: 5px;
        }
        input[type="submit"] {
            width: 60px;
            height: 60px;
            font-size: 18px;
            margin: 5px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #666;
        }
    </style>
</head>
<body>

<?php
// Variables for storing the numbers and the result
$first_num = "";
$second_num = "";
$operator = "";
$result = "";

if (isset($_POST['calculate'])) {
    $first_num = $_POST['first_num'];
    $second_num = $_POST['second_num'];
    $operator = $_POST['operator'];

    // Check if numbers are set and the operator is chosen
    if (is_numeric($first_num) && is_numeric($second_num)) {
        switch ($operator) {
            case "+":
                $result = $first_num + $second_num;
                break;
            case "-":
                $result = $first_num - $second_num;
                break;
            case "*":
                $result = $first_num * $second_num;
                break;
            case "/":
                if ($second_num != 0) {
                    $result = $first_num / $second_num;
                } else {
                    $result = "Ikosa: Ntushobora kugabanya 0!";
                }
                break;
            case "%":
                $result = $first_num % $second_num;
                break;
            default:
                $result = "Hitamo igikorwa!";
                break;
        }
    } else {
        $result = "Injiza imibare nyakuri!";
    }
}
?>

<div class="calculator">
    <h2>PHP Calculator</h2>
    <form method="post" action="">
        <input type="text" name="first_num" placeholder="Injiza umubare wa mbere" value="<?php echo $first_num; ?>" required><br>
        <input type="text" name="second_num" placeholder="Injiza umubare wa kabiri" value="<?php echo $second_num; ?>" required><br>
        <select name="operator" required>
            <option value="">Hitamo Igikorwa</option>
            <option value="+">Kongeraho (+)</option>
            <option value="-">Kuvaho (-)</option>
            <option value="*">Kuba (x)</option>
            <option value="/">Gukuba (/)</option>
            <option value="%">Modulo (%)</option>
        </select><br><br>
        <input type="submit" name="calculate" value="=">
    </form>

    <?php if ($result !== ""): ?>
        <h3>Igisubizo: <?php echo $result; ?></h3>
    <?php endif; ?>
</div>

</body>
</html>
