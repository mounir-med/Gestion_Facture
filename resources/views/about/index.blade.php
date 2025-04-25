@extends('layouts.app')

@section('title', 'About Us')

@section('contents')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">About Our Platform</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Welcome Card -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Welcome to Our Billing Management System</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                             src="{{ asset('img/undraw_business_shop_re_ruf4.svg') }}" alt="Billing Illustration">
                    </div>
                    <p class="lead">Our platform is designed to streamline your business operations with powerful billing management tools.</p>
                    <p>This comprehensive solution helps businesses efficiently manage sales, customers, products, and all related billing entities. With intuitive controls and robust features, you can focus on growing your business while we handle the complexities.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="row">
        <!-- Feature 1 -->
        <div class="col-lg-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Customer Management</div>
                            <div class="mb-0 text-gray-800">Easily create, update and track all your customer information in one centralized location.</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="col-lg-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Product Catalog</div>
                            <div class="mb-0 text-gray-800">Manage your complete product inventory with detailed descriptions, pricing and categories.</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="col-lg-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Sales Tracking</div>
                            <div class="mb-0 text-gray-800">Generate invoices, track payments and monitor sales performance with comprehensive reports.</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4 class="text-gray-800 mb-4">Ready to transform your billing process?</h4>
                    <p>Explore our features or contact our support team for any questions.</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary mr-2">
                        <i class="fas fa-rocket mr-2"></i>Explore Features
                    </a>
                    <a href="#" class="btn btn-outline-secondary">
                        <i class="fas fa-envelope mr-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 0.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
    }
    .lead {
        font-size: 1.1rem;
        color: #4e73df;
    }
</style>
@endsection
