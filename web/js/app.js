$(document).ready(function(){
    
    $('.confirm-delete').click(function(){
        if(confirm("Do you really want to delete this?")){
            return true;
        }
        return false;
    }); 
    
    $('#go-back').click(function(event){
        event.preventDefault();
        history.back();
    });
});