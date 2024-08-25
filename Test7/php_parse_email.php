<?php
// 檢查是否提交了表單並且 email 不是空值
$email = "";
$parsedEmail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["email"])) {
    // 取得輸入的 email
    $email = $_POST["email"];
    
    // 使用 explode 函數來解析 @ 前的部分
    $emailParts = explode("@", $email);
    $parsedEmail = $emailParts[0]; // 取得 @ 前面的部分
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Parser</title>
</head>
<body>

<h2>Email Parser</h2>

<!-- 表單讓使用者輸入 Email -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="email">輸入Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">送出</button>
</form>

<?php
// 顯示解析結果
if (!empty($parsedEmail)) {
    echo "<p>Email @ 前的字串是: <strong>" . htmlspecialchars($parsedEmail) . "</strong></p>";
}
?>

</body>
</html>
