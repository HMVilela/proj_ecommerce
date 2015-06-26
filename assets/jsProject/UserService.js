var UserService = {

    validateData: function(user, callback){
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: 'api/dao.php/validateLoginData',
            data: JSON.stringify(user),
            success: function(response){
                callback(response);
            },
            error: function(){
                callback(response);
            }
        });
    }
};