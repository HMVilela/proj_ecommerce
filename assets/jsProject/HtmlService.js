var HtmlService = {

    getGameList: function(callback){
        $.ajax({
            type: 'GET',
            contentType: 'application/json',
            url: 'api/GameDAO.php/getGameList',
            success: function(response){
                callback(response);
            },
            error: function(){
                callback(response);
            }
        });
    }
};