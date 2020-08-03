$(function(){
	
	$('#addCart').submit(function(e){
		e.preventDefault();

	    var formData = new FormData(this);
		var dataTye = $(this).data('type');
				
		$.ajax({

			url: this.action,
			type: this.method,
			data: formData,
			dataType: dataTye,
			processData:false,
			contentType:false,
			success(data){
				 swal({
	                title: 'Successfully!',
	                text: data.success,
	                icon: 'success',
	                button: 'ok',
	                timer:3000,
	            });

				return cartItmes();

			}

		});

	});

	function cartItmes(){

		var url = window.origin + '/cartitmes';

		$.ajax({

			url: url,
			type: 'GET',
			dataType: 'HTML',
			success(data){
				 $('#cartItems').html(data);
			}

		});
	}

	function cartPage(){

		var url = window.origin + '/cartpage';

		$.ajax({

			url: url,
			type: 'GET',
			dataType: 'HTML',
			success(data){
				 $('tbody').html(data);
			}

		});
	}

	$(document).on('click','.increase',function(){

		var rowid = $(this).data('rowid');
		var qty = $(this).prev().val();
		var url = window.origin + '/cart/update';
		
		$.ajax({

			url: url,
			type: "GET",
			data: {qty:qty, rowid:rowid },
			dataType: "JSON",
			beforeSend(){
				$('.preloder').fadeIn(1000);
			},
			success(data){
				
				return cartItmes() + cartPage();

			},
			complete(){
				$('.preloder').fadeOut();
			},
				

		});


	});

	$(document).on('click','.reduced',function(){

		var rowid = $(this).data('rowid');
		var qty = $(this).prev().prev().val();
		var url = window.origin + '/cart/update';
		
		$.ajax({

			url: url,
			type: "GET",
			data: {qty:qty, rowid:rowid },
			dataType: "JSON",
			beforeSend(){
				$('.preloder').fadeIn(1000);
			},
			success(data){
				 
				return cartItmes() + cartPage();

			},
			complete(){
				$('.preloder').fadeOut();
			},
				

		});


	});

	$(document).on('click','.btn_remove',function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$.ajax({

			url: url,
			type: "GET",
			dataType: "JSON",
			beforeSend(){
				$('.preloder').fadeIn(1000);
			},
			success(data){
				 
				return cartItmes() + cartPage();

			},
			complete(){
				$('.preloder').fadeOut();
			},
				

		});


	});

});
