<?php include('../elements/header.php'); ?>

        <div class="admin-content">
            <div class="add-listing-form" id="add-listing-form">
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
                <div class="admin-listing-card">
                    <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=800&q=80" alt="Villa avec vue sur la mer">
                    <div class="admin-listing-info">
                        <h3>Villa avec vue sur la mer</h3>
                        <p>Nice, France</p>
                        <p>Prix: 250€ par nuit</p>
                        <p>Note: 4.9</p>
                        <div class="admin-listing-actions">
                            <a href="#" class="edit-btn">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <a href="#" class="delete-btn">
                                <i class="fas fa-trash"></i> Supprimer
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Annonce 2 -->
                <div class="admin-listing-card">
                    <img src="https://images.unsplash.com/photo-1509365465985-25d11c17e812?auto=format&fit=crop&w=800&q=80" alt="Appartement au cœur de Paris">
                    <div class="admin-listing-info">
                        <h3>Appartement au cœur de Paris</h3>
                        <p>Paris, France</p>
                        <p>Prix: 180€ par nuit</p>
                        <p>Note: 4.8</p>
                        <div class="admin-listing-actions">
                            <a href="#" class="edit-btn">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <a href="#" class="delete-btn">
                                <i class="fas fa-trash"></i> Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include('../elements/footer.php'); ?>
