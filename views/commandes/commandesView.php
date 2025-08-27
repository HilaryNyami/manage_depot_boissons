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
                        <i class="fas fa-shopping-cart me-2"></i>
                        Gestion des Commandes
                    </h1>
                    <p class="text-muted">Gérer les commandes clients avec calcul automatique des ristournes</p>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrderModal">
                        <i class="fas fa-plus me-1"></i>
                        Nouvelle Commande
                    </button>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>
                        Liste des Commandes
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>N° Commande</th>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>Total Brut</th>
                                    <th>Remise</th>
                                    <th>Total Net</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="fw-medium">#001</div>
                                    </td>
                                    <td>SARL AFRICA DISTRIBUTION</td>
                                    <td>25/08/2025 14:30</td>
                                    <td>45,000 Fr</td>
                                    <td class="text-success">-2,250 Fr</td>
                                    <td class="fw-medium">42,750 Fr</td>
                                    <td>
                                        <span class="badge bg-success">Livrée</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Détails">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">#002</div>
                                    </td>
                                    <td>ETS KOKOU DISTRIBUTION</td>
                                    <td>25/08/2025 10:15</td>
                                    <td>28,000 Fr</td>
                                    <td class="text-success">-700 Fr</td>
                                    <td class="fw-medium">27,300 Fr</td>
                                    <td>
                                        <span class="badge bg-warning">En attente</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Détails">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Marquer livrée">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">#003</div>
                                    </td>
                                    <td>BOUTIQUE AMEN</td>
                                    <td>24/08/2025 16:45</td>
                                    <td>15,000 Fr</td>
                                    <td class="text-success">-300 Fr</td>
                                    <td class="fw-medium">14,700 Fr</td>
                                    <td>
                                        <span class="badge bg-success">Livrée</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Détails">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">#004</div>
                                    </td>
                                    <td>SUPERETTE KODZI</td>
                                    <td>24/08/2025 09:20</td>
                                    <td>62,500 Fr</td>
                                    <td class="text-success">-1,562 Fr</td>
                                    <td class="fw-medium">60,938 Fr</td>
                                    <td>
                                        <span class="badge bg-warning">En attente</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Détails">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Marquer livrée">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-medium">#005</div>
                                    </td>
                                    <td>DEPOT AMAN</td>
                                    <td>23/08/2025 13:10</td>
                                    <td>18,000 Fr</td>
                                    <td class="text-success">-360 Fr</td>
                                    <td class="fw-medium">17,640 Fr</td>
                                    <td>
                                        <span class="badge bg-success">Livrée</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Détails">
                                                <i class="fas fa-eye"></i>
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

        <!-- Add Order Modal -->
        <div class="modal fade" id="addOrderModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-plus me-2"></i>
                            Nouvelle Commande
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="client_id" class="form-label">Client</label>
                                <select class="form-select" id="client_id" name="client_id" required onchange="updateClientInfo()">
                                    <option value="">Sélectionner un client</option>
                                    <option value="1" data-ristourne="5" data-prix-casier="380">
                                        SARL AFRICA DISTRIBUTION (5%)
                                    </option>
                                    <option value="2" data-ristourne="2.5" data-prix-casier="350">
                                        ETS KOKOU DISTRIBUTION (2.5%)
                                    </option>
                                    <option value="3" data-ristourne="2" data-prix-casier="333">
                                        BOUTIQUE AMEN (2%)
                                    </option>
                                    <option value="4" data-ristourne="2.5" data-prix-casier="350">
                                        SUPERETTE KODZI (2.5%)
                                    </option>
                                    <option value="5" data-ristourne="2" data-prix-casier="333">
                                        DEPOT AMAN (2%)
                                    </option>
                                </select>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <div id="clientInfo" class="alert alert-info d-none">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <span id="clientInfoText"></span>
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="produit_id" class="form-label">Produit</label>
                                <select class="form-select" id="produit_id" name="produit_id" required onchange="updateProductInfo()">
                                    <option value="">Sélectionner un produit</option>
                                    <option value="1" data-prix="1500" data-stock="8" data-nom="Coca-Cola 1.5L">
                                        Coca-Cola 1.5L - 1,500 Fr (Stock: 8)
                                    </option>
                                    <option value="2" data-prix="800" data-stock="5" data-nom="Fanta Orange 33cl">
                                        Fanta Orange 33cl - 800 Fr (Stock: 5)
                                    </option>
                                    <option value="3" data-prix="850" data-stock="12" data-nom="Sprite 33cl">
                                        Sprite 33cl - 850 Fr (Stock: 12)
                                    </option>
                                    <option value="4" data-prix="600" data-stock="45" data-nom="Eau Minérale 1.5L">
                                        Eau Minérale 1.5L - 600 Fr (Stock: 45)
                                    </option>
                                    <option value="5" data-prix="1200" data-stock="30" data-nom="Bière Castel 65cl">
                                        Bière Castel 65cl - 1,200 Fr (Stock: 30)
                                    </option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="quantite" class="form-label">Quantité</label>
                                <input type="number" class="form-control" id="quantite" name="quantite" min="1" required onchange="calculateTotal()">
                                <div id="stockWarning" class="form-text text-danger d-none"></div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Calcul automatique</label>
                                <div id="calculationPreview" class="border p-3 rounded" style="background-color: #f8f9fa; color: #333;">
                                    <div class="d-flex justify-content-between">
                                        <span>Total brut:</span>
                                        <span id="totalBrut">0 Fr</span>
                                    </div>
                                    <div class="d-flex justify-content-between text-success">
                                        <span>Remise (<span id="ristournePercent">0</span>%):</span>
                                        <span id="remise">0 Fr</span>
                                    </div>
                                    <hr class="my-2">
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span>Total net:</span>
                                        <span id="totalNet">0 Fr</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" id="submitOrder" disabled>
                            <i class="fas fa-save me-1"></i>
                            Créer Commande
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let selectedClient = null;
        let selectedProduct = null;

        function updateClientInfo() {
            const select = document.getElementById('client_id');
            const option = select.options[select.selectedIndex];
            const info = document.getElementById('clientInfo');
            const infoText = document.getElementById('clientInfoText');
            
            if (option.value) {
                selectedClient = {
                    id: option.value,
                    ristourne: parseFloat(option.dataset.ristourne),
                    prixCasier: parseFloat(option.dataset.prixCasier)
                };
                
                infoText.innerHTML = `Ristourne: <strong>${selectedClient.ristourne}%</strong> | Prix casier: <strong>${selectedClient.prixCasier.toLocaleString()} Fr</strong>`;
                info.classList.remove('d-none');
            } else {
                selectedClient = null;
                info.classList.add('d-none');
            }
            
            calculateTotal();
        }

        function updateProductInfo() {
            const select = document.getElementById('produit_id');
            const option = select.options[select.selectedIndex];
            const quantiteInput = document.getElementById('quantite');
            
            if (option.value) {
                selectedProduct = {
                    id: option.value,
                    prix: parseFloat(option.dataset.prix),
                    stock: parseInt(option.dataset.stock),
                    nom: option.dataset.nom
                };
                
                quantiteInput.max = selectedProduct.stock;
            } else {
                selectedProduct = null;
                quantiteInput.max = '';
            }
            
            calculateTotal();
            checkStock();
        }

        function checkStock() {
            const quantite = parseInt(document.getElementById('quantite').value) || 0;
            const stockWarning = document.getElementById('stockWarning');
            const submitBtn = document.getElementById('submitOrder');
            
            if (selectedProduct && quantite > selectedProduct.stock) {
                stockWarning.textContent = `Stock insuffisant! Stock disponible: ${selectedProduct.stock}`;
                stockWarning.classList.remove('d-none');
                submitBtn.disabled = true;
            } else {
                stockWarning.classList.add('d-none');
                updateSubmitButton();
            }
        }

        function calculateTotal() {
            const quantite = parseInt(document.getElementById('quantite').value) || 0;
            
            if (selectedClient && selectedProduct && quantite > 0) {
                const totalBrut = selectedProduct.prix * quantite;
                const remise = totalBrut * (selectedClient.ristourne / 100);
                const totalNet = totalBrut - remise;
                
                document.getElementById('totalBrut').textContent = totalBrut.toLocaleString() + ' Fr';
                document.getElementById('ristournePercent').textContent = selectedClient.ristourne;
                document.getElementById('remise').textContent = remise.toLocaleString() + ' Fr';
                document.getElementById('totalNet').textContent = totalNet.toLocaleString() + ' Fr';
            } else {
                document.getElementById('totalBrut').textContent = '0 Fr';
                document.getElementById('ristournePercent').textContent = '0';
                document.getElementById('remise').textContent = '0 Fr';
                document.getElementById('totalNet').textContent = '0 Fr';
            }
            
            checkStock();
            updateSubmitButton();
        }

        function updateSubmitButton() {
            const submitBtn = document.getElementById('submitOrder');
            const quantite = parseInt(document.getElementById('quantite').value) || 0;
            
            if (selectedClient && selectedProduct && quantite > 0 && quantite <= selectedProduct.stock) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        // Event listeners
        document.getElementById('quantite').addEventListener('input', calculateTotal);

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>