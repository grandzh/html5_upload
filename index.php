<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>drag_drop</title>
<link rel="stylesheet" type="text/css" href="html5_upload.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>

<div class="dashboard_target_box" id="dashboard_target_box">
	拖动到这里
</div>
<script>
$(document).on({dragleave:function(e){
					e.preventDefault();
					$('.dashboard_target_box').removeClass('over');
				},
				drop:function(e){
					 e.preventDefault();
				},
				dragenter:function(e){
					e.preventDefault();
					$('.dashboard_target_box').addClass('over');
				},
				dragover:function(e){
					e.preventDefault();
					$('.dashboard_target_box').addClass('over');	
				}
				});
				
var box=document.getElementById('dashboard_target_box');
box.addEventListener("drop",function(e){
		e.preventDefault();
		var fileList=e.dataTransfer.files;
		if(fileList.length==0){
			$('.dashboard_target_box').removeClass('over');
			return;
		}
		else{
			xhr=new XMLHttpRequest();
			xhr.open("post",'upload.php',true);
			xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");
			
			var fd=new FormData();
			fd.append('ff',fileList[0]);
			xhr.send(fd);
				
		}
		
		
	});
				

</script>
</body>
</html>