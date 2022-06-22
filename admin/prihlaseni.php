<?php

include("login.php"); // Include loginserv for checking username and password

   $title = "Admin | SVHP";
   include_once("head.php");
?>
       
<div class="container">
    <div class="pagePadding">              
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <div class="panel-body">              
                    <form action="" method="post">  
                        <label for="username">Příhlašovací jméno:</label>
                            <input type="text" class="form-control" id="username" name="username" required>   <br />             
                        <label for="password">Heslo:</label> 
                            <input type="password" class="form-control" id="password" name="password" required>  <br />               
                        <!-- Change this to a button or input when using this as a form --> 
                        <div class="text-center"> 
                            <input class="button" type="submit" name="submit" value="Přihlásit" />
                        </div> 
                        <br /><br />
                    </form>                 
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once("footer.php");
?>

