




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        jQuery FineCrop Plugin Example
    </title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
    <script src="js/fineCrop.js"></script>

    
    <style type="text/css">
    .yourclass {
        height:200px;
        width: 200px;
        display:flex;
        flex-shrink:0;
        max-width:98%;
        max-height:98%;
    }

    body {font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
    .inputLabel {
        width: 710px;
        height: 80px;
        margin: 2rem auto 0;
        border: 12px solid rgb(210, 213, 218);
        text-align: center;
        line-height: 61px;
        background-color: #eeeef1;
    }
    .cropInputs {
     position: fixed;
     top:0;
     left: auto; 
     right:0; 
     width: 350px;
     height: 100vh;
     background-color: #e7e8e8;
     text-align: center;
    }
    .inputtools p {text-indent: 1rem;}
    .inputtools p span {display: block; min-width: 40px; height: 40px; float: left;}
    .inputtools p span img {width: 40px;height: auto; line-height: 40px;}
    .cropButtons {
        border: 0px solid #000;
        width: 40px;
        height: 40px; 
        border: 2px solid #fff;
        border-radius: 40px;
       
        text-align: center;
        cursor: pointer;
    background: #1d9166; /* Old browsers */
    background: -moz-linear-gradient(-45deg, #1d9166 0%, #06ad8c 46%, #157050 90%, #157050 90%); /* FF3.6-15 */
    background: -webkit-linear-gradient(-45deg, #1d9166 0%,#06ad8c 46%,#157050 90%,#157050 90%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(135deg, #1d9166 0%,#06ad8c 46%,#157050 90%,#157050 90%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1d9166', endColorstr='#157050',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
    }
    .cropButtons img {width: 25px;}
    /* input styles */


    .cropRange {
        width: calc(100% - 20px);
        height: 5px;
        background: #333;
        position: relative;
        top: -4px;
        left: 4px;
        margin: 0.7rem; 
        
        background: #68b390;
        background: -moz-linear-gradient(left, #68b390 0%, #33afb5 50%, #23dce6 100%);
        background: -webkit-gradient(linear, left top, right top, color-stop(0%,#68b390), color-stop(50%,#33afb5), color-stop(100%,#23dce6));
        
        background: -webkit-linear-gradient(left, #68b390 0%,#33afb5 50%,#23dce6 100%);
        
        background: -o-linear-gradient(left, #68b390 0%,#33afb5 50%,#23dce6 100%);
        background: -ms-linear-gradient(left, #68b390 0%,#33afb5 50%,#23dce6 100%);
        background: linear-gradient(left, #68b390 0%,#33afb5 50%,#23dce6 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#68b390', endColorstr='#23dce6',GradientType=1 );    
        
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px;
    }

    input[type="range"] {
        -webkit-appearance: none;
        background-color: black;
        height: 5px;
    }

    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        position: relative;
        top: 0px;
        z-index: 1;
        width: 20px;
        height: 20px;
        cursor: pointer;
        border: 2px solid rgb(56, 59, 59);
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px;
        /* background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ebf1f6), color-stop(50%,#abd3ee), color-stop(51%,#89c3eb), color-stop(100%,#d5ebfb)); */
        background-color: rgb(176, 196, 195);
    }

    input[type="range"]:hover ~ #rangevalue,input[type="range"]:active ~ #rangevalue {
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        filter: alpha(opacity=100);
        opacity: 1;
        top: -75px;
    }

    input[type="range"]:focus{
      outline:none;
    }

    #cropSubmit {
        margin-top: 1rem;
        border-radius: 4px;
        cursor: pointer;
        border: 0px solid #000;
        background: #1d9166; /* Old browsers */
        background: -moz-linear-gradient(-45deg, #1d9166 0%, #06ad8c 46%, #157050 90%, #157050 90%); /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #1d9166 0%,#06ad8c 46%,#157050 90%,#157050 90%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #1d9166 0%,#06ad8c 46%,#157050 90%,#157050 90%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1d9166', endColorstr='#157050',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        color: #fff;
        padding:0.5rem 1rem; 
    }

    #closeCrop {
        margin-top: 1rem;
        border-radius: 4px;
        cursor: pointer;
        border: 0px solid #000;
        background: #1d9166; /* Old browsers */
        background: -moz-linear-gradient(-45deg, #1d9166 0%, #06ad8c 46%, #157050 90%, #157050 90%); /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #1d9166 0%,#06ad8c 46%,#157050 90%,#157050 90%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #1d9166 0%,#06ad8c 46%,#157050 90%,#157050 90%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1d9166', endColorstr='#157050',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        color: #fff;
        padding:0.5rem 1rem; 
    }

    

/* This section is for crop section 
 * For this part, donot change the id or class names, but, you can change your css attributes as you like
 */
.cropHolder {width: 100vw; height: 100vh; display: none;}
#cropWrapper {position: absolute; top:0; left:0; right: 0; bottom: 0; margin: auto; width: 100vw; height: 100vh;}
#bgCanvas {position: absolute; top:0; left:0; right: 0; bottom: 0; margin: auto;}
#getCropped {position: absolute; top:0; left:0; right: 0; bottom: 0; margin: auto;}
#blacksheet {position: absolute; top:0; left:0; background-color: rgba(0,0,0,0.7); right: 0; bottom: 0; margin: auto; width: 100%; height: 100%;}




</style>

</head>

<body>
    <div class="container">
       
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <input type="file" id="upphoto" style="display:none;">
                <label for="upphoto">
                    <div class="inputLabel">
                        click here to upload an image
                    </div>
                </label>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <img id="croppedImg" style="border:10px solid #000; margin:auto;">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                Thanks for watching
            </div>
        </div>
    </div>


<!--
    Div structure : Manitan a container which has class "cropHolder"
                    Inside this, another div with the ID of "cropWrapper" and inside this use <img> with any id
                    this have to use in this option: (cropInput: 'inputImage')
    CropInputs    : Here you can maintain structure as you want but keep these IDs same
                    1. "xmove" : for horizontal moving
                    2. "ymove" : for vertical moving
                    3. "zplus" : zoom in button
                    4. "zminus": zoom out button
                    5. "cropSubmit" : submitting the crop
                    6. "closeCrop" : closing the cropping screen
 -->
    <div class="cropHolder">
        <div id="cropWrapper">
            <img class="inputImage" id="inputImage" src="images/face.jpg">
        </div>
        <div class="cropInputs">
            <div class="inputtools">
                <p>
                    <span>
                        <img src="images/horizontal.png">
                    </span>
                    <span>horizontal movement</span>
                </p>
                <input type="range" class="cropRange" name="xmove" id="xmove" min="0" value="0">
            </div>
            <div class="inputtools">
                <p>
                    <span>
                        <img src="images/vertical.png">
                    </span>
                    <span>vertical movement</span>
                </p>
                <input type="range" class="cropRange" name="ymove" id="ymove" min="0" value="0">
            </div>
            <br>
            <button class="cropButtons" id="zplus">
                <img src="images/add.png">
            </button>
            <button class="cropButtons" id="zminus">
                <img src="images/minus.png">
            </button>
            <br>
            <button id="cropSubmit">submit</button>
            <button id="closeCrop">Close</button>
        </div>
    </div>
    <script>
        $("#upphoto").finecrop({
            viewHeight: 500,
            cropWidth: 200,
            cropHeight: 200,
            cropInput: 'inputImage',
            cropOutput: 'croppedImg',
            zoomValue: 50
        });
    </script>
</body>
<script type="text/javascript">
    $.fn.finecrop = function (options) {

        var defaults = {
            viewHeight: 0,
            cropWidth: 200,
            cropHeight: 200,
            cropInput: 'myImage',
            cropOutput: 'mysource',
            zoomValue: 10
        };
        var settings = $.extend({}, defaults, options);
        return this.each(function () {
            var $obj = $(this);
            $($obj).change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#' + settings.cropInput).attr('src', e.target.result).css('opacity', 0);
                        $('#' + settings.cropInput).attr('height', settings.viewHeight + 'px')
                        $(".cropHolder").show();
                        setTimeout(function () {
                            cropstart();
                        }, 1000);

                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });

            function cropstart() {
                /* Let's Create canvas and backgrounds
                 * First : background canvas, it will behind all
                 * Second : transparent background
                 * Third: 2nd canvas, where image will get cropped 
                 */
                var cropContainer = $("#cropWrapper");
                var bgcanvas = document.createElement('canvas');
                bgcanvas.id = 'bgCanvas';
                bgcanvas.style.border = '1px solid #000';
                $(cropContainer).append(bgcanvas);

                // black sheet div
                var blacksheet = document.createElement('div');
                blacksheet.id = 'blacksheet';
                $(cropContainer).append(blacksheet);

                // cropped canvas
                var getCropped = document.createElement('canvas');
                getCropped.id = 'getCropped';
                getCropped.width = settings.cropWidth;
                getCropped.height = settings.cropHeight;
                getCropped.style.border = '1px solid #000';
                $(cropContainer).append(getCropped);



                /* CONSTANT
                 * These two variable are constant as the actual width or height of an image is constant
                 * 1. imgSrc : source of Image
                 * 2. actualWidth : Natural width of image
                 * 3. actualHeight : Natural height of image
                 */
                var imgSrc = document.getElementById(settings.cropInput); //$("#myImage");
                var actualWidth = imgSrc.naturalWidth;
                var actualHeight = imgSrc.naturalHeight;
                var zoomValue = 0; // initial

                // imgSrc.setAttribute('height', 500 + 'px'); // initial

                var moveHorizontal = document.getElementById('xmove');
                var moveVertical = document.getElementById('ymove');
                var zoomIn = document.getElementById("zplus");
                var zoomOut = document.getElementById("zminus");



                var elemWidth, elemHeight, lValue, tValue;

                function getImgRef() {
                    elemWidth = imgSrc.width;
                    elemHeight = imgSrc.height;
                    lValue = (elemWidth - settings.cropWidth) / 2;
                    tValue = (elemHeight - settings.cropHeight) / 2;
                    // --- dynamic max values ---
                    moveHorizontal.setAttribute('max', (elemWidth - settings.cropWidth));
                    moveVertical.setAttribute('max', (elemHeight - settings.cropHeight));

                    moveHorizontal.setAttribute('value', (elemWidth - settings.cropWidth) / 2);
                    moveVertical.setAttribute('value', (elemHeight - settings.cropHeight) / 2);

                }
                getImgRef();


                document.getElementById("zplus").onclick = function () {
                    var imgSrcHeight = parseInt(imgSrc.getAttribute('height'));
                    imgSrc.setAttribute('height', (imgSrcHeight + settings.zoomValue) + 'px');
                    getImgRef();
                    bgCanvas(lValue, tValue);
                }
                document.getElementById("zminus").onclick = function () {
                    var imgSrcHeight = parseInt(imgSrc.getAttribute('height'));
                    imgSrc.setAttribute('height', (imgSrcHeight - settings.zoomValue) + 'px');
                    getImgRef();
                    bgCanvas(lValue, tValue);
                }
                document.getElementById('cropSubmit').onclick = function () {
                    $("#" + settings.cropOutput).attr('src', getCropped.toDataURL());
                    $(bgcanvas).remove();
                    $(blacksheet).remove();
                    $(getCropped).remove();
                    $(".cropHolder").hide();
                }
                document.getElementById("closeCrop").onclick = function(){
                    $(bgcanvas).remove();
                    $(blacksheet).remove();
                    $(getCropped).remove();
                    $(".cropHolder").hide();
                }
                // ------------- -------- drawImage properties ---------- -----------------
                function cropCanvas(x, y) {

                    var imgSrcC = bgcanvas;
                    var context = getCropped.getContext("2d");

                    var cwidth = getCropped.width;
                    var cheight = getCropped.height;
                    
                    var sx = (elemWidth - cwidth) / 2;
                    var sy = (elemHeight - cheight) / 2;
                    var swidth = cwidth;
                    var sheight = cheight;

                    var dwidth = cwidth;
                    var dheight = cheight;

                    context.clearRect(0, 0, cwidth, cheight);
                    context.drawImage(imgSrcC, sx, sy, swidth, sheight, 0, 0, dwidth, dheight);
                    // img, sx, sy, swidth, sheight, dx, dy, dwidth, dheight
                    // s = source
                    // d = destination
                };


                // --------------- bg canvas -------------------
                function bgCanvas(x, y) {
                    lValue = x;
                    tValue = y;

                    var context = bgcanvas.getContext("2d");

                    var cwidth = elemWidth;
                    var cheight = elemHeight;
                    bgcanvas.width = cwidth;
                    bgcanvas.height = cheight;
                    context.clearRect(0, 0, cwidth, cheight);
                    /*
                     * To ensure the perspective of an image, here is the calculation for new width and height
                     * nw/nh = w/h;
                     * nh = (h*nw)/w;
                     + these below 'minus' lines are not in use anymore 
                     - var dwidth = cwidth + zoomValue;
                     - var dheight = (cheight * (cwidth + zoomValue))/cwidth;
                     */


                    var dwidth = cwidth;
                    var dheight = cheight;

                    var sx = (((x - (elemWidth - settings.cropWidth) / 2) * actualWidth) / elemWidth) + zoomValue;
                    var sy = (((y - (elemHeight - settings.cropHeight) / 2) * actualHeight) / elemHeight);
                    var swidth = (cwidth * actualWidth) / elemWidth;
                    var sheight = (cheight * actualHeight) / elemHeight;
                    
                    context.drawImage(imgSrc, sx, sy, swidth, sheight, 0, 0, dwidth, dheight);
                    cropCanvas(x, y);
                };

                bgCanvas(lValue, tValue);
                /* get the current input
                   for IE, 'oninput' doesn't work, should use 'onchange' 
                */
                if (navigator.appName == 'Microsoft Internet Explorer' || !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1)) {
                    alert("please do not use IE :) ");
                } else {
                    moveHorizontal.oninput = function (event) {
                        bgCanvas(event.target.value, tValue)
                    }
                    moveVertical.oninput = function (event) {
                        bgCanvas(lValue, event.target.value);
                    }
                }
            }
        });
    };
 
</script>

</html>
