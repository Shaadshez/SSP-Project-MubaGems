<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f5f7;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: floralwhite;
            margin-bottom: 20px;
            color: black; /* Ensuring black font color */
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: black; /* Black font color */
            font-weight: bold;
        }

        card .card-title {
            color: black;
            margin-bottom: 1.125rem;
            text-transform: capitalize;
        }

        .card .card-title {
            color: black;
            margin-bottom: 1.125rem;
            text-transform: capitalize;
        }

        .card-text {
            font-size: 1.25rem;
            color: black; /* Black font color */
        }

        .card img {
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .chart-container {
            position: relative;
            height: 400px;
        }

        .main-panel {
            padding: 20px;
        }

        .grid-margin {
            margin-bottom: 20px;
        }

        .container-scroller {
            overflow: hidden;
        }

        .content-wrapper {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <img src="path/to/user-image.jpg" alt="Users Image">
                        <div class="card-body">
                            <h4 class="card-title">Total Users</h4>
                            <p class="card-text">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <img src="path/to/product-image.jpg" alt="Products Image">
                        <div class="card-body">
                            <h4 class="card-title">Total Products</h4>
                            <p class="card-text">{{ $totalProducts }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <img src="path/to/order-image.jpg" alt="Orders Image">
                        <div class="card-body">
                            <h4 class="card-title">Total Orders</h4>
                            <p class="card-text">{{ $totalOrders }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Orders in the Last 24 Hours</h4>
                            <div class="chart-container">
                                <canvas id="ordersChart"></canvas>
                            </div>
                            <div id="chartData" data-labels='@json($hours)' data-values='@json($orderCounts)'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.script')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('ordersChart').getContext('2d');
            var ordersChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: JSON.parse(document.getElementById('chartData').dataset.labels),
                    datasets: [{
                        label: 'Orders',
                        data: JSON.parse(document.getElementById('chartData').dataset.values),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.4
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Orders'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Hour of the Day'
                            }
                        }
                    }
                }
            });
        });
    </script>
</div>
</body>
</html>
