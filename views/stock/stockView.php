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

            <!-- Filtres -->
            <form method="GET" action="" class="row g-3 align-items-center mb-4">
                <div class="col-auto">
                    <label for="categorie" class="col-form-label">Filtrer par catégorie :</label>
                </div>
                <div class="col-auto">
                    <select name="categorie" id="categorie" class="form-select" onchange="this.form.submit()">
                        <option value="">Toutes</option>
                        <?php foreach ($Y_categories as $cat): ?>
                            <option value="<?= htmlspecialchars($cat->id_categorie) ?>" 
                                <?= $categorie == $cat->id_categorie ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat->nomCategorie) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>

            <?php if ($categorie): ?>
                <p class="text-muted small mb-2">Filtré par catégorie : 
                    <strong>
                        <?= htmlspecialchars(array_values(array_filter($Y_categories, fn($c) => $c->id_categorie == $categorie))[0]->nomCategorie ?? '') ?>
                    </strong>
                </p>
            <?php endif; ?>
            
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
                                        if (($produit->seuile_minimum) >= ($produit->quantiteProduit)){
                                            $couleur = 'bg-danger';
                                            $status = 'Stock bas';
                                        }else{
                                            $couleur = 'bg-success';
                                            $status = 'Stock élevé'; 
                                        }
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
                                        <span class="badge <?= $couleur ?>"><?= $status ?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button 
                                                class="btn btn-outline-secondary btn-modifier" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modifyproduct"
                                                data-id="<?= $produit->id_produit ?>"
                                                data-nom="<?= htmlspecialchars($produit->nomProduit) ?>"
                                                data-prix="<?= $produit->prix_vente ?>"
                                                data-categorie="<?= $produit->id_categorie ?>"
                                                data-quantite="<?= $produit->quantiteProduit ?>"
                                                data-seuil="<?= $produit->seuile_minimum ?>"
                                                data-fournisseur="<?= $produit->id_fournisseur ?>"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- PAGINATION -->
                        <?php if ($totalPages > 1): ?>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mt-3">
                                <!-- Previous -->
                                <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page - 1 ?><?= $categorie ? '&categorie=' . urlencode($categorie) : '' ?>" aria-label="Précédent">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <!-- Pages -->
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?><?= $categorie ? '&categorie=' . urlencode($categorie) : '' ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <!-- Next -->
                                <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page + 1 ?><?= $categorie ? '&categorie=' . urlencode($categorie) : '' ?>" aria-label="Suivant">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <?php endif; ?>

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

        <!-- Modify Product Modal -->
        <div class="modal fade" id="modifyproduct" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-plus me-2"></i>
                            Modifier
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
                            <button type="submit" class="btn btn-primary" name="maj">
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

    <script>
        document.getElementById('filterCategorie').addEventListener('change', function() {
            const categorie = this.value;
            const url = `stockController.php?categorie=${categorie}`;
            window.location.href = url; // recharge avec le filtre
        });
    </script>

    <script>
        var modifyModal = document.getElementById('modifyproduct');

        modifyModal.addEventListener('show.bs.modal', function (event) {
            // Bouton qui déclenche le modal
            var button = event.relatedTarget;

            // Récupérer les data-*
            var id = button.getAttribute('data-id');
            var nom = button.getAttribute('data-nom');
            var prix = button.getAttribute('data-prix');
            var categorie = button.getAttribute('data-categorie');
            var quantite = button.getAttribute('data-quantite');
            var seuil = button.getAttribute('data-seuil');
            var fournisseur = button.getAttribute('data-fournisseur');

            // Remplir le formulaire
            modifyModal.querySelector('#nom').value = nom;
            modifyModal.querySelector('#prix_vente').value = prix;
            modifyModal.querySelector('#id_categorie').value = categorie;
            modifyModal.querySelector('#quantiteProduit').value = quantite;
            modifyModal.querySelector('#seuile_minimum').value = seuil;
            modifyModal.querySelector('#id_fournisseur').value = fournisseur;

            // Facultatif : stocker l'id dans un input caché pour l'envoyer au serveur
            if(!modifyModal.querySelector('#idProduitHidden')){
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.id = 'idProduitHidden';
                hiddenInput.name = 'id_produit';
                modifyModal.querySelector('form').appendChild(hiddenInput);
            }
            modifyModal.querySelector('#idProduitHidden').value = id;
        });
    </script>


</body>
</html>