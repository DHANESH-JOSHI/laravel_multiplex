@php
    $orangeCards = [
        'TOTAL COLLECTED PAYMENT',
        'MONTHLY COLLECTED PAYMENT',
        'DAILY COLLECTED PAYMENT',
        'TOTAL VIDEOS VIEWS',
        'MONTHLY VIDEOS VIEWS',
        'DAILY VIDEOS VIEWS',
        'MOVIES'
    ];

    $cardColors = [
        'WEB-SERIES' => 'info',
        'CHANNEL' => 'warning',
        'CHANNEL VIDEOS' => 'danger',
        'GENRE' => 'info',
        'USERS' => 'danger',
        'CHANNEL CREATOR' => 'danger'
    ];
@endphp

<style>
    .p-2 {
        padding: 1.5rem !important;
    }
    .bg-custom-orange {
        background-color: #ff6339;
    }
</style>

<div class="col-md-4 col-lg-3">
    <div class="card">
        <div class="card-body d-flex align-items-center">
            <div class="bg-{{ in_array($title, $orangeCards) ? 'custom-orange' : $cardColors[$title] }} p-2 rounded me-3">
                <i class="fas {{ $icon }} fa-2x text-white"></i>
            </div>
            <div>
                <h6 class="card-title mb-1">{{ $title }}</h6>
                <h5 class="card-text fw-bold">{{ $value }}</h5>
            </div>
        </div>
    </div>
</div>
