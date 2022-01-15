<?php

    require_once("includes/classes/Search_Grid_Item.php");

    class Search_Grid {

        public function __construct() {
        }

        public function create($urls) {
            $count = count($urls);
            $index = 0;
            $html = "";
            $html .= "<row>";
            foreach ($urls as $url) {
                $item = new Search_Grid_Item($url);
                $html .= $item-> create();
                $index ++;
                if ($index % 3 == 0 && $index != $count) {
                    $html .= "</row><row>";
                }
            }
            $html .= "</row>";
            return $html;
        }

    }

?>