@extends('layouts.admin')

@section('content')

<!-- Welcome Banner -->
<div class="card bg-primary text-white mb-4 shadow-sm border-0 rounded-3" style="background: linear-gradient(135deg, #102A43 0%, #0A2540 100%);">
    <div class="card-body p-4 position-relative overflow-hidden">
        <div class="d-flex align-items-center">
            <div class="ms-3">
                <h3 class="font-weight-bold mb-1">Welcome Back, Admin!</h3>
                <p class="mb-0 text-light opacity-75">Here is your daily impact overview for Ornab Cox's Bazar.</p>
            </div>
            <div class="ms-auto d-none d-md-block">
                <i class="bx bx-bar-chart-alt-2 text-white" style="font-size: 4rem; opacity: 0.2;"></i>
            </div>
        </div>
        <!-- Decorative Circle -->
        <div class="position-absolute top-0 end-0 rounded-circle bg-white opacity-10" style="width: 200px; height: 200px; margin-right: -50px; margin-top: -50px;"></div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-dark">
            <div class="card radius-10 border-start border-0 border-3 border-info card-hover-zoom">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary font-weight-bold">Total Projects</p>
                            <h4 class="my-1 text-info">{{ $total_projects }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                            <i class='bx bx-building-house'></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('admin.donations.index') }}" class="text-decoration-none text-dark">
            <div class="card radius-10 border-start border-0 border-3 border-danger card-hover-zoom">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary font-weight-bold">Total Raised</p>
                            <h4 class="my-1 text-danger">${{ number_format($total_raised, 2) }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                            <i class='bx bx-dollar'></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('programs.index') }}" class="text-decoration-none text-dark">
            <div class="card radius-10 border-start border-0 border-3 border-success card-hover-zoom">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary font-weight-bold">Focus Area</p>
                            <h4 class="my-1 text-success">{{ $total_programs }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                            <i class='bx bx-bullseye'></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('admin.donations.index') }}" class="text-decoration-none text-dark">
            <div class="card radius-10 border-start border-0 border-3 border-warning card-hover-zoom">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary font-weight-bold">Pending Donations</p>
                            <h4 class="my-1 text-warning">{{ $pending_donations_count }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                            <i class='bx bx-time-five'></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('team.index') }}" class="text-decoration-none text-dark">
            <div class="card radius-10 border-start border-0 border-3 border-success card-hover-zoom">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary font-weight-bold">Active Members</p>
                            <h4 class="my-1 text-success">{{ $total_members }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                            <i class='bx bx-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('news.index') }}" class="text-decoration-none text-dark">
            <div class="card radius-10 border-start border-0 border-3 border-warning card-hover-zoom">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary font-weight-bold">Latest Updates</p>
                            <h4 class="my-1 text-warning">{{ $total_news }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                            <i class='bx bx-news'></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div><!--end row-->

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Overview</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Projects</span>
                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>News</span>
                </div>
                <div class="chart-container-1">
                    <canvas id="overviewChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Donation Status</h6>
                    </div>
                </div>
                <div class="chart-container-2 mt-4">
                    <canvas id="donationChart"></canvas>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Verified <span class="badge bg-success rounded-pill">{{ $total_donations - $pending_donations_count }}</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Pending <span class="badge bg-warning rounded-pill">{{ $pending_donations_count }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div><!--end row-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-0">Recent Donations</h5>
            </div>
            <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Donor Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_donations as $donation)
                    <tr>
                        <td>{{ $donation->donor_name }}</td>
                        <td>${{ number_format($donation->amount, 2) }}</td>
                        <td>
                            <span class="badge bg-{{ $donation->status == 'verified' ? 'success' : 'warning' }} text-white shadow-sm w-100">{{ ucfirst($donation->status) }}</span>
                        </td>
                        <td>{{ $donation->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No recent donations</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('admin/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Overview Chart
    var ctx = document.getElementById('overviewChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Projects', 'News', 'Members', 'Donations'],
            datasets: [{
                label: 'Counts',
                data: [{{ $total_projects }}, {{ $total_news }}, {{ $total_members }}, {{ $total_donations }}],
                backgroundColor: "rgba(20, 171, 239, 0.2)",
                borderColor: '#14abef',
                pointBackgroundColor:'#fff',
                pointHoverBackgroundColor:'#fff',
                pointBorderColor :'#14abef',
                pointHoverBorderColor :'#14abef',
                pointBorderWidth :1,
                pointRadius :4,
                pointHoverRadius :6,
                borderWidth: 3
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            tooltips: {
                enabled: true,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Donation Chart
    var ctx2 = document.getElementById("donationChart").getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ["Verified", "Pending"],
            datasets: [{
                backgroundColor: [
                    '#15ca20',
                    '#ffc107'
                ],
                data: [{{ $total_donations - $pending_donations_count }}, {{ $pending_donations_count }}],
                borderWidth: [0, 0]
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                position :"bottom",
                display: false,
            },
            cutoutPercentage: 75,
            tooltips: {
              displayColors:false,
            }
        }
    });
});
</script>

@endsection
