<?php 
session_start();
if(!isset($_SESSION['uid']))
header('location:login.php');
include './script/variables.php';
include './script/functions.php';
$cat = selectData('cat',null,'ORDER BY name ASC');
$ca = '<option value="">Select category</option>';
foreach($cat as $c){
    $ca .= '<option value="'.$c['cid'].'">'.$c['name'].'</option>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Lost Item</title>
    <link rel="stylesheet" href="report.scss">
    <style>
        .rpt{
            border-bottom: 2px purple solid;
            padding-bottom: 5px;
        }
    </style>
</head>
<body class="hvh-100 over-h">
    <?php  include './header.php' ?>
    <div class="w-100 rep-wrapper d-f a-c j-c">
        <form class="rept-inner d-f a-fs j-sa fr-w   p-r">
            <div class="d-f w-100 a-fs j-fs fr-w">
                <h3 class="w-100 ml-10 mt-10">Report any lost item</h3>
                <div class="d-f w-100 my-5 ml-10 a-c j-c fs-13 c-bray">
                    <img src="./media/sad.png" alt="">
                    <p class="w-95 c-gray ">
                        If you found any lost items and wish to 
                        have it listed among the lost items 
                        awaiting owners. please provide the 
                        required info below.
                    </p>
                </div>
                <input type="text" name="iname" placeholder="Item Name" required>
                <select name="icat" id=""><?php echo $ca ?></select>
                <input type="text" name="idesc" placeholder="Serial Number" required>
                <input type="text" name="iloc" placeholder="Where did you find this item?" required>
                <small class="c-gray my-2 pl-5 w-90">Attach item captured image</small>
                <input type="file" name="iimg" required>
                
            </div>
            <div class="w-95 d-f a-c j-fe p-a b-0 l-0">
                <button class="b-n o-n my-20 mr-20 d-f a-c j-c sub-item-btn">Submit Item</button>
            </div>
        </form>
    </div>
</body>
<script src="./report.js"></script>
</html>