<?php
class kantone implements API {
    var $kantone = array(
        array('name' => 'Uri (UR)', 'stimmen' => 1, 'beitritt' => 1291, 'hauptort' => 'Altdorf', 'einwohner' => 35335),
        array('name' => 'Schwyz (SZ)', 'stimmen' => 1, 'beitritt' => 1291, 'hauptort' => 'Schwyz', 'einwohner' => 144686),
        array('name' => 'Obwalden (OW)', 'stimmen' => 0.5, 'beitritt' => 1291, 'hauptort' => 'Sarnen', 'einwohner' => 35032),
        array('name' => 'Nidwalden (NW)', 'stimmen' => 0.5, 'beitritt' => 1291, 'hauptort' => 'Stans', 'einwohner' => 40794),
        array('name' => 'Luzern (LU)', 'stimmen' => 1, 'beitritt' => 1332, 'hauptort' => 'Luzern', 'einwohner' => 372964),
        array('name' => 'Zürich (ZH)', 'stimmen' => 1, 'beitritt' => 1351, 'hauptort' => 'Zürich', 'einwohner' => 1351297),
        array('name' => 'Zug (ZG) ', 'stimmen' => 1, 'beitritt' => 1352, 'hauptort' => 'Zug', 'einwohner' => 110890),
        array('name' => 'Glarus (GL)', 'stimmen' => 1, 'beitritt' => 1352, 'hauptort' => 'Glarus', 'einwohner' => 38479),
        array('name' => 'Bern (BE)', 'stimmen' => 1, 'beitritt' => 1353, 'hauptort' => 'Bern', 'einwohner' => 974235),
        array('name' => 'Solothurn (SO)', 'stimmen' => 1, 'beitritt' => 1481, 'hauptort' => 'Solothurn', 'einwohner' => 252748),
        array('name' => 'Freiburg (FR)', 'stimmen' => 1, 'beitritt' => 1481, 'hauptort' => 'Freiburg', 'einwohner' => 273159),
        array('name' => 'Basel-Landschaft (BL)', 'stimmen' => 0.5, 'beitritt' => 1501, 'hauptort' => 'Liestal', 'einwohner' => 272815),
        array('name' => 'Basel-Stadt (BS)', 'stimmen' => 0.5, 'beitritt' => 1501, 'hauptort' => 'Basel', 'einwohner' => 187898),
        array('name' => 'Schaffhausen (SH)', 'stimmen' => 1, 'beitritt' => 1501, 'hauptort' => 'Schaffhausen', 'einwohner' => 75657),
        array('name' => 'Appenzell Innerrhoden (AI)', 'stimmen' => 0.5, 'beitritt' => 1513, 'hauptort' => 'Appenzell', 'einwohner' => 15681),
        array('name' => 'Appenzell Ausserrhoden (AR)', 'stimmen' => 0.5, 'beitritt' => 1513, 'hauptort' => 'Herisau, Trogen 5', 'einwohner' => 53043),
        array('name' => 'Graubünden (GR)', 'stimmen' => 1, 'beitritt' => 1803, 'hauptort' => 'Chur', 'einwohner' => 191861),
        array('name' => 'Aargau (AG)', 'stimmen' => 1, 'beitritt' => 1803, 'hauptort' => 'Aarau', 'einwohner' => 600040),
        array('name' => 'Thurgau (TG)', 'stimmen' => 1, 'beitritt' => 1803, 'hauptort' => 'Frauenfeld', 'einwohner' => 244805),
        array('name' => 'St. Gallen (SG)', 'stimmen' => 1, 'beitritt' => 1803, 'hauptort' => 'St. Gallen', 'einwohner' => 474676),
        array('name' => 'Waadt (VD)', 'stimmen' => 1, 'beitritt' => 1803, 'hauptort' => 'Lausanne', 'einwohner' => 701526),
        array('name' => 'Tessin (TI)', 'stimmen' => 1, 'beitritt' => 1803, 'hauptort' => 'Bellinzona', 'einwohner' => 335720),
        array('name' => 'Wallis (VS)', 'stimmen' => 1, 'beitritt' => 1815, 'hauptort' => 'Sitten', 'einwohner' => 307392),
        array('name' => 'Genf (GE) ', 'stimmen' => 1, 'beitritt' => 1815, 'hauptort' => 'Genf', 'einwohner' => 453292),
        array('name' => 'Neuenburg (NE) ', 'stimmen' => 1, 'beitritt' => 1815, 'hauptort' => 'Neuenburg', 'einwohner' => 171647),
        array('name' => 'Jura (JU)', 'stimmen' => 1, 'beitritt' => 1979, 'hauptort' => 'Delsberg', 'einwohner' => 70134),
    );

    function getByAbbreviation($abbreviation) {
        foreach ($kantone as $kanton) {
            if (strpos($kanton["name"], $abbreviation)) {
                return $kanton;
            }
        }
    }

    function getStortedByName() {
        return subval_sort($kantone, "name");
    }

    function getSortedByHauptort() {
        return subval_sort($kantone, "hauptort");
    }

    function getSortedByEinwohner() {
        return subval_sort($kantone, "einwohner");
    }

    function getStortedByBeitritt() {
        return subval_sort($kantone, "beitritt");
    }

    function subval_sort($a, $subkey) {
        foreach ($a as $k => $v) {
            $b[$k] = strtolower($v[$subkey]);
        }
        asort($b);
        foreach ($b as $key => $val) {
            $c[] = $a[$key];
        }
        return $c;
    }

    public function __construct($data) {
        
    }

    public function isGET() {
        
    }
}
?>