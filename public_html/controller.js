/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    init();
});


function init(){
    
    initEvents();
    loadImages();
    
    getSession();
    
}

function initEvents(){
    $('#linkRegister').on('click', function(){
        $('#registerUser').fadeIn(0);
        $('#loginUser').fadeOut(0);
    });
    
    $('#linkLogin').on('click', function(){
        $('#registerUser').fadeOut(0);
        $('#loginUser').fadeIn(0);
    });
    
    $('#btnRegister').on('click', function(){
        var user = $('#txtUsernameNew').val();
        var pass = $('#txtPasswordNew').val();
        registerUser(user, pass);
    });
    $('#btnLogin').on('click', function(){
        var user = $('#txtUsername').val();
        var pass = $('#txtPassword').val();
        loginUser(user, pass);
    });
    
    $('#linkClose').on('click', function(){
        closeSession();
    });
    
    $('#linkUploadImage').on('click', function(){
        $('#uploadImage').fadeIn();
    });
}

function loadImages(){
    $.ajax({
            dataType: "json",
            url: 'php/getListImages.php',
            type: 'POST',
            data: '',
            success: function(data) {
                var str = '';
                for(var i = 0; i < data.length; i++){
                    str += '<div><a target="_blank" href="imagesUploaded/'+ data[i].name +'">'+ data[i].name +'</a></div>';
                }
                $('#listFiles').html(str);
            }
     });
}

function registerUser(user, pass){
    $.ajax({
            dataType: "json",
            url: 'php/registerUser.php',
            type: 'POST',
            data: 'user=' + user + '&pass=' + pass,
            success: function(data) {
                if(data.result == true){
                    alert('Estas Registrado');
                    $('#menuInit').fadeOut();
                    $('#menuRegister').fadeIn();
                    $('#loginUser').fadeOut();
                    $('#registerUser').fadeOut();
                }
            }
     });
}

function loginUser(user, pass){
    $.ajax({
            dataType: "json",
            url: 'php/login.php',
            type: 'POST',
            data: 'user=' + user + '&pass=' + pass,
            success: function(data) {
                if(data.result == true){
                    alert('Bienvenido');
                    $('#menuInit').fadeOut();
                    $('#menuRegister').fadeIn();
                    $('#loginUser').fadeOut();
                    $('#registerUser').fadeOut();
                }else{
                    alert('El usuario no existe');
                }
            }
     });
}

function getSession(){
    $.ajax({
        dataType: "json",
        url: 'php/getSession.php',
        type: 'POST',
        data: '',
        success: function(data) {
            if(data.session == true){
                $('#menuInit').fadeOut();
                $('#menuRegister').fadeIn();
            }else{
                $('#menuInit').fadeIn();
                $('#menuRegister').fadeOut();
            }
        }
     });
}

function closeSession(){
    $.ajax({
        dataType: "json",
        url: 'php/closeSession.php',
        type: 'POST',
        data: '',
        success: function(data) {
            if(data.session == true){
                $('#menuRegister').fadeOut();
                $('#menuInit').fadeIn();
                $('#uploadImage').fadeOut();
            }else{
                
            }
        }
     });
}