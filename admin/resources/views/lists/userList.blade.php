		
<div ng-if="!mainloader">
<div style="padding: 10px; border: solid 1px brown; border-radius: 5px; text-align: center;" class="alert-danger" ng-if="!users.length">
	<span >No user registered yet! </span>
</div>
</div>
 <center>
	<div ng-if="mainloader"  style=" padding-top:150px; " >
		<div class="loader" ></div><br><br>
		<div>please wait.....content is loading....</div>
	</div>
</center>
<div ng-if="!mainloader">
<div ng-if="users.length" class="panel">
	<div class="panel-heading">
	 <div class="form-group">
	 <div class="col-md-2 col-md-offset-2">
	 	<label style="float: right;">Seach Keywords:</label>

	 </div>
		<div class="col-md-4 ">
			<input type="text" placeholder="Search.." ng-model="keywords" class="form-control" >
		</div>
	 </div>
	<br>
	<label class="alert-info" style="border:solid 1px blue; border-radius: 3px; padding: 3px; ">
	Total users&nbsp;:&nbsp;<%users.length%>
	
	 </label>
	</div>

	<div class="panel-body">
	<table class="col-md-12 table table-striped table-hover table-bordered ">
	<thead>
		<tr>
			<th style="min-width: 45px;" ng-click="sortData('id')">Id<div style="float: right;" ng-class="getSortClass('id')"></div></th>
			<th style="min-width: 80px;" ng-click="sortData('name')">Name<div style="float: right;" ng-class="getSortClass('name')"></div></th>
			
			<th style="min-width: 100px;" ng-click="sortData('email')">E-mail<div style="float: right;" ng-class="getSortClass('email')"></div></th>
			<th style="min-width: 100px;" ng-click="sortData('Gender')">Gender<div style="float: right;" ng-class="getSortClass('Gender')"></div></th>
			<th style="min-width: 100px;" ng-click="sortData('remark')">Remark<div style="float: right;" ng-class="getSortClass('remark')"></div></th>
			<th style="min-width: 100px;" ng-click="sortData('address')">Address<div style="float: right;" ng-class="getSortClass('address')"></div></th>
		</tr>
	</thead>

	<tbody>
		<tr  ng-repeat="user in users|filter:keywords|startFrom:(currentPage-1)*pageSize|limitTo:pageSize|orderBy:sortColumn:reverseSort">
			<td><%user.id%></td>
			<td><%user.name%></td>
			<td><%user.email%></td>
			<td><%user.Gender%></td>
			<td><%user.remark%></td>
			<td><%user.address%></td>
		</tr>
	</tbody>	
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
