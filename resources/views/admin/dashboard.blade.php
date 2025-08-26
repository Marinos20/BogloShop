@extends('layouts.admin')

@section('content')
    @include('layouts.inc.admin.flash-message')

    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
              <div class="mr-md-3 mr-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">Votre modèle de tableau de bord analytique.</p>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
              <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                <i class="mdi mdi-download text-muted"></i>
              </button>
              <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                <i class="mdi mdi-clock-outline text-muted"></i>
              </button>
              <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                <i class="mdi mdi-plus text-muted"></i>
              </button>
              <button class="btn btn-primary mt-2 mt-xl-0">Télécharger le rapport</button>
            </div>
          </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
                <label>Total Products</label>
                <h4>{{ $total_product }}</h4>
                <a href="{{ route('product.index') }}" class="text-white">Consulter</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
                <label>Total Categories</label>
                <h4>{{ $total_category }}</h4>
                <a href="{{ route('category.index') }}" class="text-white">Consulter</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3">
                <label>Total Utilisateurs</label>
                <h4>{{ $total_alluser }}</h4>
                <a href="{{ route('users.index') }}" class="text-white">Consulter</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-danger text-white mb-3">
                <label>Total Commandes</label>
                <h4>{{ $total_order }}</h4>
                <a href="{{ route('orders.index') }}" class="text-white">Consulter</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-info text-white mb-3">
                <label>Commandes de ce mois</label>
                <h4>{{ $thisMonthOrders }}</h4>
                <a href="{{ route('orders.index') }}" class="text-white">Consulter</a>
            </div>
        </div>
        {{-- Nouveau card pour Blog --}}
        <div class="col-md-3">
            <div class="card card-body bg-secondary text-white mb-3">
                <label>Total Blog Posts</label>
                <h4>{{ $total_posts }}</h4>
                <a href="{{ route('admin.blog.index') }}" class="text-white">Consulter</a>
            </div>
        </div>
    </div>
@endsection
