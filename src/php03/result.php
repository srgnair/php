<?php

require_once('functions/search_city_time.php');

$tokyo = searchCityTime('東京');
//東京は固定表示のため、この変数を作る

$city = htmlspecialchars($_GET['city'], ENT_QUOTES);
//index.phpからname=cityのデータを受け取る

$comparison = searchCityTime($city);
//search..で作った関数、引数は上記city　比較で選ばれた国を表示させる

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
</head>

<body>

    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/php03/index.php">
                World Clock
            </a>
        </div>
    </header>

    <main>
        <div class="result__content">

            <div class="result-cards">

                <div class="result-card">

                    <div class="result-card__img-wrapper">
                        <img class="result-card__img" src="img/national_flag_img/<?php echo $tokyo['img'] ?>" alt="国旗">
                    </div>

                    <div class="result-card__body">
                        <p class="result-card__city">
                            <?php echo $tokyo['name'] ?>
                        </p>
                        <p class="result-card__time">
                            <?php echo $tokyo['time'] ?>
                        </p>
                    </div>

                </div>

                <div class="result-card">

                    <div class="result-card__img-wrapper">
                        <img class="result-card__img" src="img/national_flag_img/<?php echo $comparison['img'] ?>" alt="国旗">
                    </div>

                    <div class="result-card__body">
                        <p class="result-card__city">
                            <?php echo $comparison['name'] ?>
                        </p>
                        <p class="result-card__time">
                            <?php echo $comparison['time'] ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>

</html>