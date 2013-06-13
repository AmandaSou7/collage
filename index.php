<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Project 1</title>

    <!-- Javascript / JQuery -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/kinetic-v4.5.0.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script>
      $(document).ready(function () {
        // JavaScript delete workarea
        $('#discard_canvas_btn').click( function () {
          discard();
        });

        // JQuery to add pictures
        $('#add_btn').click( function () {
            $('#upload').val('');
            $('#upload').click();
        });
        $('#upload').live('change', function () {
          $('#submit').click();
        });
        $('form').submit(function(){
          var frm_data = new FormData($('#upload'));
          jQuery.each($('#upload')[0].files, function(i, file) {
              frm_data.append('upload', file);
          });

              $.ajax({
              url: 'upload.php',
              data: frm_data,
              cache: false,
              contentType: false,
              processData: false,
              type: 'POST',
              success: function(data){
                var str = eval("(" + data + ")");   //parse string to array
                if (str.error)
                {
                  alert(str.error);
                }
                else
                {
                  $('#workarea').append("<div class='draggable'><img src='" + str.filepath + "' alt= '" + str.filename + "' class='resizable ui-widget-content' /></div>");
                  $('img[src="' + str.filepath + '"]').load( function () {
                    $('.draggable').draggable();
                    $('.resizable').resizable();
                    $('img[src="' + str.filepath + '"]').parent().width(str.width);
                    $('img[src="' + str.filepath + '"]').parent().height(str.height);
                  });
                }

                $('img[src="' + str.filepath + '"]').click( function () {
                  $('#last_img_clicked').text($(this).attr('src'));
                });

                $('.draggable').hover( function () {
                  $(this).css('border', '6px solid orange');
                }, function () {
                  $(this).css('border', '');
                });

                $('#remove_btn').click( function () {
                  $('img[src="' + $('#last_img_clicked').text() + '"]').remove();
                });
              }
          });
          return false;
        });
      });
    </script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <!-- CSS Style Sheets -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="CSS/bootstrap-responsive.css" rel="stylesheet" />
    <link href="CSS/styles.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
    <div id="top_horizontal_commandbar" class="btn-toolbar btn-group">
        <!-- <a id="upload_btn" class="btn"><i class="icon-upload"></i>Upload</a> -->
        <a id="download_btn" class="btn"><i class="icon-download"></i>Download</a>
        <a id="zoom_in_btn" class="btn"><i class="icon-zoom-in" onClick="ZoomIn()"></i>Zoom-In</a>
        <a id="zoom_out_btn" class="btn"><i class="icon-zoom-out" onClick="ZoomOut()"></i>Zoom-Out</a>
        <a id="email_btn" class="btn"><i class="icon-envelope"></i>E-mail</a>
        <a id="print_btn" class="btn"><i class="icon-print"></i>Print</a>
        <a id="discard_canvas_btn" class="btn" onClick="discard()"><i class="icon-trash"></i>Discard Canvas</a>
    </div>

    <div id="center_container">
      <div id="left_side_vertical_toolbar" class="btn-group btn-group-vertical">
          <form action="upload.php" method="post" enctype="multipart/form-data" target="submit-iframe">
            <input type="submit" id="submit" name="submit" value="submit" class="hidden" />
            <input type="file" id="upload" name="upload" class="hidden" />
          </form>
          <a id="add_btn" class="btn"><i class="icon-picture"></i>Add New Picture</a>
          <a id="remove_btn" class="btn"><i class="icon-remove-circle"></i>Remove Picture</a>
          <a id="insert_clip_art_btn" class="btn"><i class="icon-heart"></i>Insert Clip Art</a>
          <a id="insert_shapes_btn" class="btn"><i class="icon-star"></i>Insert Shapes</a>
          <a id="draw_btn" class="btn"><i class="icon-pencil"></i>Draw</a>
          <a id="color_btn" class="btn"><i class="icon-tint"></i>Change Color</a>
          <!-- <a id="resize_btn" class="btn"><i class="icon-resize-small"></i>Resize</a> -->
          <a id="crop_btn" class="btn"><i class="icon-edit"></i>Crop</a>
          <a id="lookup_btn" class="btn"><i class="icon-search"></i>Find Lost Image</a>
      </div>
    
      <a id="last_img_clicked" class="hidden"></a>
      <div id='workarea'>
      <!--   <p><label>Drawing tool: <select id="dtool">
          <option value="rect">Rectangle</option>
          <option value="pencil">Pencil</option>
        </select></label></p> -->
        <!-- <canvas id='imageView' width='400' height='300'>
        </canvas> -->
        <!-- <canvas id='canvas'> -->
      <!-- START OF JS -->
          <!-- <script src="js/draw.js"></script> -->
          <!--<script type="text/javascript" src="js/pic_mobility.js"></script>
          <script>
            var sources = {
              darthVader: 'http://www.html5canvastutorials.com/demos/assets/darth-vader.jpg',
              yoda: 'http://www.html5canvastutorials.com/demos/assets/yoda.jpg'
            };
            loadImages(sources, initStage());

          </script>-->
      <!-- END OF JS -->
        <!-- </canvas>  -->
    </div>

    <div class="clear"></div>

  </body>
</html>