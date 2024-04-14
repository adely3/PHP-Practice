<?php
// Your code here!
//coment
echo "HELLO" . ","; //echo 表示
echo "Good" . "Morning" . ","; //「.」で連結
$a1 = 3;
$a2 = 4; //$が変数定義
echo $a1 + $a2 . ",";
$php = "PHP";
echo $php . "入門" . ",";
echo $php . "基礎" . ",";
echo "第{$a1}回{$php}入門講座" . ","; //変数展開
echo '第{$a1}回{$php}入門講座' . ",";
var_dump(6); //int(6) 数値型
var_dump("6"); //string(1)"6"文字列型
var_dump(2 == 2); //bool(true) bool型は比較結果
var_dump(3 == 2); //bool(false)
var_dump(2 === "2"); //bool(false) 厳密な比較
$score = 59;
if ($score >= 80) { //&&AND条件 ||OR条件　ifの中にif入れ子構造・ネストと呼ぶ
    echo "合格点です" . ",";
} elseif ($score >= 60) {
    echo "惜しい" . ",";
} else {
    echo "頑張りましょう" . ",";
}

$arr = ["PHP", "Ruby", "Python"]; //インデックス０は"PHP"
echo $arr[1] . ",";
$arr = ["key1" => "PHP", "key2" => "Ruby", "key3" => "Python"]; //連想配列
echo $arr["key1"] . ",";

foreach ($arr as $key => $lang) { //配列のループ処理(連想配列)
    echo "{$key}は{$lang}です" . ",";
}

foreach ($arr as $key => $lang) { //配列のループ処理(連想配列)
    if ($lang == "Ruby") {
        continue; //ループのスキップ
    }
    echo "{$key}は{$lang}です" . ",";
}

function study($lang)
{
    echo "{$lang}入門" . ",";
    echo "{$lang}講座" . ",";
}

study("PHP");
study("Ruby");

function ask()
{
    echo "質問はコメント欄へ" . ",";
}
ask();

function sayAge($name, $age)
{ //デフォルト値を設定することも可能
    echo "{$name}は{$age}才です" . ",";
}
sayAge("私", "30");

function price($age)
{
    if ($age >= 20) {
        return "大人料金";
    } else {
        return "子供料金"; //何も書かない場合はnullが返る
    }
}
$res = price(15);
echo $res . ",";

function calcTax($i)
{
    if (is_int($i) === false) {
        throw new Exception("数値を指定して下さい");
    }
    return $i * 1.1;
}

try {
    //tryの中で発生した例外はキャッチされる（捕まる）
    echo calcTax("あ") . ","; //例外発生 catchへ飛ばされる
    echo calcTax(1) . ","; //この行は実行されない
} catch (Exception $e) { //例外は$eとしてここにくる
    echo $e->getMessage() . ","; //エラーメッセージ表示
    echo $e->getTraceAsString() . ","; //どこでエラーが発生したか表示
}

echo calcTax(2) . ","; //この行は実効される

class Animal
{ //クラス　要復習
    public $name; //クラスの外から読み書きできる privateで定義するとクラスの外からは読み書きできない
    public $weight;

    public function __construct($name, $weight)
    {
        $this->name = $name; //thisは「このクラス」という意味
        $this->weight = $weight;
    }

    public function eat($food)
    {
        $this->weight += 1;
        echo "体重:{$this->weight}kg" . ",";
    }
}

class Cat extends Animal
{ //継承
    public function cry()
    {
        echo "私は{$this->name}だにゃん!" . ",";
    }
}

class Dog extends Animal
{
    public function eat($food)
    {
        $this->weight += 2; //オーバーライド（上書き） 継承したeat関数
        echo "体重:{$this->weight}kg" . ",";
    }
    public function cry()
    {
        echo "私は{$this->name}だわん!" . ",";
    }
}



$cat1 = new Cat("一郎", 5); //インスタンス
$cat2 = new Cat("二郎", 3);

$cat1->eat("fish");
$cat2->eat("fish");
$cat1->eat("fish");

$cat1->cry();
$cat2->cry();

class Lion
{
    const NAME = "ペロ"; //定数　大文字で定義

    public function LegCount()
    {
        return self::NAME; //クラスの中から定数を参照するときはself::定数名で参照
    }
}

echo Lion::NAME . ","; //定数はクラスの外から参照可能

class Bird
{ //Staticメソッド　属性を使用しないメソッド　メンバ変数を使わない⇨どのインスタンスで使っても変化がない
    public static function cry($food)
    {
        return "私は{$food}が好きだピヨ";
    }
}

echo Bird::cry("とうもろこし") . ",";//呼び出すときはこの書き方