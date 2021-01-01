
var app = angular.module('UsersListApp', ['ui.bootstrap']);

app.controller('UsersListController', function ($scope, $http) {
    
    $http.get('getContactList.php').then(function (d) {
        $scope.lst = d.data;
        
    }, function (error) {
        alert('failed to load users list');
    });

});