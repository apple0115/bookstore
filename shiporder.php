<?php
// 接收來自上一個程式的 $cId 和書籍明細資料
$data = json_decode(file_get_contents('php://input'), true);
$cId = isset($data['cId']) ? $data['cId'] : null;
$books = isset($data['books']) ? $data['books'] : [];

if (!$cId || empty($books)) {
    echo json_encode(['status' => 'error', 'message' => '缺少訂單編號或書籍明細資料']);
    exit;
}

// 建立 MySQL 的資料庫連接
$link = mysqli_connect("localhost", "root", "", "bookstore");
if (!$link) {
    echo json_encode(['status' => 'error', 'message' => '資料庫連接失敗']);
    exit;
}

$link->autocommit(false); // 關閉自動提交

try {
    // 處理每本書的庫存檢查和更新
    foreach ($books as $book) {
        $bId = $book['bId'];
        $cQuantity = intval($book['quantity']);

        // 檢查庫存是否足夠
        $stockSql = "SELECT quantity FROM books WHERE bId = ?";
        $stockStmt = $link->prepare($stockSql);
        $stockStmt->bind_param("s", $bId);
        $stockStmt->execute();
        $stockResult = $stockStmt->get_result();

        if ($stockResult->num_rows === 0) {
            throw new Exception("找不到書籍 ID: $bId");
        }

        $stock = intval($stockResult->fetch_assoc()['quantity']);
        if ($stock < $cQuantity) {
            throw new Exception("書籍 ID: $bId 庫存不足");
        }

        // 更新庫存數量
        $updateSql = "UPDATE books SET quantity = quantity - ? WHERE bId = ?";
        $updateStmt = $link->prepare($updateSql);
        $updateStmt->bind_param("is", $cQuantity, $bId);
        if (!$updateStmt->execute()) {
            throw new Exception("更新書籍 ID: $bId 庫存失敗");
        }
    }

    // 更新訂單狀態為 "已出貨"
    $orderSql = "UPDATE customerOrders SET cStatus = '已出貨' WHERE cId = ?";
    $orderStmt = $link->prepare($orderSql);
    $orderStmt->bind_param("s", $cId);
    if (!$orderStmt->execute()) {
        throw new Exception("更新訂單狀態失敗");
    }

    $link->commit(); // 提交交易
    echo json_encode(['status' => 'success', 'message' => '出貨成功']);
} catch (Exception $e) {
    $link->rollback(); // 回滾交易
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} finally {
    $link->close(); // 關閉資料庫連接
}
