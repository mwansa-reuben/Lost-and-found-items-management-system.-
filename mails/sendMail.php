<?php
@require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer(true);
//send enquiry from the official website
function sendClaimMail($holdermail,$holdernames, $item, $ownernames,$ownermail, $ownercont , $placeLost)
{    
    $body = '
        <!DOCTYPE html>
        <html lang="en">    
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Noto+Sans+KR:wght@100&display=swap");
                body{
                    
                    padding: 0;
                    margin: 0;
                    overflow: hidden;
                }
                .wrapper{
                    padding: 0 10px;
                    width: 100%;
                    height: 100vh;
                    color: black;
                    overflow-x: hidden;
                    overflow-y: auto;
                    padding-bottom: 40px;
                    font-family: "Noto Sans KR", sans-serif;
                    font-weight: 500;
                }
                p{
                    line-height: 25px;
                }
                .step{
                    color: #B50CB0;
                }
                a{
                    text-decoration: none;
                }
            </style>
        
        </head>        
        <body >
            <div class="wrapper">
                <h4>Hello '.$holdernames.'</h4>
                <hr>
                <p>
                    '.$ownernames.' claims ownership of '.$item.'. 
                    They claim to have lost hold of this item  in the area/place '.$placeLost.' <br>
                    Please if you feel they are the rightful owner of this item. contact  them on<br>
                    <h4>'.$ownermail.'</h4>
                    <h4>'.$ownercont.'</h4>
                    <span class="fs-13 ">Thank you!</span>
                </p>                   
            </div>
        </body>
        </html>    
    ';
    @$mail = new PHPMailer(true);
    //$mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = "fgr.co.zm";
    $mail->SMTPAuth = true;
    $mail->Username = "corporateit@fgr.co.zm";
    $mail->Password = "fsmscorporate@fgrit";
    $mail->Port = 587;
    $mail->SMTPSecure = 'tsl';
    $mail->setFrom($ownermail, 'Find Lost Items');
    $mail->addAddress($holdermail);

    $mail->isHTML(true);
    $mail->Subject = 'Item Claim';
    $mail->Body = $body;
    if ($mail->send()) return true;
}


