var CartController = {
	
    addToCart: function(id){
        console.log(id);
        UserController.getSessionId(function(sessionIdResponse){
            console.log(sessionIdResponse);
/*
            if(sessionIdResponse != '-1'){
                var cart = {
                    gameIdFk: form,
                    userIdFk: sessionIdResponse,
                    gameCurrentValue: '-1'
                };
            }
            CartService.addToCart(cart, function(cartResponse){
                console.log(cartResponse);
            });
*/
                
        });
    }
};

