<?php
    require_once '../classes/UserOperationClass.php';
    $opcode = new UserOperationClass();
    $opcode->logout();
    header("Location: public/Persons-login.php");
?>