<?php
require 'funkce.php';

$poctyPorci = 1;
$chyba = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['poctyPorci']) && is_numeric($_POST['poctyPorci']) && $_POST['poctyPorci'] > 0) {
        $poctyPorci = (int)$_POST['poctyPorci'];
    } else {
        $chyba = 'Prosím, zadejte platný počet porcí.';
    }
}

$ingredience = [
    'Ploché Nudle' => 150,
    'Hovězí/Kuřecí' => 75,
    'Cibulka' => 10,
    'Vývar' => 250,
];

$navod = [
    'Položíte ploché nudle na misku. Následněsi na nudle dáte maso hovězí/kuřecí.',
    'Výběr masa nechám na vás. Na vše položíte po celé ploše yelenou cibulku.',
    'A vše polijete horkým vývarem. Dobrou chut!'
];
?>
<div class="obsah">
    <h2>Polívka Pho</h2>
    <img src="img/obrazek.jpg" alt="Oblíbené jídlo">
    
    <h3>Seznam Ingrediencí</h3>
    <form method="post">
        <label for="poctyPorci">Počet porcí:</label>
        <input type="text" id="poctyPorci" name="poctyPorci" value="<?php echo htmlspecialchars($poctyPorci); ?>">
        <button type="submit">Přepočítat</button>
        <div class="chyba"><?php echo $chyba; ?></div>
    </form>

    <ul>
    <?php foreach ($ingredience as $nazev => $mnozstvi): ?>
        <li><?php echo $nazev . ': ' . ($nazev === 'Vývar' ? ($mnozstvi * $poctyPorci) . ' ml' : ($mnozstvi * $poctyPorci) . ' g'); ?></li>
    <?php endforeach; ?>
    </ul>

    <h3>Návod na Přípravu</h3>
    <ol>
    <?php foreach ($navod as $krok): ?>
        <li><?php echo $krok; ?></li>
    <?php endforeach; ?>
    </ol>
</div>
