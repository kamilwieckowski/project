<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function NWD($a, $b) {
    while ($b != 0) {  
        $temp = $a % $b;  
        $a = $b;          
        $b = $temp;    
    } 
    return $a;
}

function suma_cyfr($n) {
    $suma = 0;
    while ($n) {
        $suma += $n % 10;
        $n = (int)($n / 10);
    }
    return $suma;
}

$file = fopen("PARY_LICZB.TXT", "r");
$wielokrotnosci = $pierwsze = $sumy = 0;

while ($linia = fgets($file)) {
    list($a, $b) = array_map('intval', explode(" ", trim($linia)));
    
    if ($a % $b == 0 || $b % $a == 0) $wielokrotnosci++;
    if (NWD($a, $b) == 1) $pierwsze++;
    if (suma_cyfr($a) == suma_cyfr($b)) $sumy++;
}

echo "$wielokrotnosci $pierwsze $sumy";
fclose($file);

    ?>
</body>
</html>