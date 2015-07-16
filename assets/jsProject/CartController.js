var CartController = {
	
    addToCart: function(id){
        UserController.getSessionId(function(sessionIdResponse){
            if(sessionIdResponse != '-1'){
                var cart = {
                    gameIdFk: id,
                    userIdFk: sessionIdResponse
                };
            }
            CartService.addToCart(cart, function(cartResponse){
                console.log(cartResponse);
            });
        });
    }
};

