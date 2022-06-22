<?php
    $title = "Oznámení | SVHP";
    include_once("header.php");
?>

<div class="container">
    <div class="pagePadding">
        <div class="row seminaryDetails">
            <div class="col-sm-12">
                <h1>Oznámení</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <br /><br />
                
                <a href="vloz_oznameni.php" class="btn btn-primary" alt="Vložit"><span class="glyphicon glyphicon-plus"></span> Přidat nový</a><br><br>
                <?php
                $sql = "SELECT * FROM oznameni";
                if($query = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($query) > 0){
                    echo "<div class='table-responsive'>\n
                    <table class='table'>\n
                    <tr>
                        <th>Název</th>
                        <th>Obsah</th>
                    </tr>\n";

                    while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr class='clickable-row alert alert-info' data-href='oznameni.php?id=<?php echo $row["id_oznameni"] ?>' style="cursor: pointer;">
                    
                        <td><?php echo $row["nazev"]; ?></td>
                        <td><?php echo $row["obsah"]; ?></td>
                        </tr>
                        <?php
                    }

                    echo "</table>\n
                    </div>\n";
                } else {
                    echo "Žádná nová oznámení";
                }
                } else {
                echo mysqli_error($conn);
                }
                ?>
                
            </div>
        </div>
    </div>
</div>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

<?php
    include_once("footer.php");
?>
