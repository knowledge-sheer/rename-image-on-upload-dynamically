<html>
<head>
	<title>Image Upload</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6 col-offset-2 col-12 mx-auto">
				<form action="preview.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="file" name="image" id="file-input" class="form-control">
					</div>
					<div class="mb-3" id="thumb-output"></div>
					<div class="form-group text-center">
						<input type="submit" name="generate" class="btn btn-primary" value="Generate">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script>
// Image Preview
$(document).ready(function(){
	$('#file-input').on('change', function() { 
		if (window.File && window.FileReader && window.FileList && window.Blob) {
			$('#thumb-output').html('');
			var data = $(this)[0].files;
			$.each(data, function(index, file) { 
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { 
					var fRead = new FileReader();
					fRead.onload = (function(file) { 
						return function(e) {
						var img = $('<img/>').addClass('thumb').attr('src', e.target.result);
						$('#thumb-output').append(img);
					};
				})(file);
					fRead.readAsDataURL(file);
				}
			});
		} else {
			alert("Your browser doesn't support File API!");
		}
	});
});
</script>
</html>