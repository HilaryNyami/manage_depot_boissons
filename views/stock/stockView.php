<?php
require('../views/template/header.php');
require('../views/template/navbar.php');
?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h1 class="display-6 mb-0">
                        <i class="fas fa-boxes me-2"></i>
                        Gestion du Stock
                    </h1>
                    <p class="text-muted">Gérer vos produits et leurs stocks</p>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="fas fa-plus me-1"></i>
                        Nouveau Produit
                    </button>
                </div>
            </div>

            <!-- Products Table -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>
                        Liste des Produits
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix Unitaire</th>
                                    <th>Stock Actuel</th>
                                    <th>Stock Minimum</th>
                                    <th>Unité</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($Y_produit as $produit) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="fw-medium"><?= $produit->nomProduit ?></div>
                                        <small class="text-muted"><?= $produit->id_produit ?></small>
                                    </td>
                                    <td><?= $produit->prix_vente ?> Fr</td>
                                    <td>
                                        <span class="fw-medium"><?= $produit->quantiteProduit ?></span>
                                    </td>
                                    <td><?= $produit->seuile_minimum ?></td>
                                    <td>
                                        <span class="badge bg-secondary">bouteille</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger">Stock Bas</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Product Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-plus me-2"></i>
                            Nouveau Produit
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="nom" class="form-label">Nom du produit</label>
                                        <input type="text" class="form-control" id="nom" name="nomProduit" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="prix_vente" class="form-label">Prix unitaire (Fr)</label>
                                        <input type="number" class="form-control" id="prix_vente" name="prix_vente" min="0" step="0.01" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="id_categorie" class="form-label">Catégorie</label>
                                        <select class="form-select" id="id_categorie" name="id_categorie">
                                            <?php foreach ($Y_categories as $categorie) {?>
                                                <option value="<?= $categorie->id_categorie ?>"> <?= $categorie->nomCategorie ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="quantiteProduit" class="form-label">Stock actuel</label>
                                        <input type="number" class="form-control" id="quantiteProduit" name="quantiteProduit" min="0" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="seuile_minimum" class="form-label">Stock minimum</label>
                                        <input type="number" class="form-control" id="seuile_minimum" name="seuile_minimum" min="0" required>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="id_fournisseur" class="form-label">Fournisseur</label>
                                        <select class="form-select" id="id_fournisseur" name="id_fournisseur">
                                            <?php foreach ($Y_fournisseurs as $fournisseurs) {?>
                                                <option value="<?= $fournisseurs->id_fournisseur ?>"> <?= $fournisseurs->nom_fournisseur ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary" name="enregistrer">
                                <i class="fas fa-save me-1"></i>
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>