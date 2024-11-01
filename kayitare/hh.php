<html lang="rw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        .a {
            width: 28rem;
            height: 20rem;
            background-color: green;
            color: white;
            margin-left: 20rem;
            margin-top: 6rem;
            border-radius: 18px;
        }
        .hy {
            height: 5rem;
            width: 28rem;
            border-radius: 18px;
            background-color: red;
            color: white;
        }
        .r {
            width: 4rem;
            height: 4rem;
            border-radius: 12px;
            background-color: black;
            color: red;
            margin-left: 4px;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <?php
    $result = "";
    $num = "";

    // Gufata nimero yanditswe 
    if (isset($_POST['num'])) {
        $num = $_POST['input'] . $_POST['num'];
    }

    // Gushyira operation mu cookie
    if (isset($_POST['op'])) {
        setcookie("num", $_POST['input'], time() + (86400 * 30), "/");
        setcookie("op", $_POST['op'], time() + (86400 * 30), "/");
        $num = "";
    }

    // Kugenzura niba "=" yakoreshejwe kandi igikorwa kirangiye
    if (isset($_POST['equer'])) {
        $num = $_POST['input'];

        if (isset($_COOKIE['num']) && isset($_COOKIE['op'])) {
            $first_num = $_COOKIE['num'];
            $operation = $_COOKIE['op'];

            // Hindura umubare kugirango ukore neza
            $first_num = (float)$first_num;
            $num = (float)$num;

            switch ($operation) {
                case "+":
                    $result = $first_num + $num;
                    break;
                case "/":
                    if ($num != 0) {  // Irinde kwigabanyamo zero
                        $result = $first_num / $num;
                    } else {
                        $result = "Ikosa: Ntushobora kugabanya zero";
                    }
                    break;
                case "x":
                    $result = $first_num * $num;
                    break;
                case "%":
                    $result = $first_num % $num;
                    break;
                case "-":
                    $result = $first_num - $num;
                    break;
                default:
                    $result = "Ikosa: Igikorwa ntabwo cyumvikanye";
                    break;
            }
        }
    }
    ?>

    <form method="POST" action="">
        <div class="a">
            <input type="text" name="input" value="<?php echo $num ? $num : $result; ?>" class="hy"><br><br>
            <input type="submit" name="num" value="1" class="r">
            <input type="submit" name="num" value="2" class="r">
            <input type="submit" name="num" value="3" class="r">
            <input type="submit" name="num" value="4" class="r">
            <input type="submit" name="num" value="5" class="r">
            <input type="submit" name="num" value="6" class="r">
            <input type="submit" name="num" value="7" class="r">
            <input type="submit" name="num" value="8" class="r">
            <input type="submit" name="num" value="9" class="r">
            <input type="submit" name="num" value="0" class="r">
            <input type="submit" name="equer" value="=" class="r"> <!-- Fixed -->
            <input type="submit" name="op" value="+" class="r">
            <input type="submit" name="op" value="x" class="r">
            <input type="submit" name="op" value="/" class="r">
            <input type="submit" name="op" value="%" class="r">
            <input type="submit" name="op" value="-" class="r">
        </div>
    </form>
</body>
</html>
