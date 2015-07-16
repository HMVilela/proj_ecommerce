var GameService = {

    getGameById: function(game, callback){
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: 'api/GameDAO.php/getGameById',
            data: JSON.stringify(game),
            success: function(response){
                callback(response);
            },
            error: function(response){
                callback(response);
            }
        });
    }
};