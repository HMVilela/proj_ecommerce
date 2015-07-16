var CartController = {
	
    addToCart: function(gameId){
        UserController.getSessionId(function(sessionIdResponse){
            var game = {
                id : gameId
            };
            GameController.getGameById(game, function(gameDataResponse){
                var cart = {
                    userIdFk: sessionIdResponse,
                    gameIdFk: gameId,
                    currentValue: gameDataResponse[0].currentValue
                };
                CartService.addToCart(cart, function(cartResponse){
                    if(cartResponse == 'SUCCESS'){
                        alert('Item adicionado com sucesso ao carrinho!');
                    }else if(cartResponse == 'FAIL'){
                        alert('Erro ao tentar adicionar item ao carrinho. Tente novamente.');
                    }else{
                        alert('Erro ao tentar adicionar item ao carrinho. Tente novamente.');
                    }
                });
            });
        });
    }
};

