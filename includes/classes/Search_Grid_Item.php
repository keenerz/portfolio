<?php

    class Search_Grid_Item {

        private $url;

        public function __construct($url) {
            $this -> url = $url . "?fit=crop&h=360";
        }

        private function create() {
            $url = $this -> url;
            return "<div class='col-md-4 portfolio-item'>
                        <img class='' loading='lazy' src='$url' style='object-fit: cover; width: 360px; height: 360px'>
                    </div>";
        }

    }

?>