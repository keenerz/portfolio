<?php

    require_once("includes/classes/Search_Grid_Item.php");

    class Search_Grid {

        private $urls;

        public function __construct($urls) {
            $this -> urls = $urls;
        }

        public function create() {
            $count = count($this -> urls);
            $index = 0;
            $html = "";
            $html .= "<row>";
            foreach ($this -> urls as $url) {
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
