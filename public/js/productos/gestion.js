$(document).ready(function() {

	$('#productos_table').DataTable({
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
		},
		responsive: true,
		pagingType: "full_numbers"
	});
	$(document).on('click','.bloquear', function(e){
		var id = $(this).data('id');
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
			},
			url: baseUrl+'/productos/bloquear',
			type: 'POST',
			data: {id: id},
			dataType: 'json',
			success:(json)=> {
				location.reload();
			}
		}); 
	});
});