<?php
    session_start();
    include './script/variables.php';
    include './script/functions.php';
    $uid = $_SESSION['uid'];
    if(isset($_POST['iname'])){
        $img = moveFile('iimg','./media/lattach/');
        $iname = cleanText($_POST['iname']);
        $icat = $_POST['icat'];
        $idesc = cleanText($_POST['idesc']);
        $iloc = cleanText($_POST['iloc']);
        if(insertData(['name','uid','cid','des','loc','img'],
        [$iname,$uid,$icat,$idesc,$iloc,$img],'inventory')){
            exitJson($done,'Item Submitted Successfully!',null);
        }
        else exitJson($failed,null,'Failed to submit item!');
    }

?>