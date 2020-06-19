$(document).ready(function(){ showimg();});


function traerDias(){
    $.ajax({url: 'buscar.php', data: 'cantD='+$('#ds').val(), type:"POST", success: function(data){$('#showD').html(data)} });
}

function verificar(){
    $.ajax({url: 'buscar.php', data: 'id='+$('#id').val(), type:"POST", success: function(data){ $('#respuesta').html(data) }});
}

function showimg(){
    var preview = document.querySelector('img');
    var file = document.querySelector('#file').files[0];
    if(file){
    var reader = new FileReader();
    reader.onloadend = function(){
        preview.src = reader.result;
    }

    if(file){
        reader.readAsDataURL(file);
    }else{
        preview.src="";
    }
    }
} 