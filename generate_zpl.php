<?php
$info1 = isset($_POST['info1']) ? $_POST['info1'] : '';
$info2 = isset($_POST['info2']) ? $_POST['info2'] : '';
$info3 = isset($_POST['info3']) ? $_POST['info3'] : '';
$info4 = isset($_POST['info4']) ? $_POST['info4'] : '';
$info5 = isset($_POST['info5']) ? $_POST['info5'] : '';
$nombreRepetitions = isset($_POST['nombreRepetitions']) ? $_POST['nombreRepetitions'] : 1;
$fontSize = isset($_POST['fontSize']) ? $_POST['fontSize'] : 0;

$zpl = "^XA";
$y = 50;

for ($i = 0; $i < $nombreRepetitions; $i++) {
    if (!empty($info1)) {
        $zpl .= "^FO50,$y^A0N,$fontSize,$fontSize^FB400,1,0,C,0^FD$info1^FS";
        $y += 70;
    }
    if (!empty($info2)) {
        $zpl .= "^FO50,$y^A0N,$fontSize,$fontSize^FB400,1,0,C,0^FD$info2^FS";
        $y += 70;
    }
    if (!empty($info3)) {
        $zpl .= "^FO50,$y^A0N,$fontSize,$fontSize^FB400,1,0,C,0^FD$info3^FS";
        $y += 70;
    }
    if (!empty($info4)) {
        $zpl .= "^FO50,$y^A0N,$fontSize,$fontSize^FB400,1,0,C,0^FD$info4^FS";
        $y += 70;
    }
    if (!empty($info5)) {
        $zpl .= "^FO50,$y^A0N,$fontSize,$fontSize^FB400,1,0,C,0^FD$info5^FS";
        $y += 70;
    }
}
$zpl .= "^XZ";

header('Content-Type: application/octet-stream');
echo $zpl;
?>
