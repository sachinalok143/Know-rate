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
<div class="modal fade"    id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

			<h3 class="modal-title" id="lineModalLabel">Change Password</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			<form ng-submit="resetPassword({{Auth::user()->id}})">
              <div class="form-group">
                <label >Old password</label>
                <input type="password" class="form-control" id="password" ng-model="resetPass.password" placeholder="Enter old password">
              </div>
              <div class="form-group">
                <label >New Password</label>
                <input type="password" class="form-control" ng-model="resetPass.newPassword" id="new-password" placeholder="Enter New Password">
              </div>
              <div class="form-group">
                <label >Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_new_password" placeholder="Confirm New Password" ng-model="resetPass.confirmNewPassword">
              </div>
              <button type="submit" class="btn btn-default"><span ng-if="!passwordloader"> Submit</span> <center ng-if="passwordloader">
				<div style="width: 100px;">
					<div class="loader" style="width:5px;height: 5px;" ></div>
				</div>
			</center></button>
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
