<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // 處理前端傳來的資料，將使用者名稱轉為小寫
    public function parseUsers(Request $request) {
        // 獲取前端發送的資料
        $users = $request->input('users');
        
        // 處理資料，將使用者的 `username` 轉為小寫
        foreach ($users as &$user) {
            $user['username'] = strtolower($user['username']);
        }

        // 返回處理後的資料給前端
        return response()->json($users);
    }
}
