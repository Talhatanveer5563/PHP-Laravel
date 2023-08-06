<?php
use App\Models\addresstbl;
?>
@extends('layouts.client_head_foot')
@section('title', 'Checkout')
@section('templatecontent')

 <!-- Page Content  -->
 <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
               <div class="row">
                  <div id="cart" class="card-block show p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-8">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Shopping Cart</h4>
                                 </div>
                              </div>
                              @if(session("alreadyadded"))
                           <p>{{session("alreadyadded")}}</p>
                              @endif
                              
                              <div class="iq-card-body">
                                 <ul class="list-inline p-0 m-0">
                                 @foreach($items as $i)
                                    <li class="checkout-product">
                                       <div class="row align-items-center">
                                          <div class="col-sm-2">
                                             <span class="checkout-product-img">
                                             <img class="img-fluid rounded" src="/images/book/{{$i->bookimage}}" alt=""></td>
                                             </span>
                                          </div>
                                          <div class="col-sm-4">
                                             <div class="checkout-product-details">
                                                <h5>{{$i->bookname}}</h5>
                                                <p class="text-success">In stock</p>
                                                <div class="price">
                                                   <h5>Rs.{{$i->bookprice}}</h5>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="row">
                                                <div class="col-sm-10">
                                                <div class="col-sm-7 col-md-6">
                                                         <button type="button" class="fa fa-minus qty-btn" id="btn-minus"></button>
                                                         <input type="text" id="quantity" value="0">
                                                         <button type="button" class="fa fa-plus qty-btn" id="btn-plus"></button>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <a href="/viewdelete/{{$i->id}}" data-original-title="Delete" class="text-dark font-size-20"><i class="ri-delete-bin-7-fill"></i></a>
                                               
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    @endforeach
                                
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="iq-card">
                              <div class="iq-card-body">
                                 
                                
                              
                                 <p><b>Price Details</b></p>
                                 
                                 <div class="d-flex justify-content-between mb-1">
                                    <span>Total</span>
                                    Rs.{{$i->bookprice}}
                                 </div>
                                 <div class="d-flex justify-content-between mb-1">
                                    <span>Big Discount</span>
                                    <span class="text-success">-Rs.20</span>
                                 </div>
                                 <div class="d-flex justify-content-between mb-1">
                                    <span>Estimated Tax</span>
                                    <span>Rs.15</span>
                                 </div>
                                
                                 <div class="d-flex justify-content-between">
                                    <span>Delivery Charges</span>
                                    <span class="text-success">Free</span>
                                 </div>
                                 <hr>
                                 <div class="d-flex justify-content-between">
                                    <span class="text-dark"><strong>Total</strong></span>
                                    <span class="text-dark"><strong>Rs.{{$i->bookprice}}</strong></span>
                                 </div>
                                 <?php
					$acceptorbook = addresstbl::where(['userid'=>Auth::User()->id,'status'=>'pending'])->first();
					if($acceptorbook=="")
					{
						?>
                                 <a id="place-order" href="javascript:void();" class="btn btn-primary d-block mt-3 next">Place order</a>

	<?php
					}
					else
					{
						?>

<a id="place-order" href="" class="btn btn-primary d-block mt-3 next">Pending</a>

						<?php
					}

					?>
					
                              </div>
                           </div>
                         
                        </div>
                     </div>
                  </div>
                  <div id="address" class="card-block p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-8">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Give Your Address</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form action="{{URL::to('/checkouts')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-3">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Full Name: *</label> 
                                             <input type="text" class="form-control" name="addressnameinput" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Mobile Number: *</label> 
                                             <input type="number" class="form-control" name="addressphoneinput" >
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Flat, House No: *</label> 
                                             <input type="text" class="form-control" name="addressinput" required="">
                                          </div>
                                       </div>
                                      
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Town/City: *</label> 
                                             <input type="text" class="form-control" name="addresscityinput" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Pincode: *</label> 
                                             <input type="text" class="form-control" name="addresspincodeinput" required="">
                                          </div>
                                       </div>
                                      
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="addtype">Address Type</label>
                                             <select class="form-control" name="addresstypeinput">
                                                <option>Home</option>
                                                <option>Office</option>
                                             </select>
                                          </div>
                                       </div>
                                       
                                       <div class="col-md-6">
                                          <button type="submit" class="btn btn-primary">Deliver Here</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="iq-card">
                        <div class="iq-card-body">
                                 <div class="d-flex justify-content-between align-items-center">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Payment Options</h4>
                                 </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                       <img src="images/booking/cart.png" alt="" height="40" width="50">
                                       <span>US Unlocked Debit Card 12XX XXXX XXXX 0000</span>
                                    </div>
                                 
                                 </div>
                                 <form class="mt-3">
                                    <div class="d-flex align-items-center">
                                       <span>Enter CVV: </span>
                                       <div class="cvv-input ml-3 mr-3">
                                          <input type="text" class="form-control" required=""> 
                                       </div>
                                       <button type="submit" class="btn btn-primary">Continue</button>
                                    </div>
                                 </form>
                                 <hr>
                                 <div class="card-lists">
                                    <div class="form-group">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" id="credit" name="customRadio" class="custom-control-input">
                                          <label class="custom-control-label" for="credit"> Credit / Debit / ATM Card</label>
                                       </div>
                                       <div class="custom-control custom-radio">
                                          <input type="radio" id="netbaking" name="customRadio" class="custom-control-input">
                                          <label class="custom-control-label" for="netbaking"> Net Banking</label>
                                       </div>
                                       <div class="custom-control custom-radio">
                                          <input type="radio" id="emi" name="emi" class="custom-control-input">
                                          <label class="custom-control-label" for="emi"> EMI (Easy Installment)</label>
                                       </div>
                                       <div class="custom-control custom-radio">
                                          <input type="radio" id="cod" name="cod" class="custom-control-input">
                                          <label class="custom-control-label" for="cod"> Cash On Delivery</label>
                                       </div>
                                    </div>
                                 </div>
                                 <hr>
                                 
                              </div>
                      
                       
                              
                              </div>
                    
                    </div>
                        </div>
                    
                     </div>
                  </div>
                     </div>
                  </div>
                
               </div>
            </div>
         </div>
      </div>
      @if(session("delivermessage"))
            <strong>{{session("delivermessage")}}</strong>
            @endif
      <!-- Wrapper END -->
      @endsection