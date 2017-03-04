$(document).ready(function(){
    
    $('#go-back').click(function(event){
        event.preventDefault();
        history.back();
    });
});