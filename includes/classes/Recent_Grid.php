<?php

    require_once("includes/classes/Record.php");
    require_once("includes/classes/Recent_Grid_Item.php");

    class Recent_Grid {

        private $connection;

        public function __construct($connection) {
            $this -> connection = $connection;
        }

        public function create() {
            $query = $this -> connection -> prepare("SELECT * FROM records");
            $query -> execute();
            $count = $query -> rowCount();
            $index = 0;
            $html = "";
            $html .= "<row>";
            while ($row = $query -> fetch(PDO::FETCH_ASSOC)) {
                $record = new Record($this -> connection, $row);
                $item = new Recent_Grid_Item($record);
                $html .= $item -> create();
                $index ++;
                if ($index % 2 == 0 && $index != $count) {
                    $html .= "</row><row>";
                }
            }
            $html .= "</row>";
            return $html;
        }

    }

?>