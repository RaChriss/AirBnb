<?php include __DIR__ . '/../elements/header.php';
if (isset($error)) {
    $message = $error;
} else {
    $message = '';
}
?>


<div class="admin-content">
    <div class="add-listing-form" id="add-listing-form">
        <h3><?= $message ?></h3>
        <h2>Modifier une annonce</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" value="<?= $toUpdate['type'] ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Localisation</label>
                <input type="text" id="location" name="location" value="<?= $toUpdate['neighborhood'] ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="<?= $toUpdate['description'] ?>" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix par nuit (€)</label>
                <input type="number" id="prix" name="prix" value="<?= $toUpdate['daily_rent'] ?>" required>
            </div>
            <div class="form-group">
                <label for="room">Number of rooms</label>
                <input type="number" id="room" name="room" value="<?= $toUpdate['number_of_rooms'] ?>" min="0" required>
            </div>
            <div class="form-group">
                <label for="image">Illustration</label>
                <img src="assets/images/habitations/<?= $toUpdate['photos'] ?>" alt="saryy">
                <input type="file" id="image" name="image">
            </div>
            <div class="form-buttons">
                <button type="submit" class="save-btn">Enregistrer</button>
                <a href="homeAdmin" class="cancel-btn">Annuler</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../elements/footer.php'; ?>