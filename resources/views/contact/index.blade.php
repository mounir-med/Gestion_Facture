@extends('layouts.app')

@section('title', 'Contact Us')

@section('contents')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
        <h1 class="h3 mb-0 text-gray-800">Contact Our Team</h1>
    </div>

    <div class="row">
        <!-- Contact Information -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Our Contact Details</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img class="img-fluid px-3 px-sm-4" style="width: 18rem;"
                             src="{{ asset('img/undraw_contact_us_re_4qqt.svg') }}" alt="Contact Illustration">
                    </div>

                    <div class="contact-info">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle bg-primary mr-3">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold mb-0">Email</h5>
                                <a href="mailto:GDF@gmail.com" class="text-gray-800">GDF@gmail.com</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle bg-success mr-3">
                                <i class="fas fa-phone-alt text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold mb-0">Phone</h5>
                                <a href="tel:+212690567890" class="text-gray-800">+212 690-567890</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-warning mr-3">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold mb-0">Address</h5>
                                <p class="text-gray-800 mb-0">Rue 7 N°5 Etage Saada<br>Sidi Bernoussi, Morocco</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Send Us a Message</h6>
                </div>
                <div class="card-body">
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Your Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="font-weight-bold">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="What's this about?" required>
                        </div>
                        <div class="form-group">
                            <label for="message" class="font-weight-bold">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Your message here..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-paper-plane mr-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Our Location</h6>
                </div>
                <div class="card-body p-0">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.349174723988!2d-7.648851924266789!3d33.59589597333362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDM1JzQ1LjIiTiA3wrAzOCc1Mi4wIlc!5e0!3m2!1sen!2sma!4v1620000000000!5m2!1sen!2sma"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .icon-circle {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
    .card {
        border-radius: 0.5rem;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .contact-info a:hover {
        color: #4e73df !important;
        text-decoration: none;
    }
    .embed-responsive {
        border-radius: 0 0 0.5rem 0.5rem;
    }
</style>
@endsection

@section('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Here you would typically add your form submission logic
        alert('Thank you for your message! We will get back to you soon.');
        this.reset();
    });
</script>
@endsection
