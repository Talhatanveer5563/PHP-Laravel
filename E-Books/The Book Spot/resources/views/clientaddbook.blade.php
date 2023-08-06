@extends('layouts.client_head_foot')
@section('title', 'Add Book')
@section('templatecontent')
   <!-- Page Content  -->
   <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Book</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="{{URL::to('/addbook')}}" method="post" enctype="multipart/form-data">
                               @csrf
                              <div class="form-group">
                                 <label>Book Name:</label>
                                 <input type="text" class="form-control" name="booknameinput">
                              </div>
                              <div class="form-group">
                                 <label>Book Category:</label>
                                 
                                 <input type="text" class="form-control" name="bookcategoryinput">
                                 <select name="" class="form-control" name="bookcategoryinput">

                                 </select>
                                 
                              </div>
                              <div class="form-group">
                                 <label>Book Author:</label>
                              
                                 <input type="text" class="form-control" name="bookauthorinput">
                              </div>
                              <div class="form-group">
                                 <label>Book Image:</label>
                                 <div class="custom-file">
                                 <label class="custom-file-label">Choose file</label>
                                    <input type="file" class="custom-file-input" name="bookimageinput">
                                 
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Book PDF:</label>
                                 <div class="custom-file">
                                 <label class="custom-file-label">Choose file</label>
                                    <input type="file" class="custom-file-input" name="bookpdfinput"accept="application/pdf, application/vnd.ms-excel">
                                    
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Book Price:</label>
                                 <input type="text" class="form-control" name="bookpriceinput">
                              </div>
                        
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-danger">Reset</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      @endsection