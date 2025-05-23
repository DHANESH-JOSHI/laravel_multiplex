@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="mb-4 fw-bold">Admin Dashboard</h2>

        <div class="row g-3">
            {{-- Payments --}}
            <x-dashboard-card title="TOTAL COLLECTED PAYMENT" icon="fa-indian-rupee-sign" value="722238" color="danger" />
            <x-dashboard-card title="MONTHLY COLLECTED PAYMENT" icon="fa-indian-rupee-sign" value="10035" color="warning" />
            <x-dashboard-card title="DAILY COLLECTED PAYMENT" icon="fa-indian-rupee-sign" value="0" color="info" />

            {{-- Views --}}
            <x-dashboard-card title="TOTAL VIDEOS VIEWS" icon="fa-eye" value="317499" color="primary" />
            <x-dashboard-card title="MONTHLY VIDEOS VIEWS" icon="fa-eye" value="317491" color="success" />
            <x-dashboard-card title="DAILY VIDEOS VIEWS" icon="fa-eye" value="317541" color="primary" />

            {{-- Content --}}
            <x-dashboard-card title="MOVIES" icon="fa-film" value="14" color="danger" />
            <x-dashboard-card title="WEB-SERIES" icon="fa-video" value="18" color="info" />
            <x-dashboard-card title="CHANNEL" icon="fa-desktop" value="1" color="warning" />
            <x-dashboard-card title="CHANNEL VIDEOS" icon="fa-desktop" value="1" color="danger" />

            {{-- Others --}}
            <x-dashboard-card title="GENRE" icon="fa-folder" value="34" color="info" />
            <x-dashboard-card title="USERS" icon="fa-users" value="24364" color="danger" />
            <x-dashboard-card title="CHANNEL CREATOR" icon="fa-users" value="24364" color="danger" />
        </div>
    </div>
@endsection
