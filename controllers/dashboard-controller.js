/**
 * Created by karwalkar on 4/23/2016.
 */
MyApp.controller("DashboardController",['$scope','MainService','$cookies','$log','$http',function($scope,MainService,$cookies,$log,$http){
    MainService.highLightLink("#dashboard-link");

}]);

