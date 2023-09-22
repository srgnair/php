<?php

require_once('config/status_codes.php');
//status_codes.phpを読みこむ

$random_numbers = array_rand($status_codes, 4);
//新変数を作り、array_rand関数で$status_codesからランダムに４つの配列を代入する　ex)0,2,3,4
//※キーを返す関数であるため、この関数だけでは要素を表示することができない
//→取り出した要素を表示したい場合は、foreach文と組み合わせる

foreach ($random_numbers as $index) {
    $options[] = $status_codes[$index];
}
//ランダムに４つ取り出したキーを$indexに１つずつ渡す
//→取り出したキーだけで構成された$status_codes[$index]を新しい配列$options[]に代入

$question = $options[mt_rand(0, 3)];
//optionsの中から1つを正解とする
//$optionsの０～４のうち１つを選ぶ

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Code Quiz</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <header class="header">

        <div class="header__inner">

            <a class="header__logo" href="/">
                Status Code Quiz
            </a>

        </div>

    </header>

    <main>

        <div class="quiz__content">

            <div class="question">

                <p class="question__text">Q.以下の内容に当てはまるステータスコードを選んでください</p>
                <p class="question__text">
                    <?php echo $question['description']
                    //$question（＝正解のハコ）の'description'をechoする
                    ?>

                </p>
            </div>

            <form class="quiz-form" action="result.php" method="post">

                <input type="text" name="answer_code" value="<?php echo $question['code'] ?>">
                <!-- 正解となるデータ -->

                <div class="quiz-form__item">
                    <?php foreach ($options as $option) :
                        //問題文を４つまわす
                    ?>
                        <div class="quiz-form__group">
                            <input class="quiz-form__radio" id="<?php echo $option['code'] ?>" type="radio" name="option" value="<?php echo $option['code'] ?>">
                            <!--
                    inputのidは、正解の選択肢のコード
                     -->
                            <label class="quiz-form__label" for="<?php echo $option['code'] ?>">
                                <!--
                    labelのfor属性をinputのidと同じものにして紐づけをする
                    -->
                                <?php echo $option['code'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="quiz-form__button">
                    <button class="quiz-form__button-submit" type="submit">
                        回答
                    </button>
                </div>
            </form>

        </div>
    </main>

</body>

</html>