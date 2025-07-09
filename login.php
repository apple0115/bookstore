<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>魚漿倉儲 | 員工登入</title>
<style>
    body 
    {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #e8e8e8;
        font-family: 微軟正黑體;
    }
    .login-container 
    {
        text-align: center;
        padding: 30px;
        width: 320px;
    }
    .login-container img 
    {
        width: 100px;
        margin-bottom: 20px;
    }
    .form-group 
    {
        display: flex;
        align-items: center; /* 垂直居中對齊 */
        margin-bottom: 15px; /* 每行間距 */
    }
    label 
    {
        width: 70px;       /* 固定文字區域寬度 */
        text-align: right;  /* 文字右對齊 */
        margin-right: 10px; /* 文字與輸入框之間的間距 */
    }
    input[type="text"],
    input[type="password"] 
    {
        flex: 1;            /* 輸入框占據剩餘空間 */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
        background-color: #e1e9eb;
        color: #3d3d3d;
        font-size: 15px;
    }
    input[type="submit"] 
    {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 20px;
        background-color: #947f57;
        color: #3d3d3d;
        font-size: 16px;
        cursor: pointer;
        margin-top: 15px;
    }
    input[type="submit"]:hover 
    {
        background-color: #3d3d3d;
        color: #947f57;
    }
    .error-message 
    {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
    }
</style>
</head>
<?php
session_start();  // 啟用交談期

// 初始化變數
$eId = "";  
$ePassword = "";
$error_message = "";

// 取得表單欄位值
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST["eId"])) 
        $eId = $_POST["eId"];
    if (isset($_POST["ePassword"])) 
        $ePassword = $_POST["ePassword"];

    // 檢查是否輸入使用者名稱和密碼
    if ($eId != "" && $ePassword != "") {
        // 建立 MySQL 的資料庫連接
        $link = mysqli_connect("localhost", "root", "", "bookstore") 
            or die("無法開啟 MySQL 資料庫連接!<br/>");

        // 建立 SQL 指令字串
        $sql = "SELECT * FROM employees WHERE ePassword='" . $ePassword . "' AND eId='" . $eId . "'";
        $result = mysqli_query($link, $sql);
        $total_records = mysqli_num_rows($result);

        if ($total_records > 0) {
            $row = mysqli_fetch_assoc($result); 
            $_SESSION["login_session"] = true;
            $_SESSION["eId"] = $row["eId"];    
            $_SESSION["eName"] = $row["eName"]; 
        
            header("Location: index.php");  // 導到主頁
            exit();
        }
        else 
        {
            $error_message = "員工編號或密碼錯誤!";
        }

        // 釋放資源並關閉資料庫連接
        mysqli_close($link);
    } 
    else 
    {
        $error_message = "請輸入完整的員工編號和密碼!";
    }
}
?>
<body>
<div class="login-container">

    <img src="logo.png" alt="Logo">

    <form action="login.php" method="post">
        <div class="form-group">
            <label for="eId">員工編號</label>
            <input type="text" id="eId" name="eId" />
        </div>

        <div class="form-group">
            <label for="ePassword">員工密碼</label>
            <input type="password" id="ePassword" name="ePassword" />
        </div>
        <input type="submit" value="登入" />
    </form>
</div>
</body>
</html>