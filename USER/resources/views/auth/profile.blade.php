@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"  >
        <div class="col-md-10    col-md-offset-1" >
            <div class="panel panel-default" style="min-height: 1000px; ">
                <div class="panel-heading" style="height: 300px; color:white; background-image: url('/uploads/UserCover/{{Auth::user()->avatarCover}}'); ">
                	<h1 style="padding-top: 200px; text-shadow: -1px -1px 0 black ,1px -1px 0 black,-1px 1px 0 black,1px 1px 0 black;  ">
                	@if(Auth::user())<body style="background-color: pink; "></body>@endif
                	<B >{{Auth::user()->name}}'s profile</B>
                	<img src="/uploads/User/{{Auth::user()->avatar}}" style="width: 150px; height: 150px; float: left;border-radius: 50%; margin-right: 25px;">
                	 <a type="input" style="border: solid 1px black; border-radius: 5px; padding: 5px; float: right; font-size: 15px;" class="button btn-primary" onclick="document.getElementById('Update_Cover_pic').style.display='block'"><i class="fa fa-camera" ></i></a>
                    </h1>

                	 <a type="input" style="border: solid 1px black; border-radius: 5px; padding: 5px;" class="button btn-primary" onclick="document.getElementById('Update_pic').style.display='block'"><i class="fa fa-camera"></i></a>

                	@include('auth.profilePicUpdateForm')
                    
                <div class="panel-body">
                    <body>
                    <div>
                    	<h3 style="padding: 20px; padding-top: 100px;">
                    		<table class="table table-striped table-bordered table-hover" >
                    			<tr>
                    			<td>ID:</td>
                    			<td>{{Auth::User()->id}}</td>	
                    			</tr>
                    			<tr>
                    			<td>Name:</td>
                    			<td>{{Auth::User()->name}}</td>	
                    			</tr>
                    			<tr>
                    			<td>Email:</td>
                    			<td>{{Auth::User()->email}}</td>	
                    			</tr><tr>
                    			<td>Address:</td>
                    			<td>{{Auth::User()->address}}</td>	
                    			</tr><tr>
                    			
                    			<td>Gender:</td>
                    			<td>{{Auth::User()->Gender}}</td>	
                    			</tr>
                    		</table>
                    	</h3>

                    	
                    </div><br><br><br>	
                    <div>
                    <?php $id=Auth::user()->id ?>
 					
                    </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>  
@include('auth.coverPicUpdateForm')
@include('auth.editProfile')
@include('auth.passwords.changePassword')
@endsection