@extends('layouts.admin_head_foot')
@section('title', 'User List')
@section('templatecontent')

  <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">User List</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 
                                
                              </div>

                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                              <!--   import
 -->                                   </div>

                              </div>
                           </div>
                           <table class="table table-striped table-bordered mt-4"  aria-describedby="user-list-page-info">
                             <thead class="text-center">
                                 <tr>
                                 <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                             @foreach($allrecord as $a)
      <tr class="text-center">
      <td>{{$a->id}}</td>
      <td class="text-capitalize">{{$a->name}}</td>
      <td>{{$a->email}}</td>
      <td>{{$a->phone}}</td>
      <td class="text-capitalize">{{$a->country}}</td>
      <td class="text-capitalize">{{$a->city}}</td>
      <td>{{$a->Date}}</td>
      
                             
      <td>
      <div class="flex align-items-center list-user-action">

                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="/update/{{$a->id}}"><i class="ri-pencil-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="/delete/{{$a->id}}"><i class="ri-delete-bin-line"></i></a>
                                       </div>
</td>
</tr>
@endforeach
                            </tbody>
                           </table>
                        </div>
                           <div class="row justify-content-between mt-3">
                              <div id="user-list-page-info" class="col-md-6">
                                 <span>Showing 1 to 5 of 5 entries</span>
                              </div>
                              <div class="col-md-6">
                                 <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                       <li class="page-item disabled">
                                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                       </li>
                                       <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                                       <li class="page-item">
                                          <a class="page-link" href="#">Next</a>
                                       </li>
                                    </ul>
                                 </nav>
                              </div>
                           </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- Wrapper END -->
   @endsection