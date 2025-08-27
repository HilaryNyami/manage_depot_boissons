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
                        <i class="fas fa-chart-bar me-2"></i>
                        Rapports & Statistiques
                    </h1>
                    <p class="text-muted">Analyses détaillées de votre activité</p>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-subtitle mb-2">Total Ventes</h6>
                                    <h4 class="card-title mb-0 text-success">2,850,750 Fr</h4>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill-wave fa-2x text-success opacity-50"></i>
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
                                    <h6 class="card-subtitle mb-2">Total Remises</h6>
                                    <h4 class="card-title mb-0 text-warning">85,522 Fr</h4>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-percentage fa-2x text-warning opacity-50"></i>
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
                                    <h4 class="card-title mb-0 text-info">2,450,000 Fr</h4>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-boxes fa-2x text-info opacity-50"></i>
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
                                    <h6 class="card-subtitle mb-2">Clients Actifs</h6>
                                    <h4 class="card-title mb-0 text-primary">156</h4>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-user-check fa-2x text-primary opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row mb-4">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-chart-area me-2"></i>
                                Évolution des Ventes par Mois
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="salesTrendChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-chart-pie me-2"></i>
                                Répartition des Ristournes
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="discountChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Client Analysis -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-users me-2"></i>
                                Analyse par Client
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Nombre de Commandes</th>
                                            <th>Total des Achats</th>
                                            <th>Total des Remises</th>
                                            <th>Panier Moyen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">SARL AFRICA DISTRIBUTION</td>
                                            <td>28</td>
                                            <td class="text-success">985,450 Fr</td>
                                            <td class="text-warning">49,273 Fr</td>
                                            <td class="text-info">35,195 Fr</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">SUPERETTE KODZI</td>
                                            <td>35</td>
                                            <td class="text-success">742,850 Fr</td>
                                            <td class="text-warning">18,571 Fr</td>
                                            <td class="text-info">21,224 Fr</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">ETS KOKOU DISTRIBUTION</td>
                                            <td>22</td>
                                            <td class="text-success">568,750 Fr</td>
                                            <td class="text-warning">14,219 Fr</td>
                                            <td class="text-info">25,852 Fr</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">DEPOT AMAN</td>
                                            <td>19</td>
                                            <td class="text-success">325,200 Fr</td>
                                            <td class="text-warning">6,504 Fr</td>
                                            <td class="text-info">17,116 Fr</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">BOUTIQUE AMEN</td>
                                            <td>15</td>
                                            <td class="text-success">228,500 Fr</td>
                                            <td class="text-warning">4,570 Fr</td>
                                            <td class="text-info">15,233 Fr</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Export Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-download me-2"></i>
                                Export des Rapports
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <button class="btn btn-outline-success w-100" onclick="exportToCSV()">
                                        <i class="fas fa-file-csv me-2"></i>
                                        Exporter en CSV
                                    </button>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <button class="btn btn-outline-primary w-100" onclick="window.print()">
                                        <i class="fas fa-print me-2"></i>
                                        Imprimer le Rapport
                                    </button>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <button class="btn btn-outline-info w-100" onclick="generatePDF()">
                                        <i class="fas fa-file-pdf me-2"></i>
                                        Générer PDF
                                    </button>
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
        // Sales Trend Chart
        const salesCtx = document.getElementById('salesTrendChart').getContext('2d');
        const salesTrendChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Ventes (Fr)',
                    data: [420000, 380000, 510000, 485000, 620000, 485250],
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

        // Discount Distribution Chart
        const discountCtx = document.getElementById('discountChart').getContext('2d');
        const discountChart = new Chart(discountCtx, {
            type: 'doughnut',
            data: {
                labels: ['Ristourne 2%', 'Ristourne 2.5%', 'Ristourne 5%'],
                datasets: [{
                    data: [35, 40, 25],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(255, 99, 132, 0.8)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Export functions
        function exportToCSV() {
            alert('Fonctionnalité d\'export CSV en cours de développement');
        }

        function generatePDF() {
            alert('Fonctionnalité de génération PDF en cours de développement');
        }
    </script>
</body>
</html>