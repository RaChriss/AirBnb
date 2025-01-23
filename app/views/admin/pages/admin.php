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
        <h2>Ajouter une annonce</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="location">Localisation</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="price">Prix par nuit (€)</label>
                <input type="number" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="rating">Note</label>
                <input type="number" id="rating" name="rating" step="0.1" min="0" max="5" required>
            </div>
            <div class="form-group">
                <label for="image">Illustration</label>
                <input type="file" id="image" name="image" required>
            </div>
            <div class="form-buttons">
                <button type="submit" class="save-btn">Enregistrer</button>
                <a href="#" class="cancel-btn">Annuler</a>
            </div>
        </form>
    </div>

    <div class="admin-listings">
        <!-- Annonce 1 -->
        <?php foreach ($liste as $habitation) { ?>
            <div class="admin-listing-card">
                <img src="assets/images/habitations/" alt="Villa avec vue sur la mer">
                <div class="admin-listing-info">
                    <h3><?= $habitation['description'] ?></h3>
                    <p><?= $habitation['neighborhood'] ?></p>
                    <p>Prix: <?= $habitation['daily_rent'] ?>€ par nuit</p>
                    <p>Type: <?= $habitation['type'] ?></p>
                    <div class="admin-listing-actions">
                        <a href="update?idHabs=<?= $habitation['id'] ?>" class="edit-btn">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <a href="delete?idHabs=<?= $habitation['id'] ?>" class="delete-btn">
                            <i class="fas fa-trash"></i> Supprimer
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include __DIR__ . '/../elements/footer.php'; ?>