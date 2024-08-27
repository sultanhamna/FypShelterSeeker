@extends('admin.layout.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-center" style="color: #6A9C89;">Shelter Seeker</h1>


            <!-- Row for Logged-in Users and Available Properties and  Locations and Categories -->
            <div class="row mb-5 justify-content-center">
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
