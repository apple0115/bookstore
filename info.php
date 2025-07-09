<?php
    session_start(); // 啟用交談期

    // 檢查是否有登入資訊
    $eId = isset($_SESSION["eId"]) ? $_SESSION["eId"] : null;
    $eName = isset($_SESSION["eName"]) ? $_SESSION["eName"] : null;
?>