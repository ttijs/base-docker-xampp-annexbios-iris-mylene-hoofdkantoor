<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnnexBios</title>
    <link rel="stylesheet" href="../assets/css/annexbios.css">
    <link rel="stylesheet" href="../assets/css/contact.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>

<header class="hoofd-header">
    <div class="header-container">
        <div class="logo">
            <img src="../assets/img/annexlogo.png" alt="Logo van AnnexBios" class="logo-afbeelding">
            <button class="hamburger-knop" aria-label="Menu">☰</button>
        </div>
        <nav class="hoofd-navigatie">
            <ul class="navigatie-lijst">
                <li><a href="#vestigingen" class="navigatie-link">Vestigingen</a></li>
                <li><a href="#aanbevolen" class="navigatie-link">Aanbevolen Films</a></li>
                <li><a href="../main_page/contact.php" class="navigatie-link">Contact</a></li>
                <li><a href="#nieuws" class="navigatie-link">Nieuws</a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="ticket-sectie">
    <div class="ticket-container">
        <h2 class="ticket-titel">Koop je tickets</h2>
        <div class="ticket-formulier">
            <select class="locatie-selectie">
                <option>Kies je vestiging</option>
                <option>Bilthoven</option>
                <option>Montfoort</option>
                <option>Woerden</option>
                <option>Leidsche Rijn</option>
            </select>
            <button class="tickets-knop">Bekijk tickets</button>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hamburgerKnop = document.querySelector('.hamburger-knop');
        const hoofdNavigatie = document.querySelector('.hoofd-navigatie');

        hamburgerKnop.addEventListener('click', () => {
            hoofdNavigatie.classList.toggle('open');
        });
    });
</script>

</body>
</html>
