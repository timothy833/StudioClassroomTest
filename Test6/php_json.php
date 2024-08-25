<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// 定義 JSON 資料
$data = [
    "STATUS" => 200,
    "DATA" => [
        "ERROR" => 0,
        "MESSAGE" => "Hello",
        "SUCCESS" => 1,
        "erpkey" => "2111LV11MD0Y_X_A01AR2111",
        "EMAIL" => "zzz@zzz.com"
    ]
];

// 將陣列轉換為 JSON 並返回
echo json_encode($data);
