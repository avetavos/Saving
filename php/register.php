<?php
    session_start();
    require "./connection.php";

    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];

    if(trim($_POST["email"]) == "")
    {
        echo "กรุณากรอกอีเมล";
        exit();	
    }

    if(trim($_POST["fullname"]) == "")
    {
        echo "กรุณากรอกชื่อ - นามสกุล";
        exit();	
    }

    $checkEmail = "SELECT * FROM member WHERE email = '$email'";
    $checkQuery = $mysqli->query($checkEmail);
    $checkResult = $checkQuery->fetch_array(MYSQLI_ASSOC);
    if ($checkResult) {
        printf("อีเมลนี้ได้ทำการลงทะเบียนแล้ว");
        exit();
    }
    else {
        $objStr = "INSERT INTO member (email, password, name, role, SID, active) VALUES ('$email', '$password', '$fullname', 'User', '".session_id()."', 'No')";
        $objQuery = $mysqli->query($objStr);

        $Uid = $mysqli->insert_id;
        printf("success");

        $subject = "ยืนยันการลงทะเบียน Saving";
        $subject = "=?UTF-8?B?".base64_encode($subject)."?=";
        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=UTF-8";
        $headers[] = "To: $fullname <$email>";
        $headers[] = "From: Saving";
        $strMessage = "";
        $strMessage .= "<style>
                        @font-face {
                            src: url('../font/Prompt-Regular.ttf');
                            font-family: 'Prompt';
                        }
                        @font-face {
                            src: url('../font/Prompt-Black.ttf');
                            font-family: 'Prompt Black';                                                                                                                                                                                                                       pt Black';
                        }
                        body {
                            font-family: 'Prompt';
                            margin-top: 90px;

                        }
                        .navbar {
                            position: fixed;
                            width: 100%;
                            top: 0;
                            z-index: 999;
                        }
                        
                        .main-logo {
                            width: 2rem;
                        }
                        
                        .navbar-brand {
                            font-family: 'Prompt Black';
                            font-size: 2rem;
                        }
                        .navbar {
                            position: fixed;
                            width: 100%;
                            top: 0;
                            z-index: 999;
                        }
                        .bg-light {
                            background-color: #f8f9fa!important;
                        }
                        @media (min-width: 768px) {
                            .p-md-0 {
                                padding: 0!important;
                            }
                        }
                        .bg-light {
                            background-color: #343a40!important;
                        }
                        .navbar-light .navbar-brand {
                            color: #fff;
                        }
                        .navbar-brand {
                            font-family: 'Prompt Black';
                            font-size: 2rem;
                            text-decoration: none;
                            padding-left: 50px;
                        }
                        .navbar-brand {
                            display: inline-block;
                            padding-top: .3125rem;
                            padding-bottom: .3125rem;
                            margin-right: 1rem;
                            line-height: inherit;
                            white-space: nowrap;
                        }
                        .d-block {
                            display: block;
                        }
                        .w-25 {
                            width: 25%;
                        }
                        .mx-auto {
                            margin-left:auto;
                            margin-right:auto;
                        }
                        .text-center {
                            text-align: center;
                        }
                        .btn {
                            display: inline-block;
                            font-weight: 400;
                            text-align: center;
                            white-space: nowrap;
                            vertical-align: middle;
                            -webkit-user-select: none;
                            -moz-user-select: none;
                            -ms-user-select: none;
                            user-select: none;
                            border: 1px solid transparent;
                            padding: .375rem .75rem;
                            font-size: 1rem;
                            line-height: 1.5;
                            border-radius: .25rem;
                            transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                        }
                        .btn-group-lg>.btn, .btn-lg {
                            padding: .5rem 1rem;
                            font-size: 1.25rem;
                            line-height: 1.5;
                            border-radius: .3rem;
                        }
                        .bg-pink {
                            background-color: #FF7BAC;
                            font-family:'Prompt';
                            color: #fff;
                            text-decoration: none;
                        }
                        .bg-pink:hover {
                            background-color: #E8679C;
                        }
                        .alert {
                            position: relative;
                            padding: 2rem 1.25rem;
                            margin-bottom: 1rem;
                            border: 1px solid transparent;
                            border-radius: .25rem;
                        }
                        .alert-success {
                            color: #464a4e;
                            background-color: #e7e8ea;
                            border-color: #dddfe2;
                        }
                        .bd-example>.alert+.alert, .bd-example>.nav+.nav, .bd-example>.navbar+.navbar, .bd-example>.progress+.btn, .bd-example>.progress+.progress {
                            margin-top: 1rem;
                        }
                        </style>";
        $strMessage .= '<nav class="navbar navbar-expand-lg navbar-light bg-light p-md-0">
                            <div class="container">
                                <a class="navbar-brand" href="http://localhost/Saving/index.html">
                                <strong>S a v i n g</strong>
                                </a>
                            </div>
                        </nav>';
        $strMessage .= "<div class='alert alert-success d-block mx-auto text-center' style='width:50%;'>";
        $strMessage .= "<img src='https://i.imgur.com/sWNm7cr.png' class='mx-auto d-block w-25'>";
        $strMessage .= "<p class='text-center' style='font-size:1rem;'>ยินดีต้อนรับคุณ : <strong>".$fullname."</strong> สู่การใช้งาน <strong>Saving</strong></p>";
        $strMessage .= "<a role='button' class='mx-auto text-center btn btn-lg bg-pink w-100' style='font-size:1rem;' href='http://127.0.0.1/Saving/active.html?sid=".session_id()."&uid=".$Uid."'>ยืนยันการลงทะเบียนเข้าใช้งาน Saving</a>";
        $strMessage .= "</div>";

        $emailSent = mail($email, $subject, $strMessage, implode("\r\n", $headers));
    }

    $mysqli->close();
?>