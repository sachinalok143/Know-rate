<div class="modal fade" my-modal id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">

	<div class="loginmodal-container">
		<h1>Add Category</h1><br>
	  <form ng-submit="addItem()"  method="post" enctype="multipart/form-data">
      <a  data-toggle="modal" data-target="#login-modal" style="float: right;">Close &nbsp; </a>
      <h1>Please Provide category name:</h1>
      
    <div class="contentform">

      <div >
            <div class="form-group">
              <p>Category  Name <span>*</span></p>
              <span class="icon-case"><i class="fa fa-sitemap"></i></span>
                <input class="input-class" type="text" ng-model="newCategory" name="name" id="name" data-rule="required" pattern="[a-zA-Z\s]+" required>
                <div class="validation"></div>
       </div> 

    <h8 style="color: brown;" >Tick it !if you want add multiple Category</h8>
    <div>
      <input type="checkbox"  ng-model="addMultiple" value=true name="">Add Multiple
    </div> 
 </div>
    <button type="submit" class="bouton-contact">Add Category</button>
	  </form>
    <a class="btn btn-danger" data-toggle="modal" data-target="#login-modal" style="float: right;">Cancel &nbsp; </a>
	</div>
</div>
</div>

@section('your_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/addItem.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/reg.css')}}">
@endsection