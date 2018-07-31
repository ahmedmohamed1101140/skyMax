@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')
	<div id="page-inside4" class="insd ">
    <div class="top-bg"></div>
    	
          <div class="logo">
            	<a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
            </div>
         
   	  <div class="team-bg"></div>
          
		
    </div>
    <div class="contents">
      <div class="tm-tp-br">
    	<div class="container-fluid">
            <div class="col-sm-12 col-md-12 no-pd "> 
            	
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<ul class="cl-map">
                    	<li class="gry"><i class="fa fa-circle"></i> Not Qualified</li>
                        <li class="blck"><i class="fa fa-circle"></i> Qualified</li>
                        <li class="blu"><i class="fa fa-circle"></i> Active</li>
                    
                    </ul>
                </div>
                <div class="col-md-3 col-sm-5 col-xs-12 pull-right">
                 <div id="srch">
                	<div class="search-bar">
                     <form  class="icon">
                        
                        <input type="text" placeholder="Search for user by ID">
                        <input type="submit" value="Search">
                     </form>
        
       			   </div>
        		 </div>
                </div>
   

    
   			</div>
        </div>
      </div>
      <div class="orgchrt">
      	<div class="container">
            <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
             <div class="col-md-5 col-xs-12 col-sm-6 text-center no-pd">
               <h3>Total Left = <span>210 IR’s</span></h3>
               <h3>Qualified  = <span>210 IR’s</span></h3>
             </div>
             
             <div class="col-md-5 col-xs-12 col-sm-6 text-center no-pd">
               <h3>Total Right = <span>210 IR’s</span></h3>
               <h3>Qualified  = <span>210 IR’s</span></h3>
             </div>
             
            </div>
        	<div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
             
             <div class="col-md-6 col-xs-12 col-sm-12 no-pd col-md-offset-2">
              <div class="tm-mbr">
               <i class="fa fa-4x fa-user"></i>
               </div>
               <div class="mbr-box1">
                <div class="tm-mbr1">
                <h4>
 				 <a  data-toggle="collapse" href="{{asset("assets/")}}/#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Ali
                 <i class="fa fa-chevron-down"></i>
                 </a>
				</h4>
				 <div class="collapse" id="collapseExample1">
                  <div class="mbr-sub1">
                  <h4>Ahmed</h4>
				 </div>
                  <div class="mbr-sub2">
                  <h4><a href="{{asset("assets/")}}/#squarespaceModal-8" data-toggle="modal" ><i class="fa fa-plus"></i></a></h4>
				 </div>
				</div>
                </div>
                
                </div>
                <div class="mbr-box2">
                 <div class="qulifd">
                  <h4>Ahmed</h4>
				 </div>
                </div>
             </div>
             
             
            </div>
        </div>
      </div>  
    
    </div>
@endsection