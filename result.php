<?php
session_start();

ini_set('display_errors', 0);

// $_SESSIONが空だった場合、index.phpに戻す
// urlに直接[result.php]を入力してアクセスしてきたユーザーなどへの対策
if (!isset($_SESSION['try'])) {
    header('Location:index.php');
    exit();
}

// 前ページで入力させた情報を一致させる
$_POST = $_SESSION['try'];
// 時間を生成する為に、それぞれの変数へと代入
$h = $_POST['hour'];
$m = $_POST['minute'];
// 分の数字が1桁だった場合、左に0を追加する
$mx = str_pad($m, 2, 0, STR_PAD_LEFT);

// $calltimeには、(例)3時間３０分と入る
// ※数字1桁の状態
$callTimeHour = $h.'時間';
$callTimeMinute = $m.'分';

// 一冊を読み切る絶対時間
$hs = 180;

//時間を分に変換

$hm = $h * 60;

// 時間と分を足す
$hmm = $hm + $m;

// 一週間の計算
// 一週間継続した場合の時間を算出
$hmx = $hmm * 7;

//合計した数字を時間に変換
$totalHour = $hmx / 60;

// 1ヶ月の計算
// 1ヶ月継続した場合の時間を算出
$hmy = $hmm * 30;

// 合計した数字を時間に変換
$totalHour2 = $hmy / 60;

// 一年の計算
// １年継続した場合の時間を算出
$hmz = $hmm * 365;

// 合計した数字を時間に変換
$totalHour3 = $hmz / 60;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- font-awesome読み込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <!-- css読み込み -->
  <link rel="stylesheet" href="styles2.css">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>




   <title>読書の時間</title>
</head>

<body>
  <div id="header" class="header-top">あなたの読書時間はどのくらい？
  </div>

  <div id="scroll" class="container">
    <div class="row">
      <div class="header-wrapper col-lg-10 offset-lg-1">
        <img class="effect-fade top-photo" src="top.jpg" alt="" width="100%">
      </div>
    </div>

    <div class=" effect-fade row">
      <div class=" header-text col-lg-10 offset-lg-1">
        <h3 class="pt-5 pb-4">\\診断結果//</h3>
        <p>なるほど...あなたは普段<span class="big">
          <?php
          if (!empty($h)) {
              echo $callTimeHour;
          }
          if (!empty($m)) {
              echo $callTimeMinute;
          }
        ?></span> 読書しているのですね...！
        </p>
        <p>そのまま毎日継続すると、<span style="border-bottom:1.2px solid gray; font-size:18px;">1週間で<span class="big"><?php echo $totalHour; ?></span>時間</span> は読書をしている事になります。
        </p><br>
        <p>仕事や学校などで毎日忙しい中で</p>
        <p>それだけ本を読む時間を確保するのはとても大変な事です。</p><br>
        <p><b class="big" style="border-bottom:1.3px solid gray; padding-bottom: 2px;">しかし、本を読むことは必ずあなたの人生を豊かにしてくれます！</b></p>
        <p>まずはあなたの普段の読書時間である<br><br><span class="big">
          <?php
          if (!empty($h)) {
              echo $callTimeHour;
          }
          if (!empty($m)) {
              echo $callTimeMinute;
          }
        ?></span>
        </p>のペースを継続してみましょう♪</p>

        <p class="result-text">さて、、<br><br>ではもしあなたが一冊の本を読み切るのに<strong style="font-size:19px; color: tomato;">３時間</strong>かかるとして、<br>1週間、1ヶ月、１年と日々積み重ねたとしたら。。。あなたは何冊読む事になるのでしょう...?</p>


        <div class="result mb-5 ">
          <img class="result-photo" src="benkyou.jpg" alt="" width="45%">
        </div>

        <!-- 条件分岐 -->
        <div class="row">
          <!-- 1週間 -->
          <div class="square col-md-4 hide1">
            <div class="square1">
              <small style="font-size:13px;">1週間だと。。。</small>
              <?php echo floor($hmx / $hs).'冊'; ?>
            </div>
          </div>
          <!-- 1ヶ月-->
          <div class="square col-md-4 hide2">
            <div class="square2">
              <small style="font-size:13px;">1ヶ月だと。。。</small>

              <?php echo floor($hmy / $hs).'冊'; ?>
            </div>
          </div>
          <!-- 1年-->
          <div class="square col-md-4 hide3">
            <div class="square3">
              <small style="font-size:13px;">１年だと。。。</small>
              <?php echo floor($hmz / $hs).'冊'; ?>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
            <hr>
              <p>どうでしょう？</p>
              <p>本を読む事で色々な知識を得る事ができたり、<br>非日常の世界に思いを馳せてみたり、ストレスの解消にもなったり、、</p>
              
              <p>1日に数十分だったとしても毎日積み重ねると結構読めてしまうものです！
              </p><br>

              <p>あなたも今目の前にある本に手を差し伸べてみましょう...！</p>

              <button class="button" type="button" onclick="location.href='http://localhost:8080/dokusyo/'">もう一度診断する</button>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="mt-5 col-lg-10 offset-lg-1">
              <!-- <p>シェアする</p>
    
              <button class="button" type="button" onclick="location.href='https://twiter.com/'"><i class="fab fa-twitter"></i></button> -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <table class="mt-5 table table-hover">
          <tbody>
            <tr>
              <td class="text"><span><i class="fas fa-book" style="padding-right:14px"></i>製作者:</td>
              <td>ケンジ</td>
              <td></td>
            </tr>
            <tr>
              <td class="text"><span><i class="fas fa-book" style="padding-right:14px"></i>webサイト:</td>
              <td></a>ポートフォリオサイト</td>
              <td><button class="button" type="submit"" onclick="location.href='https://touma-cherie.github.io/'">HP</button></td>
            </tr>
            <tr>
              <td class="text"><span><i class="fas fa-book" style="padding-right:14px"></i>Twitter:</td>
              <td>@kenji_0058</td>
              <td><button class="button" type="button" onclick="location.href='https://twitter.com/kenji_0058'">Twitter</button></td>
            </tr>
            <tr>
              <td class="text"><span><i class="fas fa-book" style="padding-right:14px"></i>Mail:</td>
              <td>vicdrum432@gmail.com</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer ">
      <small class="footer-text">&copy; Kenji Tomatsu, 2020 All Right Reserved.</small> 
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript" src="script.js"></script>
</body>
</html>
