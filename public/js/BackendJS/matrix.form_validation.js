
$(document).ready(function(){
	
	$("#currentpwd").keyup(function(){
		var currentpwd = $("#currentpwd").val();
		$.ajax({
				type:'get',
				url:'/admin/check-pwd',
				data:{currentpwd:currentpwd},
				success:function(resp){
					//alert(resp);
					if(resp=="false"){
						$("#chkPwd").html("<font color='red'>Current Password Incorrect</font>");
					}else if(resp=="true"){
						$("#chkPwd").html("<font color='green'>Current Password Correct</font>");
					}
				},error:function(){
					alert("Error")
				}
		})
	});

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	// Add Category Validation
	$("#add_category").validate({
		
		rules:{
			categoryname:{
				required:true,
				accept: "[a-zA-Z]+"
			},
			description:{
				required:true,
			},
			url:{
				required:true,
				accept: "[a-zA-Z]+"
			}
		},
		messages:{
			categoryname:{
				accept:"your Category name should be A-Z only !"
			},
			url:{
				accept:"your URL name should be A-Z only !"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
		// Add product Validation
		$("#add_product").validate({
			rules:{
				productname:{
					required:true
				},
				productcolor:{
					required:true
				},
				productcode:{
					required:true
				},
				productprice:{
					required:true,
					number:true
				},
				description:{
					required:true,
				},
				url:{
					required:true,
				},
				productimage:{
					required:true,
				}
			},
			errorClass: "help-inline",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error');
				$(element).parents('.control-group').addClass('success');
			}
		});
		// edit product Validation
		$("#edit_product").validate({
			rules:{
				productname:{
					required:true
				},
				productcolor:{
					required:true
				},
				productcode:{
					required:true
				},
				productprice:{
					required:true,
					number:true
				},
				description:{
					required:true,
				},
				url:{
					required:true,
				}
			},
			errorClass: "help-inline",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error');
				$(element).parents('.control-group').addClass('success');
			}
		});
		// edit Category Validation
		$("#edit_category").validate({
			rules:{
				categoryname:{
					required:true,
					accept: "[a-zA-Z]+"
				},
				description:{
					required:true,
				},
				url:{
					required:true,
					accept: "[a-zA-Z]+"
				}
			},
			messages:{
				categoryname:{
					accept:"your Category name should be A-Z only !"
				},
				url:{
					accept:"your URL name should be A-Z only !"
				}
			},
			errorClass: "help-inline",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error');
				$(element).parents('.control-group').addClass('success');
			}
		});

	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#add_admin").validate({
		rules:{
			name:{
				required:true,
				accept: "[a-zA-Z0-9]+"
			},
			email:{
				required:true,
				email:true
			},
			password:{
				required:true,
				minlength:8,
				maxlength:20
			}
		},
		messages:{
			categoryname:{
				accept:"your Category name should be Alphabet and Numeric only !"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			currentpwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			newpwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirmpwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#newpwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#deleteCat").click(function(){
			if(confirm('Are you sure you want to delete this category ?')){
				return true;
			}
			return false;
	})

	$("#deleteProduct").click(function(){
		if(confirm('Are you sure you want to delete this product ?')){
			return true;
		}
		return false;
})
$("#deleteCoupon").click(function(){
	if(confirm('Are you sure you want to delete this coupon ?')){
		return true;
	}
	return false;
})

$(document).ready(function(){
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<div class="field_wrapper"><div><br><label class="control-label"style="width:95px;"></label><input type="text" name="sku[]" placeholder="SKU" style="width:120px; margin-right:3px; margin-top:5px;"/><input type="text" name="size[]" placeholder="Size" style="width:120px; margin-right:3px; margin-top:5px;"/><input type="text" name="price[]" placeholder="Price" style="width:120px; margin-right:3px; margin-top:5px;"/><input type="text" name="stock[]" placeholder="Stock" style="width:120px; margin-right:3px; margin-top:5px;"/><a href="javascript:void(0);" class="remove_button">Remove</a></div></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	
	//Once add button is clicked
	$(addButton).click(function(){
			//Check maximum number of input fields
			if(x < maxField){ 
					x++; //Increment field counter
					$(wrapper).append(fieldHTML); //Add field html
			}
	});
	
	//Once remove button is clicked
	$(wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
	});

	$("#deleteatt").click(function(){
		if(confirm('Are you sure you want to delete this Attribute?')){
			return true;
		}
		return false;
	});
	
});

});
