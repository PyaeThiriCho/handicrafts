@extends('frontend.layout')
@section('content')

<div class="container-fluid bg-light py-5 mb-5">
    <div class="container text-center">
        <h1 class="display-5 fw-bold" style="font-family: 'PT Serif', serif;">Get In Touch</h1>
        <hr class="divided mx-auto">
        <p class="text-muted">Have questions about our Myanmar handicrafts? We'd love to hear from you.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-5">
        <div class="col-lg-4">
            <div class="d-flex flex-column gap-4">
                <div class="card border-0 shadow-sm p-4 contact-info-card">
                    <div class="d-flex align-items-center">
                        <div class="icon-box bg-danger-subtle text-danger me-3">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Location</h6>
                            <p class="text-muted small mb-0">Mandalay, Myotha, Myanmar</p>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4 contact-info-card">
                    <div class="d-flex align-items-center">
                        <div class="icon-box bg-danger-subtle text-danger me-3">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Call Us</h6>
                            <p class="text-muted small mb-0">09-255409595</p>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4 contact-info-card">
                    <div class="d-flex align-items-center">
                        <div class="icon-box bg-danger-subtle text-danger me-3">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Email Us</h6>
                            <p class="text-muted small mb-0">info@psmcrafthouse.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-lg p-4 p-md-5">
                <form action="#" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border-0 bg-light" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control border-0 bg-light" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control border-0 bg-light" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <textarea class="form-control border-0 bg-light" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-danger w-100 py-3 fw-bold shadow-sm rounded-pill" type="submit">
                                Send Message <i class="fa-solid fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection