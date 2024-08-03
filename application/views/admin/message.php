<html>
<head>

<script type="text/javascript" src="<?php echo base_url('assets/web/js/jquery-1.7.2.min.js') ?>"></script>
<script type="text/javascript">
        
        $(document).ready(function(){
            
            loadMsg();          
            hideLoading();
                        
            $("form#chatform").submit(function(){
                                            
                $.post("admin/update",{
                            message: $("#content").val(),
                            name: $("#name").val(),
                            action: "postmsg"
                        }, function() {
                    
                    $("#messagewindow").prepend("<b>"+$("#name").val()+"</b>: "+$("#content").val()+"<br />");
                    
                    $("#content").val("");                  
                    $("#content").focus();
                });     
                return false;
            });
            
            
        });

        function showLoading(){
            $("#contentLoading").show();
            $("#txt").hide();
            $("#author").hide();
        }
        function hideLoading(){
            $("#contentLoading").hide();
            $("#txt").show();
            $("#author").show();
        }
        
        function addMessages(xml){
            
            $(xml).find('message').each(function(){
                
                author = $(this).find("author").text();
                msg = $(this).find("text").text();
                time = $(this).find("time").text();

                var template ='<div class="window">';
                template += '<div class="content-info">';
                template += '<div><strong>'+author+'</strong>';
                template += '<p>'+msg+'</p>';
                template += '</div>';
                template += '<p style="font-size:10px">'+time+'</p>';
                template += '</div>';
                template += '</div>';
                $("#messagewindow").append(template);
            });
            
        }
        
        function loadMsg() {
            $.get("backend", function(xml) {
                $("#loading").remove();             
                addMessages(xml);
            });
            
            //setTimeout('loadMsg()', 4000);
        }
    </script> 


    <style type="text/css">
        #messagewindow {
            height: 400px;
            border: 1px solid;
            padding: 5px;
            overflow: auto;
        }
        #wrapper {
            margin: auto;
     
        }

        .window {
          border: 2px solid #dedede;
          background-color: #f1f1f1;
          border-radius: 5px;
          padding: 10px;
          margin: 10px 0;
        }

        /* Darker chat container */
        .darker {
          border-color: #ccc;
          background-color: #ddd;
        }

        /* Clear floats */
        .window::after {
          content: "";
          clear: both;
          display: table;
        }

        /* Style images */
        .window img {
          float: left;
          max-width: 60px;
          width: 100%;
          margin-right: 20px;
          border-radius: 50%;
        }

        /* Style the right image */
        .window img.right {
          float: right;
          margin-left: 20px;
          margin-right:0;
        }

        /* Style time text */
        .time-right {
          float: right;
          color: #aaa;
        }

        /* Style time text */
        .time-left {
          float: left;
          color: #999;
        }
    </style>
</head>
<body>

    <div class="container-fluid pt-4 px-4">
        <div class="color-primary-bg text-center rounded p-4">
            <div class="container rounded mt-5 ">
                <div class="row">
                <div id="wrapper">
                    <div id="messagewindow"><span id="loading">Loading...</span></div>
                    <?php echo form_open_multipart('admin/','','') ?>
                    <br/>

                    <div id="txt">
                    Message: <textarea class="form-control" type="textarea" name="content" id="content" value="" /></textarea>
                    </div>
                    
                    <div id="contentLoading" class="contentLoading">  
                    <img src="/images/blueloading.gif" alt="Loading data, please wait...">  
                    </div>
                    <br/>
                    
                    
                    <input class="btn btn-success" type="submit" value="Submit"><br/>
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </div>

    </body>
</html>