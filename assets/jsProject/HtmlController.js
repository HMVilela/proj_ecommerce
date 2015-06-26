var HtmlController = {
	
	init: function () {
		HtmlController.getGameList();
	},
	getGameList: function () {
		HtmlService.getGameList(function(response){
            console.log(response);
            
            var i = 0;
            for(i = 0; i < 10; i++){
                var div = document.getElementById('gamesCatalogueList'),
                    div1 = HtmlController.createDiv('col-lg-3 col-md-4 col-sm-6', ''),
                    div2 = HtmlController.createDiv('tile', ''),
                    div3 = HtmlController.createDiv('price-label', 'R$ 139.00'),
                    a1 = HtmlController.createA('#', '', ''),
                    img1 = HtmlController.createImage('assets/css/img/1(1).jpg'),
                    div4 = HtmlController.createDiv('footer', ''),
                    a2 = HtmlController.createA('#', '', 'Nome do Produto'),
                    div5 = HtmlController.createDiv('tools', ''),
                    a3 = HtmlController.createA('#', 'add-cart-btn', ''),
                    span1 = HtmlController.createSpan('', 'aew'),
                    i1 = HtmlController.createI('icon-shopping-cart');

                div.appendChild(div1);
                div1.appendChild(div2);
                div2.appendChild(div3);
                div2.appendChild(a1);
                a1.appendChild(img1);
                div2.appendChild(div4);
                div4.appendChild(a2);
                div4.appendChild(div5);
                div5.appendChild(a3);
                a3.appendChild(span1);
                a3.appendChild(i1);
            }
            
            
            
        });
	},
    createImage: function(imageLocation) {
		var el = document.createElement('img');
        if(imageLocation != ''){
            el.setAttribute('src' ,imageLocation);
        }
		return el;
	},
    createA: function(hrefValue, classValue, innerValue) {
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
	}
};
HtmlController.init();
