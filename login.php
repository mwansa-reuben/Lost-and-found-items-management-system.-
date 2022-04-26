<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="login.scss">
    <title>Login</title>
    <?php include './css/links2.php' ?>
</head>

<body>
    <div class="lgin-wrapper w-100 d-f a-c j-fs fd-col hvh-100 over-h">
        <div class="log-content w-100 hpc-100 d-f a-c j-c">
            <div class="login  d-f a-c j-c fd-col ml-41 p-r">
                <a href="index.php" class="p-a back-link c-red t-0 l-0 mt-10 ">
                    <i class="fas mx-5 fa-long-arrow-alt-left" aria-hidden="true"></i>
                    <small class="fs-13">Back</small>
                </a>
                <form class="log-div login mt-20 log w-100 hpc-100 mt-20 d-f a-c j-c fd-col p-a l-0 t-0">
                    <img src="./media/user.svg" alt="">
                    <h3 class="log-err my-5">Login</h3>
                    <input class="hpx-30" type="email" name="logem" placeholder="Email" required>
                    <input class="hpx-30" type="password" name="pwd" placeholder="Password" required>
                    <button class="log-sign-btn b-n o-n d-f a-c j-c">Login</button>
                    <a href="" class="mt-20 c-red fs-14 forgot my-10">Forgot Password?</a>
                    <a href="signup.php" class="mt-20 c-dark p-10 br-5 fs-14 " style="background: white;">Don't have an Account? Sign Up</a>
                </form>

                <form class="log-div reset a-c mt-20 log w-100 hpc-100 mt-20 d-n a-c j-c fd-col p-a l-0 t-0">
                    <img src="./media/user.svg" alt="">
                    <h3 class="reset-err my-5">Reset Your Password</h3>
                    <input class="hpx-40" type="email" name="resem" placeholder="Your Email" required>
                    <input class="hpx-40" type="password" name="respwd" placeholder="New Password" required>
                    <button class="reset-sign-btn b-n o-n d-f a-c j-c">Reset Now</button>
                    <a href="" class="mt-20 c-red fs-14 login-show my-10">Or Login</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="./login.js"></script>

</html>