<?php include 'info.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>魚漿倉儲 | 店鋪銷售</title>
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="nav-bar">
        <?php include 'nav.php'; ?>
    </div>
    <div class="table-container">
        <div class="customer-header">
            <div>銷售編號</div>
            <div>書籍編號</div>
            <div>數量</div>
            <div>金額</div>
            <div>日期</div>
        </div>
    
    <?php

        // 建立 MySQL 的資料庫連接
        $link = mysqli_connect("localhost", "root", "", "bookstore")
            or die("無法開啟 MySQL 資料庫連接！<br/>");

        // 建立 SQL 查詢
        $sql = "SELECT * FROM sale";

        // 執行 SQL 查詢
        $result = mysqli_query($link, $sql);

        // 檢查查詢是否有結果
        if (mysqli_num_rows($result) > 0) 
        {
            // 遍歷每一筆資料
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='customer-row'>";
                echo "<div>" . htmlspecialchars($row['sId']) . "</div>";
                echo "<div>" . htmlspecialchars($row['bId']) . "</div>";
                echo "<div>" . htmlspecialchars($row['sQuantity']) . "</div>";
                echo "<div>$" . htmlspecialchars($row['sTotal']) . "</div>";
                echo "<div>" . htmlspecialchars($row['sDate']) . "</div>";
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
