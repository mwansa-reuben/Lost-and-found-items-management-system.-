<?php
session_start();
include './script/connect.php';
include './script/variables.php';
include './script/functions.php';

if(isset($_POST['logem'])){
    $em = trim($_POST['logem']);
    $pwd = trim($_POST['pwd']);
    $data = selectData('users',null,"WHERE LOWER(em) = '$em'");
    if($data){
        if($data->rowCount() > 0){
            $info = $data->fetch();
            if(password_verify($pwd,$info['pwd'])){
                $_SESSION['names']=$info['fname'].' '.$info['lname'];
                $_SESSION['uid']=$info['uid'];
                $_SESSION['em']=$info['em'];
                $_SESSION['pn']=$info['pn'];
                exitJson($done,'Login Successful!',null);
            }
            else exitJson($failed,null,'Wrong Password!');
        }
        else exitJson($failed,null,'Email Not Recognized!');
    }
    else exitJson($failed,null,'An error occurred!');
}

if(isset($_POST['fn'])){
    $fn = trim($_POST['fn']);
    $ln = trim($_POST['ln']);
    $em = trim($_POST['em']);
    $pwd = password_hash(trim($_POST['pwd']),PASSWORD_DEFAULT);
    $pn = trim($_POST['cn']);
    $nr = trim($_POST['nr']);
    $loc = trim($_POST['paddr']);
    if(checkColumns($em,'em','users')) exitJson($failed,null,'Email already taken');
    if(!insertData(['fname','lname','em','pwd','pn','nrc','loc'],[$fn,$ln,$em,$pwd,$pn,$nr,$loc],'users'))
        exitJson($failed,null,"An error occurred!");
    exitJson($done,'You have been registered successfully!',null);
}

if(isset($_POST['logout'])){
    if(session_destroy()){
        exitJson($done,null,null);
    }
    exitJson($failed,null,null);
}

if(isset($_POST['resem'])){
    $em = trim($_POST['resem']);
    $pwd = trim($_POST['respwd']);
    $data = selectData('users',null,"WHERE LOWER(em) = '$em'");
    if($data){
        if($data->rowCount() > 0){
            $hs = password_hash($pwd, PASSWORD_DEFAULT);
            if($conn->query("UPDATE users SET pwd = '$hs' WHERE LOWER(em) = '$em'")){
                exitJson($done,null,null);
            }
            exitJson($failed,null,"Failed to update Password!");
        }
        exitJson($failed,null,"Invalid Email");
    }
}