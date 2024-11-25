@extends('layout')
<link href="{{ asset('css/Home.css') }}" rel="stylesheet">

@section('content')
<header class="hero-slider">
  <div class="container">
    <div class="image-wrapper">
      <img src="{{ asset('images/company1.jpg') }}" alt="Hero Image 1">
      <div class="description-box">
        <h1>Welcome to Mini-CRM</h1>
        <p>Efficiently manage companies and employees with our easy-to-use platform. Tailored for businesses in Jordan, Mini-CRM simplifies administrative tasks for seamless management.</p>
      </div>
    </div>
  </div>
</header>



<section class="company-requirements">
  <div class="container">
    <div class="requirements-content">
      <!-- Left Description Section -->
      <div class="description">
        <h2>The purpose of the platform</h2>
        <p>
        Through this platform, our goal is to connect with as many companies as possible to create more opportunities for candidates. If you know of a company that should be included, we encourage you to add it and help expand our network.
        </p>
        <a href="{{ route('companies.create') }}" class="add-company-link">
        Add Company
      </a>
      </div>

      <!-- Right Image Section -->
      <div class="image">
        <img src="{{ asset('images/company2.jpg') }}" alt="CV and Portfolio">
      </div>
    </div>
  </div>
</section>

@endsection
