<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boards;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    // public function Boards(){
    //     $Boards = \App\Models\Boards::all();
    //     return view('boards/index',compact('Boards'));
    // }

    public function index(Request $request){
        $searchn = $request->input('searchn');
        $search = $request->input('search');
        
        if($search != null){

            if($searchn == 0){ //전체 검색
                $boards = DB::table('boards')
                ->where('title','like', '%'.$search.'%')
                ->orwhere('content','like', '%'.$search.'%')
                ->get();
            } elseif($searchn == 1){ //제목 검색
                $boards = DB::table('boards')
                ->where('title','like', '%'.$search.'%')
                ->get();
            } elseif($searchn == 2){ //내용 검색
                $boards = DB::table('boards')
                ->where('content','like', '%'.$search.'%')
                ->get();
            }
        }else {
            $boards = \App\Models\Boards::all();
        }

        return view('boards.index',compact('boards'));
    }

    public function create(){       
        return view('boards.create');
    }

    public function store(Request $request){
        $board = Boards::create([
            'title'=>$request->input('title'),
            'content'=>$request->input('content')
        ]);
        return redirect('/boards/'.$board->id);
    }

    public function show(Boards $board){

        return view('boards.show',compact('board'));
    }

    public function edit(Boards $board){
        return view('boards.edit',compact('board'));
    }

    public function update(Boards $board){
        //$board = DB::update('update boards set title = ?, content = ? where id = ?', request(['title','content','id']));
        
        //$board->update(request(['title', 'content']));
 
        $board->update([
            'title'=>request('title'),
            'content'=>request('content')
        ]);
        

        // $board = Boards::find($request->id);
        // $title = $request->input('title');
        // $content = $request->input('content');
        
        // $board -> fill($title)->save();
        // $board -> fill($content)->save();

        return redirect('/boards/'.$board->id);
    }

    public function destroy(Boards $board){

        $board->delete();

        return redirect('/boards');
    }

}
