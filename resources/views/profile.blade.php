@extends('layouts.app')

@section('title', 'Mon Profil')

@section('contents')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-user-cog me-2"></i>Paramètres du Profil</h3>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" >
            @csrf
            @method('PUT')

            <div class="row g-3">
                <!-- Photo de profil -->
                <div class="col-md-4 text-center">
                    <div class="profile-picture-container mb-3">
                        @if(auth()->check() && auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                                 class="img-thumbnail rounded-circle profile-picture"
                                 alt="Photo de profil">
                        @else
                            <div class="profile-avatar-placeholder rounded-circle">
                                <i class="fas fa-user fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="mt-3">
                            <label for="photo" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-camera me-1"></i> Changer la photo
                            </label>
                            <input type="file" id="photo" name="photo" class="d-none" accept="image/*">
                        </div>
                    </div>
                </div>

                <!-- Informations du profil -->
                <div class="col-md-8">
                    <div class="row g-3">
                        @if (auth()->check())
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nom complet</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Adresse email</label>
                            <input type="email" class="form-control bg-light"
                                   value="{{ auth()->user()->email }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Téléphone</label>
                            <div class="input-group">
                                <span class="input-group-text">+</span>
                                <input type="tel" name="phone" class="form-control"
                                       value="{{ auth()->user()->phone }}"
                                       placeholder="Numéro de téléphone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Adresse</label>
                            <input type="text" name="address" class="form-control"
                                   value="{{ auth()->user()->address }}"
                                   placeholder="Adresse complète">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary"
                                onclick="window.location.reload()">
                            <i class="fas fa-undo me-1"></i> Annuler
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Enregistrer les modifications
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }
    .profile-picture {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
    .profile-avatar-placeholder {
        width: 150px;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f0f0f0;
        margin: 0 auto;
    }
    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.75rem 1rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .btn {
        border-radius: 8px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
    }
    .input-group-text {
        background-color: #f8f9fa;
    }
</style>

<script>
    // Aperçu de la photo avant upload
    document.getElementById('photo').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];
            const reader = new FileReader();

            const imgElement = document.querySelector('.profile-picture') ||
                              document.querySelector('.profile-avatar-placeholder');

            if (imgElement) {
                reader.onload = function(e) {
                    if (imgElement.classList.contains('profile-avatar-placeholder')) {
                        // Créer une nouvelle image si c'était le placeholder
                        const container = imgElement.parentElement;
                        const newImg = document.createElement('img');
                        newImg.src = e.target.result;
                        newImg.className = 'img-thumbnail rounded-circle profile-picture';
                        newImg.alt = 'Photo de profil';
                        container.replaceChild(newImg, imgElement);
                    } else {
                        // Mettre à jour l'image existante
                        imgElement.src = e.target.result;
                    }
                }
                reader.readAsDataURL(file);
            }
        }
    });
</script>
@endsection
