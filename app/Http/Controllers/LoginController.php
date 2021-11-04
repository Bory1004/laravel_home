<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User as User;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use Bootpay\Rest\BootpayApi;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function list(){
        $members = DB::select('select * from users');

        return view('member_list', ['members' => $members]);
    }
    
    public function loginpage(){
        return view('loginView');
    }

    public function createpage(){
        return view('join');
    }

    public function login(Request $request){
        // $email = $request -> email;
        // $password = $request -> password;
        // $credentials = ['id'=>$email,'password'=>$password];
        
        // if(! auth()->attempt($credentials)){
        //     return "로그인정보가 정확하지 않습니다.";
        // }
        // $rows=Article::paginate(3);
        
        // return view('index',['rows'=>$rows,'login'=>auth()->user()]);
    }

    public function store(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        if(sizeof(User::where('email',$email)->get())<1) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password) ]);
            return redirect('login');
        }else{
            return view('join',['error'=>'이미 등록된 email입니다']);
        }
    }


    //연습용
    public function join_test(){
        //$users = DB::select("select name, email, group_concat(class_code separator ',') as class_code from users group by name");
        // $users = User::select(DB::raw("group_concat(class_code) as class_code"), 'name', 'email')
        // ->groupByRaw('name, email')
        // ->get();

        $users = DB::table('users')
        ->join('class', 'users.class_code', '=', 'class.class_code')
        ->select(DB::raw("group_concat(class.class_name) as class_name"), 'name', 'school','users.user_code')
        ->groupByRaw('name, school, users.user_code')
        ->get();

        $classs = DB::table('class')
        ->get();

        return view('join_test', ['users' => $users, 'classs' => $classs]);
    }

    public function class_test($code){
        //$code = $request->input('code');
        $codes = substr($code, 5, 1);
        echo $codes;
        //echo $request;
        //$class = DB::select('select * from class where user_code=?', [$code]);
        $classs = DB::table('class')
        ->where('user_code', $codes)
        ->get();
        //$class = DB::select('select * from class where class_name=?', [$class_code]);
        
        
        return view('class_list', ['classs' => $classs]);
    }



    //사용자<->수업등록<->수업
    public function user_class_join(){
        // $user_not = DB::table('users')
        // ->join('register', 'users.user_code', '=', 'register.user_code', 'left outer')
        // ->whereNull('register.user_code')
        // ->get();

        // $user_not = DB::table('users')
        // ->join('register', 'users.user_code', '=', 'register.user_code', 'left outer')
        // ->whereNull('register.user_code')
        // ->get();

        // $users = DB::table('users')
        // ->join('register', 'users.user_code', '=', 'register.user_code')
        // ->join('class', 'class.class_code', '=', 'register.class_code')
        // ->select(DB::raw("group_concat(class.class_name) as class_name"), 'name', 'school', 'users.user_code', 'id', 'join_date')
        // ->groupByRaw('name, school, users.user_code, id, join_date')
        // ->get();

        //full join
        // $table2 = DB::table('register')
        // ->rightjoin('users', 'users.user_code', '=', 'register.user_code');

        // $user_not = DB::table('users')
        // ->leftjoin('register', 'users.user_code', '=', 'register.user_code')
        // ->select('name', 'school', 'users.user_code', 'id', 'join_date')
        // ->union($table2)
        // ->get();

        // $user_not = DB::table('users')
        // ->join('register', 'users.user_code', '=', 'register.user_code', 'left')
        // ->select('name', 'school', 'users.user_code', 'id', 'join_date')
        // //->whereNull('register.user_code')
        // ->get();

        //회원 리스트
        $users = DB::table('users')
        ->join('register', 'users.user_code', '=', 'register.user_code', 'left')
        //->select('name', 'school', 'users.user_code', 'id', 'join_date')
        ->join('class', 'class.class_code', '=', 'register.class_code', 'left')
        ->select(DB::raw("group_concat(class.class_name) as class_name"), 'name', 'school', 'users.user_code', 'id', 'join_date')
        ->groupByRaw('name, school, users.user_code, id, join_date')
        ->get();

        //select c.class_code, count(r.user_code) as cnt, class_name, teacher, tuition, begin_date, end_date, class_time from class as c left join register as r on c.class_code = r.class_code group by c.class_code;
        //수업 리스트
        $classs = DB::table('class')
        ->join('register', 'class.class_code', '=', 'register.class_code', 'left')
        ->select('class.class_code', 'class_name', 'teacher', 'tuition', 'begin_date', 'end_date', 'class_time')
        ->get();

        return view('class.user_class_join', ['users' => $users, 'classs' => $classs]);
    }

    //회원이름을 클릭하면 회원이 등록한 수업 리스트 출력
    public function get_class($user){
        //dd($user);
        //echo $user;
        $users = DB::table('users')
        ->select('name')
        ->where('user_code', '=', $user)
        ->get();

        $classs = DB::table('class')
        ->whereIn('class_code', function ($query) use ($user){
            $query->select('class_code')
            ->from('register')
            ->where('user_code', '=', $user);
        })->get();

        return view('class.class_list', ['classs' => $classs,'user_code' => $user, 'users' => $users]);
    }

    public function get_user($code){
        $users = DB::table('users')
        ->whereIn('user_code', function ($query) use ($code){
            $query->select('user_code')
            ->from('register')
            ->where('class_code', '=', $code);
        })->get();

        return view('class.user_list', ['users' => $users]);
    }

    public function pay_result(Request $request){
        $card_code = $request->input('card_code');
        $card_name = $request->input('card_name');
        $item_name = $request->input('item_name');
        $method_name = $request->input('method_name');
        $price = $request->input('price');

        return response()
        ->json(['card_code' => $card_code, 'card_name' => $card_name, 'item_name' => $item_name, 'method_name' => $method_name, 'price' => $price]);
    }

    public function pay_token(){

        $bootpay = new BootpayApi();
        $token_set = $bootpay->setconfig("617a10a77b5ba4002352d022", "vsaO0SSX8EbbJaUm4+slqlhDwhIWY88TnHxj61h0s7Y=");
        echo $token_set;
        
    //     $bootpay = BootpayApi::setConfig(
    //         "617a10a77b5ba4002352d022",
    //         "vsaO0SSX8EbbJaUm4+slqlhDwhIWY88TnHxj61h0s7Y="
    //     );
        
    //     $response = $bootpay->requestAccessToken();

    //     echo $response;

    //     if ($response->status === 200) {
    //         $token = $response->data->token;
    //         $server_time = $response->data->server_time;
    //         $expired_at = $response->data->expired_at;



    //     // $getToken = Http::withHeaders([
    //     //     'Content-Type' => 'application/json'
    //     // ])->post('https://api.iamport.kr/users/getToken', [
    //     //     'imp_key' => $imp_key,
    //     //     'imp_secret' => $imp_secret,
    //     // ]);
    //     // $getTokenJson = json_decode($getToken, true);
    // }

        return view('pay.result');
    }

    //수업 등록 -> 등록할 수 있는 수업 리스트 보여주기
    public function insert_class_view($user){
        //echo $user;
        $classs = DB::table('class')
        ->whereNotIn('class_code', function ($query) use ($user){
            $query->select('class_code')
            ->from('register')
            ->where('user_code', '=', $user);
        })->get();

        return view('class.insert_class_view', ['classs' => $classs, 'user_code' => $user]);
    }

    //수업 등록
    public function insert_class(Request $request){
        $user_code = $request->input('user_code');
        $class_code = $request->input('class_code');
        $regi_date = Carbon::now();

        $register = DB::table('register')
        ->insert(['user_code'=>$user_code, 'class_code'=>$class_code, 'regi_date'=>$regi_date]);

        return redirect('/user_class_join');
    }

    //수업 삭제
    public function delete_class($class, $user){
        //echo $class;
        //echo $user;

        $classs = DB::table('register')
        ->where('class_code', '=', $class)
        ->where('user_code', '=', $user)
        ->delete();

        //return view('class.class_result');
        return redirect('/user_class_join');
    }

}