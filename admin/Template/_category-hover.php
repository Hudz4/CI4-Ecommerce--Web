<?php

require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
    header('location:login.php');
    die();
}
?>

<style >
    <?php include 'style.css'; ?>
  </style>

<div class="container-fluid">
      <li class=" mx-12">
                <a class="btn btn-success" href="categories.php">Add Category</a>
           
                <a class="btn btn-success" href="subcategories.php">Add Subcategory</a>
     
                <a class="btn btn-success" href="products.php">Add Product</a>



        </li>



</div>




  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#t1').hide();
    $('#category').change(function(){
    //var st=$('#category option:selected').text();
    var cat_id=$('#category').val();
    $('#sub-category2').empty(); //remove all existing options
    ///////
    $.get('dd1ck.php',{'cat_id':cat_id},function(return_data){
    //$('#msg').text(" Number of Records found :"+return_data.no_of_records);
    if(return_data.no_of_records>=1){
    $.each(return_data.data, function(key,value){
        $("#sub-category2").append("<a class="dropdown" value=" + value.subcat_id +">"+value.subcategory+"</a>");
      });
    }else{
    /// add text box and hide 2nd subcategory 
    $('#sub-category2').hide();
    $('#t1').show();
    }
    }, "json");
    ///////
    });
    /////////////////////
    });
  </script>