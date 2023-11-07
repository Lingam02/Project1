<?php
include("config.php");
// Initialize a session
session_start();

// Initialize variables for messages
$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

  
    $sql = "INSERT IGNORE INTO user (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        // Check if any rows were affected
        if ($conn->affected_rows > 0) {
            // Set a session variable for success message
            $_SESSION["success_message"] = "Submitted Successfully";
            header("Location: index.php"); // Redirect to the same page to clear POST data
            exit(); // Terminate the current script
        } else {
            $_SESSION["error_message"] = "Name or email already exists in the database";
        }
    } else {
        $response = array("message" => "Error: " . $sql . "<br>" . $conn->error);
        echo json_encode($response);
    }

    $conn->close();
}

// Check if a success message or error message is set in the session
if (isset($_SESSION["success_message"])) {
    $success_message = $_SESSION["success_message"];
    unset($_SESSION["success_message"]);
}

if (isset($_SESSION["error_message"])) {
    $error_message = $_SESSION["error_message"];
    unset($_SESSION["error_message"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form with Database</title>
    <style>
    /* Toast CSS */
    .toast {
    visibility: hidden;
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    background-color: red;
    color: #fff;
    text-align: center;
    font-size: 16px;
    padding: 10px 15px;
    border-radius: 5px;
    opacity: 0;
    transition: visibility 0s 2s, opacity 2s linear;
    animation: shake 0.3s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(-50%); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-45%); }
    20%, 40%, 60%, 80% { transform: translateX(-55%); }
}


    .toast-success {
        visibility: hidden;
        position: fixed;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #00cc00; /* Green background color for success */
        color: #fff;
        text-align: center;
        padding: 15px;
        border-radius: 5px;
        opacity: 0;
        transition: visibility 0s 2s, opacity 2s linear;
    }

    /* Show the toast */
    .show-toast {
        visibility: visible;
        opacity: 1;
        transition: opacity 0.5s linear;
    }
    </style>
</head>
<body>
    <h1>PHP Form with Database</h1>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
    <!-- Display the success message or error message if set -->
    <div id="toast" class="<?php echo $success_message ? 'toast-success' : 'toast'; ?> <?php echo $success_message || $error_message ? 'show-toast' : ''; ?>">
        <?php echo $success_message ? $success_message : $error_message; ?>
    </div>

    <script>
    // Display the toast notification when the form is successfully submitted
    <?php if ($success_message || $error_message) { ?>
        document.getElementById('toast').classList.add('show-toast');
        setTimeout(function () {
            document.getElementById('toast').classList.remove('show-toast');
        }, 3000); // 3 seconds

    <?php }?>
    </script>
</body>
</html>
