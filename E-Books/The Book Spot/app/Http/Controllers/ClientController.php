<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shoppingcarttbl;
use App\Models\booktbl;
use App\Models\categorytbl;
use App\Models\authortbl;
use App\Models\User;
use App\Models\addresstbl;
use Auth;
class ClientController extends Controller
{
    public function clientaddbookfunction()
    {    $items =shoppingcarttbl::all();
        $countclientwiseproduct =shoppingcarttbl::where("userid",Auth::User()->id)->count();
        $book = booktbl::all(); 
        $allrecord = User::all();
        $category = categorytbl::all();
        $author = authortbl::all();
return view("clientaddbook",compact("category","author","allrecord","book","items","countclientwiseproduct"));
    }

    public function clientaddbook(Request $req)
    {
   
    $book = new booktbl();
    $book->bookname=$req->booknameinput;
    $book->bookcategory=$req->bookcategoryinput;
    $book->bookauthor=$req->bookauthorinput;
    $book->bookprice=$req->bookpriceinput;
    
    $bookimage=$req->file("bookimageinput");
    $ext = rand().".".$bookimage->getClientOriginalName();
    $bookimage->move("images/book/",$ext);
    $book->bookimage=$ext;
    $bookpdf=$req->file("bookpdfinput");
    $pdf = rand().".".$bookpdf->getClientOriginalName();
    $bookpdf->move("pdf/",$pdf);
    $book->bookpdf=$pdf;
$book->save();

$category = new categorytbl();
$author = new authortbl();
$category->categoryname = $req->bookcategoryinput;
$author->authorname = $req->bookauthorinput;


$category->save();
$author->save();
    return redirect()->back();
    }
    public function clientsbookfunction(Request $req)
    {
       
        $bookname = booktbl::where("bookname",'like'.'%'.$req->bookname.'%')->where("bookcategory",'like'.'%'.$req->bookcategory.'%')->get();
        $countclientwiseproduct =shoppingcarttbl::where("userid",Auth::User()->id)->count();
        $items =shoppingcarttbl::all();
        $allrecord = User::all();
        $category = categorytbl::all();
        $book = booktbl::all(); 
return view("clientsbook",compact('book','category','allrecord','bookname','items','countclientwiseproduct'));
    }

    public function orderlistfunction(Request $req)
    {
        $address = addresstbl::all(); 
        $bookname = booktbl::where("bookname",'like'.'%'.$req->bookname.'%')->where("bookcategory",'like'.'%'.$req->bookcategory.'%')->get();
        $countclientwiseproduct =shoppingcarttbl::where("userid",Auth::User()->id)->count();
        $items =shoppingcarttbl::all();
        $allrecord = User::all();
        $category = categorytbl::all();
        $book = booktbl::all(); 
return view("orderlist",compact('book','category','allrecord','bookname','items','countclientwiseproduct','address'));
    }
    public function checkoutfunction()
    {
        $allrecord = User::all();
        $items  =shoppingcarttbl::join('booktbls','booktbls.id','=','shoppingcarttbls.bookid')->where("userid",Auth::User()->id)->get(['shoppingcarttbls.id','booktbls.bookimage','booktbls.bookname','booktbls.bookprice']);
        $countclientwiseproduct =shoppingcarttbl::where("userid",Auth::User()->id)->count();
        $address = addresstbl::all(); 
        $items = shoppingcarttbl::all();
        return view("checkout",compact("items","allrecord","countclientwiseproduct","address"));
    }
    public function checkoutpost(Request $req)
    {
        $address = new addresstbl();
        $address->userid=Auth::User()->id;
        $address->fullname=$req->addressnameinput;
        $address->phone=$req->addressphoneinput;
        $address->address=$req->addressinput;
        $address->city=$req->addresscityinput;
        $address->addresstype=$req->addresstypeinput;
        $address->pincode=$req->addresspincodeinput;
        $address->status="pending";
        $address->save();
        return redirect()->back();
    }
  
    public function addtocart($id)
    {
        if(Auth::User()==null)
        {
            return route("login");
        }
        else
        {
            $itemfindindatabase = shoppingcarttbl::where(['bookid'=>$id,'userid'=>Auth::User()->id])->first();
            if($itemfindindatabase!="")
            {
                return redirect("/checkout")->with("alreadyadded","Item is already added into the cart");

            }
            else
            {

                $cart = new shoppingcarttbl();
                $cart->bookid=$id;
                $cart->userid = Auth::User()->id;
                $cart->save();
                return redirect("/checkout");
            }
         
        }

 
    }
    public function deletecart($id)
    {
        $book_id= shoppingcarttbl::find($id);
        $book_id->delete();
        return redirect()->back();
    }

}
