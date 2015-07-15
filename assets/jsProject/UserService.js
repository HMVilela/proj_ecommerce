var UserService = {

    validateData: function(user, callback){
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: 'api/UserDAO.php/validateLoginData',
            data: JSON.stringify(user),
            success: function(response){
                callback(response);
            },
            error: function(response){
                callback(response);
            }
        });
    },
    getUserData: function(callback){
        $.ajax({
            type: 'GET',
            contentType: 'application/json',
            url: 'api/UserDAO.php/getUserData',
            success: function(response){
                callback(response);
            },
            error: function(response){
                callback(response);
            }
        });
    },
    endSession: function(callback){
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: 'api/UserDAO.php/endSession',
            success: function(response){
                callback(response);
            },
            error: function(response){
                callback(response);
            }
        });
    },
    getSessionStatus: function(callback){
        $.ajax({
            type: 'GET',
            contentType: 'application/json',
            //async: false,
            url: 'api/UserDAO.php/getSessionStatus',
            success: function(response){
                callback(response);
            },
            error: function(response){
                callback(response);
            }
        });
    }
};