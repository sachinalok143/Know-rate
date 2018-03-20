<div id="Update_pic" class="modal" style="color: black;">
					  <span onclick="document.getElementById('Update_pic').style.display='none'" class="close" title="Close Modal">X</span>
					   <div class="col-lg-8 col-md-offset-2" style="position:absolute; top:100px;">
					  <form  enctype="multipart/form-data" class="modal-content animate form vertical-form" method="POST" action="{{url('/update-profile-pic')}}"  class="vertical-form" style="padding: 100px;">
					  {{csrf_field()}}
					    <div class="container">
					       <label class="col-sm-2 control-label">Update Your profile photo</label>  
					        <div class="col-sm-4">
					            <input class="form-control" type='file' name="image" id="name" required="true"> 
					        </div>
					        
					<br><br>
					        </div><br><br>
					      <div class="clearfix">
					      
					        <button type="button" onclick="document.getElementById('Update_pic').style.display='none'" class="cancelbtn">Cancel</button>
					        <button type="submit" class="signupbtn">Save</button>
					      </div>
					    </div>
					  </form>
					</div>
					</div>