<?php
require_once "conn.php";

$email = $password = $confirm = "";
$email_err = $password_err = $confirm_err = "";


if($SERVER["REQUEST_METHOD"] == "POST") {

    //Validate username
/*    if(empty(trim($_POST["fname"]))){
        $fname_err = "please enter your name"
    }else{
        $sql = "SELECT id FROM users WHERE fname =?";

        if($stmt = $mysqli->prepare($sql)){

            $stmt->bind_param("s"$param_fname);

            $param_fname = trim($_POST["fname"]);

            if($stmt->execute()){

                $stmt->store_result();
            } else{
                echo "Oops! something went wrong";
            }
            $stmt->close();
        }
    }
    if(empty(trim($_POST["address"]))){
        $address_err = "please input your location"
    }else{
        $sql = "SELECT id FROM users WHERE address =?";

        if($stmt = $mysqli->prepare($sql)){

            $stmt->bind_param("s"$param_address);

            $param_address = trim($_POST["address"]);

            if($stmt->execute()){

                $stmt->store_result();

                $stmt->close();
            }

        }
    } */
    if(empty(trim($_POST["email"]))){
        $email_err = "please a valid email"
    }else{
        $sql = "SELECT id FROM users WHERE fname =?";

        if($stmt = $mysqli->prepare($sql)){

            $stmt->bind_param("s"$param_email);

            $param_email = trim($_POST["email"]);

            if($stmt->execute()){

                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $email_err = "this email has been used";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! something went wrong";
            }
            $stmt->close();
        }
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "please enter a password";
        elseif(strlen(trim($_POST["password"])) < 7){
            $password_err = "password must have atleast 7 characters";
        }else{
            $password = trim($_POST["password"]);
        }

        //validate confirm password
        if(empty(trim($_POST[confirm]))){
            $confirm_err = "please confirm password";
        }else{
            $confirm = trim($_POST["confirm"]);
            if(empty($password_err) && empty($confirm_err)){
                $confirm_err = "password did not match";
            }
        }
    }

    //check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_err)){
        
        //the rest of the data
        $fname = $_POST['fname'];
        $house_address = $_POST['house_address'];
        $phone_ = $_POST['phone_number'];

        //insert statement
        $sql = "INSERT INTO users (fname, house_address, phone_number ) VALUES (?,?,?)";
        if($stmt = $mysqli->prepare($sql)){
            //bind variables
            $stmt->bind_param("sss", $fname, $house_address, $phone_number);

            //set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); //creates a password hash

            //attempt to execute the prepared statement
            if(stmt->execute()){
                header("location: login.php");
            }else{
                echo "Ooops! something went wrong";
            }
            $stmt->close();
        }


    }
    $mysqli->close();


}


?>