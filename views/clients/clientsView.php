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
                        <i class="fas fa-users me-2"></i>
                        Gestion des Clients
                    </h1>
                    <p class="text-muted">Gérer vos clients et leurs ristournes</p>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
                        <i class="fas fa-user-plus me-1"></i>
                        Nouveau Client
                    </button>
                </div>
            </div>

            <!-- Discount Categories Info -->
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="card border-success">
                        <div class="card-body text-center">
                            <h4 class="text-success">2%</h4>
                            <p class="mb-1">Ristourne Standard</p>
                            <small class="text-muted">Prix casier: 333 Fr</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card border-warning">
                        <div class="card-body text-center">
                            <h4 class="text-warning">2.5%</h4>
                            <p class="mb-1">Ristourne Privilège</p>
                            <small class="text-muted">Prix casier: 350 Fr</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card border-danger">
                        <div class="card-body text-center">
                            <h4 class="text-danger">5%</h4>
                            <p class="mb-1">Ristourne VIP</p>
                            <small class="text-muted">Prix casier: 380 Fr</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clients Table -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>
                        Liste des Clients
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Contact</th>
                                    <th>Ristourne</th>
                                    <th>Prix Casier</th>
                                    <th>Solde</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="fw-medium">SARL AFRICA DISTRIBUTION</div>
                                        <small class="text-muted">Quartier Tokoin, Lomé</small>
                                    </td>
                                    <td>+228 90 12 34 56</td>
                                    <td>
                                        <span class="badge bg-danger">5%</span>
                                    </td>
                                    <td class="fw-medium">380 Fr</td>
                                    <td>
                                        <span class="text-success fw-medium">
                                            15,250 Fr
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Créer commande">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">ETS KOKOU DISTRIBUTION</div>
                                        <small class="text-muted">Bè-Kpota, Lomé</small>
                                    </td>
                                    <td>+228 91 23 45 67</td>
                                    <td>
                                        <span class="badge bg-warning">2.5%</span>
                                    </td>
                                    <td class="fw-medium">350 Fr</td>
                                    <td>
                                        <span class="text-success fw-medium">
                                            8,750 Fr
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Créer commande">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">BOUTIQUE AMEN</div>
                                        <small class="text-muted">Agbalépédogan, Lomé</small>
                                    </td>
                                    <td>+228 92 34 56 78</td>
                                    <td>
                                        <span class="badge bg-success">2%</span>
                                    </td>
                                    <td class="fw-medium">333 Fr</td>
                                    <td>
                                        <span class="text-danger fw-medium">
                                            -2,500 Fr
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Créer commande">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">SUPERETTE KODZI</div>
                                        <small class="text-muted">Adidogomé, Lomé</small>
                                    </td>
                                    <td>+228 90 45 67 89</td>
                                    <td>
                                        <span class="badge bg-warning">2.5%</span>
                                    </td>
                                    <td class="fw-medium">350 Fr</td>
                                    <td>
                                        <span class="text-success fw-medium">
                                            22,100 Fr
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Créer commande">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">DEPOT AMAN</div>
                                        <small class="text-muted">Djidjole, Lomé</small>
                                    </td>
                                    <td>+228 91 56 78 90</td>
                                    <td>
                                        <span class="badge bg-success">2%</span>
                                    </td>
                                    <td class="fw-medium">333 Fr</td>
                                    <td>
                                        <span class="text-success fw-medium">
                                            5,800 Fr
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                <i class="fas fa-history"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Créer commande">
                                                <i class="fas fa-shopping-cart"></i>
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

        <!-- Add Client Modal -->
        <div class="modal fade" id="addClientModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-user-plus me-2"></i>
                            Nouveau Client
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nom" class="form-label">Nom du client</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" required>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <textarea class="form-control" id="adresse" name="adresse" rows="2" required></textarea>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="pourcentage_ristourne" class="form-label">Catégorie de ristourne</label>
                                <select class="form-select" id="pourcentage_ristourne" name="pourcentage_ristourne" required>
                                    <option value="">Choisir une catégorie</option>
                                    <option value="2">Standard - 2% (Prix casier: 333 Fr)</option>
                                    <option value="2.5">Privilège - 2.5% (Prix casier: 350 Fr)</option>
                                    <option value="5">VIP - 5% (Prix casier: 380 Fr)</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Information:</strong> Le prix du casier sera automatiquement attribué selon la catégorie sélectionnée.
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