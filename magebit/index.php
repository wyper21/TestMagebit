<?php
ob_start();

include_once 'php/functions.php';
$obj = new connect_db();

$errors = [];
if (isset($_POST['submit'])) {
            if (!empty($_POST['email']))
            {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                {
                    if (substr($_POST['email'], -3) == '.co')
                    {
                        $errors[] = 'We are not accepting subscriptions from Colombia emails';
                    }
                } else {
                    $errors[] = 'Please provide a valid e-mail address';
                }
            } else {
                    $errors[] = 'Email address is required';
            }
            if (empty($errors))
            {
                if (!empty($_POST['ckbox']))
                {
                    $obj->insertData($_POST['email']);
                    header('location: page/congrats.php');
                } else {
                    $errors[] = 'You must accept the terms and conditions';
                }
            }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Summer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="libs/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/media-queries.css">
    <meta name="viewport" content="width=device-width">
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <div id="sidebar">
        <div id="main">
            <div id="header">
                <div id="logo">
                    <img src="img/Union.jpg" alt="pineapple-logo" class="union">
                    <img src="img/pineapple..jpg" alt="pineapple-name-logo" class="pineapple">
                </div>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">How it works</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div id="content">
                <h1>Subscribe to newsletter</h1>
                <h3>Subscribe to our newsletter and get 10% discount on
                    pineapple glasses.</h3>
                <form action="index.php" method="POST">
                    <div id="field">
                        <input type="text" id="input" placeholder="Type your email adress here..." name="email" autocomplete="off"
                               value="<?php echo(!empty($_POST['email']) ? $_POST['email'] : '');?>">
                        <button type="submit" class="btn" name="submit">
                        </button>
                        <?php foreach ($errors as $error) :?>
                            <span id="text"><?php echo $error;?></span>
                        <?php endforeach; ?>
                    </div>
                    <div id="tos">
                        <input type="checkbox" name="ckbox" class="check" id="ckbox">
                        <label class="tos" for="ckbox">
                            I agree to <a href="#">terms of service</a>
                        </label>
                    </div>
                </form>
                <hr>
                <div id="socIcons">
                    <a href="#" class="fb socIcon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="inst socIcon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#" class="twit socIcon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="you socIcon"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="summer">
        <img src="img/image_summer.jpg">
    </div>
</div>
<!--<script src="js/script.js"></script>-->
</body>
</html>
