/**
 * Created by karwalkar on 5/14/2016.
 */
$.ajax({
    url: 'api/CallApi.php',
    type: 'post',
    data: {"myData" : JSON.stringify({
        service:"DomainService",
        method:"RegisterDomain",
        data:{
            DomainName:"test",
            UserName:"test",
            Password:"test100"
        }
    })},
    success: function(data) {
        var d=JSON.parse(data);
           if(JSON.parse(data).SUCCESS){
            console.log("created");
        }else{
            console.log(JSON.parse(data).REASON);
        }
    }
});


//verify
$.ajax({
    url: 'api/CallApi.php',
    type: 'post',
    data: {"myData" : JSON.stringify({
        service:"DomainService",
        method:"VerifyDomain",
        data:{
            UserName:"test",
            Password:"test100"
        }
    })},
    success: function(data) {
        var d=JSON.parse(data);
        if(JSON.parse(data).SUCCESS){
            console.log("present ");
        }else{
            console.log(JSON.parse(data).REASON);
        }
    }
});
