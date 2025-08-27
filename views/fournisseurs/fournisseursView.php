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
                        <i class="fas fa-truck me-2"></i>
                        Gestion des Fournisseurs
                    </h1>
                    <p class="text-muted">Gérer vos fournisseurs et livraisons</p>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
                        <i class="fas fa-plus me-1"></i>
                        Nouveau Fournisseur
                    </button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDeliveryModal">
                        <i class="fas fa-truck-loading me-1"></i>
                        Nouvelle Livraison
                    </button>
                </div>
            </div>

            <!-- Suppliers Table -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>
                        Liste des Fournisseurs
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Fournisseur</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="fw-medium">SOBEBRA (Société Béninoise de Brasserie)</div>
                                        <small class="text-muted">ID: 1</small>
                                    </td>
                                    <td>+228 22 20 30 40</td>
                                    <td>
                                        <a href="mailto:contact@sobebra.tg" class="text-decoration-none">
                                            contact@sobebra.tg
                                        </a>
                                    </td>
                                    <td>Zone Industrielle, Lomé</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Nouvelle livraison">
                                                <i class="fas fa-truck-loading"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">Groupe Castel Togo</div>
                                        <small class="text-muted">ID: 2</small>
                                    </td>
                                    <td>+228 22 21 45 67</td>
                                    <td>
                                        <a href="mailto:info@castel.tg" class="text-decoration-none">
                                            info@castel.tg
                                        </a>
                                    </td>
                                    <td>Boulevard Gnassingbé Eyadéma, Lomé</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Nouvelle livraison">
                                                <i class="fas fa-truck-loading"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">Coca-Cola Togo</div>
                                        <small class="text-muted">ID: 3</small>
                                    </td>
                                    <td>+228 22 22 33 44</td>
                                    <td>
                                        <a href="mailto:ventes@cocacola.tg" class="text-decoration-none">
                                            ventes@cocacola.tg
                                        </a>
                                    </td>
                                    <td>Avenue de la Paix, Lomé</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Nouvelle livraison">
                                                <i class="fas fa-truck-loading"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">Voltic (Ghana) Ltd</div>
                                        <small class="text-muted">ID: 4</small>
                                    </td>
                                    <td>+228 90 11 22 33</td>
                                    <td>
                                        <a href="mailto:distribution@voltic.gh" class="text-decoration-none">
                                            distribution@voltic.gh
                                        </a>
                                    </td>
                                    <td>Port Autonome de Lomé</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Nouvelle livraison">
                                                <i class="fas fa-truck-loading"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Supplier Modal -->
        <div class="modal fade" id="addSupplierModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-plus me-2"></i>
                            Nouveau Fournisseur
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nom" class="form-label">Nom du fournisseur</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <textarea class="form-control" id="adresse" name="adresse" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Delivery Modal -->
        <div class="modal fade" id="addDeliveryModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-truck-loading me-2"></i>
                            Nouvelle Livraison
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="fournisseur_id" class="form-label">Fournisseur</label>
                                <select class="form-select" id="fournisseur_id" name="fournisseur_id" required>
                                    <option value="">Sélectionner un fournisseur</option>
                                    <option value="1">SOBEBRA (Société Béninoise de Brasserie)</option>
                                    <option value="2">Groupe Castel Togo</option>
                                    <option value="3">Coca-Cola Togo</option>
                                    <option value="4">Voltic (Ghana) Ltd</option>
                                </select>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="produit_id" class="form-label">Produit</label>
                                <select class="form-select" id="produit_id" name="produit_id" required>
                                    <option value="">Sélectionner un produit</option>
                                    <option value="1">Coca-Cola 1.5L</option>
                                    <option value="2">Fanta Orange 33cl</option>
                                    <option value="3">Sprite 33cl</option>
                                    <option value="4">Eau Minérale 1.5L</option>
                                    <option value="5">Bière Castel 65cl</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="quantite" class="form-label">Quantité</label>
                                <input type="number" class="form-control" id="quantite" name="quantite" min="1" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="prix_achat" class="form-label">Prix d'achat unitaire (Fr)</label>
                                <input type="number" class="form-control" id="prix_achat" name="prix_achat" min="0" step="0.01" required>
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Information:</strong> Cette livraison sera automatiquement ajoutée au stock du produit sélectionné.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-1"></i>
                            Enregistrer Livraison
                        </button>
                    </div>
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