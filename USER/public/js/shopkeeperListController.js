
var myApp= angular
.module("ShopkeeperList",['toaster' /*,'googlechart','ngDragDrop','dndLists','ngAnimate','ngSanitize','ngRoute','ui',  'ngCsv'*/],function($interpolateProvider) {
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
controller("shopkeeperListController",  function ($scope,$http,toaster) {
$scope.pageSize=10;
$scope.currentPage=1;
$scope.shopkeepers=[];
$scope.mainloader=1;
$scope.numberOfPages=Math.floor($scope.shopkeepers.length/$scope.pageSize) +1;
$http.get("/get-all-shopkeepers")
  .then(function(response) {
  	$scope.mainloader=0;
  	$scope.shopkeepers=response.data.shopkeepers;
  });



$scope.reverseSort=false;
$scope.sortColumn="id";
$scope.sortData=function(column){
  // alert('fghhjjkkl');
  $scope.reverseSort=($scope.sortColumn==column) ? !$scope.reverseSort :false;
  $scope.sortColumn=column;
};

$scope.getSortClass=function(column){
  if($scope.sortColumn==column){
    return $scope.reverseSort ? 'arrow-down':'arrow-up' ;
  }
  else
  {
    return 'arrow-all';
  }
};
  
});