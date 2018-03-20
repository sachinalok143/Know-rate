<div class="modal fade" my-modal1 id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">

  <div class="loginmodal-container">
    <h1>Edit Item/Service</h1><br>
    <form ng-submit="editItemDetails()"  method="post" enctype="multipart/form-data">
    <a  data-toggle="modal" data-target="#login-modal1" style="float: right;">Close &nbsp; </a>
      <h1>Please fll out following  Form :</h1>
      
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
      <span class="icon-case"><i class="fa fa-rupee"></i></span>
                <input class="input-class" type="rate" name="rate" id="rate" ng-model="item.rate" data-rule="" pattern="[0-9]{1,225}" required>
                <div class="validation"></div>
      </div>
  </div>

 <div class="rightcontact">  

      <div class="form-group">
      <div class="form-group">
      <p>Item/service picture </p>  
                <input class="form-control" accept="image/*" image="image" id="file" type="file" app-filereader/>

                <div class="validation"></div>
      </div>  

      <div class="form-group">
      <p> Category<span><b>*</b></span></p>
         <select ng-model="item.categoryId" id="" class="form-control" ng-options="Category.id as Category.name for Category in categories" required="true" placeholder="Select Sub region" required="true">
         <option value="" deselected>Select Categiry</option>
         </select>
      </div>
  </div>
  </div>
<button  type="submit" class="bouton-contact" >Save Item Details</button>
    </form>
  </div>
</div>
</div>

@section('your_css')

@endsection