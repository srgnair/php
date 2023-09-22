<?php

require_once('config/status_codes.php');
//status_codes.phpの読みこみ

$answer_code = htmlspecialchars($_POST['answer_code'], ENT_QUOTES);
//エスケープ処理をした変数をつくって受け取る

$option = htmlspecialchars($_POST['option'], ENT_QUOTES);
//変数optionにエスケープ処理をして受け取る

if (!$option) {
    header('Location: index.php');
}
//データが正しく送信されなかった時の処理
//なにも選択肢を選ばずに送信を押した場合にindex.htmlにもどる

foreach ($status_codes as $status_code) {
    //$status_codesを一つ一つの配列に分解するために$status_codeにわたす

    if ($status_code['code'] === $answer_code) {
        //$status_codeのキー['code']が送信された$answer_codeと同じとき（＝解答コードと配列が合致するとき）

        $code = $status_code['code'];
        //$codeに代入

        $description = $status_code['description'];
        //$descriptionに代入
    }
}

$result = $option === $code;
//$optionと$codeが合致したものを変数resultとする

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Code Quiz</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
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

        <div class="result__content">

            <div class="result">
                <?php if ($result) :
                    //一致する場合（＝正解）
                ?>
                    <h2 class="result__text--correct">正解</h2>
                <?php else :
                    //それ以外（＝不正解）    
                ?>
                    <h2 class="result__text--incorrect">不正解</h2>
                <?php endif; ?>
            </div>

            <div class="answer-table">

                <table class="answer-table__inner">
                    <tr class="answer-table__row">
                        <th class="answer-table__header">ステータスコード</th>
                        <td class="answer-table__text">
                            <?php echo $code
                            //正解のコード
                            ?>
                        </td>
                    </tr>
                    <tr class="answer-table__row">
                        <th class="answer-table__header">説明</th>
                        <td class="answer-table__text">
                            <?php echo $description
                            //正解の説明
                            ?>
                        </td>
                    </tr>
                </table>

            </div>

        </div>

    </main>

</body>

</html>