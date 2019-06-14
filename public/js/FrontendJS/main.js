/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

$(document).ready(function(){
		$("#sellsize").change(function(){
				var idSize = $(this).val();
				if(idSize == ""){
					return false;
				}
				$.ajax({
						type:'get',
						url:'/getproductprice',
						data:{idSize:idSize},
						success:function(resp){
								var arr = resp.split('#');
								$("#getPrice").html("RM "+arr[0]);
								$("#price").val(arr[0]);
								if(arr[1]==0){
									$("#cartButton").hide();
									$("#Ava").text("Out of Stock");
								}else{
									$("#cartButton").show();
									$("#Ava").text("In Stock");
								}
						},error:function(){
								alert("Error");
						}
				});
		});
});

$(document).ready(function(){
	$(".changeImage").click(function(){
		var image = $(this).attr('src');
		$(".mainImage").attr("src", image);
	});
});


$().ready(function(){
	//validate signup form
	$("#register").validate({
		rules:{
			name:{
				required: true,
				minlength: 2,
				accept: "[a-zA-z]+"
			},
			password:{
				required: true,
				minlength: 6
			},
			email:{
				required: true,
				email:true,
				remote:"/checkemail"
			}
		},
		messages:{
			name:{
				required:"Please enter your Name",
				lettersonly:"your name should be in letter only !",
				accept:"your name should be A-Z only !"
			},
			password:{
				required:"Please provide your password",
				minlength:"Your Password must be at least 6 characters"
			},
			email:{
				required:"Please enter your email",
				email:"please enter valid email",
				remote:"Email already Exist!"
			}
		}
	})
	//password strength
	$('#myPassword').passtrength({
		minChars: 6,
		passwordToggle: true,
		tooltip: true,
		eyeImg: "/images/Frontendimages/eye.svg"
	});
	$("#passwordform").validate({
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
	$("#currentpwd").keyup(function(){
		var currentpwd = $(this).val();
		$.ajax({
			type:'get',
			url:'/checkpwd1',
			data:{currentpwd:currentpwd},
			success:function(resp){
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is incorrect</font>")
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is correct</font>")
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//Copy billing to shipping
	$("#billship").click(function(){
		if(this.checked){
			$("#shippingname").val($("#billingname").val());
			$("#shippingaddress").val($("#billingaddress").val());
			$("#shippingcity").val($("#billingcity").val());
			$("#shippingstate").val($("#billingstate").val());
			$("#shippingcountry").val($("#billingcountry").val());
			$("#shippingcode").val($("#billingcode").val());
			$("#shippingnumber").val($("#billingnumber").val());
		}else{
			$("#shippingname").val('');
			$("#shippingaddress").val('');
			$("#shippingcity").val('');
			$("#shippingstate").val('');
			$("#shippingcountry").val('');
			$("#shippingcode").val('');
			$("#shippingnumber").val('');
		}
	});
});

