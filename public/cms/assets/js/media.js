if(typeof Dropzone != 'undefined')
{
	$('.btn-action').hide();

	var formDropzone = $('#dropzone-form');
	formDropzone.on('change', '[type="checkbox"]', function(){
		var checkboxNum = $('input:checked').length;
		if(checkboxNum > 0) {
			$('.btn-action').show();
		} else {
			$('.btn-action').hide();
		}
	});

	var previewNode = document.querySelector('#dropzone-preview');
	previewNode.id = "";
	var previewTemplate = previewNode.parentNode.innerHTML;
	previewNode.parentNode.removeChild(previewNode);

	var mediaDropzone = new Dropzone(document.querySelector("#dropzone-form"), { // Make the whole body a dropzone
		url: "/target-url", // Set the url
		thumbnailWidth: null,
		thumbnailHeight: null,
		previewTemplate: previewTemplate,
		previewsContainer: "#dropzone-previews", // Define the container to display the previews
		clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
	});

	mediaDropzone.on("addedfile", function(file) {
		var fileId = 'media' + document.querySelectorAll('.media-list-item').length;
		file.previewElement.getElementsByTagName('input')[0].setAttribute('id', fileId);
		file.previewElement.getElementsByTagName('label')[0].setAttribute('for', fileId);

		var imagesFileTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
	  	if( imagesFileTypes.indexOf(file.type) != -1 ){
			file.previewElement.querySelector('.media-item-file-details').style.display = 'none';
		} else if ( file.type === 'application/pdf' ){
			file.previewElement.querySelector('.media-item-file-details').style.display = 'block';
			file.previewElement.querySelector('.media-item-icon').innerHTML = '<i class="fas fa-file-pdf"></i>';
		} else if ( file.type === 'application/doc' | 'application/docx'){
			file.previewElement.querySelector('.media-item-file-details').style.display = 'block';
			file.previewElement.querySelector('.media-item-icon').innerHTML = '<i class="fas fa-file-word"></i>';
		} else if ( file.type === 'application/ppt' | 'application/pptx'){
			file.previewElement.querySelector('.media-item-file-details').style.display = 'block';
			file.previewElement.querySelector('.media-item-icon').innerHTML = '<i class="fas fa-file-powerpoint"></i>';
		} else if ( file.type === 'video/mp4' | 'video/webm' | 'video/mkv'){
			file.previewElement.querySelector('.media-item-file-details').style.display = 'block';
			file.previewElement.querySelector('.media-item-icon').innerHTML = '<i class="fas fa-file-video"></i>';
		} else if ( file.type === 'audio/mpeg'){
			file.previewElement.querySelector('.media-item-file-details').style.display = 'block';
			file.previewElement.querySelector('.media-item-icon').innerHTML = '<i class="fas fa-file-audio"></i>';
		} else {
			file.previewElement.querySelector('.media-item-file-details').style.display = 'block';
			file.previewElement.querySelector('.media-item-icon').innerHTML = '<i class="fas fa-file"></i>';
		}
	});

	mediaDropzone.on("success", function(file) {
		file.previewElement.querySelector(".media-list-item").classList.remove('uploading');
		file.previewElement.querySelector(".upload-progress").style.display = 'none';
		file.previewElement.querySelector(".media-item-file-extension").innerHTML = file.type;
	});

	mediaDropzone.on("error", function(file) {
		file.previewElement.querySelector(".media-list-item").classList.remove('uploading');
		file.previewElement.querySelector(".upload-progress").style.display = 'none';
		file.previewElement.querySelector(".media-item-file-extension").innerHTML = file.type;
	});
}