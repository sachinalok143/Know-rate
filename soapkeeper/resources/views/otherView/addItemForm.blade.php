<div class="modal fade" my-modal id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">

	<div class="loginmodal-container">
		<h1>Add Items/Services</h1><br>
	  <form ng-submit="addItem()" id="addItemForm"  method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      <a  data-toggle="modal" data-target="#login-modal" style="float: right;">Close &nbsp; </a>
      <h1>Please fill out following  Form :</h1>
      
    <div class="contentform">

      <div class="leftcontact">
            <div class="form-group">
              <p>Item/Service Name <span>*</span></p>
              <span class="icon-case"><i class="fa fa-sitemap"></i></span>
                <input class="input-class" type="text" ng-model="item.name" name="name" id="name" data-rule="required" pattern="[a-zA-Z\s]+" required>
                <div class="validation"></div>
       </div> 

            <div class="form-group">
            <p> Item brand/Service Details</p>
            <span class="icon-case"><i class="fa fa-th-large"></i></span>
        <input class="input-class" ng-model="item.brand" type="text" name="brand" id="brand" data-rule="" >
      </div>

      <div class="form-group">
      <p>Cost<span></span></p>  
      <span class="icon-case"><i class="fa  fa-rupee"></i></span>
                <input class="input-class" type="rate" name="rate" id="rate" ng-model="item.rate" data-rule="" pattern="[0-9]{1,225}" required>
                <div class="validation"></div>
      </div>
  </div>

 <div class="rightcontact">  

      <div class="form-group">
      <div class="form-group">
      <p>Item/service picture </p>  
                <input class="form-control" ng-model="item.file" accept="image/*" image="image" id="file" type="file" name="image" app-filereader/>

                <div class="validation"></div>
      </div>  

      <div class="form-group">
      <p> Category<span><b>*</b></span></p>
      
        <select ng-model="item.categoryId" name="categoryId" class="form-control" ng-options="Category.id as Category.name for Category in categories" required="true" placeholder="Select Sub region" required="true">
        <option value="" deselected>Select Categiry</option>
		</select>
    <br><br>
    <h8 style="color: brown;" >Tick it !if you want add multiple item</h8>
    <div>
      <input type="checkbox"  ng-model="addMultiple" value=true name="">Add Multiple
    </div> 
 </div>
  </div>
  </div>
  

<button type="submit" class="bouton-contact">Add Item</button>
	  </form>
    <a class="btn btn-danger" data-toggle="modal" data-target="#login-modal" style="float: right;">Cancel &nbsp; </a>
	</div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
 $("form#addItemForm").submit(function(){
    // alert('sdfghj');
    // document.getElementById('NewToolSuggetion').style.display='none';
    var formData = new FormData(this);
    if ($('#file')[0].files[0]) 
      var size = $('#file')[0].files[0].size/1000000;
    else var size=0;
     if(size<1){
     $.ajax({
        url:"{{ url('/add-image')}}",
        type: 'POST',
        data: formData,
        async: false,
       success: function (data) {
           angular.element(document.getElementById('myController')).scope().editItemDetails();
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }
  else
    alert("file should be less than 1MB.")

    return false;
});   
 });
 </script>


@section('your_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/addItem.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/reg.css')}}">
@endsection