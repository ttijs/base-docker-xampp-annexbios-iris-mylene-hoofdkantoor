<link rel="stylesheet" href="../assets/css/annexbios.css">
<link rel="stylesheet" href="../assets/css/admin_vertoning_form.css">
<link rel="stylesheet" href="../assets/css/admin_vertoningen_list.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/admin_vestiging_form.css">
<link rel="stylesheet" href="../assets/css/admin_vestigingen_list.css">
<link rel="stylesheet" href="../assets/css/annexbios.css">
<link rel="stylesheet" href="../assets/css/nieuws.css">
<link rel="stylesheet" href="../assets/css/footer.css">

</head>
<header class="hoofd-header">
    <div class="header-container">
        <div class="logo">
            <a href="admin.php">
                <img src="../assets/img/annexbioslogo.png" alt="AnnexBios" class="logo-afbeelding">
            </a>
        </div>

        <button class="hamburger-knop" aria-label="Menu">☰</button>

        <nav class="hoofd-navigatie">
            <ul class="navigatie-lijst">
                <li><a href="../main_page/admin.php" class="navigatie-link">Home</a></li>
                <li><a href="../vestigingen_crud/list_vestigingen.php" class="navigatie-link">Vestigingen</a></li>
                <li><a href="../crud_films/list_vertoningen.php" class="navigatie-link">Films</a></li>
                <li><a href="../news/nieuws.php" class="navigatie-link">Nieuws</a></li>
            </ul>
        </nav>
    </div>
</header>


<section class="ticket-sectie">
    <div class="ticket-container">
        <h2 class="ticket-titel">Onderhoud uw pagina</h2>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.querySelector('.hamburger-knop');
  const nav = document.querySelector('.hoofd-navigatie');

  console.log('Header init:', { btnExists: !!btn, navExists: !!nav });

  if (!btn || !nav) return;

  btn.setAttribute('aria-expanded', 'false');

  btn.addEventListener('click', function(e) {
    const open = nav.classList.toggle('open');
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    console.log('Hamburger clicked, open=', open);
  });

  document.addEventListener('click', function(e) {
    if (!nav.classList.contains('open')) return;
    if (nav.contains(e.target) || btn.contains(e.target)) return;
    nav.classList.remove('open');
    btn.setAttribute('aria-expanded', 'false');
    console.log('Clicked outside, menu closed');
  });
});
</script>
