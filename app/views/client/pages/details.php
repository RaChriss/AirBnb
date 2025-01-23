<?php
include __DIR__ . '/../elements/header.php';

if (isset($error)) {
    $message = $error;
} else {
    $message = '';
}
?>

<div class="image-grid">
    <img src="assets/images/habits/<?= $habitation['photos'] ?>" alt="Façade en forme de guitare" class="main-image">
    <!-- <img src="building.jpg" alt="Vue du bâtiment" class="secondary-image">
    <img src="plant.jpg" alt="Plante décorative" class="secondary-image">
    <img src="interior.jpg" alt="Intérieur minimaliste" class="secondary-image">
    <img src="terrace.jpg" alt="Terrasse avec vue" class="secondary-image"> -->
</div>

<main class="listing-info">
    <div class="listing-content">
        <h2 class="listing-title"><?= $habitation['description'] ?></h2>
        <p class="listing-details"><?= $habitation['number_of_rooms'] ?> Chambres</p>


        <div class="host-info">
            <img src="host.jpg" alt="Snow Lee" class="host-image">
            <div>
                <h3>Type</h3>
                <p><?= $habitation['type'] ?></p>
            </div>
        </div>

        <div class="feature">
            <span>🗺️</span>
            <div>
                <h3>Neighborhood</h3>
                <p><?= $habitation['neighborhood'] ?></p>
            </div>
        </div>
    </div>

    <div class="booking-card">
        <p class="price"><?= $habitation['daily_rent'] ?> € par jour</p>
        <form class="booking-form" action="reserver" method="POST">
            <div class="date-picker">
                <div>ARRIVÉE</div>
                <input type="hidden" name="idHabs" value="<?= $habitation['id'] ?>">
                <input name="arrivee" type="date" value="2025-01-30">
            </div>
            <div class="date-picker">
                <div>DÉPART</div>
                <input name="depart" type="date" value="2025-02-04">
            </div>
            <h3><?= $message ?></h3>
            <button class="reserve-button">Réserver</button>
        </form>

        <div class="price-details">
            <div class="price-row">
                <span>62 € x 5 nuits</span>
                <span>310 €</span>
            </div>
            <div class="price-row total">
                <span>Total</span>
                <span>374 €</span>
            </div>
        </div>
    </div>
</main>
<?php include __DIR__ . '/../elements/footer.php'; ?>