var GameController = {
	
    getGameById: function(game, callback){
        GameService.getGameById(game, function(gameObjResponse){
            callback(gameObjResponse);
        });
    }
};

