<?php include 'info.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>客戶訂單</title>
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="nav-bar">
        <?php include 'nav.php'; ?>
    </div>
    
    <div class="table-container">
        <div class="customer-header">
            <div>訂單編號</div>
            <div>客戶姓名</div>
            <div>金額</div>
            <div>狀態</div>
            <div>訂單日期</div>
        </div>
    
    <?php

        // 建立 MySQL 的資料庫連接
        $link = mysqli_connect("localhost", "root", "", "bookstore")
            or die("無法開啟 MySQL 資料庫連接！<br/>");

        // 查詢每筆訂單的總金額及其他資訊
        $sql = "
            SELECT co.cId, co.cName, co.cStatus, co.cDate, 
                   SUM(cd.cQuantity * b.price) AS cTotal 
            FROM customerorders co
            LEFT JOIN cdetail cd ON co.cId = cd.cId
            LEFT JOIN books b ON cd.bId = b.bId
            GROUP BY co.cId, co.cName, co.cStatus, co.cDate
        ";

        // 執行 SQL 查詢
        $result = mysqli_query($link, $sql);

        // 檢查查詢是否有結果
        if (mysqli_num_rows($result) > 0) 
        {
            // 遍歷每一筆資料
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='customer-row'>";
                echo "<div><a href='cDetail.php?cId=" . htmlspecialchars($row['cId']) . "'>" . htmlspecialchars($row['cId']) . "</a></div>";
                echo "<div>" . htmlspecialchars($row['cName']) . "</div>";
                echo "<div>$" . number_format($row['cTotal']) . "</div>";
                echo "<div>" . htmlspecialchars($row['cStatus']) . "</div>";
                echo "<div>" . htmlspecialchars($row['cDate']) . "</div>";
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
