var HtmlController = {
	
	init: function () {
		HtmlController.getGameList();
	},
	getGameList: function () {
		HtmlService.getGameList(function(response){
//            console.log(response);
            response.forEach(function(gameData) {
//				console.log(gameData.id);
                var divMother = document.getElementById('gamesCatalogueList'),
                    divDefault = HtmlController.createDiv('col-lg-3 col-md-4 col-sm-6', ''),
                    divTile = HtmlController.createDiv('tile', ''),
                    divPriceLabel = HtmlController.createDiv('price-label', 'R$ '+gameData.currentValue+'.00'),
                    aClickImg = HtmlController.createA('#', '', '', ''),
                    imgGame = HtmlController.createImage(gameData.photoLink),
                    divFooter = HtmlController.createDiv('footer', ''),
                    aProductName = HtmlController.createA('#', '', gameData.name),
                    divTools = HtmlController.createDiv('tools', ''),
                    aAddCartBtn = HtmlController.createA('#', 'add-cart-btn', '', 'HtmlController.addToCart('+gameData.id+');'),
                    spanCartName = HtmlController.createSpan('', 'Add ao Carrinho'),
                    iIcon = HtmlController.createI('icon-shopping-cart');

                divMother.appendChild(divDefault);
                divDefault.appendChild(divTile);
                divTile.appendChild(divPriceLabel);
                divTile.appendChild(aClickImg);
                aClickImg.appendChild(imgGame);
                divTile.appendChild(divFooter);
                divFooter.appendChild(aProductName);
                divFooter.appendChild(divTools);
                divTools.appendChild(aAddCartBtn);
                aAddCartBtn.appendChild(spanCartName);
                aAddCartBtn.appendChild(iIcon);
            });
        });
	},
    createImage: function(imageLocation) {
		var el = document.createElement('img');
        if(imageLocation != ''){
            el.setAttribute('src' ,imageLocation);
        }
		return el;
	},
    createA: function(hrefValue, classValue, innerValue, onClick) {
		var el = document.createElement('a');
        if(hrefValue != ''){
            el.setAttribute('href' ,hrefValue);
        }
        if(classValue != ''){
            el.setAttribute('class' ,classValue);
        }
        if(innerValue != ''){
            el.setAttribute('value' ,innerValue);
            el.innerHTML = innerValue;
        }
        if(onClick != ''){
            el.setAttribute('onclick', onClick);
        }
		return el;
	},
    createDiv: function(classValue, innerValue) {
		var el = document.createElement('div');
        if(classValue != ''){
            el.setAttribute('class' ,classValue);
        }
        if(innerValue != ''){
            el.innerHTML = innerValue;
        }
		return el;
	},
    createI: function(classValue) {
		var el = document.createElement('i');
        if(classValue != ''){
            el.setAttribute('class' ,classValue);
        }
		return el;
	},
    createSpan: function(classValue, innerValue) {
		var el = document.createElement('span');
        if(classValue != ''){
            el.setAttribute('class' ,classValue);
        }
        if(innerValue != ''){
            el.innerHTML = innerValue;
        }
		return el;
	},
    addToCart: function(id){
        alert('Item ' + id + ' adicionado ao carrinho!');
    }
};
HtmlController.init();
