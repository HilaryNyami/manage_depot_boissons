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

                <!-- Filtre par ristourne -->
                <form method="get" class="mb-3 d-flex align-items-center">
                    <label class="me-2">Filtrer par ristourne :</label>
                    <select name="ristourne" class="form-select w-auto me-2">
                        <option value="">Toutes</option>
                        <option value="1" <?= $ristourne == 1 ? 'selected' : '' ?>>Standard (2%)</option>
                        <option value="2" <?= $ristourne == 2 ? 'selected' : '' ?>>Privilège (2.5%)</option>
                        <option value="3" <?= $ristourne == 3 ? 'selected' : '' ?>>VIP (5%)</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </form>

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
                                        <th>Solde Ristourne</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($Y_clients as $client) {
                                            if ( ($client->Type_client) == "1" ){
                                                $pourcentage = 2;
                                                $prixRistourne = 333;
                                                $couleur = "bg-success";

                                            }elseif ( ($client->Type_client) == "2" ){
                                                $pourcentage = 2.5;
                                                $prixRistourne = 350;
                                                $couleur = "bg-warning";

                                            }else{
                                                $pourcentage = 5;
                                                $prixRistourne = 380;
                                                $couleur = "bg-danger";
                                            }
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="fw-medium"><?= $client->nomComplet ?></div>
                                            <small class="text-muted"><?= $client->adresse ?></small>
                                        </td>
                                        <td><?= $client->telephone_client ?></td>
                                        <td>
                                            <span class="badge <?= $couleur ?> "> <?= $pourcentage ?>% </span>
                                        </td>
                                        <td class="fw-medium"><?= $prixRistourne ?> Fr</td>
                                        <td>
                                            <span class="text-success fw-medium">
                                                <?= $client->ristourne_gagner ?> Fr
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button 
                                                class="btn btn-outline-secondary btn-modifier" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modifyClient"
                                                data-id="<?= $client->idClient  ?>"
                                                data-nom="<?= htmlspecialchars($client->nomComplet) ?>"
                                                data-adresse="<?= $client->adresse ?>"
                                                data-telephone="<?= $client->telephone_client ?>"
                                                data-statut="<?= $client->Type_client ?>"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </button>
                                                <button class="btn btn-outline-info" data-bs-toggle="tooltip" title="Historique">
                                                    <i class="fas fa-history"></i>
                                                </button>
                                                <button class="btn btn-outline-success" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#commander"
                                                data-ids="<?= $client->idClient  ?>"
                                                data-noms="<?= htmlspecialchars($client->nomComplet) ?>"
                                                data-statuts="<?= $client->Type_client ?>"
                                                >
                                                    <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?= $i ?><?= $ristourne ? '&ristourne=' . $ristourne : '' ?>">
                                                <?= $i ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
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
                        <form method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="nom" class="form-label">Nom du client</label>
                                        <input type="text" class="form-control" id="nom" name="nomClient" required>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="telephone" class="form-label">Téléphone</label>
                                        <input type="tel" class="form-control" id="telephone" name="telephoneClient" required>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="adresse" class="form-label">Adresse</label>
                                        <textarea class="form-control" id="adresse" name="adresse" rows="2" required></textarea>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="pourcentage_ristourne" class="form-label">Catégorie de ristourne</label>
                                        <select class="form-select" id="pourcentage_ristourne" name="pourcentage_ristourne" required>
                                            <option value="">Choisir une catégorie</option>
                                            <option value="1">Standard - 2% (Prix casier: 333 Fr)</option>
                                            <option value="2">Privilège - 2.5% (Prix casier: 350 Fr)</option>
                                            <option value="3">VIP - 5% (Prix casier: 380 Fr)</option>
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
                                <button type="submit" class="btn btn-primary" name="enregistrer">
                                    <i class="fas fa-save me-1"></i>
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modify Client Modal -->
            <div class="modal fade" id="modifyClient" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="fas fa-user-plus me-2"></i>
                                Modifier
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="nomClient" class="form-label">Nom du client</label>
                                        <input type="text" class="form-control" id="nomClient" name="nomClient" required>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="telephoneClient" class="form-label">Téléphone</label>
                                        <input type="tel" class="form-control" id="telephoneClient" name="telephoneClient" required>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="adresse" class="form-label">Adresse</label>
                                        <textarea class="form-control" id="adresse" name="adresse" rows="2" required></textarea>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="pourcentage_ristourne" class="form-label">Catégorie de ristourne</label>
                                        <select class="form-select" id="pourcentage_ristourne" name="pourcentage_ristourne" required>
                                            <option value="">Choisir une catégorie</option>
                                            <option value="1">Standard - 2% (Prix casier: 333 Fr)</option>
                                            <option value="2">Privilège - 2.5% (Prix casier: 350 Fr)</option>
                                            <option value="3">VIP - 5% (Prix casier: 380 Fr)</option>
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
                                <button type="submit" class="btn btn-primary" name="maj">
                                    <i class="fas fa-save me-1"></i>
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add Order Modal -->
        <div class="modal fade" id="commander" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <form method="post" id="orderForm">
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
                                <div class="col-md-8 mb-3">
                                    <label for="noms" class="form-label" >Nom du client</label>
                                    <input type="text" class="form-control" id="noms" name="noms" disabled>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="pourcentage_ristourne2" class="form-label" >Porcentage</label>
                                    <input type="text" class="form-control" id="pourcentage_ristourne2" name="pourcentage_ristourne2" disabled>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <div id="clientInfo" class="alert alert-info d-none">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <span id="clientInfoText"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 mb-3">
                                    <label for="produit_id" class="form-label">Produit</label>
                                    <select class="form-select" id="produit_id" name="produit_id" required >
                                        <option value="">Sélectionner un produit</option>
                                        <?php foreach ($Y_Produits as $prod){ ?>
                                        <option value="<?= $prod->id_produit ?>" data-prix="<?= $prod->prix_vente ?>" data-stock="<?= $prod->quantiteProduit ?>" data-nom="<?= $prod->nomProduit ?>">
                                            <?= $prod->nomProduit ?> - <?= $prod->prix_vente ?> Fr (Stock: <?= $prod->quantiteProduit ?>)
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                    <label for="quantite" class="form-label">Quantité</label>
                                    <input type="number" class="form-control" id="quantite" name="quantite" min="1" required >
                                    <div id="stockWarning" class="form-text text-danger d-none"></div>
                                </div>
                                <div class="col-md-12 mb-3 text-end">
                                    <button type="button" class="btn btn-info" id="addToList">
                                        <i class="fas fa-plus me-1"></i> Ajouter à la liste
                                    </button>
                                </div>
                                
                                <div class="col-md-4 mb-3">
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
                                <div class="col-md-7 offset-1 mb-3">
                                    <label class="form-label">Produits ajoutés</label>
                                    <ul id="productList" class="list-group"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary" id="submitOrder" >
                                <i class="fas fa-save me-1"></i>
                                Créer Commande
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </main>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
            // Initialiser les tooltips Bootstrap
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Références aux modals
            var modifyModal = document.getElementById('modifyClient');
            var modifyModal2 = document.getElementById('commander');

            // Modal Modifier Client
            modifyModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var nom = button.getAttribute('data-nom');
                var adresse = button.getAttribute('data-adresse');
                var telephone = button.getAttribute('data-telephone');
                var statut = button.getAttribute('data-statut');

                modifyModal.querySelector('#nomClient').value = nom;
                modifyModal.querySelector('#adresse').value = adresse;
                modifyModal.querySelector('#telephoneClient').value = telephone;
                modifyModal.querySelector('#pourcentage_ristourne').value = statut;

                if(!modifyModal.querySelector('#idClientHidden')){
                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.id = 'idClientHidden';
                    hiddenInput.name = 'id_client';
                    modifyModal.querySelector('form').appendChild(hiddenInput);
                }
                modifyModal.querySelector('#idClientHidden').value = id;
            });

            // Modal Commander
            modifyModal2.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var id2 = button.getAttribute('data-ids');
                var noms = button.getAttribute('data-noms');
                var statuts = button.getAttribute('data-statuts');

                // Déterminer pourcentage de ristourne
                let stats;
                if (statuts == 1) stats = 2;
                else if (statuts == 2) stats = 2.5;
                else stats = 5;

                modifyModal2.querySelector('#noms').value = noms;
                modifyModal2.querySelector('#pourcentage_ristourne2').value = stats + "%";

                if(!modifyModal2.querySelector('#idCommandeHidden')){
                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.id = 'idCommandeHidden';
                    hiddenInput.name = 'id_client';
                    modifyModal2.querySelector('form').appendChild(hiddenInput);
                }
                modifyModal2.querySelector('#idCommandeHidden').value = id2;

                // Stocker le type de ristourne pour calcul automatique
                ristourneType = parseInt(statuts);
            });

            // Gestion du panier
            let panier = [];
            let ristourneType = 0;

            document.getElementById('addToList').addEventListener('click', function() {
                let select = document.getElementById('produit_id');
                let option = select.options[select.selectedIndex];
                let qte = parseInt(document.getElementById('quantite').value);

                if (!select.value || qte <= 0) {
                    alert("Choisir un produit et une quantité valide !");
                    return;
                }

                let produit = {
                    id: select.value,
                    nom: option.dataset.nom,
                    prix: parseFloat(option.dataset.prix),
                    qte: qte,
                    type_client: ristourneType  // <-- ajouter cette ligne
                };

                panier.push(produit);
                afficherPanier();
                calculerTotal();
            });

            function afficherPanier() {
                let list = document.getElementById('productList');
                list.innerHTML = "";
                panier.forEach((p, index) => {
                    let li = document.createElement('li');
                    li.className = "list-group-item d-flex justify-content-between align-items-center";
                    li.innerHTML = `
                        ${p.nom} x${p.qte}
                        <span>${p.prix * p.qte} Fr</span>
                        <button class="btn btn-sm btn-danger ms-2" onclick="supprimerProduit(${index})">X</button>
                    `;
                    list.appendChild(li);
                });
            }

            function supprimerProduit(index) {
                panier.splice(index, 1);
                afficherPanier();
                calculerTotal();
            }

            function calculerTotal() {
                let totalBrut = panier.reduce((sum, p) => sum + (p.prix * p.qte), 0);
                let totalArticles = panier.reduce((sum, p) => sum + p.qte, 0);

                // Ristourne unitaire selon le type de client
                let ristourneUnitaire = 0;
                if (ristourneType === 1) ristourneUnitaire = 330;
                if (ristourneType === 2) ristourneUnitaire = 350;
                if (ristourneType === 3) ristourneUnitaire = 400;

                let remise = ristourneUnitaire * totalArticles;
                let totalNet = Math.max(totalBrut - remise, 0);

                document.getElementById('totalBrut').innerText = totalBrut + " Fr";
                document.getElementById('remise').innerText = remise + " Fr";
                document.getElementById('totalNet').innerText = totalNet + " Fr";
                document.getElementById('ristournePercent').innerText = ristourneType;
            }

            // Soumission du formulaire
            document.getElementById('submitOrder').addEventListener('click', function() {
                let form = modifyModal2.querySelector('form');
                if (!form.querySelector('#panierHidden')) {
                    let hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.id = 'panierHidden';
                    hiddenInput.name = 'panier';
                    form.appendChild(hiddenInput);
                }
                form.querySelector('#panierHidden').value = JSON.stringify(panier);
                form.submit();
            });
        </script>

    </body>
    </html>