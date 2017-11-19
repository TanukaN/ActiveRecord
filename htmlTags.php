<?php
class htmlTags {
    static public function tableFormat() {
        echo "<table cellpadding='5px' border='1px' style='border-collapse: collapse'>";
    }
    static public function tableHeader($text) {
        echo '<th style="font-size: large">'.$text.'</th>';
    }
    static public function tableContent($text) {
        echo '<td>'.$text.'</td>';
    }
    static public function breakTableRow() {
        echo '</tr>';
    }
}
?>