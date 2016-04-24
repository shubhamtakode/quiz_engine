/**
 * Created by karwalkar on 4/23/2016.
 */
MyApp.controller("SettingsController",['$scope','MainService','$location','$anchorScroll',function($scope,MainService,$location,$anchorScroll){
    MainService.highLightLink("#quiz-link");
}]);
