<?php
@session_start();
$uid = 0;
if(isset($_SESSION['uid'])){
    $uid = $_SESSION['uid'];
}
?>
<head>
    <link rel="stylesheet" href="header.scss">
    <?php include './css/links2.php' ?>
</head>
<html>
    <div class="h-wrapper w-100 d-f a-c j-sb">
        <a href="index.php" class="logo d-f a-c j-sa ml-10">
            <img src="./media/logo.png" alt="">
            <span class=" = ml-10">FLIR</span>
        </a>
        <div class="menus d-f a-c j-sa mr-5">
            <?php if($uid == 2): ?><a href="admin.php" class="m-link hm d-f a-c j-c">Statistics</a> <?php endif; ?>
            <a href="index.php" class="m-link hm d-f a-c j-c">Home</a>
            <a href="claim.php" class="m-link d-f clm a-c j-c">Claim</a>
            <a href="report.php" class="m-link rpt d-f a-c j-c">Report Item</a>
            <a href="signup.php" class="m-link d-f a-c j-c signup-btn">Sign up</a>
            <a href="login.php" class="m-link d-f a-c j-c login-btn">Login</a>
        </div>
    </div>
</html>