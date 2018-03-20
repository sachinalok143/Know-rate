var myApp= angular
.module("Item",['toaster' /*,'googlechart','ngDragDrop','dndLists','ngAnimate','ngSanitize','ngRoute','ui',  'ngCsv'*/],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
 .filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
}).directive('myModal', function() {
   return {
     restrict: 'A',
     link: function(scope, element, attr) {
       scope.dismiss = function() {
           element.modal('hide');
       };
     }
   }
 }).
  directive('myModal1', function() {
   return {
     restrict: 'A',
     link: function(scope, element, attr) {
       scope.dismiss1 = function() {
           element.modal('hide');
       };
     }
   }
 }).
  directive('myModal2', function() {
   return {
     restrict: 'A',
     link: function(scope, element, attr) {
       scope.dismiss2 = function() {
           element.modal('hide');
       };
     }
   }
 })
.controller("itemController",  function ($scope,$http,toaster) {
	
  // document.getElementById('rating').style.color='red';

  $scope.pageSize=5;
  $scope.currentPage=1;
  $scope.items=[];
  $scope.numberOfPages=Math.floor($scope.items.length/$scope.pageSize) +1;
	$scope.mainloader=1;
  $http.get("/get-items-by-saopkeeper")
  .then(function(response) {
      $scope.mainloader=0;
  	$scope.categories=response.data.categories;
    $scope.reviews=response.data.reviews;
    $scope.soapkeeper=response.data.shopkeeper;
    if(response.data.items.length){
 	$scope.items=response.data.items;
 getItemForeignKeys();
 }else{
  $scope.items={};
 }
	$scope.numberOfPages=Math.floor($scope.items.length/$scope.pageSize +1);
  	// console.log(response.data.items);
 });

var getItemForeignKeys=function(){
  for (var i = 0; i < $scope.items.length; i++) {
        $scope.items[i].shopId=$scope.soapkeeper;
    for (var j = 0; j < $scope.categories.length; j++) {
     if( $scope.categories[j].id==$scope.items[i].categoryId){
      $scope.items[i].categoryName=$scope.categories[j].name;
     }
    }
    var k=0;
    var itemRating=0;
    for (var j = 0; j < $scope.reviews[i].length; j++) {
      itemRating=itemRating+$scope.reviews[i][j].rating;
      k++;
      }
      if(Math.floor(itemRating/k)){
      $scope.items[i].rating=Math.floor(itemRating/k);
    }else{
      $scope.items[i].rating=0;
      // console.log(itemRating,k);  
    }
    }
};



  $scope.getItemByCategory=function(id,name){
      $scope.mainloader=1;
    $http.get("/get-item-by-category/"+id)
  .then(function(response) {
      $scope.mainloader=0;
    if (response.data.items.length){
    $scope.unityCategory=name;  
    $scope.items=response.data.items;
    $scope.reviews=response.data.reviews;
    getItemForeignKeys();
    // console.log($scope.items.length/$scope.pageSize +1);
    $scope.numberOfPages=Math.floor($scope.items.length/$scope.pageSize +1);
  }
  else
  {
    toaster.pop('error','No items from selected category','');
  }
  });
  };
  
$scope.addMultiple=false;

  $scope.item={};
  $scope.addItem=function(){
    var file = document.getElementById('file').files[0];
    $scope.item.file=file;
      $scope.mainloader=1;
    $http.post('/add-item-by-shopkeeper',$scope.item).then(function(response){
      $scope.mainloader=0;
      if(response.data.reviews.length&&response.data.items.length){
       $scope.items=response.data.items;
       $scope.reviews=response.data.reviews;
       getItemForeignKeys();
      if(!$scope.addMultiple){ $scope.dismiss();}
      toaster.pop('success','Item is added','success');
      $scope.item={};
      }
      else{
        toaster.pop('error','Item is not added','some error');
      }
    });
  };

  $scope.editItemDetailForm=function($item){
    $scope.item=$item;
  };
  $scope.editItemDetails=function(){
    var file = document.getElementById('file').files[0];
    $scope.item.file=file;
    $scope.mainloader=1;
    // for (var i =999999999; i >= 0; i--);
    $http.post('/add-item-by-shopkeeper',$scope.item).then(function(response){
      if(response.data.items.length){
       $scope.mainloader=0; 
        $scope.dismiss1();
       $scope.items=response.data.items;
       $scope.reviews=response.data.reviews;
       getItemForeignKeys();
      toaster.pop('success','Item details saved','success');
      $scope.item={};
      }
      else{
        toaster.pop('error','Item details is not saves','some error');
      }
    });
  };
// $interval($scope.editItemDetails().bind(this), 10000);
$scope.deleteItem=function($id){
  if(confirm('Are you sure to delete item!')){
    $scope.mainloader=1;
    $http.get('/delete-item/'+$id)
    .then(function(response){
    $scope.mainloader=0;
      if(response.data.reviews.length&&response.data.items.length){
      $scope.items=response.data.items;
      $scope.reviews=response.data.reviews;
      getItemForeignKeys();
      toaster.pop('success','Item deletetion success!');
    }else
    {
      toaster.pop('error','some error accur','error'); 
    }
    });
  }
};
// document.getElementById('rating').style.color='red';
$scope.resetPass={
  password:'',
  newPassword:'',
  confirmNewPassword:''
};
$scope.resetPassword=function($id){
  // console.log($id);

if($scope.resetPass.password!=''&&$scope.resetPass.newPassword!=''&&$scope.resetPass.confirmNewPassword!=''&&$scope.resetPass.newPassword==$scope.resetPass.confirmNewPassword)
  {
  $scope.passwordloader=1; 
    $http.post('/reset-password/'+$id,$scope.resetPass)
    .then(function(response){
      $scope.passwordloader=0;
      if(response.data.status){
      $scope.resetPass={};
      toaster.pop('success','Password reset success!\nClose the form.');
      // $scope.dismiss2();
    }else
    {
      toaster.pop('error','some error accur','error'); 
    }
    });

  }
  else{
    toaster.pop('error','some feild is empty or the \n two password does not match');
  }
};
$scope.getReviewsByItem=function($item){
  // var i=false;
  for (var i = 0; i < $scope.items.length; i++) {
    if($scope.items[i].id==$item.id){
      $scope.itemReviews=$scope.reviews[i];
      // console.log($scope.reviews[i]);
      break;
    }
  }
  if(!$scope.itemReviews.length){
    toaster.pop('error','No review for the '+$item.name);
  }
  // console.log($scope.reviews,i,$scope.items[i].id,$item.id);
};

$scope.getClass=function($Int){
  return 'red';
};
});