<?php 
    require_once("includes/classes/Form_Provider.php");
    require_once("includes/configuration.php");  
    require_once("includes/header.php"); 
?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>Search</small>
                </h1>
            </div>
        </div>
        <div class="row">
            <?php
                $form_provider = new Form_Provider($connection);
                echo $form_provider -> create_search_form(); 
            ?>
        </div>

<?php 
    require_once("includes/footer.php"); 
?>