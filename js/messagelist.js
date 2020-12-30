var app = angular.module('MessageListApp', ['ui.bootstrap']);

app.controller('MesaageListController', function ($scope, $http) {
    $scope.showLoader = true;
    $http.get('getMessageList.php').then(function (d) {
        $scope.lst = d.data;
        $scope.totalItems = $scope.lst.length;
        $scope.showLoader = false;

    }, function (error) {
        alert('failed to load Message list');
    });

});