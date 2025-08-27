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
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard
                    </h1>
                    <p class="text-muted">Vue d'ensemble de votre dépôt de boissons</p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-subtitle mb-2">Produits</h6>
                                    <h3 class="card-title mb-0">24</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-box fa-2x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-subtitle mb-2">Clients</h6>
                                    <h3 class="card-title mb-0">156</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-users fa-2x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-subtitle mb-2">Fournisseurs</h6>
                                    <h3 class="card-title mb-0">8</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-truck fa-2x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-subtitle mb-2">Valeur Stock</h6>
                                    <h3 class="card-title mb-0">2,450,000 Fr</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-coins fa-2x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Alerts Row -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-chart-line me-2"></i>
                                Évolution des Ventes (6 derniers mois)
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="salesChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Alertes Stock
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning mb-3">
                                <strong>3</strong> produit(s) en stock bas
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                <div>
                                    <small class="fw-medium">Coca-Cola 1.5L</small>
                                    <br>
                                    <small class="text-muted">Stock: 8</small>
                                </div>
                                <span class="badge bg-warning">Bas</span>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                <div>
                                    <small class="fw-medium">Fanta Orange</small>
                                    <br>
                                    <small class="text-muted">Stock: 5</small>
                                </div>
                                <span class="badge bg-warning">Bas</span>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center py-2">
                                <div>
                                    <small class="fw-medium">Sprite 33cl</small>
                                    <br>
                                    <small class="text-muted">Stock: 12</small>
                                </div>
                                <span class="badge bg-warning">Bas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Sales Summary -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-calendar-alt me-2"></i>
                                Résumé du Mois
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <h4 class="text-success">485,250 Fr</h4>
                                    <small class="text-muted">Ventes du mois</small>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h4 class="text-info">24</h4>
                                    <small class="text-muted">Références en stock</small>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h4 class="text-primary">156</h4>
                                    <small class="text-muted">Clients actifs</small>
                                </div>
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
        // Sales Chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Ventes (Fr)',
                    data: [320000, 285000, 412000, 390000, 450000, 485250],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString() + ' Fr';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>