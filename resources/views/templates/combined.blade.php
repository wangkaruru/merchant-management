 @include('masterview')
<div class="row jumbotron text-align-left font-ubuntu ">

<div class=" row color-blue font-open padded-md">
    <h5 >Action</h5>
</div>


<div class="row padded-md " >
	
	@if (session('status0'))
		<h6 class="error">{{session('status0') }}</h6>	
	@elseif (session('status1'))
		<h6 class="success">{{ session('status1') }}</h6>
	@elseif (session('status3'))
		<h6 class="info ">{{ session('status3') }}</h6>	
	@endif
	<h6 class="info ">
		{{ $errors->first('msisdn') }}
	    
	</h6>	

	{!! Form::open(['url' => 'viewcustomer']) !!}
	<br>
	<input type="text" name="msisdn" class="font-md" autofocus=""  required="" placeholder="enter phone no." style="padding-right:10px;" >
        <input type="submit" class="btn btn-success padded-md font-ubuntu" value="Search" >
        <br><br>
        <div class="search-results">
       @if(isset($first_name))
        <br><br>
        <div class="col-md-2">
                        <div class="color-blue font-ubuntu">
                            <b>{{$first_name." ". $middle_name." ". $last_name}}</b>
                        </div>
                        <div class="">
                        <img src="{{ asset('images/user3.jpg') }}" alt="user" class="center"   style="max-width:120px;max-height:100px;text-align:center;"  >  
                        </div>
                        
                    </div>
                    <div class="col-md-5 font-small">
                        <div class="font-ubuntu row">
                           <div class="col-md-5 padded">
                              <b>Phone Number</b><br>
                              {{$msisdn}}
                           </div>
                           <div class="col-md-5 padded">
                              <b>ID Number</b><br>
                              {{$id_number}}
                           </div>
                        </div>
                        <hr>
                        <div class="font-ubuntu row">
                           <div class="col-md-5 padded">
                              <b>Registration Date</b><br>
                             {{$created_date}}
                           </div>
                          <div class="col-md-5 padded">
                              <b>Gender</b><br>
                             {{$gender}}
                           </div>
                        </div>
                        <hr>
                         <div class="font-ubuntu row">
                           <div class="col-md-5 padded">
                              <b>Email Address</b><br>
                                {{$email_address}}
                           </div>
                           
                        </div>                        
                        <hr> 
                        
                        
                        
                    </div>
                   <div class="col-md-5 font-small">
                        <div class="font-ubuntu row">
                           <div class="col-md-5 padded">
                              <b>Available Balance</b>                             
                           </div>
                           <div class="col-md-5 padded">                            
                             {{$available_balance}}
                           </div>
                        </div>
                        <hr>
                         <div class="font-ubuntu row">
                           <div class="col-md-5 padded">
                              <b>Actual Balance</b>
                              
                           </div>
                           <div class="col-md-5 padded">                            
                              {{$actual_balance}}
                           </div>
                        </div>
                        <hr> 
                        <div class="font-ubuntu row">
                           <div class="col-md-5 padded">
                              <b>Loyalty Points</b>                              
                           </div>
                           <div class="col-md-5 padded">                            
                             {{$loyalty_point}}
                           </div>
                        </div>
                        <hr> 
                        <div class="font-ubuntu row">
                           <div class="col-md-5 padded">
                              <b>Frozen Amount</b>
                              
                           </div>
                           <div class="col-md-5 padded">                            
                             {{$frozen_amount}}
                           </div>
                        </div>
                        <hr>
                        <div class="font-ubuntu row">
                           <div class="col-md-5 padded">
                              <b>In Resersal Amount</b>                              
                           </div>
                           <div class="col-md-5 padded">                            
                             {{$in_reversal_amount}}
                           </div>
                        </div>
                        
                        
                  </div>

       @endif
       
                              
 
</div>



{!! Form::close() !!}
</div>

     </div><!-- close main content -->


     <div class="panel-group">
        <div class="panel panel-default">                  
         <a data-toggle="collapse" href="#additional">
             <div class="panel-heading">
               <h5 class="panel-title"> <b>Additional Details</b> <i class=" ic1 pull-right">+</i> </h5>
            </div>
          </a>
                    
         <div id="additional" class="panel-collapse collapse">
         <div class="panel-body">
           <hr>                       
             ---CONTENT HERE---
                        
         </div>                   
         </div>
      </div>
    </div>



     <div class="panel-group">
        <div class="panel panel-default">                  
         <a data-toggle="collapse" href="#business">
             <div class="panel-heading">
               <h5 class="panel-title"> <b>Business Details</b> <i class=" ic1 pull-right">+</i> </h5>
            </div>
          </a>
                    
         <div id="business" class="panel-collapse collapse">
         <div class="panel-body">
           <hr>                       
             ---CONTENT HERE---
                        
         </div>                   
         </div>
      </div>
    </div>


 <div class="panel-group">
        <div class="panel panel-default">                  
         <a data-toggle="collapse" href="#agent">
             <div class="panel-heading">
               <h5 class="panel-title"> <b>Agent Details</b> <i class=" ic1 pull-right">+</i> </h5>
            </div>
          </a>
                    
         <div id="agent" class="panel-collapse collapse">
         <div class="panel-body">
           <hr>                       
             ---CONTENT HERE---
                        
         </div>                   
         </div>
      </div>
    </div>

 <div class="panel-group">
        <div class="panel panel-default">                  
         <a data-toggle="collapse" href="#biller">
             <div class="panel-heading">
               <h5 class="panel-title"> <b>Biller Details</b> <i class=" ic1 pull-right">+</i> </h5>
            </div>
          </a>
                    
         <div id="biller" class="panel-collapse collapse">
         <div class="panel-body">
           <hr>                       
             ---CONTENT HERE---
                        
         </div>                   
         </div>
      </div>
    </div>

<br><br><br><br>





    

 @include('footer')
