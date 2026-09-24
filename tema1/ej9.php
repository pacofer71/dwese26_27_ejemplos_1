<?php
$andalucia = [
    'Almería',
    'Cádiz',
    'Córdoba',
    'Granada',
    'Huelva',
    'Jaen',
    'Málaga',
    'Sevilla'
];
$extremadura = [
    'Badajoz',
    'Caceres',
];
$murcia = ['Murcia'];
$valencia = ['Alicante', 'Castellon', 'Valencia'];
$comunidades = [
    'Andalucia' => $andalucia,
    'Extremadura' => $extremadura,
    'Murcia' => $murcia,
    'Valencia' => $valencia
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body bgcolor='olive'>
    <h4>
        <center>TABLA DE COMUNIDADES</center>
    </h4>
    <?php foreach ($comunidades as $nombre => $provincias): ?>
        <table align='center' border='3' cellpadding='10'>
            <tr align='center'>
                <td colspan='<?= count($provincias) ?>' bgcolor='gray'>
                    <b><?= $nombre ?></b>
                </td>
            </tr>
            <tr>
                <?php foreach ($provincias as $nomProv): ?>
                     <td>
                        <?= $nomProv ?>
                    </td>

                <?php endforeach; ?>
            </tr>
        </table><br>
    <?php endforeach; ?>
</body>

</html>