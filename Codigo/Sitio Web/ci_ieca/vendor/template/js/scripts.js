//No se usa
function btnDeleteOptions(){
	$('[data-toggle=confirmation]').confirmation({
		rootSelector:'[data-toggle=confirmation]',
		container:'body'
	});
}

function validarEspacio(){
    var caja = document.getElementsByClassName("validar").value.trim();
    for(var i = 0; i < caja.length(); i++){
    if(caja[i] == ""){
    	document.getElementById("guardar").setAttribute("disabled", true);
        alert("No se permiten espacios en blanco");
    }else{
    	document.getElementById("guardar").removeAttribute("disabled", false);
    }
	}
}
//Fin

//Funcion para previsualizar imagenes

function showimg(){
    var preview = document.querySelector('img[id=show]');
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

//Fin

//Funciones para Tipo Instructor en CRUD

function listarTipoInstructor(){
	$.ajax({url:'index.php/TipoInstructor/listar', type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
}

function buscarTipoInstructor(){
	let search = $("#search").val();
	if(search != ""){
		$.ajax({url:'index.php/TipoInstructor/buscar', data: "search="+search, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listarTipoInstructor();
	}
}

function showformTypeInstructor(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/TipoInstructor/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nuevo tipo";
			}else{
				document.getElementById("title").innerHTML = "Editar tipo";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Tipo de instructores";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveTypeInstructor(){
	let datos = $('#guardarTipoInstructor').serializeArray(); $.ajax({url:'index.php/TipoInstructor/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listarTipoInstructor(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteTypeInstructor(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/TipoInstructor/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listarTipoInstructor();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Especialidades de Instructor en CRUD

function listSpecialtyInstructor(){
	$.ajax({url:'index.php/EspecialidadInstructor/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchSpecialtyInstructor(){
	let search = $("#search").val();
	if(search != ""){
		$.ajax({url:'index.php/EspecialidadInstructor/buscar', data: "search="+search, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listSpecialtyInstructor();
	}
}

function showformSpecialtyInstructor(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/EspecialidadInstructor/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nueva Especialidad";
			}else{
				document.getElementById("title").innerHTML = "Editar Especialidad";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Especialidades de instructores";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveSpecialtyInstructor(){
	let datos = $('#guardarEspecialidad').serializeArray(); $.ajax({url:'index.php/EspecialidadInstructor/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listSpecialtyInstructor(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteSpecialtyInstructor(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/EspecialidadInstructor/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listSpecialtyInstructor();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Instructor en CRUD 

function listInstructor(){
	$.ajax({url:'index.php/Instructores/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchInstructor(){
	let search = $("#search").val();
	let esp = $("#esp").val();
	let tip = $("#tip").val();
	if(search != "" || esp != "" || tip != ""){
		$.ajax({url:'index.php/Instructores/buscar', data: {search:search, esp:esp, tip:tip}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listInstructor();
	}
}

function showformInstructor(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Instructores/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nuevo Instructor";
			}else{
				document.getElementById("title").innerHTML = "Editar Instructor";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Instructores";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveInstructor(){
	let datos = $('#guardarInstructor').serializeArray(); $.ajax({url:'index.php/Instructores/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listInstructor(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteInstructor(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Instructores/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listInstructor();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//FIN

//Funciones para Horarios en CRUD

function listSchedules(){
	$.ajax({url:'index.php/Horarios/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchSchedules(){
	let i = $("#time1").val();
	let f = $("#time2").val();
	if(i != "" || f != ""){
		$.ajax({url:'index.php/Horarios/buscar', data: {i:i, f:f}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listSchedules();
	}
}

function showformSchedule(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Horarios/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nuevo Horario";
			}else{
				document.getElementById("title").innerHTML = "Editar Horario";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Horarios";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveSchedule(){
	let datos = $('#guardarHorario').serializeArray(); $.ajax({url:'index.php/Horarios/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listSchedules(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteSchedule(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Horarios/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listSchedules();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Aulas en CRUD

function listAulas(){
	$.ajax({url:'index.php/Aulas/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchAulas(){
	let search = $("#search").val();
	let e = $("#e").val();
	if(search != "" || e != ""){
		$.ajax({url:'index.php/Aulas/buscar', data: {search:search, e:e}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listAulas();
	}
}

function showformAula(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Aulas/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nueva Aula";
			}else{
				document.getElementById("title").innerHTML = "Editar Aula";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Aulas";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveAula(){
	let datos = $('#guardarAula').serializeArray(); $.ajax({url:'index.php/Aulas/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listAulas(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteAula(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Aulas/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listAulas();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Cursos en CRUD

function listCursos(){
	$.ajax({url:'index.php/Cursoss/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchCursos(){
	let search = $("#search").val();
	let i = $("#i").val();
	let f = $("#f").val();
	if(search != "" || i != "" || f != ""){
		$.ajax({url:'index.php/Cursoss/buscar', data: {search:search, i:i, f:f}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listCursos();
	}
}

function showformCurso(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Cursoss/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nuevo Curso";
			}else{
				document.getElementById("title").innerHTML = "Editar Curso";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Cursos";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveCurso(){
	let data = new FormData($("#guardarCurso")[0]); $.ajax({url:'index.php/Cursoss/saveData', data: data, processData:false, contentType:false, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listCursos(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteCurso(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Cursoss/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listCursos();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Grupo en CRUD

function listGrupos(){
	$.ajax({url:'index.php/Grupos/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchGrupos(){
	let search = $("#search").val();
	let i = $("#i").val();
	let f = $("#f").val();
	let e = $("#e").val();
	if(search != "" || i != "" || f != "" || e != ""){
		$.ajax({url:'index.php/Grupos/buscar', data: {search:search, i:i, f:f, e:e}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listGrupos();
	}
}

function showformGrupo(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Grupos/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nuevo Grupo";
			}else{
				document.getElementById("title").innerHTML = "Editar Grupo";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Grupos";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveGrupo(){
	let datos = $('#guardarGrupo').serializeArray(); $.ajax({url:'index.php/Grupos/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listGrupos(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteGrupo(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Grupos/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listGrupos();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Inscritos en CRUD

function listInscritos(){
	$.ajax({url:'index.php/Inscritos/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchInscritos(){
	let search = $("#search").val();
	let e = $("#e").val();
	if(search != "" || e != ""){
		$.ajax({url:'index.php/Inscritos/buscar', data: {search:search, e:e}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listInscritos();
	}
}

function showformInscrito(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Inscritos/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nuevo Inscrito";
			}else{
				document.getElementById("title").innerHTML = "Editar Inscrito";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Grupos";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveInscrito(){
	let datos = $('#guardarInscrito').serializeArray(); $.ajax({url:'index.php/Inscritos/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listInscritos(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteInscrito(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Inscritos/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listInscritos();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Instructores en CRUD

function listAlumnos(){
	$.ajax({url:'index.php/Alumnos/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchAlumnos(){
	let search = $("#search").val();
	if(search != ""){
		$.ajax({url:'index.php/Alumnos/buscar', data: {search:search}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listAlumnos();
	}
}

function showformAlumno(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Alumnos/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nuevo Alumno";
			}else{
				document.getElementById("title").innerHTML = "Editar Alumno";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Alumnos";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveAlumno(){
	let datos = $('#guardarAlumno').serializeArray(); $.ajax({url:'index.php/Alumnos/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listAlumnos(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteAlumno(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Alumnos/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listAlumnos();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Pagos en CRUD

function listPagos(){
	$.ajax({url:'index.php/Pagos/listar', type: 'POST', success: function(data){$('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow);}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function searchPagos(){
	let search = $("#search").val();
	let p = $("#p").val();
	let e = $("#e").val();
	if(search != "" || p != "" || e != ""){
		$.ajax({url:'index.php/Pagos/buscar', data: {search:search, p:p, e:e}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listPagos();
	}
}

function showformPago(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Pagos/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nuevo Pago";
			}else{
				document.getElementById("title").innerHTML = "Editar Pago";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Pagos";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function savePago(){
	let datos = $('#guardarPago').serializeArray(); $.ajax({url:'index.php/Pagos/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listPagos(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deletePago(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Pagos/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listPagos();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Fin

//Funciones para Beca en CRUD

function listBecas(){
	$.ajax({url:'index.php/Beca/listar', type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
}

function searchBecas(){
	let search = $("#search").val();
	if(search != ""){
		$.ajax({url:'index.php/Beca/buscar', data: "search="+search, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listBecas();
	}
}

function showformBeca(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/Beca/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nueva Beca";
			}else{
				document.getElementById("title").innerHTML = "Editar Beca";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Becas";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveBeca(){
	let datos = $('#guardarBeca').serializeArray(); $.ajax({url:'index.php/Beca/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listBecas(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteBeca(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/Beca/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listBecas();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
		}
	}
}

//Funciones para Solicitud de beca en CRUD

function listSolBecas(){
	$.ajax({url:'index.php/SolBecas/listar', type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
}

function searchSolBecas(){
	let search = $("#search").val();
	let e = $("#e").val();
	if(search != "" || e != ""){
		$.ajax({url:'index.php/SolBecas/buscar', data: {search:search, e:e}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listSolBecas();
	}
}

function showformSolBeca(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/SolBecas/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nueva Solicitud";
			}else{
				document.getElementById("title").innerHTML = "Editar Solicitud";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Solicitud de becas";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveSolBeca(){
	let datos = $('#guardarSolBeca').serializeArray(); $.ajax({url:'index.php/SolBecas/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listSolBecas(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteSolBeca(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/SolBecas/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listSolBecas();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("Este registro no se puede borrar porque esta enlazado a otra tabla")});
		}
	}
}

//Fin

//Funciones para autorizacion de becas

function listAutBecas(){
	$.ajax({url:'index.php/AutBecas/listar', type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
}

function searchAutBecas(){
	let search = $("#search").val();
	if(search != ""){
		$.ajax({url:'index.php/AutBecas/buscar', data: {search:search}, type:'POST', success: function(data){ $('#en_lista').html(data);}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
	}else{
		listAutBecas();
	}
}

function showformAutBeca(id=''){
	let btn = document.getElementById("btnForm");
	if(btn.click){
		if(btn.className == "btn btn-success"){
			$.ajax({url:'index.php/AutBecas/showForm', data: "id="+id, type:'POST', 
			success: function(data){$('#form').html(data);
			if(id == ''){
				document.getElementById("title").innerHTML = "Nueva Autorizacion";
			}else{
				document.getElementById("title").innerHTML = "Editar Autorizacion";
			}
			document.getElementById("table").style.display = "none";
			btn.className = "btn btn-danger";
			document.getElementById("faIconF").className = "fa fa-close";}, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
			
		}else if(btn.className == "btn btn-danger"){
			$("#form").html("");
			document.getElementById("title").innerHTML = "Autorizacion de becas";
			document.getElementById("table").style.display = "block";
			btn.className = "btn btn-success";
			document.getElementById("faIconF").className = "fa fa-plus";
		}
	}
}

function saveAutBeca(){
	let datos = $('#guardarAutBeca').serializeArray(); $.ajax({url:'index.php/AutBecas/saveData', data:{datos:datos}, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Guardado correcto"); listAutBecas(); $('#btnForm').click();}}, error: function(fqXHR, textStatus,errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error")});
}

function deleteAutBeca(id){
	if(id != null){
		if(confirm("¿Deseas eliminar el registro?")){
			$.ajax({url:'index.php/AutBecas/deleteData', data: "id="+id, type:'POST', success: function(data){if(data != 'ok'){alert(data);}else{alert("Registro eliminado"); listAutBecas();}}, error: function(fqXHR, textStatus, errorThrow){console.log(errorThrow)}}).fail(function(){alert("Este registro no se puede borrar porque esta enlazado a otra tabla")});
		}
	}
}

//Fin

//Funcion para reportes

function PdfCurso(){
	$.ajax({url:'index.php/Reportes/Pdf', type:'POST', success: function(data){ if(data){alert();} }, error: function(fqXHR, textStatus, errorThrow){ console.log(errorThrow)}}).fail(function(){alert("La peticion se termino de ejecutar pero hubo un error");});
}
