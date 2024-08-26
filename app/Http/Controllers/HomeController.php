<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
        {
       
        return view('Dashboard');
      
    }
    public function AdminHome(Request $request)
    {
    $roles = ['Admin', 'Customer','Agent'];
    $users = User::paginate(10);
    return view('home',compact('users','roles'));
  
}

//     public function store(Request $request){
//         User::insert([
//         //'id'=>$id,
//         'role'=>$request->role,
//         // 'modifiedBy'=> $request->modifiedBy,

//         ]);

//           return redirect()->route('ControlPanel');
// }
}