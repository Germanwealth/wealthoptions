@extends('layouts.app')

@section('content')
    <section class="section-padding" style="padding-top: 140px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h2 class="mb-3">Get in Touch</h2>
                    <p>We’re here to help. Send us a message and we’ll respond as soon as possible.</p>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><i class="icon icon-phone3"></i> +18122005740</li>
                        <li class="mb-2"><i class="icon icon-envelope"></i> <a href="mailto:support@wealthoptions.com">support@wealthoptions.com</a></li>
                        <li><i class="icon icon-map-marker2"></i> 12 ST. GRGS EN SW19 4BD, London</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <form action="{{ route('contact.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Your name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cemail">Email</label>
                                        <input type="email" id="cemail" name="email" class="form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="How can we help?" value="{{ old('subject') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" class="form-control" rows="5" placeholder="Write your message..." required>{{ old('message') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
