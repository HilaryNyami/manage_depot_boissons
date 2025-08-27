<?php
require('../views/template/header.php');
require('../views/template/navbar.php');
?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="display-6 mb-0">
                        <i class="fas fa-cash-register me-2"></i>
                        Caisse
                    </h1>
                    <p class="text-muted">Point de vente pour transactions directes</p>
                </div>
            </div>

            <div class="row">
                <!-- Produits disponibles -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-shopping-basket me-2"></i>
                                Produits Disponibles
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-6">
                                    <button class="btn btn-outline-primary product-btn w-100" onclick="addToCart('Coca-Cola 1.5L', 1500)">
                                        <small class="fw-bold d-block">Coca-Cola 1.5L</small>
                                        <small class="text-muted">1,500 Fr</small>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-primary product-btn w-100" onclick="addToCart('Fanta Orange', 800)">
                                        <small class="fw-bold d-block">Fanta Orange</small>
                                        <small class="text-muted">800 Fr</small>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-primary product-btn w-100" onclick="addToCart('Sprite 33cl', 850)">
                                        <small class="fw-bold d-block">Sprite 33cl</small>
                                        <small class="text-muted">850 Fr</small>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-primary product-btn w-100" onclick="addToCart('Eau Minérale', 600)">
                                        <small class="fw-bold d-block">Eau Minérale</small>
                                        <small class="text-muted">600 Fr</small>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-primary product-btn w-100" onclick="addToCart('Bière Castel', 1200)">
                                        <small class="fw-bold d-block">Bière Castel</small>
                                        <small class="text-muted">1,200 Fr</small>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-warning product-btn w-100" onclick="addToCart('Casier Vide', 333)">
                                        <small class="fw-bold d-block">Casier Vide</small>
                                        <small class="text-muted">333 Fr</small>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Calculatrice -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="card-title mb-0">
                                <i class="fas fa-calculator me-2"></i>
                                Calculatrice
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="calculator-display" id="calculatorDisplay">0</div>
                            <div class="row g-1 mt-2">
                                <div class="col-3">
                                    <button class="btn btn-secondary calculator-btn w-100" onclick="clearCalculator()">C</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-secondary calculator-btn w-100" onclick="calculatorInput('/')">/</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-secondary calculator-btn w-100" onclick="calculatorInput('*')">×</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-secondary calculator-btn w-100" onclick="deleteLast()">⌫</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('7')">7</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('8')">8</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('9')">9</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-secondary calculator-btn w-100" onclick="calculatorInput('-')">-</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('4')">4</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('5')">5</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('6')">6</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-secondary calculator-btn w-100" onclick="calculatorInput('+')">+</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('1')">1</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('2')">2</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('3')">3</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-success calculator-btn w-100" onclick="calculateResult()" style="writing-mode: vertical-rl;">=</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('0')">0</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light calculator-btn w-100" onclick="calculatorInput('.')">.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panier -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-shopping-cart me-2"></i>
                                Panier
                            </h5>
                            <button class="btn btn-sm btn-outline-danger" onclick="clearCart()">
                                <i class="fas fa-trash me-1"></i>Vider
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="cartItems" style="max-height: 400px; overflow-y: auto;">
                                <div class="text-center text-muted py-4">
                                    <i class="fas fa-shopping-cart fa-3x mb-3 opacity-25"></i>
                                    <p>Panier vide</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total et Paiement -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="total-display mb-3" id="totalDisplay">
                                0 Fr
                            </div>
                            
                            <div class="mb-3">
                                <label for="customerName" class="form-label">Client (optionnel)</label>
                                <input type="text" class="form-control" id="customerName" placeholder="Nom du client">
                            </div>
                            
                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Mode de paiement</label>
                                <select class="form-select" id="paymentMethod">
                                    <option value="cash">Espèces</option>
                                    <option value="mobile">Mobile Money</option>
                                    <option value="card">Carte bancaire</option>
                                </select>
                            </div>
                            
                            <div class="mb-3" id="cashPaymentSection">
                                <label for="amountPaid" class="form-label">Montant reçu</label>
                                <input type="number" class="form-control" id="amountPaid" placeholder="0" onchange="calculateChange()">
                                <div id="changeAmount" class="form-text"></div>
                            </div>
                            
                            <button class="btn btn-success btn-lg w-100" onclick="processPayment()">
                                <i class="fas fa-credit-card me-2"></i>
                                Encaisser
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Historique du jour -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-history me-2"></i>
                                Ventes du Jour
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h4 class="text-success" id="dailyTotal">45,650 Fr</h4>
                                <small class="text-muted">Total du jour</small>
                            </div>
                            
                            <div style="max-height: 300px; overflow-y: auto;">
                                <div id="salesHistory">
                                    <!-- Exemples de ventes -->
                                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                        <div>
                                            <small class="fw-medium">Vente #001</small>
                                            <br>
                                            <small class="text-muted">14:30 - Espèces</small>
                                        </div>
                                        <span class="text-success fw-medium">2,400 Fr</span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                        <div>
                                            <small class="fw-medium">Vente #002</small>
                                            <br>
                                            <small class="text-muted">14:15 - Mobile Money</small>
                                        </div>
                                        <span class="text-success fw-medium">1,800 Fr</span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                        <div>
                                            <small class="fw-medium">Vente #003</small>
                                            <br>
                                            <small class="text-muted">13:45 - Espèces</small>
                                        </div>
                                        <span class="text-success fw-medium">3,600 Fr</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center mt-3">
                                <button class="btn btn-outline-info btn-sm w-100" onclick="printDailyReport()">
                                    <i class="fas fa-print me-1"></i>
                                    Imprimer Rapport
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let cart = [];
        let cartTotal = 0;
        let calculatorDisplay = '0';
        let saleCounter = 4; // Commence après les exemples
        let dailyTotal = 45650; // Total existant

        // Gestion du panier
        function addToCart(product, price) {
            const existingItem = cart.find(item => item.product === product);
            
            if (existingItem) {
                existingItem.quantity += 1;
                existingItem.total = existingItem.quantity * existingItem.price;
            } else {
                cart.push({
                    product: product,
                    price: price,
                    quantity: 1,
                    total: price
                });
            }
            
            updateCartDisplay();
            updateTotal();
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCartDisplay();
            updateTotal();
        }

        function updateCartDisplay() {
            const cartItems = document.getElementById('cartItems');
            
            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-shopping-cart fa-3x mb-3 opacity-25"></i>
                        <p>Panier vide</p>
                    </div>
                `;
                return;
            }
            
            cartItems.innerHTML = cart.map((item, index) => `
                <div class="cart-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1">
                            <div class="fw-medium">${item.product}</div>
                            <small class="text-muted">${item.price.toLocaleString()} Fr x ${item.quantity}</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fw-medium me-2">${item.total.toLocaleString()} Fr</span>
                            <button class="btn btn-sm btn-outline-danger" onclick="removeFromCart(${index})">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function updateTotal() {
            cartTotal = cart.reduce((sum, item) => sum + item.total, 0);
            document.getElementById('totalDisplay').textContent = cartTotal.toLocaleString() + ' Fr';
            calculateChange();
        }

        function clearCart() {
            cart = [];
            updateCartDisplay();
            updateTotal();
        }

        // Gestion des paiements
        function calculateChange() {
            const amountPaid = parseFloat(document.getElementById('amountPaid').value) || 0;
            const change = amountPaid - cartTotal;
            const changeDiv = document.getElementById('changeAmount');
            
            if (amountPaid > 0) {
                if (change >= 0) {
                    changeDiv.innerHTML = `<span class="text-success">Monnaie à rendre: ${change.toLocaleString()} Fr</span>`;
                } else {
                    changeDiv.innerHTML = `<span class="text-danger">Manque: ${Math.abs(change).toLocaleString()} Fr</span>`;
                }
            } else {
                changeDiv.innerHTML = '';
            }
        }

        function processPayment() {
            if (cart.length === 0) {
                alert('Le panier est vide!');
                return;
            }
            
            const paymentMethod = document.getElementById('paymentMethod').value;
            const amountPaid = parseFloat(document.getElementById('amountPaid').value) || 0;
            
            if (paymentMethod === 'cash' && amountPaid < cartTotal) {
                alert('Le montant reçu est insuffisant!');
                return;
            }
            
            // Ajouter à l'historique
            addToSalesHistory();
            
            // Mettre à jour le total du jour
            dailyTotal += cartTotal;
            document.getElementById('dailyTotal').textContent = dailyTotal.toLocaleString() + ' Fr';
            
            // Vider le panier
            clearCart();
            document.getElementById('customerName').value = '';
            document.getElementById('amountPaid').value = '';
            document.getElementById('changeAmount').innerHTML = '';
            
            alert('Paiement effectué avec succès!');
        }

        function addToSalesHistory() {
            const now = new Date();
            const time = now.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
            const paymentMethod = document.getElementById('paymentMethod').value;
            const paymentText = paymentMethod === 'cash' ? 'Espèces' : 
                              paymentMethod === 'mobile' ? 'Mobile Money' : 'Carte bancaire';
            
            const salesHistory = document.getElementById('salesHistory');
            const newSale = document.createElement('div');
            newSale.className = 'd-flex justify-content-between align-items-center border-bottom py-2';
            newSale.innerHTML = `
                <div>
                    <small class="fw-medium">Vente #${saleCounter.toString().padStart(3, '0')}</small>
                    <br>
                    <small class="text-muted">${time} - ${paymentText}</small>
                </div>
                <span class="text-success fw-medium">${cartTotal.toLocaleString()} Fr</span>
            `;
            
            salesHistory.insertBefore(newSale, salesHistory.firstChild);
            saleCounter++;
        }

        // Calculatrice
        function calculatorInput(value) {
            if (calculatorDisplay === '0') {
                calculatorDisplay = value;
            } else {
                calculatorDisplay += value;
            }
            document.getElementById('calculatorDisplay').textContent = calculatorDisplay;
        }

        function clearCalculator() {
            calculatorDisplay = '0';
            document.getElementById('calculatorDisplay').textContent = calculatorDisplay;
        }

        function deleteLast() {
            if (calculatorDisplay.length > 1) {
                calculatorDisplay = calculatorDisplay.slice(0, -1);
            } else {
                calculatorDisplay = '0';
            }
            document.getElementById('calculatorDisplay').textContent = calculatorDisplay;
        }

        function calculateResult() {
            try {
                const result = eval(calculatorDisplay.replace('×', '*'));
                calculatorDisplay = result.toString();
                document.getElementById('calculatorDisplay').textContent = calculatorDisplay;
            } catch (error) {
                calculatorDisplay = 'Erreur';
                document.getElementById('calculatorDisplay').textContent = calculatorDisplay;
                setTimeout(() => {
                    calculatorDisplay = '0';
                    document.getElementById('calculatorDisplay').textContent = calculatorDisplay;
                }, 1500);
            }
        }

        function printDailyReport() {
            alert('Fonctionnalité d\'impression en cours de développement');
        }

        // Mode de paiement
        document.getElementById('paymentMethod').addEventListener('change', function() {
            const cashSection = document.getElementById('cashPaymentSection');
            if (this.value === 'cash') {
                cashSection.style.display = 'block';
            } else {
                cashSection.style.display = 'none';
                document.getElementById('amountPaid').value = '';
                document.getElementById('changeAmount').innerHTML = '';
            }
        });
    </script>
</body>
</html>