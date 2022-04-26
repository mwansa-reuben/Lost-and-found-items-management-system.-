<?php 
@session_start();
$hi = '';
if(isset($_SESSION['uid']))
$hi = 'HELLO '. strtoupper($_SESSION['names']);
?>

<head>
    <link rel="stylesheet" href="home.scss">
    <style>
        .hm{
            border-bottom: 2px purple solid;
            padding-bottom: 5px;
        }
    </style>
</head>
<html>
<div class="home-wrapper mt-30 w-100 d-f a-c j-sa">
    <div class="left w-50 d-f a-c j-c hpc-100 fd-col pl-10">
        <h3 class="l-title Hi fs-20 mb-10 c-gray"><?php echo $hi ?></h3>
        <h1 class="l-title">
            Report and Claim Lost Inventory.
        </h1>
        <span>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Nulla et quidem quaerat, qui nisi consectetur animi odit.
            Nobis unde, nostrum facilis ipsum eos quibusdam alias officia quidem
            nesciunt error reiciendis.
        </span>
        <a href="signup.php" class="signup-btn d-f a-c j-c px-20 hpx-40 ">SIGN UP NOW<i class="fas ml-10 fa-long-arrow-alt-right"
                aria-hidden="true"></i> </a>
    </div>
    <div class="right w-50 d-f a-c j-c hpc-100">
        <img src="./media/lostfoundpn.png" alt="">
    </div>
</div>
<div class=" w-70 home-content mt-20 w-100 d-f a-c j-c">
    <img src="./media/aboutus.png" alt="">
    <div class="d-f a-fs j-fs ml-30 fd-col">
        <h3 class="c-title"> About Us</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eaque molestiae saepe officiis nesciunt dolore ipsa at itaque nihil
            repudiandae eos dolor nulla numquam impedit atque
            consequuntur, repellendus quam aliquam ea.
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eaque molestiae saepe officiis nesciunt dolore ipsa at itaque nihil
            repudiandae eos dolor nulla numquam impedit atque
            consequuntur, repellendus quam aliquam ea.
        </p>
    </div>
</div>
<div class=" w-70 home-content mt-50 w-100 d-f a-fs j-c">
    <img src="./media/howitworks.jpg" alt="">
    <div class="d-f a-fs j-fs ml-30 fd-col">
        <h3 class="c-title"> How This Works!</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eaque molestiae saepe officiis nesciunt dolore ipsa at itaque nihil
            repudiandae eos dolor nulla numquam impedit atque
            consequuntur, repellendus quam aliquam ea.
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eaque molestiae saepe officiis nesciunt dolore ipsa at itaque nihil
            repudiandae eos dolor nulla numquam impedit atque
            consequuntur, repellendus quam aliquam ea.
        </p>
    </div>

</div>
<div class="w-70 d-f a-c j-sa">
    <div class="what-are d-f fd-col w-47">
        <h3 class="my-5 w-title">What are lost Inventory?</h3>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Explicabo tenetur odit aspernatur ullam, cumque fuga debitis optio dignissimos
            harum necessitatibus consequatur,
        </p>
        <a href="report.php" class="inv-link d-f a-c j-c">Report Lost Item</a>
    </div>
    <div class="what-are d-f fd-col w-47">
        <h3 class="my-5 w-title">What are found Inventory?</h3>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Explicabo tenetur odit aspernatur ullam, cumque fuga debitis optio dignissimos
            harum necessitatibus consequatur,
        </p>
        <a href="claim.php" class="inv-link d-f a-c j-c">Claim Lost Item</a>
    </div>
</div>
<div class="w-100 contact-us-div d-f a-c j-fs fd-col">
    <h3 class="my-10 l-title fs-30">Send us an Enquiry</h3>
    <form action="" class="contact-form w-60 d-f a-c j-c fr-w">
        <input type="text" name="" placeholder="Your names">
        <input type="email" name="" placeholder="Your Email">
        <textarea name="" placeholder="Type your enquiry here"></textarea>
        <button class="b-n o-n d-f a-c j-c">Send</button>
    </form>
</div>

</html>