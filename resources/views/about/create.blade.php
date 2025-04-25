@extends('layouts.app')

@section('title', 'Create Settings')

@section('contents')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-lg-12">
                <h2 class="h3 mb-0 text-gray-800">Create New Setting</h2>
                <hr class="mt-2 mb-4" style="border-color: #ddd;">
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Setting Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.store') }}" method="POST" class="user">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="key" class="form-label">Key</label>
                            <input type="text" name="key" class="form-control form-control-user"
                                   id="key" placeholder="Enter key (e.g., site_name, maintenance_mode)" required>
                            @error('key')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label for="value" class="form-label">Value</label>
                            <input type="text" name="value" class="form-control form-control-user"
                                   id="value" placeholder="Enter value" required>
                            @error('value')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-user px-4">
                                <i class="fas fa-save mr-2"></i> Save Setting
                            </button>
                            <a href="{{ route('settings.index') }}" class="btn btn-secondary btn-user px-4 ml-2">
                                <i class="fas fa-arrow-left mr-2"></i> Back to List
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Usage Tips</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        Use descriptive keys like "site_name" or "max_login_attempts"
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        Values can be strings, numbers, or boolean (true/false)
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        These settings will be accessible throughout your application
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .form-control-user {
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
    .card {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }
    .list-group-item {
        border-left: none;
        border-right: none;
        padding: 0.75rem 1.25rem;
    }
</style>
@endsection
