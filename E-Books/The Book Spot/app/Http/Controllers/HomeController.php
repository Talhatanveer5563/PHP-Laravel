<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\booktbl;
use App\Models\categorytbl;
use App\Models\authortbl;
use App\Models\shoppingcarttbl;
use Auth;
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
        $book = booktbl::all(); 
        $countclientwiseproduct =shoppingcarttbl::where("userid",Auth::User()->id)->count();

        return view('clienthome',compact("book",'countclientwiseproduct'));
    }
    public function clientfunction()
    {
        $allrecord = User::all();
        $category = categorytbl::all();
        $book = booktbl::all(); 
        $items  =shoppingcarttbl::join('booktbls','booktbls.id','=','shoppingcarttbls.bookid')->where("userid",Auth::User()->id)->get(['shoppingcarttbls.id','booktbls.bookimage','booktbls.bookname','booktbls.bookprice']);

        $countclientwiseproduct =shoppingcarttbl::where("userid",Auth::User()->id)->count();

        return view('clienthome',compact('book','category','allrecord','items',"countclientwiseproduct"));
    }
    public function adminindex()
    {
      
        $allrecord = User::all();
        $category = categorytbl::all();
        $book = booktbl::all(); 
     
        return view('adminHome',compact("book","allrecord","category"));
    }

}

