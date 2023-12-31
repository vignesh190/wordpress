<?php
/**
 * Template Name: form
 */



// get_header();
?>


<div class="container">
<form method='POST'>

<div class="form-group">
<label for="pwd">Name:</label>
<input type="text" class="form-control" placeholder="Enter Name" name="names">
</div>

<div class="form-group">
<label for="email">Email address:</label>
<input type="email" class="form-control" placeholder="Enter email" name="email">
</div>

<div class="form-group">
  <label for="password">password:</label>
  <input type="password" class="form-control" placeholder="Enter password" name="password" id="password">
</div>  

<div class="form-group">
  <label for="password">re-enter password:</label>
  <input type="password" class="form-control" placeholder="Enter password" name="re_enter_password" id="re_enter_password" onchange="validate()">
</div> 
<button type="submit" name='insert' class="btn btn-primary">Submit</button>
</form>

</div>

<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("re_enter_password").value;
        if (password != confirmPassword) {
           alert("Passwords do not match.");
            return false;
       }
        return true;
   }
</script>









<?php

// if clicked on submit buton
if(isset($_POST['insert'])){

  global $wpdb;

  // get all form fields value store in php values
  $e = $_POST['email'];
  $n = $_POST['names'];
   $m = $_POST['password'];
   $k = $_POST['re_enter_password'];

  if($m!=$k){
    echo '<script> alert("password miss match") </script>';
  }else{

  

   $querystr = "
  SELECT COUNT(*) FROM `wordpress_form` WHERE email = '".$e."' 
";

//  $result = $wpdb->get_results($query);--for normal quary
 $pageposts = $wpdb->get_var($querystr);





$count_result = intval($pageposts);

// echo $query_result = $pageposts[1]->COUNT(*);







if($count_result > 0){
  echo '<script> alert("record already exist") </script>';
} else {

// insert the value into table
$sql = $wpdb->insert( 
  'wordpress_form', 
  array( 
      'name' => $n, 
      'email' => $e, 
      'password' => MD5($m) 
  ) 
);

// success message
if($sql == true){
echo '<script> alert("logged in") </script>';
}else{
echo '<script> alert("Not Inserted") </script>';
}

}





  }


}






// get_footer();
?>
