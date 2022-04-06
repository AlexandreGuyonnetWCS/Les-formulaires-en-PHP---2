<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    // define variables and set to empty values
    $nameErr = $lastNameErr = $emailErr = $phoneErr = $messageErr = "";
    $name = $lastName = $email = $phone = $message = $subjects = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["lastName"])) {
                $lastNameErr = "lastName is required";
            } else {
                $Lastame = test_input($_POST["lastName"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
                    $LastNameErr = "Only letters and white space allowed";
                }
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["phone"])) {
            $phoneErr = "phone is required";
        } else {
            $phone = test_input($_POST["phone"]);
            // check if phone syntax is valid
            if (!preg_match('/[0-9]/', $phone)) {
                $phoneErr = "Invalid number";
            }
        }

        if (empty($_POST["message"])) {
            $message = "";
        } else {
            $message = test_input($_POST["message"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    
    ?>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        LastName: <input type="text" name="lastName">
        <span class="error">* <?php echo $lastNameErr; ?></span>
        <br><br>
        E-mail: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Phone: <input type="phone" name="phone" maxlength="10">
        <span class="error">* <?php echo $phoneErr; ?></span>
        <br><br>
        Subjects : <select id="subjects" name="subjects">
            <option seleced>reclamations</option>
            <option>renseignements</option>
            <option>félicitations</option>
            <option>encouragements</option>
        </select>
        <br><br>
        Message: <textarea name="message" rows="5" cols="40"></textarea>
        <br><br>

        <input type="submit" formaction  ="/thanks.php" name="submit" value="Submit">

    </form>

</body>

</html>