<?php

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $insert_query = "INSERT INTO phplogin (username, password) VALUES (?, ?)";

    // prepare statement
    $stmt = $conn->prepare($insert_query);

    // bind parameters
    $stmt->bind_param("ss", $username, $password);

    // execute the statement
    if ($stmt->execute()) {
        echo "회원가입이 정상적으로 완료되었습니다.";
    } else {
        echo "Error: 회원가입에 실패했습니다. " . $stmt->error;
    }

    // close the statement
    $stmt->close();
    
    $conn->close();
}
?>
