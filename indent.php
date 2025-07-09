<?php include 'info.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>叫貨訂單</title>
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="nav-bar">
        <?php include 'nav.php'; ?>
    </div>

    <div class="table-container">
        <div class="customer-header">
            <div>叫貨編號</div>
            <div>叫貨人員</div>
            <div>金額</div>
            <div>狀態</div>
            <div>日期</div>
        </div>
    
    <?php

        // 建立 MySQL 的資料庫連接
        $link = mysqli_connect("localhost", "root", "", "bookstore")
            or die("無法開啟 MySQL 資料庫連接！<br/>");

        // 查詢每筆叫貨訂單的總金額及其他資訊
        $sql = "
            SELECT i.iId, i.eId, i.iStatus, i.iDate, 
                   SUM(id.iQuantity * b.price) AS iTotal 
            FROM indent i
            LEFT JOIN idetail id ON i.iId = id.iId
            LEFT JOIN books b ON id.bId = b.bId
            GROUP BY i.iId, i.eId, i.iStatus, i.iDate
        ";

        // 執行 SQL 查詢
        $result = mysqli_query($link, $sql);

        // 檢查查詢是否有結果
        if (mysqli_num_rows($result) > 0) 
        {
            // 遍歷每一筆資料
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='customer-row'>";
                echo "<div><a href='iDetail.php?iId=" . htmlspecialchars($row['iId']) . "'>" . htmlspecialchars($row['iId']) . "</a></div>";
                echo "<div>" . htmlspecialchars($row['eId']) . "</div>";
                echo "<div>$" . number_format($row['iTotal']) . "</div>";
                echo "<div>" . htmlspecialchars($row['iStatus']) . "</div>";
                echo "<div>" . htmlspecialchars($row['iDate']) . "</div>";
                echo "</div>";
            }
        } 
        else 
        {
            echo "<p style='text-align:center;'>目前沒有書籍資料。</p>";
        }

        // 關閉資料庫連接
        mysqli_close($link);
    ?>



</body>
</html>
