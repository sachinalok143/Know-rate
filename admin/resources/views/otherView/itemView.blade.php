		
<div ng-if="!mainloader">
<div style="padding: 10px; border: solid 1px brown; border-radius: 5px; text-align: center;" class="alert-danger" ng-if="!items.length">
	<span >No item/service that you are providing.<br>Click on add item option on left side bar to add items/services. </span>
</div>
</div>
 <center>
	<div ng-if="mainloader"  style=" padding-top:150px; " >
		<div class="loader" ></div><br><br>
		<div>please wait.....content is loading....</div>
	</div>
</center>
<div ng-if="!mainloader">
<div ng-if="items.length" class="panel">
	<div class="panel-heading">
	 <div class="form-group">
	 <div class="col-md-2 col-md-offset-2">
	 	<label style="float: right;">Seach Keywords:</label>

	 </div>
		<div class="col-md-4 ">
			<input type="text" placeholder="Search.." ng-model="keywords" class="form-control" >
		</div>
	 </div>
	<label class="alert-info" style="border:solid 1px blue; border-radius: 3px; padding: 3px; ">
	Total items/services&nbsp;:&nbsp;<%items.length%>
	<br><span ng-if="unityCategory"> Category&nbsp;:&nbsp;<%unityCategory%></span>
	 </label>
	</div>

	<div class="panel-body">
	<table class="col-md-12">
		<tr>
			<div  ng-repeat="item in items|filter:keywords|startFrom:(currentPage-1)*pageSize|limitTo:pageSize" >
		    <div class="row">
		        <div class="col-md-8  col-md-offset-2">
		            <div class="panel panel-default">
					 	<div class="panel-heading" style="">
		                	<%item.name%><span style="float: right;"><%item.categoryName%></span>
		                </div>
		                <div class="panel-body" style="">
		                <div class="col-md-3">		
	            			<img style="max-height: 150px; " src="/uploads/itemImage/<%item.photo%>">
	            		</div>	
	            		<div class="col-md-6">
	            		<h4 style="text-align: center; "><strong>Shop Details</strong></h4>
	            		<label ng-if="item.shopId.name">Shopkeeper Name:</label>
	            			<%item.shopId.name%><br>
	            		<label ng-if="item.shopId.name">Shop Name:</label>
	            			<%item.shopId.shopName%><br>	
	            		<label ng-if="item.shopId.address">Shop address:</label>
	            			<%item.shopId.address%><br>
	            			<span ng-if="item.shopId.city"><%item.shopId.city%>,</span>
	            			<span ng-if="item.shopId.state"><%item.shopId.state%>,</span>
	            			<span ng-if="item.shopId.country"><%item.shopId.country%></span>	<br>
	            		<label ng-if="item.shopId.landmark">Shop landmark:</label>
	            			<%item.shopId.landmark%><br>
	            		<label ng-if="item.shopId.remark">Shop Remark:</label>
	            			<%item.shopId.remark%><br>
	            		</div>
		                <span class="col-md-3" >
		                <h4 style="color: green;"><b>₹<%item.rate%></b></h4>
                      <a href="tel:">
						<%item.shopId.contact%><i class="fa fa-phone"></i><br>
                      </a>
		                <a data-toggle="modal" style="color: #ff944d;" data-target="#reviewModal" ng-click="getReviewsByItem(item)">
		                <h8>
                        Item Review
                        <small class="pull-right"><%item
                        .rating%>%</small>
                      </h8>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: <%item
                        .rating%>%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only"><%item.rating%>% Complete</span>
                        </div>
                      </div>
                      </a>

		               </span>
		                </div>
		             
		                 <div class="panel-footer" style="min-height: 60px;">
			                <div >
				                <!-- <div class="col-md-3 " disable>
				                	<a href="#" data-toggle="modal" data-target="#login-modal1" class=" btn btn-success form-control" ng-click="editItemDetailForm(item)"> Edit details</a>
				                </div> -->
				                <div class="col-md-3 col-md-offset-9">
				                	<button class="btn btn-danger form-control"  ng-click="deleteItem(item.id)"> Delete Item</button>
				                </div>
			                </div>
		                </div>
		             </div>
		         </div>
		    </div>
		    </div>
		</tr>
		
	</table>
	<div class="col-md-2 col-md-offset-4" >
		<label>Page Size:</label>
	</div>
	<div class="col-md-2">
		 <select ng-model="pageSize" id="pageSize" class="form-control">
	        <option value="5">5</option>
	        <option value="10">10</option>
	        <option value="15">15</option>
	        <option value="20">20</option>
	     </select>
		</div>
	</div>
	<div class="panel-footer" style="min-height:100px;">
		<div class="col-md-12">
		<div class="col-md-2 col-md-offset-3">
			<button class="form-control" ng-disabled="currentPage == 1" ng-click="currentPage=currentPage-1">
	        Previous
	    </button>
	    </div>
		    <div class="col-md-2">
			    <div class="col-md-3">
			    <%currentPage%>/<%numberOfPages%>
			    </div>
		    <div class="col-md-1" ><label>GO</label></div>
		    <div class="col-md-6">
		    	<input type="number" ng-model="currentPage" max="<%items.length/pageSize%>" min="1" name="" class="form-control"> 
		    </div>
		    </div>
	    <div class="col-md-2">
	    	<button class="form-control" ng-disabled="currentPage >= items.length/pageSize" ng-click="currentPage=currentPage+1">
	        Next
	   		</button>
	    </div>
    </div>
	</div>

</div>
</div>
