var app = angular.module('ContactsListApp', ['ui.bootstrap']);

app.controller('ContactsListController', function ($scope, $http) {
    $scope.showLoader = true;
    $http.get('getContactList.php').then(function (d) {
        $scope.lst = d.data;
        $scope.totalItems = $scope.lst.length;
        $scope.showLoader = false;

    }, function (error) {
        alert('failed to load contacs list');
    });

});