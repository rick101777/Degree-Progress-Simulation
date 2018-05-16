<?php
include_once("dbcontroller.php");

    $db_handle = new DBController();
    $conn = $db_handle->connectDB();
    $result = runQuery($conn,"SELECT * FROM users WHERE EMAIL='" . $_POST['email'] . "' and PASSWORD = '". $_POST['password']."'");
    $count  = numRows($result);
    $email = $result["email"];
    $hash = password_hash($password, PASSWORD_BCRYPT, $result['PID']);

    if(isset($_POST['submit'])){
        if($count==0) {
            $message = "Invalid Username or Password!";
            header("Location: ../index.php");
        }
        else{
            if($row=mysqli_fetch_assoc($result)){
                if(password_verify($result['PASSWORD'], $hash) && $result['PID']=="STU"){
                    $_SESSION["email"]= $email;
                    $_SESSION['s_id']=$row['ID'];
                    $_SESSION['s_first']=$row['FNAME'];
                    $_SESSION['s_last']=$row['LNAME'];
                    $_SESSION['s_major']=$row['MAJOR'];
                    header("Location: ../home.php");
                    exit();
                }
                elseif(password_verify($result['PASSWORD'], $hash) && $result['PID']=="ADM"){
                    $_SESSION["email"]= $email;
                    $_SESSION['a_id']=$row['ID'];
                    $_SESSION['a_first']=$row['FNAME'];
                    $_SESSION['a_last']=$row['LNAME'];
                    header("Location: ../admin/home.php");
                    exit();
                }
                elseif(password_verify($result['PASSWORD'], $hash) && $result['PID']=="FAC"){
                    $_SESSION["email"]= $email;
                    $_SESSION['f_id']=$row['ID'];
                    $_SESSION['f_first']=$row['FNAME'];
                    $_SESSION['f_last']=$row['LNAME'];
                    $_SESSION['f_dept']=$row['Dept'];
                    header("Location: ../faculty/home.php");
                    exit();
                }
            }
        }
            
    }
            

?>