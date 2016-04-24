'use strict';
var MyApp=angular.module("MyApp",['ngRoute','ngResource','ngCookies']);
MyApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/dashboard', {
                templateUrl: 'views/dashboard.html',
                controller: 'DashboardController'
            }).
            when('/quiz', {
                templateUrl: 'views/quiz.html',
                controller: 'QuizController'
            }).
            when('/settings', {
                templateUrl: 'views/settings.html',
                controller: 'SettingsController'
            }).
            when('/index', {
                templateUrl: 'main.html',
                controller: 'MainController'
            }).
            otherwise({
                redirectTo: '/main'
            });
    }]);

MyApp.controller("MainController",['$scope','MainService','$q','$log','$cookies',function($scope,MainService,$q,$log,$cookies){
    $scope.main="dfsdf";
    $cookies.put("username", "roshan100");
    console.log($cookies.get("username"));
    MainService.highLightLink("#indexLink");
    function asyncGreet(name) {
// perform some asynchronous operation, resolve or reject the promise when appropriate.
        var q=$q.defer();
        setTimeout(function() {
            if (okToGreet(name)) {
                q.resolve('Hello, ' + name + '!');
            } else {
                q.reject('Greeting ' + name + ' is not allowed.');
            }
        }, 1000);
        return q.promise;
    }

    function okToGreet(name){
        if(name=="roshan"){
            return true;
        }
        return false;
    }
    /*var promise = asyncGreet('roshan');
     promise.then(function(greeting) {
     alert('Success: ' + greeting);
     }, function(reason) {
     alert('Failed: ' + reason);
     },function(update){
     // console.log("notify:"+update)
     });
     */console.log("first me");
}]);



