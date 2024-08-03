</div>
</div>


    <footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-6">
            </div>
            
        </div>
    </div>
    
    </footer>
</div>

    <script type ="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type ="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type ="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- jcrop file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/js/jquery.Jcrop.min.js"></script>

    <!-- Owl Carousel Js file -->
   <script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <!--  isotope plugin cdn  -->
    <script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>
   
    <script type ="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript"> //for users cart
        var surl = "<?php echo site_url() ?>";
        var burl = "<?php echo base_url() ?>";
        var form = document.getElementById('f');
        $(document).ready(function() {
            $('.msg').click(function(){
            var id=$(this).data('id');
            var text=$(this).data('text');
            $.ajax({
                type: 'POST',
                url: surl+'admin/chat_backend'+id,
                data:{
                    id:$(this).data('id'),
                    text:$(this).data('text')
                },
                success:function (data){
                    console.log('ajax returned: ');
                    console.log(data);
                
                },
                error:function(){

                }

                });
            });    
        });
    </script>
 

    <script type="text/javascript"> //for users cart
        var surl = "<?php echo site_url() ?>";
        var burl = "<?php echo base_url() ?>";
        var form = document.getElementById('f');
        $(document).ready(function() {
            $('.delcart').click(function(){
            var id=$(this).data('id');
            var text=$(this).data('text');
            $.ajax({
                type: 'POST',
                url: surl+'admin/deleteCart',
                data:{
                    id:$(this).data('id'),
                    text:$(this).data('text')
                },
                success:function (data){
                    console.log('ajax returned: ');
                    console.log(data);
                
                },
                error:function(){

                }

                });
            });    
        });
    </script>

     <script type="text/javascript"> //for user
        var surl = "<?php echo site_url() ?>";
        var burl = "<?php echo base_url() ?>";
        var form = document.getElementById('f');
        $(document).ready(function() {
            $('.deluser').click(function(){
            var id=$(this).data('id');
            var text=$(this).data('text');
            $.ajax({
                type: 'POST',
                url: surl+'admin/deleteuser',
                data:{
                    id:$(this).data('id'),
                    text:$(this).data('text')
                },
                success:function (data){
                     console.log('ajax returned: ');
                    console.log(data);
                },
                error:function(){

                }

                });
            });    
        });
    </script>
    <script type="text/javascript"> //for Banner
        var surl = "<?php echo site_url() ?>";
        var burl = "<?php echo base_url() ?>";
        var form = document.getElementById('f');
        $(document).ready(function() {
            $('.delban').click(function(){
            var id=$(this).data('id');
            var text=$(this).data('text');
            $.ajax({
                type: 'POST',
                url: surl+'admin/deleteban',
                data:{
                    id:$(this).data('id'),
                    text:$(this).data('text')
                },
                success:function (data){
                     console.log('ajax returned: ');
                    console.log(data);
                },
                error:function(){

                }

                });
            });    
        });
    </script>


    <script type="text/javascript"> //for category
        var surl = "<?php echo site_url() ?>";
        var burl = "<?php echo base_url() ?>";
        var form = document.getElementById('f');
        $(document).ready(function() {
            $('.delcat').click(function(){
            var id=$(this).data('id');
            var text=$(this).data('text');
            $.ajax({
                type: 'POST',
                url: surl+'admin/deletecat',
                data:{
                    id:$(this).data('id'),
                    text:$(this).data('text')
                },
                success:function (data){
                console.log('ajax returned: ');
                  console.log(data);
                  if (data) {
                    $('admin/users').html(data);
                      alert("Success");
                  } else {
                      alert("ERROR");
                  }
                  return false;

                }

                });
            });    
        });
    </script>

    <script type="text/javascript"> //for product
        var surl = "<?php echo site_url() ?>";
        var burl = "<?php echo base_url() ?>";
        var form = document.getElementById('f');
        $(document).ready(function() {
            $('.delprod').click(function(){
            var id=$(this).data('id');
            var text=$(this).data('text');
            $.ajax({
                type: 'POST',
                url: surl+'admin/deleteprod',
                data:{
                    id:$(this).data('id'),
                    text:$(this).data('text')
                },
                success:function (data){
                     console.log('ajax returned: ');
                    console.log(data);
                },
                error:function(){

                }

                });
            });    
        });
    </script>

    <script type="text/javascript">
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
                        $('#dp_preview2').replaceWith('<img class="crop2" id="dp_preview2" src="' + e.target.result + '" />');
         
                        $('.crop').Jcrop({ //for banner lods
                            onSelect: updateCoords,
                            aspectRatio: (600/300),  
                            boxWidth: 600,   
                            boxHeight: 300,
                            bgOpacity: '.5',
                            bgColor: 'black',
                            addClass: 'jcrop-dark',
                            maxSize: [10000, 10000] //hehe
                        });

                        $('.crop1').Jcrop({ //for product lods
                            onSelect: updateCoords,
                            aspectRatio: 1,  //aspectRatio
                            boxWidth: 300,   //Maximum width
                            boxHeight: 300,
                            bgOpacity: '.5',
                            bgColor: 'black',
                            addClass: 'jcrop-dark',
                            maxSize: [10000, 10000]
                        });

                        $('.crop2').Jcrop({ //for profile lods
                            onSelect: updateCoords,
                            aspectRatio: 1,  
                            boxWidth: 300,   
                            boxHeight: 300,
                            bgOpacity: '.5',
                            bgColor: 'black',
                            addClass: 'jcrop-dark',
                            maxSize: [1800, 1800],
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

     <script type="text/javascript"> //for product
        function toggleDisable(checkbox) {
          var toggle = document.getElementById("field_set");
          checkbox.checked ? toggle.disabled = false : toggle.disabled = true;
        }

        window.onload = function() {
            toggleDisable(document.getElementById('check'));
        }
    </script>

    

