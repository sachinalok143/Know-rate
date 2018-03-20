@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"  >
        <div class="col-md-10    col-md-offset-1" >
            <div class="panel panel-default" style="min-height: 1000px; ">
                <div class="panel-heading" style="height: 300px; color:white; background-image: url('/uploads/UserCover/{{$user->avatarCover}}'); ">
                	<h1 style="padding-top: 200px; text-shadow: -1px -1px 0 black ,1px -1px 0 black,-1px 1px 0 black,1px 1px 0 black;  ">
                	@if($user)<body style="background-color: pink; "></body>@endif
                	<B >{{$user->name}}'s profile</B>
                	<img src="/uploads/User/{{$user->avatar}}" style="width: 150px; height: 150px; float: left;border-radius: 50%; margin-right: 25px;">
                    </h1>
                <div class="panel-body" style="color: black;">
                    <body>
                    <div>
                    	<h3 style="padding: 20px; padding-top: 100px;">
                    		<table class="table table-striped table-bordered table-hover" >
                    			<tr>
                    			<td>Name:</td>
                    			<td>{{$user->name}}</td>	
                    			</tr>
                    			<tr>
                    			<td>Email:</td>
                    			<td>{{$user->email}}</td>	
                    			</tr>
                                <tr>
                                <td>Gender:</td>
                                <td>{{$user->Gender}}</td>   
                                </tr> 
                                <tr>
                    			<td>Address:</td>
                    			<td>{{$user->address}}</td>	
                    			</tr>
                                <td>Remark:</td>
                                <td>{{$user->remark}}</td>   
                                </tr>
                    		</table>
                    	</h3>

                    	
                    </div><br><br><br>	
                    <div>
                    <?php $id=$user->id ?>
 					
                    </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection