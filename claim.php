<?php 
session_start();
if(!isset($_SESSION['uid']))
header('location:login.php');
include './script/variables.php';
include './script/functions.php';
$cat = selectData('cat',null,'ORDER BY name ASC');
$ca = '<option value="">Filter category</option>
        <option value="">All categories</option>';
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
    <title>Claim Item</title>
    <link rel="stylesheet" href="claim.scss">
    <style>
    .clm {
        border-bottom: 2px purple solid;
        padding-bottom: 5px;
    }
    </style>
</head>

<body class="hvh-100">
    <?php  include './header.php' ?>
    <div class=" w-100 hpc-100 mt-20 d-f a-c j-c fd-col p-r">
        <div class="d-f a-c j-fs fd-col w-100 claim-wrapper p-a t-0 l-0">
            <div class="claim-top w-90 d-f a-c j-sb">
                <h4>Find Lost Items here</h4>
                <div class="d-f a-c j-sa">
                    <select name="filter" id="filter"><?php echo $ca ?></select>
                    <div class="search d-f a-c j-c over-h">
                        <input class="search-field" type="text" placeholder="Search Item">
                        <img src="./media/search.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="item-content mt-20 w-90 d-f a-c j-c p-r hpc-100">
                <div class="item-list d-f a-fs j-sb fr-w p-a t-0 l-0 w-100"></div>
            </div>
        </div>
        <div class="view-item w-100 hvh-100 p-a t-0 l-0 d-f a-c j-c">
            <div class="view-inner d-f a-c j-fs fd-col">
                <div class="view-top w-95 d-f a-c j-sb">
                    <h5>Item Details</h5>
                    <a href="" class="close-view-item c-red fs-25">&times;</a>
                </div>
                <div class="w-100 d-f a-c j-sa">
                    <img class="iimg" src="./media/lattach/18673187381.png" alt="">
                    <div class="d-f a-fs j-fs fd-col">
                        <div class="d-f a-c j-sb w-100">
                            <h4 class="w-47">Item Name</h4>
                            <h4 class="w-47" class="iname"></h4>
                        </div>
                        <div class="d-f a-c j-sb w-100">
                            <h5 class="w-45">Item Category:</h5>
                            <h5 class="w-45" class="icat"></h5>
                        </div>
                        <div class="d-f a-c j-sb w-100">
                            <h5 class="w-45">Item Description:</h5>
                            <p class="idesc"></p>
                        </div>
                        <h3 class="c-gray">Finder Contacts</h3>
                        <div class="d-f a-c j-sb w-100">
                            <h5 class="w-45">Email</h5>
                            <h5 class="w-45" class="fem"></h5>
                        </div>
                        <div class="d-f a-c j-sb w-100">
                            <h5 class="w-45">Contact</h5>
                            <h5 class="w-45" class="fnum"></h5>
                        </div>
                        <div class="d-f a-c j-sb w-100">
                            <h5 class="w-45"></h5>
                            <button class="d-f a-c j-c b-n o-n claim-btn">Claim Item</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="./claim.js"></script>

</html>