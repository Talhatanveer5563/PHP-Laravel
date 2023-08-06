<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\booktbl;
use App\Models\categorytbl;
use App\Models\authortbl;
use App\Models\shoppingcarttbl;
use PDF;
use Response;
use DB;
class admincontroller extends Controller
{
    public function bookpdffunction()
    {
      $book = booktbl::all(); 
      return view("bookpdf",compact('book'));
    }
       
  

  public function userprofile()
  {
    $items =shoppingcarttbl::all();
    $allrecord = User::all();
    $book = booktbl::all(); 
    return view("userprofile",compact('allrecord','book','items'));
  }
    public function fetchfunction(Request $req)
    {
        
        
        $allrecord = User::all();
        $book = booktbl::all(); 
        return view("userlist",compact('allrecord','book'));
    }
   
    public function deletefunction($id)
    {
        $user_id= User::find($id);
        $user_id->delete();
        return redirect()->back()->with('deletemessage','Data has been deleted!');
    }

    public function updatefunction($id)
    {
        $allrecord = User::all();
        $book = booktbl::all(); 
       $detail=User::find($id);
        return view("editdata",compact("detail",'book','allrecord'));
    }

    public function edit(Request $req,$id)
    {
        
        $detail=User::find($id);
        $detail->name=$req->nameinput;
        $detail->email=$req->emailinput;
        $detail->phone=$req->phoneinput;
        $detail->country=$req->countryinput;
        $detail->city=$req->cityinput;
        $detail->password=$req->passinput;
        $detail->update();
        return redirect('/userlist')->with('updatemsg','Data has been updated!');
    }
//books
    public function addbookfunction()
    {    $items =shoppingcarttbl::all();

        $book = booktbl::all(); 
        $allrecord = User::all();
        $category = categorytbl::all();
        $author = authortbl::all();
return view("addbook",compact("category","author","allrecord","book","items"));
    }

    public function addbook(Request $req)
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


    public function generatePDF($id,Request $request)
    {
        
        $bookfind = booktbl::find($id);
    $file= public_path(). "/"."pdf/".$bookfind->bookpdf;

    $headers = array(
              'Content-Type: application/pdf',
            );

    return Response::download($file, 'filename.pdf', $headers);
    }


    public function fetchbookfunction(Request $req)
    {
       
       
        
        $bookname = booktbl::where("bookname",'like'.'%'.$req->bookname.'%')->where("bookcategory",'like'.'%'.$req->bookcategory.'%')->get();
        $items =shoppingcarttbl::all();
        $allrecord = User::all();
        $category = categorytbl::all();
        $book = booktbl::all(); 
return view("fetchbook",compact('book','category','allrecord','bookname','items'));
    }

   
    
    
    public function deletebookfunction($id)
    {
        $book_id= booktbl::find($id);
        $book_id->delete();
        return redirect()->back();
    }
    public function bookupdatefunction(Request $req)
    {
        $bookfetch = DB::table("booktbls")->where("id",'=',$req->post("sid"))->get();
        foreach($bookfetch as $p)
        {
            $books = $p;
            echo json_encode($books);
        }
      
    }

    public function bookedit(Request $req,$id)
    {
        $detail=booktbl::find($id);
        $detail->bookname=$req->booknameinput;
        $detail->bookcategory=$req->bookcategoryinput;
        $detail->bookauthor=$req->bookauthorinput;
        $detail->bookprice=$req->bookpriceinput;
        $bookimage=$req->file("bookimageinput");
        $ext = rand().".".$bookimage->getClientOriginalName();
        $bookimage->move("images/book/",$ext);
        $book->bookimage=$ext;
        $bookpdf=$req->file("bookpdfinput");
        $pdf = rand().".".$bookpdf->getClientOriginalName();
        $bookpdf->move("pdf/",$pdf);
        $book->bookpdf=$pdf;
        $detail->update();
        return redirect('/fetchbook')->with('updatemsg','Data has been updated!');
    }

}
