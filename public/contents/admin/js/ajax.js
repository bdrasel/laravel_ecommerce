$(function(){
	$('#category').on('change',function(){
		var id = $(this).val();
		var url = window.origin + '/admin/subcategory/' + id;

		$.ajax({
			url: url,
			type: 'GET',
			dataType:'HTML',
			success:function(data){
				$('#subcategories').html(data);
			}

		})
	});

	$(document).on('click','#productCreate',function(){

		$.ajax({
			url: this.action,
			type: this.method,
			dataType: "JSON",
			success(data){
				console.log(data);
			}
		})


	})
})
