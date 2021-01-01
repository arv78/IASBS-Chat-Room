var app = angular.module('ProfileApp', ['ui.bootstrap']);


app.controller('ProfileController', function ($scope, $http) {
    
    $http.get('getProfile.php').then(function (d) {
        $scope.lst = d.data;
        
    }, function (error) {
        alert('failed to load users list');
    });

});