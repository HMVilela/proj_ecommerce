var HtmlService = {

    getGameList: function(callback){
        $.ajax({
            type: 'GET',
            contentType: 'application/json',
            url: 'api/dao.php/getGameList',
            success: function(response){
                callback(response);
            },
            error: function(){
                callback(response);
            }
        });
    }
};