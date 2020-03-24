<?php
session_start();
// // PHPのエラーを出力
ini_set('display_errors', 0);

// ユーザーの選択した項目を下記の変数に代入
$h = $_POST['hour'];
$m = $_POST['minute'];

// ユーザー入力欄に未入力の項目がないかチェックする
// 未入力の場合$errorにblankをいれる処理
if (!empty($_POST)) {
    if ($h === '' && $m === '00') {
        $error['h'] = 'blank';
    }
    if ($h === '0' && $m === '') {
        $error['h'] = 'blank';
    }
    if ($h === '0' && $m === '00') {
        $error['h'] = 'blank';
    }
    if ($h === '' && $m === '') {
        $error['h'] = 'blank';
    }
    if ($h === '24' && $m === '15') {
        $error['h'] = 'blank';
    }
    if ($h === '24' && $m === '30') {
        $error['h'] = 'blank';
    }
    if ($h === '24' && $m === '45') {
        $error['h'] = 'blank';
    }

    // $errorにblankが入っていないかチェック
    // blankがなければ、$SESSIONにユーザーが入力した情報を保存してresult.phpに移動
    if (empty($error)) {
        $_SESSION['try'] = $_POST;
        header('Location:result.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- font-awesome読み込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <!-- css読み込み -->
<link rel="stylesheet" href="css/styles.css">


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
  <div class="container">
    <div class="row">
      <div class="header-wrapper col-lg-10 offset-lg-1">
        <img class=" effect-fade top-photo" src="dokusyo_top.jpg" alt="" width="100%">
      </div>
    </div>
    <div class="row effect-fade">
      <div class="header-text col-lg-10 offset-lg-1">
        <div class="text">  
          <h4><span><i class="fas fa-book" style="padding-right:14px"></i></span>あなたは普段読書してますか？</h4>
          <p>出勤中、休憩時間、就寝前や休日、、、<br><span class="span">本</span>を読む時間は一日に結構あると思います。<br>小説、漫画、雑誌、実用書...とジャンルも沢山ありますね。<br><br>
          ここで大切なのは自分の人生に必要な知識を本からしっかり得る事ができているかだと思います。</p>
          <P>当サイトはあなたが読書をする事によって<span class="span" style="border-bottom: 1px solid lightgray">「どれだけの時間を有意義に使えているかを診断するサイト」</span>です💡</P>
        </div>
      </div>
    </div>
    <hr class="border mt-5 mb-4">

    <div class="row">
      <div class=" hide text-wrapper col-lg-10 offset-lg-1">
        <h5>このような人もぜひ一度試してみては...！</h5>
        <div class="row">
          <div class="center col-lg-4">
            <img class="text-photo" src="yomanai.jpg" alt="" width="70%">
            <p><i class="fas fa-check-circle"></i>そんなに本は読まない</p>
          </div>

          <div class="center col-lg-4">
            <img class="text-photo" src="nemukunaru.jpg" alt="" width="70%">
            <p><i class="fas fa-check-circle"></i>本を開くと眠くなる...</p>
          </div>

          <div class="center col-lg-4">
            <img class="text-photo" src="isogashii.jpg" alt="" width="70%">
            <p><i class="fas fa-check-circle"></i>忙しくて最近本読んでない</p>
          </div>
        </div>
      </div>
    </div>

      <!-- PC.Ver -->
    <div class="form row">
      <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1">
      <!-- actionを空にする事で、formが送信された時にこのページの上部に記述したphpを実行させる -->
      <!-- formに入力した情報を受け取る為に、method=postを指定 -->
        <form class="a mt-5" action="" method="post">
          <p>【 普段のあなたの一日の読書時間を入れてみましょう 】</p>
          <div class="row">
            <div class="h col-lg-4 offset-lg-2">
              <p>時間 :</p>
              <select class="time" name="hour" style="width:170px;height: 40px;">
                <!-- 他項目が入力エラーになった際、この項目の入力を引き継ぐ為に、valueを下記の様に設定 -->
                <option selected = "selected" value="<?php echo $_POST['hour']; ?>">
                <!-- 以下のif文にて、$hの中身を確認して結果次第で表示内容を変える記述 -->
                <!-- $hに何もか行っていなければ入力欄に「--」を表示させる -->
                  <?php if ($h == '') : ?>
                  <?php echo '--'; ?>
                  <?php else : ?>
                  <!-- $hに何か入っている場合は、その中身を表示させる -->
                  <?php echo '--'; ?>
                  <?php endif; ?>
                </option>
                <!-- foreachにて1~24時までを1ずつ表示させる -->
                <?php foreach (range(0, 24) as $hour) : ?>
                  <option value="<?=$hour; ?>"><?=$hour; ?></option>
                <?php endforeach; ?>
              </select>
              <!-- 一度フォームを送信して、この項目が未入力だった場合、下記のエラーを表示させる -->
              <?php if ($error['h'] == 'blank') : ?>
                <p style="color:red; font-weight: bold; font-size:12px;"><?php  echo '※正しく入力してください！'; ?></p>
              <?php endif; ?>
            </div>

            <div class="m col-lg-4">
              <p>分 :</p>
              <select class="minute" name="minute" style="width:170px;height: 40px;">
                <option selected="selected" value="<?php echo $_POST['minute']; ?>">
                  <?php  if ($m == '') : ?>
                  <?php  echo '--'; ?>
                  <?php else : ?>
                  <?php echo '--'; ?>
                  <?php endif; ?>
                </option>
                <?php  foreach (array('00', '15', '30', '45') as $minute) : ?>
                <option value="<?=$minute; ?>"><?=$minute; ?></option>
                <?php endforeach; ?>
              </select>
              <?php  if ($error['m'] == 'blank') :?>
              <p style="color:red; font-weight: bold; font-size:12px;"><?php  echo '※正しく入力してください！'; ?></p>
              　<?php  endif; ?>
            </div>
          </div>
          <input class="submit" type="submit" value="診断する">
        </form>
      </div>
    </div>
　　
    
      <!-- ここまで -->

      <!-- SP.Ver -->
    <div class="form2 row">
      <div class="col-sm-10 offset-sm-1">
      <!-- actionを空にする事で、formが送信された時にこのページの上部に記述したphpを実行させる -->
      <!-- formに入力した情報を受け取る為に、method=postを指定 -->
        <form class="a mt-5" action="" method="post">
          <p>【 あなたの一日の読書時間を入れてみましょう 】</p>
          <div class="row">
            <div class="h col-sm-12 pl-2">
              <label>時間 :</label>
              <select class="time" name="hour" style="width:170px;height: 40px;">
                <!-- 他項目が入力エラーになった際、この項目の入力を引き継ぐ為に、valueを下記の様に設定 -->
                <option selected = "selected" value="<?php echo $_POST['hour']; ?>">
                <!-- 以下のif文にて、$hの中身を確認して結果次第で表示内容を変える記述 -->
                <!-- $hに何もか行っていなければ入力欄に「--」を表示させる -->
                  <?php if ($h == '') : ?>
                  <?php echo '--'; ?>
                  <?php else : ?>
                  <!-- $hに何か入っている場合は、その中身を表示させる -->
                  <?php echo $h; ?>
                  <?php endif; ?>
                </option>
                <!-- foreachにて1~24時までを1ずつ表示させる -->
                <?php foreach (range(0, 24) as $hour) : ?>
                  <option value="<?=$hour; ?>"><?=$hour; ?></option>
                <?php endforeach; ?>
              </select>
              <!-- 一度フォームを送信して、この項目が未入力だった場合、下記のエラーを表示させる -->
              <?php if ($error['h'] == 'blank') : ?>
                <p style="color:red; font-weight: bold; font-size:12px;"><?php  echo '※未選択です！'; ?></p>
              <?php endif; ?>
            </div>

            <div class="m col-sm-12 pl-4 pt-3">
              <label>分 :</label>
              <select class="minute" name="minute" style="width:170px;height: 40px;">
                <option selected="selected" value="<?php echo $_POST['minute']; ?>">
                  <?php  if ($m == '') : ?>
                  <?php  echo '00'; ?>
                  <?php else : ?>
                  <?php echo $m; ?>
                  <?php endif; ?>
                </option>
                <?php  foreach (array('00', '15', '30', '45') as $minute) : ?>
                <option value="<?=$minute; ?>"><?=$minute; ?></option>
                <?php endforeach; ?>
              </select>
              <?php  if ($error['m'] == 'blank') :?>
              <p style="color:red; font-weight: bold; font-size:12px;"><?php  echo '※未選択です！'; ?></p>
              　<?php  endif; ?>
            </div>
          </div>
          <input class="button" type="submit" value="診断する">
        </form>
      </div>
    </div>
　　　　<!-- ここまで -->

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
