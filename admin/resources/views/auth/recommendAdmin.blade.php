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
<div class="col-md-6">
<div class="modal fade"  my-modal3  id="recommendatio-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

			<h3 class="modal-title" id="lineModalLabel">Recommendations</h3>
		</div>
		<div class="modal-body" >
		<div >
		<label> Search by any keywords:</label>
		<input type="text" class="form-control" placeholder="search by keywords" ng-model="keywords" name="">
		</div>
		<br>
		  <div class="panel panel-default" ng-repeat="recommendation in recommendations|filter:keywords">
		    <div class="panel-body">
		    <label>Id:</label>	<%recommendation.id%><br>
		    <label>Recommended Contact:</label><a href="tel:"><%recommendation.contact%></a><br>
		    <label>Recommended by:</label><%recommendation.superUser.name%>
		    <br><a ><%recommendation.created_at%></a>
		    <button class="btn btn-danger" style="float: right;" ng-click="deleteAdminRecommendation(recommendation.id)">Delete</button>
		    </div>
		  </div>	


			<div ng-if="{{Auth::user()->superUser}}" style="border:solid 1px black;border-radius: 5px; padding: 10px;">
            <!-- content goes here -->
            <h3><b><center>Fill form  to <br>Recommend an andmin</center></b></h3>
			<form ng-submit="recommendAdmin()">
              <div class="form-group">
                <label >Contact no. of recommending Admin</label>
                <input type="text" class="form-control" ng-model="recomendation.contact" pattern="[0-9]{10}" placeholder="Contact number">
              </div>
              <div class="form-group">
                <label >Confirm Contact</label>
                <input type="text" class="form-control" ng-model="recomendation.confirmContact" pattern="[0-9]{10}"  placeholder="Confirm Recommending Contact">
              </div>
              <button type="submit" class="btn btn-default"><span ng-if="!recommendationloader"> Submit</span> <center ng-if="recommendationloader">
				<div style="width: 100px;">
					<div class="loader" style="width:5px;height: 5px;" ></div>
				</div></center></button>
            </form>
            </form>
		</div>
		<div class="modal-footer">
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
