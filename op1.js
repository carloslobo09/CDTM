$(document).ready(function(){
	$(".btn-modificar-pers").on("click", function(e){
		e.preventDefault();
		var urlDir=$(this).attr("href");
		swal({
		  title: '¿Estás seguro?',
          text: "¿Desea modificar?",
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Guardar',
		  cancelButtonText: 'Cancelar'
        })
        .then(function(){
            swal({
                type:'success',
                title:'Datos guardados con exito',
                showConfirmButton: false,
                 timer: 1300
            })
            document.tuformulario.submit()
        });
        
	});
});
$(document).ready(function(){
	$(".btn-exit-pers").on("click", function(e){
		e.preventDefault();
		var urlDir=$(this).attr("href");
		swal({
		  title: '¿Estás seguro?',
		  text: "¿Desea eliminar?",
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Eliminar',
		  cancelButtonText: 'Cancelar'
        })
        .then(function () {
		  window.location.href=urlDir;
		});
	});
});