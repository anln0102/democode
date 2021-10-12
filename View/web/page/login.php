<?php


require_once('Model/DBconnect.php');


$error = [];


if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email)) {
        $error['email'] = "メールアドレスを入力してください。";
    }
    if (empty($password)) {
        $error['password'] = "パスワードを入力してください。";
    }

    $sql = "SELECT * FROM student WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);//kết nối DB và lấy DB ra
    $data = mysqli_fetch_assoc($query);//lưu dữ query bằng cách tạo mảng
    $checkEmail = mysqli_num_rows($query);//check xem mail đã tồn tại trong DB hay không
    
    if(!isset($_SESSION)) {
        session_start();
    }
    if ($checkEmail == 1) {
        $checkPass = password_verify($password, $data['password']);
        if ($checkPass) {
            $_SESSION['student'] = $data;
            
        } else {
            echo "<script>
            alertify.error('パスワードを間違います。');
               </script>";
        }
        header('Location: http://localhost/hokokusho2021/');
    } else {
        echo "<script>
        alertify.error('メールアドレスまだ存在しないので、新登録してください。');
           </script>";
    }
}
?>
<section>

    <div class="login-page">
        <div class="content-login-page">
            <h2>ようこそ就職支援システム</h2>
            <div class="form-login">
                <form action="" method="POST">
                    <div class="detail-form-login">
                        <img src="./public/assets/web/image/icon-login.png" alt="icon-login">
                        <div class="input-email">
                            <img src="./public/assets/web/image/human.jpg" alt="Human">
                            <input name="email" type="text" placeholder="メールアドレス">
                        </div>
                        <div class="error-validate">
                            <span><?php echo (isset($error['email'])) ? $error['email'] : '' ?></span>
                        </div>
                        <div class="input-password">
                            <img src="./public/assets/web/image/key-icon.jpg" alt="key-icon">
                            <input name="password" type="password" placeholder="パスワード">
                        </div>
                        <div class="error-validate">
                            <span><?php echo (isset($error['password'])) ? $error['password'] : '' ?></span>
                        </div>
                        <div class="tern">
                            <input name="checkbox" type="checkbox">
                            <p>ログインしたままにする</p>
                        </div>
                  
                        <button type="submit">ログイン</button>
                    </div>
                </form>
            </div>
            <div class="register-login-page">
                <p>ユーザーがない場合<a href="?view=register">＜＜新登録＞＞</a>をクリックしてください</p>
            </div>
        </div>
    </div>

</section>