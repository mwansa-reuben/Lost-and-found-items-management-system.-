<?php
    session_start();
    include './script/variables.php';
    include './script/functions.php';
    include './script/connect.php';
    include './mails/sendMail.php';
    $uid = $_SESSION['uid'];
    if(isset($_POST['search'])){
        $s = strtolower($_POST['search']);$filter = ''; 
        if(trim($s)) $filter = "WHERE LOWER(name) LIKE '%$s%'";
        $d = selectJoins("SELECT * FROM inventory $filter");
        $list = '';
        if($d->rowCount() > 0){
            foreach($d as $c){
                $cat = selectData('cat','name','WHERE cid='.$c['cid'])->fetchColumn();
                $list .= '
                <div class="item d-f a-c j-fs">
                    <div class="item-img-cont d-f a-c j-c p-r">
                        <img src="./media/lattach/'.$c['img'].'" alt="">
                        <div class="p-a t-0 l-0 img-hover hpc-100"></div>
                    </div>
                    <div class="d-f w-100 fd-col">
                        <div class="d-f a-c j-fs">
                            <small class="c-gray mr-5 w-15">Item: </small>
                            <h5>'.ucwords($c['name']).'</h5>
                        </div>
                        <div class="d-f a-c j-fs my-5">
                            <small class="c-gray mr-5 w-17">Catgery: </small>
                            <h5>'.$cat.'</h5>
                        </div>
                        <button iid="'.$c['iid'].'" class="b-n o-n d-f a-c j-c viewInfoBtn">View Info</button>

                    </div>
                </div>
                ';
            }
            exitJson($done,$list,null);
        }
        exitJson($done,errorHtml('No Items Listed',''),null);
    }

    // FILTER
    if(isset($_POST['filter'])){
        $filter = '';
        $f = strtolower($_POST['filter']);        
        if(trim($f)) $filter = "WHERE cid = $f";
        $d = selectJoins("SELECT * FROM inventory $filter");
        $list = '';
        if($d->rowCount() > 0){
            foreach($d as $c){
                $cat = selectData('cat','name','WHERE cid='.$c['cid'])->fetchColumn();
                $list .= '
                <div class="item d-f a-c j-fs">
                    <div class="item-img-cont d-f a-c j-c p-r">
                        <img src="./media/lattach/'.$c['img'].'" alt="">
                        <div class="p-a t-0 l-0 img-hover hpc-100"></div>
                    </div>
                    <div class="d-f w-100 fd-col">
                        <div class="d-f a-c j-fs">
                            <small class="c-gray mr-5 w-15">Item: </small>
                            <h5>'.ucwords($c['name']).'</h5>
                        </div>
                        <div class="d-f a-c j-fs my-5">
                            <small class="c-gray mr-5 w-17">Catgery: </small>
                            <h5>'.$cat.'</h5>
                        </div>
                        <button iid="'.$c['iid'].'" class="b-n o-n d-f a-c j-c viewInfoBtn">View Info</button>

                    </div>
                </div>
                ';
            }
            exitJson($done,$list,null);
        }
        exitJson($done,errorHtml('No Items Listed',''),null);
    }

    if(isset($_POST['infoid'])){
        $iid = $_POST['infoid'];
        $d = selectJoins("
            SELECT inventory.*, users.*, cat.name AS catname FROM inventory INNER JOIN users INNER JOIN cat
            ON inventory.iid = ".$iid." AND users.uid = inventory.uid
        ");
        if($d->rowCount() > 0){
            exitJsonObject($done,$d->fetchObject(),null);
        }
        exitJson($failed,null,'Info Not Found');
    }

    if(isset($_POST['sendClaim'])){
        $iid = $_POST['sendClaim'];
        $loc = cleanText($_POST['loc']);
        $d = selectJoins("
            SELECT inventory.*, users.*, cat.name AS catname FROM inventory INNER JOIN users INNER JOIN cat
            ON inventory.iid = ".$iid." AND users.uid = inventory.uid
        ")->fetchObject();
        $date = convertDates4(date('Y-m-d'));
        $myInfo = selectData('users',null,"WHERE uid = $uid")->fetchObject();
        if($conn->query("UPDATE inventory SET  owner = $uid, lostarea = '$loc',status = 1, cdate = '$date' WHERE iid = $iid")){
            if(!@sendClaimMail($d->em,$d->fname.' '.$d->lname,$d->name,$myInfo->fname.' '.$myInfo->lname,$myInfo->em,$myInfo->pn,$loc)){
                exitJson($failed,null,"Couldn't send claim mail.Try again");
            }
            exitJson($done,null,null);
        }
    }