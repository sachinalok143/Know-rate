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
.red{
	color: red;
	background-color: red;
}
.yellow
{
	color: yellow;
	background-color: yellow;	
}
.green{
	color: green;
	background-color: green;

}
</style>
@endsection

<!-- line modal -->

<div class="modal fade"    id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

			<h3 class="modal-title" id="lineModalLabel">Reviews on <%item.name%></h3>
		</div>
		<div class="modal-body">
	
		<div  ng-repeat="review in itemReviews">
		
            <div class="panel panel-default" >
	            <div class="panel-heading" style="">
	            	<b><%review.userId%></b><small style="color:blue;"> <%review.created_at%></small>
	            </div>
	            <div class="panel-body" style="">
	            <span class="col-md-8">		
	    			<%review.review%>
	    			</span>
	            	<span class="col-md-4" >
		            <h8>
		            Item Rating
		            <small class="pull-right"><%review.rating%>%</small>
		          	</h8>
		          	  <span ng-class="getClass(review.rating)">
	          			<div class="progress xs">
				            <div class="progress-bar progress-bar-aqua" style="width: <%review.rating%>%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
				      	        <span class="sr-only"><%review.rating%>% Complete</span>
	            			</div>
	          			</div>
	          		  </span>
	           		</span>
	            </div>
	         </div>
	        </div>
		  </table>
		</div>
		<div>
		</div>
		<div class="panel-footer">
		Improve your item/service quality for get more good reviews.
		</div>
	</div>
</div>
</div>

