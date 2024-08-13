@extends('admin.layout.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-center" style="color: #191645;">Shelter Seeker</h1>
            <ol class="breadcrumb mb-4 justify-content-center">
                <li class="breadcrumb-item active"></li>
            </ol>

            <!-- Row for Logged-in Users and Available Properties -->
            <div class="row mb-5 justify-content-center">
                <!-- Logged-in Users -->
                <div class="col-md-4">
                    <div class="info-panel p-4 text-center rounded shadow-sm" style="background-color: #43CBAC;">
                        <div class="info-icon mb-3">
                            <i class="fas fa-users fa-3x" style="color: #191645;"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="info-title mb-2" style="color: #191645;">Logged-in Users</h5>
                            <h2 class="info-number" style="color: #191645;">{{ $Users }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Available Properties -->
                <div class="col-md-4">
                    <div class="info-panel p-4 text-center rounded shadow-sm" style="background-color: #43CBAC;">
                        <div class="info-icon mb-3">
                            <i class="fas fa-building fa-3x" style="color: #191645;"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="info-title mb-2" style="color: #191645;">Available Properties</h5>
                            <h2 class="info-number" style="color: #191645;">{{ $Properties }}</h2>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Add more sections as needed -->
        </div>
    </main>
@endsection

@section('style')
<style>
    .info-panel {
        transition: all 0.3s ease;
    }

    .info-panel:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    }

    .breadcrumb {
        background-color: transparent;
    }
</style>
@endsection
