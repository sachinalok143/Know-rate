@section('your_css')
<style type="text/css">
	.center {
    margin-top:50px;   
}

.modal-header {
	padding-bottom: 5px;
}

.modal-footer {
    	padding: 0;
	}
    
.modal-footer .btn-group button {
	height:40px;
	border-top-left-radius : 0;
	border-top-right-radius : 0;
	border: none;
	border-right: 1px solid #ddd;
}
	
.modal-footer .btn-group:last-child > button {
	border-right: 0;
}
</style>
@endsection

<!-- line modal -->
<div class="col-md-6" >
<div class="modal fade"    id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

			<h3 class="modal-title" id="lineModalLabel">Reviews on <%item.name%></h3>
		</div>
		<div class="modal-body">
		
		<div  ng-repeat="review in reviews">
		 
            <div class="panel panel-default" >
	            <div class="panel-heading" style="">
	            	<b><%review.userId%></b><small style="color:blue;"> <%review.created_at%></small>
	            </div>
	            <div class="panel-body" style="">
	            <span class="col-md-8">		
	    			<%review.review%><br>
	    			</span>
	            	<span class="col-md-4" >
		            <h8>
		            Item Rating
		            <small class="pull-right"><%review.rating%>%</small>
		          	</h8>
	          			<div class="progress xs">
				            <div class="progress-bar progress-bar-aqua" style="width: <%review.rating%>%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
				      	        <span class="sr-only"><%review.rating%>% Complete</span>
	            			</div>
	          			</div>
	           		</span>
	            </div>
	         </div>
	       </div>
		</div>
		<div>
		</div>
		<div class="panel-footer">
		@if(Auth::user())
				<div class="panel panel-default" style="background-color:#C68ADC;float: left;" >
					<div class="panel-heading" style="">
					<b>Your Review</b>
					</div>
					<div class="panel-body">
						<form>
						<div>
							<label>Content:</label><br>
							<textarea ng-model="reviewForm.review" required></textarea>
						</div>
						<div>
							<label>Rating<small> out of 100%</small></label>
							<input type="number" max=100 min=0  ng-model="reviewForm.rating" class="form-control" name="" required>
						</div>	<br>
							<div class="progress xs">
					            <div class="progress-bar progress-bar-aqua" style="width: <%reviewForm.rating%>%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
					      	        <span class="sr-only"><%reviewForm.rating%>% Complete</span>
		            			</div>
	          				</div>
	          				
	          				<button type="submit"   ng-click="addReview(item.id)" class="btn btn-success form-control">Save</button>
						</form>
					</div>
			</div>
			<center>
				<div ng-if="reviewloader" style=" padding-left: 150px; padding-top:150px; " >
					<div class="loader" style="width:10px;height: 10px;" ></div><br><br>
					<div>please wait.....your reveiw is saving....</div>
				</div>
			</center>
		@else
		<div class="" style="color: brown;">
			Log in for give a review!
		</div>
		@endif
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-danger" data-dismiss="modal"  role="button">Close</button>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>
</div>
