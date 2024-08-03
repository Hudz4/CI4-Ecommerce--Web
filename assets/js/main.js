$(document).ready(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
 
            reader.onload = function(e) {
                $('.jcrop-holder').replaceWith('');
                $('#dp_preview').replaceWith('<img class="crop" id="dp_preview" src="' + e.target.result + '" />');
 
                $('.crop').Jcrop({
                    onSelect: updateCoords,
                    onChange: updateCoords,
                    bgOpacity: '.5',
                    bgColor: 'black',
                    addClass: 'jcrop-dark',
                    maxSize: [900, 900]
                });


            }
 
            reader.readAsDataURL(input.files[0]);
            
        }
    }
 
    $('#image').change(function() {
        readURL(this);
    });

     $('#crop').Jcrop({
          aspectRatio: 1,  //If you want to keep aspectRatio
          boxWidth: 650,   //Maximum width you want for your bigger images
          boxHeight: 400,  //Maximum Height for your bigger images
          onSelect: updateCoords 
     },function()
     {
          alert('Now you see smaller preview of your bigger one.');
     });
 
    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#x2').val(c.x2);
        $('#y2').val(c.y2);
        $('#w').val(c.w);
        $('#h').val(c.h);
        // console.log(c);
    };
});