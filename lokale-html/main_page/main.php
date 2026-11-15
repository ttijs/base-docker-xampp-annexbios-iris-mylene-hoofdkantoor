<?php
require '../db/db.php';
include '../includes/header.php';
?>

<main>
  <!-- Hoofdkantoor Utrecht -->
  <div class="main-text-container">
    <div class="main-text">
      <span class="lees-meer">
        <div class="lees-meer-titel">AnnexBios – Hoofdkantoor Utrecht</div>
        Wij zijn AnnexBios, een jong en innovatief bedrijf met ons hoofdkantoor in Utrecht. Vanuit hier sturen wij onze projecten en ondersteunen we de andere vestigingen.
        <br><br>

        De afgelopen periode hebben wij veel bereikt:
        <ul class="main-text-bullits">
          <li>Een API ontwikkeld voor een klant, zodat zij hun processen makkelijker en sneller kunnen laten verlopen.</li>
          <li>Belangrijke informatie opgeleverd aan onze andere kantoren, waarmee zij hun website konden laten werken en verder konden uitbouwen.</li>
        </ul>
        <br>
        Ons hoofdkantoor in Utrecht vormt het kloppend hart van AnnexBios. Hier bedenken, bouwen en leveren we oplossingen die onze klanten én onze eigen organisatie vooruithelpen.
        <br><br>

        <strong>Toekomstvisie</strong><br>
        In de komende tijd willen wij onze technologie verder uitbreiden, zodat we nog meer klanten kunnen ondersteunen met slimme digitale oplossingen. Daarnaast werken we aan nieuwe manieren om onze kantoren wereldwijd beter met elkaar te verbinden en informatie sneller te delen. Ons doel is om AnnexBios te laten groeien tot een betrouwbaar en vooruitstrevend bedrijf dat innovatie en samenwerking centraal stelt.
      </span>
    </div>
  </div>

  <!-- Vestigingen -->
  <div id='vestegingen'>
    <div class="vestigingen-grid">
      <?php
      // Alleen de naam ophalen
      $result = $conn->query("SELECT name FROM vestigingen");
      while ($vestiging = $result->fetch_assoc()):
      ?>
        <div class="vestiging-kaart">
          <img src="../assets/img/Schermafbeelding 2025-09-10 154400.png" alt="Bioscoop" class="vestiging-afbeelding">
          <div class="vestiging-info">
            <strong><?php echo htmlspecialchars($vestiging['name']); ?></strong>
            <button class="vestiging-btn">BEZOEK WEBSITE</button>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <!-- Aanbevolen films -->
  <div id='aanbevolen'>
    <div class="film-slider-container">
      <div class="film-slider">
        <?php
        $result = $conn->query("SELECT * FROM movies");
        while ($film = $result->fetch_assoc()):
        ?>
          <div class="film-vak">
            <img src="https://image.tmdb.org/t/p/w500/<?php echo htmlspecialchars($film['backdrop_path']); ?>" alt="Poster" class="film-poster">
            <div class="film-info">
              <div class="film-titel"><?php echo htmlspecialchars($film['title']); ?></div>
              <div class="film-release"><strong>Release:</strong> <?php echo htmlspecialchars($film['release_date']); ?></div>
              <div class="film-runtime"><strong>Duur:</strong> <?php echo htmlspecialchars($film['runtime']); ?> min</div>
              <div class="film-overview"><?php echo htmlspecialchars($film['overview']); ?></div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

  <!-- Nieuws -->
  <div class="nieuws-container">
    <?php
    $sql = "SELECT * FROM nieuws ORDER BY publiceerdatum DESC";
    $result = $conn->query($sql);
    $array = [];
    while ($nieuws = $result->fetch_assoc()) {
      $array[] = $nieuws;
    }
    ?>

    <!-- Grote bovenste blok -->
    <?php if (count($array) > 0): ?>
      <div class="lange-blok">
        <div class="nieuwsitem">
          <img src="../admin/assets/img/<?php echo htmlspecialchars($array[0]['afbeelding']); ?>" class="nieuws-afbeelding" alt="Nieuws">
          <h2><?php echo htmlspecialchars($array[0]['titel']); ?></h2>
          <p><?php echo htmlspecialchars($array[0]['beschrijving']); ?></p>
          <p><?php echo htmlspecialchars($array[0]['samenvatting']); ?></p>
          <p><?php echo htmlspecialchars($array[0]['publiceerdatum']); ?></p>
        </div>
      </div>
    <?php endif; ?>

    <!-- Twee middelste blokken onder de bovenste -->
    <?php if (count($array) > 2): ?>
      <div class="middelste-grid">
        <?php for ($i = 1; $i <= 2 && $i < count($array) - 1; $i++): ?>
          <div class="nieuwsitem">
            <img src="../admin/assets/img/<?php echo htmlspecialchars($array[$i]['afbeelding']); ?>" class="nieuws-afbeelding" alt="Nieuws">
            <h2><?php echo htmlspecialchars($array[$i]['titel']); ?></h2>
            <p><?php echo htmlspecialchars($array[$i]['beschrijving']); ?></p>
            <p><?php echo htmlspecialchars($array[$i]['samenvatting']); ?></p>
            <p><?php echo htmlspecialchars($array[$i]['publiceerdatum']); ?></p>
          </div>
        <?php endfor; ?>
      </div>
    <?php endif; ?>

    <!-- Grote onderste blok -->
    <?php if (count($array) > 3): $nieuws = $array[count($array) - 1]; ?>
      <div class="lange-blok-onder">
        <div class="nieuwsitem">
          <img src="../admin/assets/img/<?php echo htmlspecialchars($nieuws['afbeelding']); ?>" class="nieuws-afbeelding" alt="Nieuws">
          <h2><?php echo htmlspecialchars($nieuws['titel']); ?></h2>
          <p><?php echo htmlspecialchars($nieuws['beschrijving']); ?></p>
          <p><?php echo htmlspecialchars($nieuws['samenvatting']); ?></p>
          <p><?php echo htmlspecialchars($nieuws['publiceerdatum']); ?></p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</main>

  <?php
  include '../includes/footer.php';
  $conn->close();
  ?>

  <!-- Slider script -->
  <script>
    const container = document.querySelector(".film-slider-container");
    const slider = document.querySelector(".film-slider");

    if (window.innerWidth > 1024) {
      // Dubbel maken voor infinite scroll
      slider.innerHTML += slider.innerHTML;

      const slideWidth = slider.scrollWidth / 2;
      let scrollAmount = 1;
      let hovering = false;

      container.addEventListener("mouseenter", () => {
        hovering = true;
      });
      container.addEventListener("mouseleave", () => {
        hovering = false;
      });

      function autoScroll() {
        if (!hovering) {
          container.scrollLeft += scrollAmount;
          if (container.scrollLeft >= slideWidth) {
            container.scrollLeft = 0;
          }
        }
        requestAnimationFrame(autoScroll);
      }

      autoScroll();
    } else {
      // Mobiel: horizontaal scrollen
      container.style.overflowX = "scroll";
      container.style.scrollSnapType = "x mandatory";
      slider.style.display = "flex";
      slider.style.gap = "20px";
    }
  </script>
</body>
</html>