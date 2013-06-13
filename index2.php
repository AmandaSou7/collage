<html>
	<head>
		<title>Project</title>
		<script src='js/jquery-1.9.1.js'></script>
		<script src='js/jquery-ui-1.10.2.custom.js'></script>
		<!--<script src='js/autoload.js'></script>-->
		<script>
			$(document).ready( function () {
				// $(document).click(function(evt) {
				// 	evt = (evt || event);
				// 	alert(evt.clientX + ' ' + evt.clientY);
				// });

				$('#dragimg').draggable({
					stop: function () {
						var finalxPos = $(this).css('left');
						var finalyPos = $(this).css('top');
						//alert("Drag stopped!\n\nOffset: ("
								// + finalxPos + ', ' + 
								// finalyPos + ')\n');
						$("#crop[name='finalX']").val(finalxPos);
						$("#crop[name='finalY']").val(finalyPos);
					}
				});

				$('img').click( function (event) {
					var elOffsetX = $(this).offset().left,
						elOffsetY = $(this).offset().top,
						clickOffsetX = event.pageX - elOffsetX,
						clickOffsetY = event.pageY - elOffsetY;

						//clickOffsetX and clickOffsetY are the clicked coordinates
						//relative to the image.
				});

				// var img = new Image();
				// img.onload = function () {

				//   var result = ScaleImage(img.width, img.height, 300, 200, true);

				//   ctx.drawImage(img, result.targetleft, result.targetright, result.width, result.height); // resizes image to a target size of 300x200 using letterbox mode
				// }
				// img.src = 'cute.jpg';
			});
		</script>
		<link href='css/styles.css' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<img src='cute.jpg' alt='bunny_cart' id='dragimg' />
		<!--<script>
			$('img').each( function () {
					var maxWidth = 100;	//Max width for the image
					var maxHeight = 100;	//Max height for the image
					var ratio = 0;	// Used for aspect ratio
					alert($('img').width());
					var width = $(this).width();	// Current image width
					var height = $(this).height();	// Current image height
					// Check if the current width is larger than the max
					if(width > maxWidth)
					{
						ratio = maxWidth / width;	// Get ratio for scaling image
						$(this).css('width', maxWidth);	// Set new width
						$(this).css('height', height * ratio);	// Scale height based on ratio
						height = height * ratio;	// Reset height to match scaled image
						width = width * ratio;	// Reset width to match scaled image
					}

					// Check if current height is larger than max
					if(height > maxHeight)
					{
						ratio = maxHeight / height;	// Get ratio for scaling image
						$(this).css('height', maxHeight);	// Set new height
						$(this).css('width', width * ratio);	// Set width based on ratio
						width = width * ratio;	// Reset width to match scaled image
					}
					alert(width + 'x' + height);
				});
		</script>-->
	</body>
</html>