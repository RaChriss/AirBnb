<?php include __DIR__ . '/../elements/header.php'; ?>

<!-- Filters -->
<div class="filters">
    <button class="filter-button active">Tous les logements<?= $_SESSION['user']['name'] ?></button>
    <button class="filter-button">Chambres</button>
    <button class="filter-button">Maisons</button>
    <button class="filter-button">Bord de mer</button>
    <button class="filter-button">Vue exceptionnelle</button>
    <button class="filter-button">Piscines</button>
    <button class="filter-button">Design</button>
    <button class="filter-button">Luxe</button>
</div>

<!-- Main Content -->
<main>
    <div class="listings-grid">
        <!-- Annonce  -->
        <?php foreach ($liste as $habitation) { ?>
            <div class="listing-card">
                <a href="details?id=<?= $habitation['id'] ?>">
                    <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=800&q=80" alt="Villa avec vue sur la mer" class="listing-image">
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