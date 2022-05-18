<link rel="stylesheet" href="<?php echo URLROOT . 'css/editShipping.css'; ?>">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Edit FAQ</title>
<?php

class editPayment extends View{

    public function output()
    {

    require APPROOT . '/views/inc/header.php';
        ?>
        <div class="box-1">
            <h1> Edit Shipping </h1>
        </div>

        <form action="" method="POST" enctype='multipart/form-data'>
            <div class="newContainer">
                <input type="text" name="title" value="<?php echo $this->model->getTitle(2);?>">
            </div>


            <div id="image-container">
                
                
                <img id='drag-image' src="#" alt="your image"/>
                <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);">
                <!-- <img id="blah" src="#" alt="your image" /> -->
                <!-- <input type="file" onchange="readURL(this);" /> -->
            </div>

            <div class="child">
                <?php
                    for($i=6; $i<8; $i++){
                ?>
                        <textarea style="resize: none;"  name="<?php echo "text".$i; ?>" > <?php echo $this->model->getText($i);?> </textarea><br><br>
                <?php
                    }
                ?>
                <button type="submit" value="3" id="updateFAQ" name="submit">Update FAQ </button>
            </div>
            <div class="upload-button">
                <input type="submit" value="Upload Image" name="submit">
            </div>
       
        </form>


        <script>

           var _DRAGGGING_STARTED = 0;
            var _LAST_MOUSEMOVE_POSITION = { x: null, y: null };
            var _DIV_OFFSET = $('#image-container').offset();
            var _CONTAINER_WIDTH = $("#image-container").outerWidth();
            var _CONTAINER_HEIGHT = $("#image-container").outerHeight();
            var _IMAGE_WIDTH;
            var _IMAGE_HEIGHT;
            var _IMAGE_LOADED = 0;

            // Check whether image is cached or wait for the image to load 
            // This is necessary before calculating width and height of the image
            if($('#drag-image').get(0).complete) {
                ImageLoaded();
            }
            else {
                $('#drag-image').on('load', function() {
                    ImageLoaded();
                });
            }

            // Image is loaded
            function ImageLoaded() {
                _IMAGE_WIDTH = $("#drag-image").width();
                _IMAGE_HEIGHT = $("#drag-image").height();
                _IMAGE_LOADED = 1;	
            }

            $('#image-container').on('mousedown', function(event) {
                /* Image should be loaded before it can be dragged */
                if(_IMAGE_LOADED == 1) { 
                    _DRAGGGING_STARTED = 1;

                    /* Save mouse position */
                    _LAST_MOUSE_POSITION = { x: event.pageX - _DIV_OFFSET.left, y: event.pageY - _DIV_OFFSET.top };
                }
            });

            $('#image-container').on('mouseup', function() {
                _DRAGGGING_STARTED = 0;
            });

            $('#image-container').on('mousemove', function(event) {
                if(_DRAGGGING_STARTED == 1) {
                    var current_mouse_position = { x: event.pageX - _DIV_OFFSET.left, y: event.pageY - _DIV_OFFSET.top };
                    var change_x = current_mouse_position.x - _LAST_MOUSE_POSITION.x;
                    var change_y = current_mouse_position.y - _LAST_MOUSE_POSITION.y;

                    /* Save mouse position */
                    _LAST_MOUSE_POSITION = current_mouse_position;

                    var img_top = parseInt($("#drag-image").css('top'), 10);
                    var img_left = parseInt($("#drag-image").css('left'), 10);

                    var img_top_new = img_top + change_y;
                    var img_left_new = img_left + change_x;

                    /* Validate top and left do not fall outside the image, otherwise white space will be seen */
                    if(img_top_new > 0)
                        img_top_new = 0;
                    if(img_top_new < (_CONTAINER_HEIGHT - _IMAGE_HEIGHT))
                        img_top_new = _CONTAINER_HEIGHT - _IMAGE_HEIGHT;

                    if(img_left_new > 0)
                        img_left_new = 0;
                    if(img_left_new < (_CONTAINER_WIDTH - _IMAGE_WIDTH))
                        img_left_new = _CONTAINER_WIDTH - _IMAGE_WIDTH;

                    $("#drag-image").css({ top: img_top_new + 'px', left: img_left_new + 'px' });
                }
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                    $('#drag-image').attr('src', e.target.result).width(this.width).height(this.height);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            var dragposition = '';

            $('#drag-image').draggable({
            // other options...
            drag: function(event,ui){
                dragposition = ui.position;
            }
            });
            
            var inputdrag = '<input type="hidden" id="dragposition" value="'+dragposition.left+','+dragposition.top+'"/>'
                $('#myform').append(inputdrag);
    </script>

    <?php

    
        echo "<br><br><br><br>";
        require APPROOT . '/views/inc/footer.php';
    }
}
?>