</div>
 

<footer id="footer" class=" text-white py-5" style="background-color:var(--secondary);">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 ">
                <h4 class="font-montse font-size-20">thriftHub</h4>
                <p class="font-size-14 font-rale text-white-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.</p>
            </div>
            <div class="col-lg-4 col-12">
     
                </form>
            </div>
            <div class="col-lg-3 col-12">
               
            </div>
        </div>
    </div>
</footer>

 
    <script type ="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type ="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type ="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- jcrop file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/js/jquery.Jcrop.min.js"></script>

    <!-- adminlogins file -->
    <script type="text/javascript" src="cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--  isotope plugin cdn  -->
    <script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>
   
    <script type ="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <link href="<?php echo base_url()?>assets/web/css/flexslider.css" rel='stylesheet' type='text/css' />
    <script defer src="<?php echo base_url()?>assets/web/js/jquery.flexslider.js"></script>

 
    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    
 

    <script type="text/javascript">
    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    //preview ang piktur
    </script>
    <script type="text/javascript">
    function readURL(input) {
    $('#previewLoad').show();
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image_preview').html('<img src="'+e.target.result+'" alt="'+reader.name+'" class="img-thumbnail" width="1080 " height="608 "/>');
        }

        reader.readAsDataURL(input.files[0]);
        $('#previewLoad').hide();
    }
    }
    function reset(){
    $('#image').val("");
    $('.image_preview').html("");
    }
    </script>
    <!--preview ang piktur (end)-->


    <script type="text/javascript"> //aleritfy
         <?php 
            if(isset($_SESSION['message']))
            { 
                ?>
                alertify.set('notifier','position', 'top-center');
                alertify.success('<?=$_SESSION['message']; ?>');
                <?php
                unset($_SESSION['message']);  
                
            }
        ?>
    </script>

    <script type="text/javascript"> //for users item
        var surl = "<?php echo site_url() ?>";
        var burl = "<?php echo base_url() ?>";
        var form = document.getElementById('f');
        $(document).ready(function() {
            $('.del_item').click(function(){
            var id=$(this).data('id');
            var text=$(this).data('text');
            $.ajax({
                type: 'POST',
                url: surl+'home/deleteitem',
                data:{
                    id:$(this).data('id'),
                    text:$(this).data('text')
                },
                success:function (data){
                    console.log(data);
                },
                error:function(){

                }

                });
            });    
        });
    </script>


    <script type="text/javascript">//modal all checkout

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    </script>

    <script type="text/javascript"> //for profile
        function toggleDisable(checkbox) {
          var toggle = document.getElementById("field_set");
          checkbox.checked ? toggle.disabled = false : toggle.disabled = true;
        }

        window.onload = function() {
            toggleDisable(document.getElementById('check'));
        }
    </script>

     <script type="text/javascript"> //for account
        function toggleDisable2(checkbox) {
          var toggle = document.getElementById("field_set2");
          checkbox.checked ? toggle.disabled = false : toggle.disabled = true;
        }

        window.onload = function() {
            toggleDisable(document.getElementById('check2'));
        }
    </script>

    
    <script type="text/javascript">
        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
         
                    reader.onload = function(e) {
                        $('.jcrop-holder').replaceWith('');
                        $('#dp_preview').replaceWith('<img class="crop" id="dp_preview" src="' + e.target.result + '" />');
                        $('#dp_preview1').replaceWith('<img class="crop1" id="dp_preview1" src="' + e.target.result + '" />');

                        $('.crop').Jcrop({
                            onSelect: updateCoords,
                            aspectRatio: 1,  
                            boxWidth: 300,   
                            boxHeight: 300,
                            bgOpacity: '.5',
                            bgColor: 'black',
                            addClass: 'jcrop-dark',
                            maxSize: [10000, 10000] //hehe
                        });
                        $('.crop1').Jcrop({
                            onSelect: updateCoords,
                            aspectRatio: 1,  
                            boxWidth: 300,   
                            boxHeight: 300,
                            bgOpacity: '.5',
                            bgColor: 'black',
                            addClass: 'jcrop-dark',
                            maxSize: [10000, 10000] //hehe
                        });

                    }
         
                    reader.readAsDataURL(input.files[0]);
                    
                }
            }
         
            $('#image').change(function() {
                readURL(this);
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
    </script>

    <script type="text/javascript"> //for cancelled users cart
        var surl = "<?php echo site_url() ?>";
        var burl = "<?php echo base_url() ?>";
        var form = document.getElementById('f');
        $(document).ready(function() {
            $('.delord').click(function(){
            var id=$(this).data('id');
            var text=$(this).data('text');
            $.ajax({
                type: 'POST',
                url: surl+'home/deleteOrd',
                data:{
                    id:$(this).data('id'),
                    text:$(this).data('text')
                },
                success:function (data){
                    console.log(data);
                },
                error:function(){

                }

                });
            });    
        });
    </script>
