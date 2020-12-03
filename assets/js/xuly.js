$( document ).ready(function() {	
	//Xóa sinh viên
	$('.dele').click(function(){
		let id=$(this).data('id');
		//let hinh=$(this).data('image');
		$('#deletesv').click(function(){
			$.ajax({
				url:'controller/ajaxController.php',
				type:'post',
				data:{
					id:id,
					//hinh:hinh,
					action:"destroy"
				},
				success:function($result){
					alert($result);
					$('#deleteItem').modal('hide');
					location.reload();
				}
			});
		});
	});
	//Thêm sinh viên
	$('#addSV').click(function(){
		let file_data=$('#hinh').prop('files')[0];
		let file_type=file_data.type;
		let file_size=file_data.size;
		let type=["image/gif","image/png","image/jpg","image/jpeg"];
		if(file_size<=1048576){
			if(file_type===type[0] || file_type===type[1] || file_type===type[2] |file_type===type[3] ){
				let form_data=new FormData();
				form_data.append('file',file_data);
				form_data.append('tensv',$('#tensv').val());
				form_data.append('ngaysinh',$('#ngaysinh').val());
				form_data.append('gioitinh',$('#gioitinh').val());
				form_data.append('email',$('#email').val());
				form_data.append('phone',$('#phone').val());
				form_data.append('diachi',$('#diachi').val());
				form_data.append('action','addSV');
				$.ajax({
					url:'controller/ajaxController.php',
					dataType: 'text',
					contentType: false,
					processData: false,
					data: form_data,
					type: 'post',
					success: function(result){
						alert(result);
						location.reload();
						console.log(result);
					}
				});
			}else{
				alert("File bạn chọn không là hình ảnh");
				$('#hinh').val('');
			}
		}else{
			alert("Bạn không được upload hình quá 1mb");
			$('#hinh').val('');
		}
	})
	//Sửa sinh viên
	$('.edit').click(function(){
		let id=$(this).data("id");
		var hinh="";
		$.ajax({
			url:"controller/ajaxController.php",
			dataType:"json",
			data:{
				action:"edit",
				id:id
			},
			type:"post",
			success:function($result){
				console.log($result);
				//alert($result.TenSV);
				$(".tensv").val($result.TenSV);
				$(".ngaysinh").val($result.NgaySinh);
				$(".email").val($result.Email);
				$(".phone").val($result.Phone);
				$(".diachi").val($result.DiaChi);
				hinh=$result.Hinh;
				$(".thumbnail").attr("src","public/upload/"+hinh);
			}
		});
		$('.update').click(function(){
			let file_data=$('.hinh').prop('files')[0];
			let form_data=new FormData();
			form_data.append('tensv',$('.tensv').val());
			form_data.append('id',id);
			form_data.append('ngaysinh',$('.ngaysinh').val());
			form_data.append('gioitinh',$('.gioitinh').val());
			form_data.append('email',$('.email').val());
			form_data.append('phone',$('.phone').val());
			form_data.append('diachi',$('.diachi').val());
			form_data.append('action','update');
			//console.log(file_data);
			if(file_data){
				let file_type=file_data.type;
				let file_size=file_data.size;
				let type=["image/gif","image/png","image/jpg","image/jpeg"];
				if(file_size<=1048576){
					if(file_type===type[0] || file_type===type[1] || file_type===type[2] |file_type===type[3] ){
						form_data.append('file',file_data);
					}
					else{
						alert("File bạn chọn không là hình ảnh");
						$('#hinh').val('');
					}
				}else{
					alert("File bạn chọn quá lớn");
					$('#hinh').val('');
				}
			}
			$.ajax({
				url:'controller/ajaxController.php',
				dataType: 'text',
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(result){
					alert(result);
					location.reload();
					//console.log(result);
				}
			});	
		});
	});
	$('.search').click(function(){
		var key=$(".key").val();
		$.ajax({
			url:'controller/ajaxController.php',
			dataType: 'json',
			data: {
				k:key,
				action:"search",
			},
			type: 'post',
			success: function(result){
				//alert(result);
				//location.reload();
				//console.log(result.length);
				var html="";
				if(result.length>0){
					$.each(result,function(key,item){
						html+="<tr>";
							html+="<td>";
								html+=item['id'];
							html+="</td>";		
							html+="<td>";
								html+=item['TenSV'];
							html+="</td>";
							html+="<td>";
								html+=item['NgaySinh'];
							html+="</td>";
							html+="<td>";
								html+=item['GioiTinh'];
							html+="</td>";
							html+="<td>";
								html+=item['Email'];
							html+="</td>";
							html+="<td>";
								html+=item['Phone'];
							html+="</td>";
							html+="<td>";
								html+=item['DiaChi'];
							html+="</td>";
							html+="<td>";
								html+="<img width='100' height='100' src='public/upload/"+item["Hinh"]+"'>";
							html+="</td>";
							html+="<td>";
								html+="<button type='button' style='margin-bottom:5px;' class='btn btn-primary edit' data-id='"+item['id']+"' data-toggle='modal' data-target='#editItem'>Edit</button>";
							html+="</td>";
							
						html+="</tr>";
					});
				}else{
					html+="<td colspan='9' style='text-align:center'>";
						html+="<b>Không tìm thấy kết quả cho từ khóa "+key+"</b>";
					html+="</td>";
				}
				$('#dulieu').html(html);
			}
		});	
	});

});
