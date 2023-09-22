<?php
$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
$goods = htmlspecialchars($_POST["goods"], ENT_QUOTES);
$number = htmlspecialchars($_POST["number"], ENT_QUOTES);

print "お名前は　" . $name . "<br>" .
"ご希望の商品は　" . "$goods" . "<br>" .
"注文数は　" . "$number" ;