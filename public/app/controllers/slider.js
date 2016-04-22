app.controller('sliderapplication', function($scope, $interval) {
  
  $scope.images =  [{
    src: '/images/1.jpg',
    title: 'First Image'
  }, {
    src:'/images/2.jpg',
    title: 'Second Image'
  }, {
    src: '/images/3.jpg',
    title: 'Third Image'
  }];

  $scope.currentImage = 0; 
  $scope.images[0].visible = true;
  
$interval(function(){
    $scope.images[$scope.currentImage].visible = false;
  
    if($scope.currentImage < Object.keys($scope.images).length-1){
      $scope.currentImage ++;
    } else {
      $scope.currentImage = 0;
    }
  console.log( $scope.images[$scope.currentImage] );
    $scope.images[$scope.currentImage].visible = true;
}, 5000);
});