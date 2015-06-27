var UserController = {
	
    validateData: function(form){
        var user = {
            email: form.logEmail.value,
            password: form.logPassword.value
        };
        UserService.validateData(user, function(response){
            if(response != 'FAIL'){
                var url = 'indexLogged.html';
                window.open(url, '_self');
            }else{
                alert('Usuario Nao Existe');
            }
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
    },
    getUserData: function(){
        UserService.getUserData(function(response){
            console.log(response);
        });
    }
};

