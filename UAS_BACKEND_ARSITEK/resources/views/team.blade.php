@extends('layouts.app')

@section('content')

<div class="body-team">
    <div class="header-team">
        <div class="container-header">
            <h1>Our Team</h1>
            <p>Meet the talented and dedicated team behind MRS Architects. Our team members are experts in their fields, bringing years of experience and a passion for architecture to every project.</p>
        </div>
    </div>

    <div class="main-team">  
        <section class="team-details">
            <div class="team-container">
                <!-- Principal Architect -->
                <div class="team-column">
                    <div class="team-member-full-width d-flex align-items-center">
                        <div class="team-info">
                            <h3>Ir. Maman R. Samadi, IAI</h3>
                            <p>...</p>
                        </div>
                        <img src="path/to/image.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <!-- Other Team Members -->
                <div class="team-main-column">
                    <div class="team-row">
                        <div class="team-sub-column">
                            <div class="team-member-card d-flex align-items-center">
                                <div class="team-info">
                                    <h3>Ir. Stefanus Harko Pradono</h3>
                                    <p>Jabatan : Associate Director</p>
                                    <p>Tempat & Tanggal Lahir : Bandung, 22 Juli 1956</p>
                                    <p>Pengalaman Perusahaan</p>
                                    <ul>
                                        <li>PT Armekon Reka Tantra - Operation Director</li>
                                        <li>PT Ardan Indera Destas - Operation Director</li>
                                        <li>PT Intiland Development Tbk - Project Coordinator</li>
                                        <li>Liberty Global Network Sdn Bhd - Senior Consultant</li>
                                    </ul>
                                </div>
                                <img src="img/Ir. Stefanus Harko Pradono.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="team-sub-column">
                            <div class="team-member-card d-flex align-items-center">
                                <div class="team-info">
                                    <h3>Ir. Agus B Sulistyo</h3>
                                    <p>Jabatan : Associate Director</p>
                                    <p>Tempat & Tanggal Lahir : Surabaya, 30 April 1961</p>
                                    <p>Pengalaman Perusahaan</p>
                                    <ul>
                                        <li>PT Armekon Reka Tantra - Operation Director</li>
                                        <li>PT Atlantic Richfield North Bali - Resident Architect</li>
                                        <li>PT Kajima Design Asia PTE - Chief Architect</li>
                                        <li>PT Atria Jayakarsa Bangun Persada - Project Manager</li>
                                        <li>PT Kajima Indonesia - Assistant Architectural Manager</li>
                                    </ul>
                                </div>
                                <img src="img/Ir. Agus B Sulistyo.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="team-sub-column">
                            <div class="team-member-card d-flex align-items-center">
                                <div class="team-info">
                                    <h3>Ir. Ambar Achiranto</h3>
                                    <p>Jabatan : Interior Project Director</p>
                                    <p>Tempat & Tanggal Lahir : Jakarta, 22 November 1964</p>
                                    <p>Pengalaman Perusahaan</p>
                                    <ul>
                                        <li>PT Graha Cipta Hadiprana - Interior Designer</li>
                                        <li>PT Dutika Megah Interior - Interior Designer</li>
                                        <li>PT Aditata Anindya - Project Manager</li>
                                        <li>PT Bina Karya - Project Architect</li>
                                    </ul>
                                </div>
                                <img src="img/Ir. Ambar Achiranto.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
