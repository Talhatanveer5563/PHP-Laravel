@extends('layouts.admin_head_foot')
@section('title', 'Book List')
@section('templatecontent')

 <!-- Page Content  -->
 <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between d-block">
                        <div class="iq-header-title">
                              <h4 class="card-title">Order Lists</h4>
                           </div>
                         
                        
                        </div>
                         <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 3%;">No</th>               
                                        <th style="width: 10%;">Name</th>
                                        <th style="width: 10%;">Phone</th>
                                        <th style="width: 15%;">Address</th>
                                        <th style="width: 14%;">Address Type</th>
                                        <th style="width: 7%;">Pincode</th>
                                        
                                        <th style="width: 7%;">Status</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach($address as $d)
                                    <tr>
                                    <td>{{$d->id}}</td>
                                    
      <td>{{$d->fullname}}</td>
      <td>{{$d->phone}}</td>
      <td>{{$d->address}}</td>
      <td>{{$d->addresstype}}</td>
      <td>{{$d->pincode}}</td>
      <td class="text-capitalize">{{$d->status}}</td>
    
                                        
                                          
                                        <td class="text-center">
                                           <div class="flex align-items-center list-user-action">
                                           
                                             
                                             <button class="btn btn-primary" href="/bookdelete/{id}">Delivered<i class="ri-login-box-line ml-2"></i></button>
                                          </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            
                            
                          </table>
</div>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   <!-- Update Modal -->
   <div style="height:600px;" class="modal fade" id="btnupdatemodel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Product</h5>
              <button type="button" id="cancelbtn" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body" >
        
          <form action="{{URL::to('/bookedit')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
                                 <label>Book Name:</label>
                                 <input type="text" class="form-control" name="booknameinput" id="booknameinput">
                              </div>
                              <div class="form-group">
                                 <label>Book Category:</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="bookcategoryinput" id="bookcategoryinput">
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
                                 <select class="form-control" name="bookauthorinput" id="bookauthorinput">
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
                                    <input type="file" class="custom-file-input" name="bookimageinput"id="bookimageinput"accept="image/png, image/jpeg">
                                    <label class="custom-file-label">Choose file</label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Book pdf:</label>
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="bookpdfinput"id="bookpdfinput"accept="application/pdf, application/vnd.ms-excel">
                                    <label class="custom-file-label">Choose file</label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Book Price:</label>
                                 <input type="text" class="form-control" name="bookpriceinput"id="bookpriceinput">
                              </div>
                        
    <button type="submit" class="btn btn-primary">Edit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
    </div><!--input-contain-->
</form>
        </div>
        </div>
        </div>
        </div>
      
  
 <!-- Wrapper END -->
   @endsection    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
   $(document).ready(function()
    {
 
       $(document).on("click","#btnupdateproduct",function()
      {
        var uid=$(this).attr("data-id");
             console.log(uid);

               //$("#btnupdatemodel").modal("show");

               $.ajax({
          url:"/bookupdate",
          type:"POST",
          data:"sid="+uid +"&_token={{csrf_token()}}",
          success: function (bookupdatefunction) {
         //console.log(updateproduct);
        var res =JSON.parse(bookupdatefunction);
        $("#btnupdatemodel").modal("show");
        $("#booknameinput").val(res["bookname"]);
        $("#bookcategoryinput").val(res["bookcategory"]);
        $("#bookauthorinput").val(res["bookauthor"]);
        $("#bookimageinput").val(res["bookimage"]);
        $("#bookpdfinput").val(res["bookpdf"]);
        $("#bookpriceinput").val(res["bookprice"]);
          }
        });
    });

    $(document).on("click","#closebtn",function()
      {
        $("#btnupdatemodel").modal("hide");

      });

      $(document).on("click","#cancelbtn",function()
      {
        $("#btnupdatemodel").modal("hide");

      });
  }); 
</script>