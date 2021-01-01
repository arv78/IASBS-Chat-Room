var app = angular.module('MessageListApp', ['ui.bootstrap']);

app.controller('MesaageListController', function ($scope, $http) {
    
    $http.get('getMessageList.php').then(function (d) {
        $scope.lst = d.data;

    }, function (error) {
        alert('failed to load Message list');
    });

});