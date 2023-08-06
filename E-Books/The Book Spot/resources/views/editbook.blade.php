@extends('layouts.admin_head_foot')
@section('title', 'Edit Book')
@section('templatecontent')
<form action="{{URL::to('/bookedit')}}" method="post">
@csrf
<div class="form-group">
                                 <label>Book Name:</label>
                                 <input type="text" class="form-control" name="booknameinput">
                              </div>
                              <div class="form-group">
                                 <label>Book Category:</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="bookcategoryinput">
                                    <option selected="" disabled="">Book Category</option>
                                    <option>General Books</option>
                                    <option>History Books</option>
                                    <option>Horror Story</option>
                                    <option>Arts Books</option>
                                    <option>Film & Photography</option>
                                    <option>Business & Economics</option>
                                    <option>Comics & Mangas</option>
                                    <option>Computers & Internet</option>
                                    <option> Sports</option>
                                    <option> Travel & Tourism</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Book Author:</label>
                                 <select class="form-control" name="bookauthorinput">
                                    <option selected="" disabled="">Book Author</option>
                                    <option>Jhone Steben</option>
                                    <option>John Klok</option>
                                    <option>Ichae Semos</option>
                                    <option>Jules Boutin</option>
                                    <option>Kusti Franti</option>
                                    <option>David King</option>
                                    <option>Henry Jurk</option>
                                    <option>Attilio Marzi</option>
                                    <option>Argele Intili</option>
                                    <option>Attilio Marzi</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Book Image:</label>
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="bookimageinput"accept="image/png, image/jpeg">
                                    <label class="custom-file-label">Choose file</label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Book pdf:</label>
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="bookpdfinput"accept="application/pdf, application/vnd.ms-excel">
                                    <label class="custom-file-label">Choose file</label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Book Price:</label>
                                 <input type="text" class="form-control" name="bookpriceinput">
                              </div>
                        
    <button type="submit" class="btn btn-primary form-control">Edit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
    </div><!--input-contain-->
</form>
@endsection