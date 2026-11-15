<?php
require '../database.sql/db.php';

$stmt = $pdo->query("SELECT * FROM vestigingen ORDER BY id");
$vestigingen = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vestigingen</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/global-header.css">
    <link rel="stylesheet" href="/assets/css/admin_vestigingen_list.css">
</head>
<body class="admin-list-body">

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



<div class="admin-list-container">
    <h1 class="admin-list-title">Vestigingen</h1>
    <a href="vestiging_form.php" class="admin-list-btn" style="margin-bottom:15px; display:inline-block;">+ Nieuwe vestiging</a>

    <?php foreach ($vestigingen as $v): ?>
      <div class="admin-list-card">
  <div>
    <div class="admin-list-name"><?php echo htmlspecialchars($v['name']); ?></div>
    <div class="admin-list-api"><?php echo htmlspecialchars($v['api_key']); ?></div>
  </div>
  <div class="admin-list-actions">
    <a href="vestiging_form.php?id=<?php echo $v['id']; ?>" class="admin-list-btn-edit">Bewerken</a>
    <a href="delete_vestiging.php?id=<?php echo $v['id']; ?>" class="admin-list-btn-delete"
       onclick="openDeleteModal(event, <?php echo $v['id']; ?>)">Verwijderen</a>
  </div>
</div>

    <?php endforeach; ?>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h2>Weet je zeker dat je dit wilt verwijderen?</h2>
        <p>Deze actie kan niet ongedaan gemaakt worden.</p>
        <div class="modal-actions">
            <button onclick="closeDeleteModal()" class="btn-cancel">Nee, annuleren</button>
            <a id="confirmDeleteBtn" href="#" class="btn-delete">Ja, verwijderen</a>
        </div>
    </div>
</div>

<!-- Hamburger & Delete modal scripts -->
<script>
(function(){
  function initHeaderToggle() {
      var btn = document.querySelector('.hamburger-knop');
      var nav = document.querySelector('.hoofd-navigatie');
      if (!btn || !nav) return;

      if (btn._hamburgerBound) return;
      btn._hamburgerBound = true;

      btn.setAttribute('aria-expanded', 'false');
      btn.addEventListener('click', function(e) {
          e.stopPropagation();
          var open = nav.classList.toggle('open');
          btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      });

      document.addEventListener('click', function(e) {
          if (!nav.classList.contains('open')) return;
          if (nav.contains(e.target) || btn.contains(e.target)) return;
          nav.classList.remove('open');
          btn.setAttribute('aria-expanded', 'false');
      });

      document.addEventListener('keydown', function(e){
          if(e.key === 'Escape' && nav.classList.contains('open')) {
              nav.classList.remove('open');
              btn.setAttribute('aria-expanded', 'false');
          }
      });
  }

  if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initHeaderToggle);
  } else {
      initHeaderToggle();
  }
})();

/* Delete modal handlers */
function openDeleteModal(event, id) {
    event.preventDefault();
    const modal = document.getElementById('deleteModal');
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    confirmBtn.href = 'delete_vestiging.php?id=' + id;
    modal.style.display = 'flex';
}
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}
</script>

<?php include '../includes/footer.php'; ?>
</body>
</html
