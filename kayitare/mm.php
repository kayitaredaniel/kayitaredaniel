<!DOCTYPE html>
<html lang="rw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Isanzwe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
        }
        .calculator {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        input[type="text"] {
            width: 100%;
            height: 40px;
            margin-bottom: 10px;
            text-align: right;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"], select {
            width: 60px;
            height: 40px;
            font-size: 18px;
            margin: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
// Variables for storing the numbers and result
$first_num = "";
$second_num = "";
$operator = "";
$result = "";

if (isset($_POST['calculate'])) {
    $first_num = $_POST['first_num'];
    $second_num = $_POST['second_num'];
    $operator = $_POST['operator'];

    // Check if numbers are set and operator is chosen
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
    <h2>Calculator Isanzwe</h2>
    <form method="post" action="">
        <input type="text" name="first_num" placeholder="Injiza umubare wa mbere" value="<?php echo $first_num; ?>" required><br>
        <input type="text" name="second_num" placeholder="Injiza umubare wa kabiri" value="<?php echo $second_num; ?>" required><br>
        <select name="operator" required>
            <option value="">Igikorwa</option>
            <option value="+">Kongera (+)</option>
            <option value="-">Kuvaho (-)</option>
            <option value="*">Gukuba (x)</option>
            <option value="/">Gukora Division (/)</option>
        </select><br><br>
        <input type="submit" name="calculate" value="=">
    </form>

    <?php if ($result !== ""): ?>
        <h3>Igisubizo: <?php echo $result; ?></h3>
    <?php endif; ?>
</div>

</body>
</html>
