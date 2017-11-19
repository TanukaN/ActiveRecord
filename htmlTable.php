<?php
    class htmlTable {
        static function makeTable($record) {
            htmlTags::tableFormat();
            $html = '<tr>';
                foreach($record[0] as $key=>$value) {
                $html .= '<th>' . htmlspecialchars($key) . '</th>';
                }
                $html .= '</tr>';
            foreach($record as $key=>$value) {
            $html .= '<tr>';
                foreach($value as $key2=>$value2) {
                $html .= '<td>' . htmlspecialchars($value2) . '<br></td>';
                }
                $html .= '</tr>';
            }
            $html .= '</tbody></table>';
            return print_r($html);
        }
    }
?>