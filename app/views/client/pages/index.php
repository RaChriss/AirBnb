<?php include __DIR__ . '/../elements/header.php'; ?>

<!-- Filters -->
<div class="filters">
    <div>
        <button class="filter-button active">Tous les logements</button>
        <button class="filter-button">Chambres</button>
    </div>
    <div>
        <form method="GET" action="" class="search-form">
            <input
                type="text"
                name="search"
                placeholder="Rechercher par description..."
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                class="search-input">
            <button type="submit" class="search-button">Rechercher</button>
        </form>
    </div>
</div>

<!-- Main Content -->
<main>
    <div class="listings-grid">
        <!-- Annonce  -->
        <?php
        // Filtrer les résultats en fonction de la recherche
        $search = $_GET['search'] ?? '';
        foreach ($liste as $habitation) {
            if ($search && stripos($habitation['description'], $search) === false) {
                continue; // Skip les habitations qui ne correspondent pas à la recherche
            }
        ?>
            <div class="listing-card">
                <a href="details?id=<?= $habitation['id'] ?>">
                    <img src="assets/images/habitations/" alt="Villa avec vue sur la mer" class="listing-image">
                </a>
                <div class="listing-info">
                    <div class="listing-title"><?= $habitation['description'] ?></div>
                    <div class="listing-details"><?= $habitation['neighborhood'] ?></div>
                    <div class="listing-details"><?= $habitation['type'] ?></div>
                    <div class="listing-price"><?= $habitation['daily_rent'] ?>€ par jour</div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
<?php include __DIR__ . '/../elements/footer.php'; ?>