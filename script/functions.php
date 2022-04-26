<?php
include('variables.php');
include('connect.php');
function createDates(){
    date_default_timezone_set('Africa/Lusaka');
    #month name, month number, week number, year, day words, day number
    $dates = explode(' ', date('l jS F Y h:i A', strtotime(date('Y-m-d h:i:s A'))));

    #generate week of the day
    $when = time();
    $week = strftime('%U', $when);
    $firstWeekOfMonth = strftime('%U', strtotime(date('Y-m-01', $when)));
    $weeknum = 1 + ($week < $firstWeekOfMonth ? $week : $week - $firstWeekOfMonth);
    return array(
        'day' => $dates[0], 
        'dayn' => $dates[1],
        'month' => $dates[2],
        'year' => $dates[3], 
        'time' => $dates[4] . ' ' . $dates[5],
        'weeknum' =>$weeknum - 1,
        'fulltime'=> date('h:i:s A'),
        'fulldate'=> convertDates3(date('Y-m-d'))
    );

}

function convertDates($convertion,$dates){
    return date('l, jS F', strtotime($dates));
}
function convertDates2($dates){
    return date('jS F', strtotime($dates));
}

function convertDates3($dates){
    return date('l, jS F Y', strtotime($dates));
}

function convertDates4($dates){
    $d = explode(' ',date('l, jS F Y', strtotime($dates)));
    return substr($d[0],0,3).', '.$d[1].' '. substr($d[2],0,3).' '.$d[3];

}

function moveFile($filename,$path){
    if (isset($_FILES[$filename]) && $_FILES[$filename]['size'] > 1) {
        $ext = pathinfo($_FILES[$filename]['name'], PATHINFO_EXTENSION);
        // $ext = explode("/", $_FILES[$filename]['type'])[1];
        $newname = rand(1000, 100000) . rand(300 * rand(100, 600), 500 * rand(200, 900)) . '.' . $ext;
        $path .= $newname;
        $tmp = $_FILES[$filename]['tmp_name'];
        if (move_uploaded_file($tmp, $path)) {
            return $newname;
        }
        return '';
    }
}


#TO GENERATE NEW STUDENT ID 8 digit student id
function genSID($schoolCode){
    global $conn;
    $f4Digits = substr(date('Y'),2) . substr($schoolCode,0, 2);
    $sid = $conn->query("SELECT sid FROM sids WHERE scode = '$schoolCode' ORDER BY indexid DESC LIMIT 1");
    $newsID = '';
    if($sid){
        if($sid->rowCount() > 0){
            $siData = $sid->fetch()['sid'];
            $sidl4 = (int)substr($siData,4) + 1;            
            if(strlen((string)$sidl4) == 1)$newsID =  $f4Digits.'000'.$sidl4;
            else if(strlen((string)$sidl4) == 2)$newsID =  $f4Digits.'00'.$sidl4;
            if(strlen((string)$sidl4) == 3)$newsID =  $f4Digits.'0'.$sidl4;
            if(strlen((string)$sidl4) == 4)$newsID =  $f4Digits.$sidl4;
            return $newsID;
        }
        else{
            return $f4Digits.'0000';
        }
    }
    else return false;
}




//function to generate random string
function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++)
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    return $randomString;
}



// function to check if a value exists in table.
function checkTableValue($value, $table, $column){
    global $conn;
    if($conn->query("SELECT * from $table WHERE LOWER($column) = LOWER('$value') AND $column !=''")->rowCount() > 0)
        return true;
    return false;
}


function checkColumns(? string $key,? string $col,? string $table){
     global $conn;
    return ($conn->query("SELECT * FROM $table WHERE LOWER($col) = LOWER('$key')")->rowCount() > 0) || false;
}

function insertData(? array $cols, ? array $vals, ? string $table){
     global $conn;
    $collist = implode(',', $cols);
    $valList ="'".implode("','", $vals)."'";
    return $conn->query("INSERT INTO $table($collist)VALUES($valList)") || false;
}

function selectData( ? string $table,? string $columns, ? string $condition){
    global $conn;
    $colList = '';
    !trim($columns) ? $colList = '*' : $colList = implode(', ', explode(', ', $columns));
    $data = $conn->query("SELECT $colList FROM $table $condition");
    if($data) return $data;
    else return false;
}

function selectJoins( ? string $query){
    global $conn;
    $data = $conn->query("$query");
    if($data) return $data;
    else return false;
}

function updateColumn($table,$column,$newVal,$pk,$pkKey) {
    global $conn;
    if(trim($newVal)){
        if($conn->query("UPDATE $table SET $column = '$newVal' WHERE $pk = $pkKey"))
            return true;
        return false;    
    }
    return true;
}

function deleteData(? string $table, ? string $condition){
    global $conn;
    if(trim($condition))
        if($conn->query("DELETE FROM $table WHERE $condition"))
            return true;
        return false; 
    if($conn->query("DELETE FROM $table"))
        return true;
    return false;        
}

function exitJson(? string $status, ? string $data, ?  string $err){
    exit(json_encode(array('status'=>$status, 'data'=>$data, 'err'=>$err)));
}
function exitJsonArray(? string $status, ? array $data, ?  string $err){
    exit(json_encode(array('status'=>$status, $data, 'err'=>$err)));
}
function exitJsonObject(? string $status, $data, ?  string $err){
    exit(json_encode(array('status'=>$status, 'data'=>$data, 'err'=>$err)));
}
function printFormattedArray(? array $array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function cleanText($text){
    $first = preg_replace("^[\\\\\*\?\"\|]^", "", $text);
    return preg_replace("^[']^", "\'", $first);
}

function errorHtml($text,$type){
    $img = '';
    $img = ($type == 'err') ? 'error.svg' : 'emptybox.svg';
    return '
    <div class="w-100 hpx-300 d-f a-c j-c fd-col">
        <img style="width:30px;height:30; object-fit:c0ntain" src="../images/icons/'.$img.'">
        <span style="text-align:center">'.$text.'</span>
    </div>
    ';
}

function standardPayEarnings(){
    #to return standard percentages for payslip
    return  array(
        #earnings
        'housing'=>40,
        'transport'=>10,
        'medical'=>5,
        'education'=>5,
        'commission'=>10,
        #deductions
        'napsa'=>5,
        'nhima'=>5,
        'paye'=>0,
        'skillslevy'=>1,
        'loan'=>6
    );
}
#to calculate payments
function calculatePayments($bpay,$mbvalue){
    $percs = (object) standardPayEarnings();
    $housing = (($percs->housing * $bpay) / 100);
    $transport = (($percs->transport * $bpay) / 100);
    $medical = (($percs->medical * $bpay) / 100);
    $education = (($percs->education * $bpay) / 100);
    $commission = (($percs->commission * $mbvalue) / 100);
    $napsa = (($percs->napsa * $bpay) / 100);
    $nhima = (($percs->nhima * $bpay) / 100);
    $skillslevy = (($percs->skillslevy * $bpay) / 100);
    $paye = (($percs->paye * $bpay) / 100);
    $gross = $bpay + $housing + $transport + $medical + $education + $commission;
    $tallow = $housing +$transport + $medical + $education + $commission;
    $tdeduc = $napsa + $nhima + $skillslevy;
    $net = $gross - $tdeduc;
    return (object) [
        'bpay'=>$bpay,
        'housing'=>$housing,
        'transport'=> $transport,
        'medical'=> $medical,
        'education'=> $education,
        'commission'=>  $commission,
        'napsa'=>$napsa,
        'nhima'=> $nhima,
        'skillslevy'=> $skillslevy,
        'paye'=> $paye,
        'gross'=> $gross,
        'tallow'=>$tallow,
        'tdeduc'=> $tdeduc,
        'net'=>$net
    ];
}