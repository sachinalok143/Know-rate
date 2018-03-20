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
 }).directive('myModal3', function() {
   return {
     restrict: 'A',
     link: function(scope, element, attr) {
       scope.dismiss3 = function() {
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
    $scope.shopkeepers=response.data.shopkeepers;
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
        // $scope.items[i].shopId=$scope.soapkeeper;
        for (var j = 0; j < $scope.categories.length; j++)
         {
           if( $scope.categories[j].id==$scope.items[i].categoryId)
           {
            $scope.items[i].categoryName=$scope.categories[j].name;
           }
        }
        for (var j = 0; j < $scope.shopkeepers.length; j++)
         {
          if($scope.shopkeepers[j].id==$scope.items[i].shopId)
            {
              $scope.items[i].shopId=$scope.shopkeepers[j];
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
  
  /*$scope.newCategory='';
  $scope.addCategory=function(){};*/
$scope.addMultiple=false;

  $scope.newCategory='';
  $scope.addItem=function(){
    // alert($scope.newCategory);
   

    $http.post('/add-item-by-shopkeeper',{category:$scope.newCategory}).then(function(response){
      if(response.data.categories){
        $scope.newCategory='';
        $scope.categories=response.data.categories;
        toaster.pop('success','category  added','success');
        if(!$scope.addMultiple)$scope.dismiss();
      }
      else{
        // alert();
        toaster.pop('error','Category is not added','some error');
      }
    });
  };

  /*$scope.editItemDetailForm=function($item){
    $scope.item=$item;
  };

  $scope.editItemDetails=function(){
    var file = document.getElementById('file').files[0];
    $scope.item.file=file;
    $scope.mainloader=1;
    $http.post('/edit-item-by-shopkeeper',$scope.item).then(function(response){
      if(response.data.items.length){
       $scope.mainloader=0; 
        $scope.dismiss1();
       $scope.items=response.data.items;
       getItemForeignKeys();
      toaster.pop('success','Item details saved','success');
      $scope.item={};
      }
      else{
        toaster.pop('error','Item details is not saves','some error');
      }
    });
  };*/
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
      $scope.item=$scope.items[i];
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
$scope.deleteReview=function($id){
  if(confirm('Review should be deleted only when it is vulger!')){
    $scope.reviewloader=1;
   $http.post('/delete-review-by-id',{ item:$scope.item,
      reviewId:$id}).then(function(response){
      $scope.reviewloader=0;
      if(response.data.items){
        $scope.reviews=response.data.reviews;
        $scope.items=response.data.items;
        getItemForeignKeys();
        $scope.dismiss2();
        toaster.pop('success','Review deleted!','success');
      }
      else{
       toaster.pop('error','Review not deleted!','error'); 
      }
    
  });
  }
};
$scope.recomendation={
  confirmContact:'',
  contact:''
};


$http.get("/get-admin-recommendation/"+$scope.recomendation.contact)
  .then(function(response) {
     $scope.recommendations=response.data.recommendations; 
   });


$scope.deleteAdminRecommendation=function($id){
  if(confirm('Are you sure?')){
$http.get("/delete-admin-recommendation/"+$id)
  .then(function(response) {
    // $scope.recommendationloader=0;
    if(response.data.status){
     $scope.recommendations=response.data.recommendations;
      toaster.pop('success','Recommendation Deleted!','success');
    }
    else{
     toaster.pop('error','Contact you are recommendind is either an admin or in recommendation list'); 
    }
  });
  }
};

$scope.recommendationloader=0;
$scope.recommendAdmin=function(){
  // console.log($scope.recomendation.confirmContact,$scope.recomendation.contact);
if($scope.recomendation.confirmContact==$scope.recomendation.contact){
$scope.recommendationloader=1;
$http.get('/add-admin-recommendation/'+$scope.recomendation.contact)
  .then(function(response) {
    $scope.recommendationloader=0;
    if(response.data.status){
      $scope.recommendations=response.data.recommendations;
      toaster.pop('success','Your recommendation compeleted!','success');
    }
    else{
     toaster.pop('error','Contact you are recommendind is either an admin or in recommendation list'); 
    }
  });

}
else{
  toaster.pop('error','The two contact not match','Confirmation Failed!'); 
    
}
};

$scope.userProfile=function($id){
  $scope.dismiss2();
  
};

});