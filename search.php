<?php 
    require_once("includes/classes/Search_Grid.php");
    require_once("includes/header.php"); 

    if (isset($_POST["search_input"])) {
        $keywords = $_POST["search_input"];
        $images = get_recent_images($keywords);
        $images = json_decode($images);
        $images = array_slice($images, 0, 9);
        $grid = new Search_Grid($images);
        $html = $grid -> create();
    }

    function get_recent_images($keywords) {
        $request_url = "http://app.squidproquo.io/search?keywords=" . $keywords;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $images = curl_exec($curl);
        curl_close($curl);
        return $images;
    }

    function get_input_value($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }

?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>Search</small>
                </h1>
            </div>
        </div>
        <div class="row">
            <form action="search.php" method="POST" name="search_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Keywords:</label>
                    <input type="text" class="form-control" name="search_input" value="<?php get_input_value("search_input"); ?>">
                </div>
                <div class="form-group" style="display: inline-flex;">
                    <button type="submit" class="btn btn-primary" name="search_button" value="">Seach</button>
                    
                </div>
            </form>
        </div>
        <div class="row">
            <?php
                echo $html;
            ?>
        </div>

        <script>

            (async function() {

                function toggle_submit_button() {
                    let button = document.querySelector("button[name=search_button]");
                    if (document.querySelector("input[name=search_input]").value == "") {
                        button.disabled = true;
                    }
                    else {
                        button.disabled = false;
                    }
                }

                function display_spinner() {
                    let button = document.querySelector("button[name=search_button]");
                    let spinner = document.createElement("div");
                        spinner.className = "spinner-border";
                        spinner.setAttribute("role", "status");
                        spinner.innerHTML = "<span class='sr-only'>Loading...</span>";
                        button.after(spinner);
                }

                function disable_search() {
                    let button = document.querySelector("button[name=search_button]");
                        button.disabled = true;    
                    let input = document.querySelector("input[name=search_input]");
                        input.readOnly = true;
                }

                toggle_submit_button();

                document.querySelector("input[name=search_input]").onkeyup = function(event) {
                    if (event.key != "Enter") {
                        toggle_submit_button();
                    }
                }

                document.querySelector("form[name=search_form]").onsubmit = function() {
                    display_spinner();
                    disable_search();
                }

            })();

        </script>

<?php 

    require_once("includes/footer.php"); 

?>