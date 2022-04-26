<?php
@session_start();
include './script/variables.php';
include './script/functions.php';
include './script/connect.php';
$d = selectJoins("
    SELECT inventory.*, users.*, cat.name AS catname, inventory.loc as cation FROM inventory INNER JOIN users INNER JOIN cat
    ON  users.uid = inventory.uid AND  inventory.cid = cat.cid
");
if($d->rowCount() > 0){
    $list = '';
    $count = 1;
    foreach($d as $i){
        $claimer = $contact = $claimdate = 'None';
        if(trim($i['owner'])){
            $claimdate = $i['cdate'];
            $cl = selectData('users',null,"WHERE uid = ".$i['owner'])->fetchObject();
            $claimer = $cl->fname.' '.$cl->lname;
            $contact = $cl->pn;
        }
        $list .= '
        <tr>
            <td>'.$count.'</td>
            <td>'.$i['name'].'</td>
            <td>'.$i['fname'].' '.$i['lname'].'</td>
            <td>'.$i['cation'].'</td>
            <td>'.$i['pn'].'</td>
            <td>'.convertDates4($i['date']).'</td>
            <td>'.$claimer.'</td>
            <td>'.$contact.'</td>
            <td>'.$claimdate.'</td>
        </tr>
        ';
        $count++;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.scss">
</head>
<body>
    <?php include './header.php' ?>
    <div class="statistics w-100 d-f a-c j-fs fd-col">
        <div class="w-100 d-f a-c j-c fd-col my-5">
            <h3 class="my-5">Item Statistics</h3>
            <table class="w-100">
                 <thead>
                     <tr>
                         <th>S/N</th>
                         <th>Item</th>
                         <th>Found By</th>
                         <th>Found Location</th>
                         <th>Contact</th>
                         <th>Found Date</th>
                         <th>Claimed By</th>                         
                         <th>Contact</th>
                         <th>Claim Date</th>
                     </tr>
                 </thead>
                 <tbody><?php echo  $list ?></tbody>
            </table>
        </div>
    </div>
</body>
</html>