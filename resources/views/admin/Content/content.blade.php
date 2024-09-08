@extends('admin.layout.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4  mb-4 text-center" style="color: #6A9C89;">Shelter Seeker</h1>
            <!-- Row for Graphs -->
            <div class="row mt-3 justify-content-center">
                <!-- Graph for Property Types (Residential, Commercial, Plot) -->
                <div class="col-md-6 mb-4">
                    <div class="card graph">
                        <div class="card-header" style="background-color: #C1D8C3; color: #6A9C89;"><b>Properties by
                                Category (Residential , Commercial , Plot)</b></div>
                        <div class="card-body">
                            <canvas id="propertyTypesChart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Graph for Property Types (Buy and Rent) -->
                <div class="col-md-6 mb-4">
                    <div class="card graph">
                        <div class="card-header" style="background-color: #C1D8C3; color: #6A9C89;"><b>Properties by Post Type
                            (Buy , Rent)</b></div>
                        <div class="card-body">
                            <canvas id="postTypeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row for Logged-in Users and Available Properties and  Locations and Categories -->
            <div class="row mb-4 justify-content-center">
                <!-- Logged-in Users -->
                <div class="col-md-3">
                    <div class="info-panel p-4 text-center rounded " style="background-color: #C1D8C3;">
                        <div class="info-icon mb-3">
                            <i class="fas fa-users fa-3x" style="color: #6A9C89;"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="info-title mb-2" style="color: #6A9C89;">Logged-in Users</h5>
                            <h2 class="info-number" style="color: #6A9C89;">{{ $Users }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Available Properties -->
                <div class="col-md-3">
                    <div class="info-panel p-4 text-center rounded " style="background-color: #C1D8C3;">
                        <div class="info-icon mb-3">
                            <i class="fas fa-landmark fa-3x" style="color: #6A9C89;"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="info-title mb-2" style="color: #6A9C89;">Available Properties</h5>
                            <h2 class="info-number" style="color: #6A9C89;">{{ $Properties }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Available Categories -->
                <div class="col-md-3">
                    <div class="info-panel p-4 text-center rounded " style="background-color: #C1D8C3;">
                        <div class="info-icon mb-3">
                            <i class="fas fa-building fa-3x" style="color: #6A9C89;"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="info-title mb-2" style="color: #6A9C89;">Available Categories</h5>
                            <h2 class="info-number" style="color: #6A9C89;">{{ $Categories }}</h2>
                        </div>
                    </div>
                </div>
                <!-- Available Locations -->
                <div class="col-md-3">
                    <div class="info-panel p-4 text-center rounded " style="background-color: #C1D8C3;">
                        <div class="info-icon mb-3">
                            <i class="fas fa-map-marker-alt fa-3x" style="color: #6A9C89;"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="info-title mb-2" style="color: #6A9C89;">Available Location</h5>
                            <h2 class="info-number" style="color: #6A9C89;">{{ $Location }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Properties by Category Doughnut Chart
        const propertyCategoryCtx = document.getElementById('propertyTypesChart').getContext('2d');
        new Chart(propertyCategoryCtx, {
            type: 'bar',
            data: {
                labels: ['Residential', 'Commercial', 'Plot'],
                datasets: [{
                    label: 'Properties by Category',
                    data: [{{ $residentialCount }}, {{ $commercialCount }}, {{ $plotCount }}],
                    backgroundColor: ['#6A9C89', '#C1D8C3', '#4D7F69'],
                }]
            }
        });

        // Properties by Post Type Bar Chart (Buy and Rent)
        const postTypeCtx = document.getElementById('postTypeChart').getContext('2d');
        new Chart(postTypeCtx, {
            type: 'bar',
            data: {
                labels: ['Buy', 'Rent'],
                datasets: [{
                    label: 'Properties by Post Type',
                    data: [{{ $BuyCount }}, {{ $RentCount }}],
                    backgroundColor: ['#6A9C89', '#C1D8C3'],
                    hoverBackgroundColor: ['#4D7F69', '#A1B89F']
                }]
            }
        });
    </script>
@endsection
