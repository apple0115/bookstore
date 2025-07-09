<?php include 'info.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>訂單明細</title>
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="nav-bar">
        <?php include 'nav.php'; ?>
    </div>
    
    <div class="table-container">
        <div class="detail-header">
            <div>書籍編號</div>
            <div>書名</div>
            <div>數量</div>
            <div>單價</div>
        </div>
        
    <?php
        $cId = isset($_GET['cId']) ? $_GET['cId'] : '';

        if (!$cId) {
            echo "<p>無效的訂單編號。</p>";
            exit();
        }
        // 建立 MySQL 的資料庫連接
        $link = mysqli_connect("localhost", "root", "", "bookstore")
            or die("無法開啟 MySQL 資料庫連接！<br/>");

        // 防止 SQL Injection
        $cId = mysqli_real_escape_string($link, $cId);

        // 查詢訂單的書籍明細
        $sql = "SELECT d.bId, b.bName, d.cQuantity, (d.cQuantity * b.price) AS price 
        FROM cdetail d 
        JOIN books b ON d.bId = b.bId 
        WHERE d.cId = '$cId'";
        $result = mysqli_query($link, $sql);


        // 檢查查詢是否有結果
        if (mysqli_num_rows($result) > 0) 
        {
            // 遍歷每一筆資料
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='detail-row' data-cid='$cId'>";
                echo "<div>" . htmlspecialchars($row['bId'])."</div>";
                echo "<div>" . htmlspecialchars($row['bName']) . "</div>";
                echo "<div>" . htmlspecialchars($row['cQuantity']) . "</div>";
                echo "<div>$" . htmlspecialchars($row['price']) . "</div>";
                echo "</div>";
            }
        } 
        else 
        {
            echo "<p style='text-align:center;'>目前沒有書籍資料。</p>";
        }
        // 查詢訂單狀態和庫存檢查
        $statusSql = "SELECT cStatus FROM customerOrders WHERE cId = '$cId'";
        $statusResult = mysqli_query($link, $statusSql);
        $orderStatus = mysqli_fetch_assoc($statusResult)['cStatus'];
                    
        $disableButton = ($orderStatus === '已出貨');      
        
        // 關閉資料庫連接
        mysqli_close($link);
    ?>
    </div>
    </div>
    <div class="shipOrder-container">
        <button class="shipOrder" id="shipButton" <?php if ($disableButton) echo 'disabled'; ?>>
            <?php echo $disableButton ? "已出貨" : "將此筆訂單出貨"; ?>
        </button>
    </div>
    <script>
        document.getElementById('shipButton').addEventListener('click', function () 
        {
            if (confirm('確定要將此筆訂單出貨嗎？')) 
            {
                // 收集該 cId 的訂單資料
                const bookDetails = Array.from(document.querySelectorAll('.detail-row'))
                .filter(row => row.dataset.cid === '<?php echo $cId; ?>') // 確保只有當前訂單的資料被選取
                .map(row => ({
                    bId: row.children[0].textContent.trim(),
                    quantity: row.children[2].textContent.trim()
                }));

                // 發送 POST 請求到 shiporder.php
                fetch('shiporder.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        cId: '<?php echo $cId; ?>',
                        books: bookDetails
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('出貨成功！');
                        location.reload(); // 重新加載頁面
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    alert('出貨失敗，請稍後再試。');
                });
            }
        });
</script>

</body>
</html>
