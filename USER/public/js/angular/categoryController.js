var myApp= angular
.module("category",['toaster' /*,'googlechart','ngDragDrop','dndLists','ngAnimate','ngSanitize','ngRoute','ui',  'ngCsv'*/],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
 .filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
})
.controller("categoryController",  function ($scope,$http,toaster) {
  $scope.pageSize=5;
  $scope.mainloader=1;
  $scope.currentPage=1;
  $http.get("/get-all-categories")
  .then(function(response) {// console.log(response.data);
  $scope.categories=response.data.categories;
  $scope.items=response.data.items;
  $scope.soapkeepers=response.data.soapkeepers;
  $scope.allReviews=response.data.reviews;
  getItemForeignKeys();
  $scope.numberOfPages=Math.floor($scope.items.length/$scope.pageSize +1);
  $scope.mainloader=0;
// console.log(response.data.categories);
});

/*$scope.itemReview=function($id){
var j=0,itemRating=0;
for (var i = 0; i < $scope.allReviews.length; i++) {
  if($scope.allReviews[i].id==$id){
  itemRating=itemRatingitemRating+$scope.allReviews[i].rating;
  j++;
  }
}
return Math.floor(itemRating/j);
};*/

var getItemForeignKeys=function(){
  for (var i = 0; i < $scope.items.length; i++) {
    for (var j = 0; j< $scope.soapkeepers.length; j++) {
      if($scope.soapkeepers[j].id==$scope.items[i].shopId){
        $scope.items[i].shopId=$scope.soapkeepers[j];
      }
    }
    for (var j = 0; j < $scope.categories.length; j++) {
     if( $scope.categories[j].id==$scope.items[i].categoryId){
      $scope.items[i].categoryId=$scope.categories[j].name;
     }
    }
    var k=0;
    var itemRating=0;
    for (var j = 0; j < $scope.allReviews.length; j++) {
      if($scope.allReviews[j].itemId==$scope.items[i].id){
      itemRating=itemRating+$scope.allReviews[j].rating;
      k++;
      }
      if(Math.floor(itemRating/k)){
      $scope.items[i].rating=Math.floor(itemRating/k);
    }else{
      $scope.items[i].rating=0;
    
      // console.log(itemRating,k);  
    }
    }

   
  }
};
  $scope.getItemByCategory=function(category){
    $scope.mainloader=1;    
    $http.get("/get-item-by-category/"+category.id)
  .then(function(response) {
    $scope.mainloader=0;
    if (response.data.items.length){
    $scope.Category=category.name;
    $scope.items=response.data.items;
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

$scope.reviewForm={};
$scope.reviews=[];

$scope.getReviewsByItem=function($item){
  $scope.item=$item;
  for (var i = 0; i < $scope.allReviews.length; i++) {
    if($scope.allReviews[i].itemId==$scope.item.id){
      $scope.reviews[$scope.reviews.length]=$scope.allReviews[i];
    }
  }
/*  $http.get('/get-reviews-by-item/'+$item.id)
    .then(function(response){
      if(response.data.reviews.length){
      $scope.reviews=response.data.reviews;
      // toaster.pop('error','No review for the item/service');
    }
    else
    {
      $scope.reviews={};
      toaster.pop('error','No review for the item/service');
    }
    });*/
    if (!$scope.reviews.length) { $scope.reviews={};
      toaster.pop('error','No review for the item/service');}
};

$scope.addReview=function($itemId){
  $scope.reviewForm.itemId=$itemId;
  $scope.reviewloader=1;
  // console.log($itemId);
  $http.post('/add-review',$scope.reviewForm)
    .then(function(response){
      $scope.reviewloader=0;
      if(response.data.reviews.length){
      $scope.reviews=response.data.reviews;
      toaster.pop('success',' Review for the item/service added');
    }
    else
    {

      toaster.pop('error','No review for the item/service');
    }
    });

};
});