<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a{
            width: 28rem;
            height: 20rem;
            background-color: green;
            color: white;
            margin-left: 20rem;
            margin-top: 6rem;
            border-radius: 18px;

        }
        .hy{
            height: 5rem;
            width: 28rem;
            border-radius: 18px;
            background-color:red;


            color: white;
        }
        .r{
            width: 4rem;
            height: 4rem;
            border-radius: 12px;
            background-color:black;
            color:red;
            margin-left: 4px;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <?php
    $cookie_name1="num";
    $cookie_value1="";
    $cookie_name2="op";
    $cookie_value2="";
    if(isset($_POST['num'])){
        $num=$_POST['input'].$_POST['num'];
    }
    else{
        $num="";
    }
    if(isset($_POST['op']))
    {
        $cookie_value1=$_POST['input'];
        setcookie($cookie_name1, $cookie_value1, time()+(86400*30), "/");
        $cookie_value2=$_POST['op'];
        setcookie($cookie_name1, $cookie_value1, time()+(86400*30), "/");
        $num="";
    }
    if(isset($_POST['equer'])){
     $num=$_POST['input'];
     switch($_COOKIE['op'])
   
     {
        case "+":
        $result=$_COOKIE['op']+$num;
        break;
        case "/":
            $result=$_COOKIE['op']/$num;
            break;
            case "x":
                $result=$_COOKIE['op']*$num;
                break;
                case "%":
                    $result=$_COOKIE['op']%$num;
                    break;
                    case "-":
                        $result=$_COOKIE['op']-$num;
                        break;
                        case "=":
                            $result=$_COOKIE['equer']=$num;
                            break;
     }
    }

    




    ?>
  <form method="POST">
    <div class="a">
    <input type="number" value="<?php echo $result?>" class="hy"><br><br>
    <input type="button" name="num" value="1" class="r">
    <input type="button" name="num" value="2" class="r">
    <input type="button" name="num" value="3" class="r">
    <input type="button" name="num" value="4" class="r">
    <input type="button" name="num" value="5" class="r">
    <input type="button" name="num" value="6" class="r">
    <input type="button" name="num" value="7" class="r">
    <input type="button" name="num" value="8" class="r">
    <input type="button" name="num" value="9" class="r">
    <input type="button" name="num" value="0" class="r">
    <input type="button" name="equer" value="=" class="r">
    <input type="button" name="op" value="+" class="r">
    <input type="button" name="op" value="x" class="r">
    <input type="button" name="op" value="/" class="r">
    <input type="button" name="op" value="%" class="r">
    <input type="button" name="op" value="-" class="r">

</div>
  </form>  
</body>
</html>