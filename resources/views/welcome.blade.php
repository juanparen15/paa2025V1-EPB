@extends('layouts.principal')
@section('title', 'Plan de Adquisiciones')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(homeland/images/hero_bg_2025.jpg); height: 940px; background-size: cover; background-position: center;"
        data-aos="fade" data-stellar-background-ratio="0.2">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-12 col-md-10">
                    <h1 class="mb-4 display-4 text-white">{{ $empresa->nombre }}</h1>
                    <p class="lead text-white" data-aos="fade-up" data-aos-delay="200">Compromiso y Excelencia</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <img src="homeland/images/logo2025.png" alt="Imagen sobre la empresa" class="img-fluid shadow rounded">
                </div>
                <div class="col-12 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card shadow-sm p-4">
                        <div class="site-section-title">
                            <h2 class="h4"><i class="fas fa-bullseye"></i> Misión</h2>
                        </div>
                        <p class="mb-0">
                            {{ $empresa->mision }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8" data-aos="fade-up">
                    <div class="card shadow-sm p-4 text-center">
                        <div class="site-section-title">
                            <h2 class="h4"><i class="fas fa-eye"></i> Visión</h2>
                        </div>
                        <p class="mb-0">
                            {{ $empresa->vision }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                    <div class="site-section-title">
                        <h2 class="h4">Visita Nuestro Sitio Web</h2>
                    </div>
                    <p>
                        <a href="{!! $empresa->url !!}" class="btn btn-primary btn-lg btn-block py-3" data-aos="zoom-in"
                            data-aos-delay="300">Empresas Públicas de Puerto
                            Boyacá</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .shadow {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }

        .shadow:hover {
            transform: scale(1.05);
        }

        .card {
            border: none;
            background-color: #f8f9fa;
            transition: background-color 0.3s;
        }

        .card:hover {
            background-color: #e9ecef;
        }

        .btn {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .site-blocks-cover {
                height: auto;
                padding: 50px 0;
            }

            h1.display-4 {
                font-size: 2rem;
            }

            .card {
                padding: 20px;
            }

            .btn {
                font-size: 14px;
                padding: 10px 15px;
            }
        }

        @media (max-width: 576px) {
            .site-section-title h2 {
                font-size: 1.5rem;
            }

            .btn {
                font-size: 12px;
                padding: 8px 10px;
            }
        }
    </style>
@endsection
