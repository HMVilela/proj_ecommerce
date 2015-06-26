var UserController = {
	
	init: function () {
		UserController.setLoginForm();
	},
	setLoginForm: function () {
		var form = document.getElementById('validateData');
		form.addEventListener('submit', function(event) {
            UserController.validateData(form);
			event.preventDefault();
		});
		UserController.setFocus();
	},
    validateData: function(form){
        var user = {
            email: form.logEmail.value,
            password: form.logPassword.value
        };
        console.log(user.email + ' | ' + user.password);
        UserService.validateData(user, function(response){
            console.log(response);
//            if(response == 'SUCCESS'){
//                alert('Usuario Ok');
//            }else{
//                alert('Usuario Nao Existe');
//            }
            UserController.clearForm();
        });
    },
    clearForm: function(){
        var form = document.getElementById("validateData");
        form.reset();
        UserController.setFocus();
    },
    setFocus: function(){
        var inputEmail = document.getElementById("logEmail");
        inputEmail.focus();
    }
};
UserController.init();
