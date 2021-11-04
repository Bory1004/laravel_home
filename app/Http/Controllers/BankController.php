<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankController extends Controller
{
    public function result(Request $request){
        $code = $request->input('code');
        return view('bank.bank_request', compact('code'));
    }

    public function token_result(Request $request){

        $result = [
            'access_token' => $request->input('access_token'),
            'refresh_token' => $request->input('refresh_token'),
            'user_seq_no' => $request->input('user_seq_no')
        ];
        return view('bank.bank_token', compact('result'));
    }
}
