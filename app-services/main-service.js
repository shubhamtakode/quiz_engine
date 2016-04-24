/**
 * Created by karwalkar on 4/23/2016.
 */

MyApp.service("MainService",function($resource){
    return{
        highLightLink:function(id){
            $("#top-menu a").removeClass("active");
            $(id).addClass("active");
        }
    };
});