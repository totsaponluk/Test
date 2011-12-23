<?php
$advisor;
//echo $advisor->name;
?>
<?php
echo "ナビゲータの読者から質問が来ました。\n";
echo "できるだけ早く回答してあげてください。( ccで事務局にも送ってください)\n";
echo "もしすぐに返事ができなかったり回答できないような質問の場合は、事務局の方へまわしてください。\n";
echo "事務局メルアド　admin@thaibiznavi.com\n";

echo "--------------------------------------------\n";
echo $advisor->category->name ."\n";
echo $advisor->name ."\n";
echo "名前　：$name"."\n";
echo "会社名　：$company"."\n";
echo "メールアドレス　：$email"."\n";
echo "質問の目的 　：$objective"."\n";
echo "質問内容　：$questionDetail"."\n";
?>
