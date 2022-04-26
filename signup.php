<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.scss">
    <title>Login</title>
    <?php include './css/links2.php' ?>
</head>
<body>
    <div class="lgin-wrapper w-100 d-f a-c j-fs fd-col hvh-100 over-h">
        <!-- <?php include './header.php' ?> -->
        <div class="log-content w-100 hpc-100 d-f a-c j-c">
            <div class="login d-f a-c j-c fd-col ml-41 p-r">
                <form class="log-div sign py-5 w-100 hpc-100 d-f a-c j-sa fr-w p-a l-0 t-0">
                    <h3 class="w-100 d-f a-c j-c p-r">
                        <a href="index.php" class="p-a c-red t-0 l-0">
                            <i class="fas mx-5 fa-long-arrow-alt-left" aria-hidden="true"></i>
                            <small class="fs-15">Back</small>
                        </a>
                        <span class="log-err">Create Account</span>
                    </h3>
                    <input type="text" class="w-45 hpx-30" name="fn" placeholder="First Name" required>
                    <input type="text" class="w-45 hpx-30" name="ln" placeholder="Last Name" required>
                    <input type="number" class="w-45 hpx-30" name="cn" placeholder="Contact Number" required>
                    <input type="number" class="w-45 hpx-30" name="nr" placeholder="NRC/Passport" required>
                    <input type="number" class="w-45 hpx-30" name="paddr" placeholder="Physical Address" required>
                    <input type="email" class="w-45 hpx-30" name="em" placeholder="Email" required>
                    <input type="password" class="w-45 hpx-30" name="pwd" placeholder="New Password" required>
                    <button class="log-sign-btn b-n o-n d-f a-c j-c">Sign Up</button>
                    <a href="login.php" class=" my-10 c-gray fs-14 w-100 d-f a-c j-c">Already have an  Account? Login</a>
                </form>
            </div>
        </div>
    </div>  
</body>
<script src="./login.js"></script>
</html>