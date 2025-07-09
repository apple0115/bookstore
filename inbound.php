<?php
$data = json_decode(file_get_contents('php://input'), true);
$iId = isset($data['iId']) ? $data['iId'] : null;
$books = isset($data['books']) ? $data['books'] : [];

if (!$iId || empty($books)) {
    echo json_encode(['status' => 'error', 'message' => '缺少訂單編號或書籍明細資料']);
    exit;
}

$link = mysqli_connect("localhost", "root", "", "bookstore");
if (!$link) {
    echo json_encode(['status' => 'error', 'message' => '資料庫連接失敗']);
    exit;
}

$link->autocommit(false); // 關閉自動提交

try {
    foreach ($books as $book) {
        $bId = $book['bId'];
        $quantity = intval($book['quantity']);

        $updateSql = "UPDATE books SET quantity = quantity + ? WHERE bId = ?";
        $updateStmt = $link->prepare($updateSql);
        $updateStmt->bind_param("is", $quantity, $bId);
        if (!$updateStmt->execute()) {
            throw new Exception("更新書籍 ID: $bId 庫存失敗");
        }
    }

    // 更新訂單狀態為 "已入庫"
    $orderSql = "UPDATE indent SET iStatus = '已入庫' WHERE iId = ?";
    $orderStmt = $link->prepare($orderSql);
    $orderStmt->bind_param("s", $iId);
    if (!$orderStmt->execute()) {
        throw new Exception("更新訂單狀態失敗");
    }

    $link->commit(); // 提交交易
    echo json_encode(['status' => 'success', 'message' => '入庫成功']);
} catch (Exception $e) {
    $link->rollback(); // 回滾交易
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} finally {
    $link->close(); // 關閉資料庫連接
}
?>