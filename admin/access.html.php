<?php
function userIsLoggedIn() {
    // Check that both username and password weere entered
    if (isset($_POST['action']) and $_POST['action'] == 'login') {
        if (!isset($_POST['username']) or $_POST['username'] == '' or
        !isset($_POST['password']) or $_POST['password'] == '') {
            $GLOBALS['loginError'] = 'Please fill in both fields';
            return FALSE;
        }
        $password = md5($_POST['password']);
        // Check that the username and password are contained in the database, if so allow user access and start session
        if (databaseContainsUser($_POST['username'], $password)) {
            session_start();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $password;
            return TRUE;
        } else {
        // If username and password were entered incorrectly refuse access and prompt to reenter
            session_start();
            unset($_SESSION['loggedIn']);
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            $GLOBALS['loginError'] = 'The specified username or password was incorrect.';
            return FALSE;
        } 
    }

    // Close session if user is logged in and chooses to logout, goto url specified in logout form in logout.html.php
    if (isset($_POST['action']) and $_POST['action'] == 'logout') {
        session_start();
        unset($_SESSION['loggedIn']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header('Location: ' . $_POST['goto']);
        exit();
    }
    // If neither of the two special cases are detected, check if user is logged in using session variables
    session_start();
    if (isset($_SESSION['loggedIn'])) {
        return databaseContainsUser($_SESSION['username'], $_SESSION['password']);
    } 
}

function databaseContainsUser($username, $password) {
    include $_SERVER['DOCUMENT_ROOT'] . '/php/inc/db.inc.php';
    try {
        $sql = 'SELECT COUNT(*) FROM user WHERE username = :username AND password = :password';
        $s = $pdo->prepare($sql);
        $s->bindValue(':username', $username);
        $s->bindValue(':password', $password);
        $s->execute();
    }
    catch (PDOException $e) {
        $error = 'Error searching for user.';
        include $_SERVER['DOCUMENT_ROOT'] . '/php/error.html.php';
        exit();
    }
    $row = $s->fetch();
    if ($row[0] > 0) {
        return TRUE;
    } else {
    return FALSE;
    } 
}