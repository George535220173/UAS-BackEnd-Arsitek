@extends('layouts.app')

@section('content')

<div class="body-team">
    <div class="team-header-team">
        <div class="team-container-header">
            <div class="team-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('img/MRS1.png') }}" width="120px" height="120px"></a>
            </div>
            <h1>Our Team</h1>
            <p>Meet the talented and dedicated team behind MRS Architects. Our team members are experts in their fields,
                bringing years of experience and a passion for architecture to every project.</p>
        </div>
    </div>

    <div class="main-team">
        <section class="team-details">
            <div class="team-container">
                <!-- Principal Architect -->
                <div class="team-column">
                    <div class="team-member-full-width">
                        <div class="pa-info">
                            <div class="pa-left">
                                <div class="pa-img">
                                    <img src="img/PakMaman.png" alt="">
                                </div>
                                <div class="pa-details">
                                    <h4>DETAILS</h4>
                                    <p>BORN<br>
                                        Jakarta, 22 December 1966</p>
                                    <p>ADDRESS<br>
                                        Otista Jakarta Timur</p>
                                    <p>PHONE<br>
                                        0812-8787104</p>
                                    <p>EMAIL<br>
                                        samadimaman@gmail.com</p>
                                    <p>NATIONALITY<br>
                                        Indonesia</p>
                                </div>
                                <div class="pa-skills">
                                    <h4>SKILLS</h4>
                                    <div class="skill-bar">
                                        <p>Design Improvement</p>
                                    </div>
                                    <div class="skill-bar">
                                        <p>Sketcher</p>
                                    </div>
                                    <div class="skill-bar">
                                        <p>Performance Optimation</p>
                                    </div>
                                </div>
                                <div class="pa-languages">
                                    <h4>LANGUAGES</h4>
                                    <div class="language-bar">
                                        <p>Bahasa Indonesia</p>
                                    </div>
                                    <div class="language-bar">
                                        <p>Sundanese</p>
                                    </div>
                                    <div class="language-bar">
                                        <p>English</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pa-right">
                                <h3>Ir. Maman R. Samadi, IAI</h3>
                                <h3>PRINCIPAL ARCHITECT</h3>
                                <br><br><br><br><br>
                                <div class="pa-profile">
                                    <h4>PROFILE</h4>
                                    <p>Experience to handle so many commercial domestic project and collaboration with
                                        foreign architect/consultant as a local advisor designer</p>
                                </div>
                                <div class="pa-employment">
                                    <h4>EMPLOYMENT HISTORY</h4>
                                    <p>DESIGN DIRECTOR<br>
                                        1990-2004 : PT.Armekon Reka Tantra</p>
                                    <p>DESIGN PARTNER<br>
                                        1993 : Moisson Design Group, Singapore</p>
                                    <p>DESIGN PARTNER<br>
                                        1994 : Palmer and Turner, Singapore</p>
                                    <p>PRINCIPAL DESIGNER<br>
                                        2004-Present : PT.Media Rancang Studio</p>
                                </div>
                                <div class="pa-education">
                                    <h4>EDUCATION</h4>
                                    <p>PRIMARY SCHOOL<br>
                                        1973-1979 : SD Waringin/SD Dewi Sartika</p>
                                    <p>JUNIOR HIGH SCHOOL<br>
                                        1979-1982 : SMP Dewi Sartika</p>
                                    <p>SENIOR HIGH SCHOOL<br>
                                        1982-1985 : SMA Negeri 54</p>
                                    <p>BACHELOR DEGREE-S1<br>
                                        1985-1990 : Pancasila University</p>
                                </div>
                                <div class="pa-awards">
                                    <h4>AWARDS</h4>
                                    <p>1st PRIZE<br>
                                        PPM Institute Design Competition</p>
                                    <p>1st PRIZE<br>
                                        Halim Mixed Development Design Competition</p>
                                    <p>1st PRIZE<br>
                                        Mowilex Award Commercial Building</p>
                                    <p>1st PRIZE<br>
                                        Rusunami Kali Malang Design Competition</p>
                                    <p>1st PRIZE<br>
                                        Tabalong Islamic Center Design Competition</p>
                                </div>
                            </div>
                        </div>
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