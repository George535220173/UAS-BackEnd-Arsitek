@extends('layouts.app')

@section('content')
<!--Carousel utama main page -->
<div class="index-hero-section fade-in">
    <div class="carousel-background">
        <div class="carousel-slide" style="background-image: url('img/MainPage/Foto1MainPage.png');"></div>
        <div class="carousel-slide" style="background-image: url('img/MainPage/Margonda.jpg');"></div>
        <div class="carousel-slide" style="background-image: url('img/MainPage/TabalongIslamic.jpg');"></div>
    </div>
    <div class="index-overlay-index"></div>
    <div class="index-content-index">
        <h1 class="index-h1">Professional Architecture With <br>
            <img src="{{ asset('img/MRSwhite.png') }}" width="200px" height="200px" alt=""></h1>
        <p class="index-p">"To promote the achievement of exellence in the building industry through professionalism in expediting our sevices at every stage and level of the project to satisfactory completion"</p>
    </div>
</div>

<!--Penjelasan website -->
<div class="index-main-content-container fade-up" id="article-section">
    <section class="index-info-section">
        <div class="index-content-and-sidebar">
            <div class="index-text-container">
                <h2>MRS Architects</h2>
                <p>PT. MEDIA RANCANG STUDIO is a firm of experienced Professionals undertaking works in the following fields:</p>
                <ul>
                    <li> Feasibility study of a Project, including analysis of its type, market potentials, financial projections and project phasing.</li>
                    <li> Architectural Services analyze available building sites, generate & develop design concepts, set up & lead a multi-disciplinary design team, co-ordinate production of construction documents, assist in tendering process and provide periodic site inspections.</li>
                    <li> Regional Planning & Urban Design analyze project site, conceptual zoning options and master planning.</li>
                    <li> Interior Design services, analyze base building options, space programming & adjacency diagram, physical lay-outing, fit-out construction detailing, assist in tendering process and provide periodic site inspections</li>
                    <li> MRS Architects' most valuable resources are its professional manpower, consisting of senior architects, architects, urban planners, and the supporting technical & non-technical staff.</li>
                    <li> MRS Architects' work experience includes all types of design and construction projects from single individual houses to large master planning projects with mixed usages of residential, commercial, hotel and institutional developments.</li>
                </ul>
            </div>
            <div class="index-image-container">
                <img src="{{ asset('img/MRS1.png') }}" alt="">
            </div>
        </div>
        <!--Artikel ditampilkan disini-->
        <div class="index-sidebar">
            <h3>Recent Articles</h3>
            <div class="index-articles-container">
                @foreach($articles as $article)
                    <div class="index-article-snippet">
                        <img src="{{ asset('img/Article/' . basename($article->thumbnail)) }}" alt="{{ $article->article_title }}" style="width: 100px; height: 75px;">
                        <div>
                            <h4><a href="{{ $article->article_link }}" target="_blank">{{ $article->article_title }}</a></h4>
                            <p>by {{ $article->article_author }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<!--Logo-logo-->
<div class="index-clients-header fade-up"><h2>Our Clients</h2></div>
<section class="index-clients-section">
    <div class="index-clients-logos fade-up">
        <img src="{{ asset('img/Adaro.png') }}" alt="">
        <img src="{{ asset('img/AW.png') }}" alt="">
        <img src="{{ asset('img/bank syariah mandiri.png') }}" alt="">
        <img src="{{ asset('img/BSI.png') }}" alt="">
        <img src="{{ asset('img/cakra bumi energi.png') }}" alt="">
        <img src="{{ asset('img/cempaka bersama maju.png') }}" alt="">
        <img src="{{ asset('ciputra.png') }}" alt="">
        <img src="{{ asset('img/departemen luar negeri.png') }}" alt="">
        <img src="{{ asset('img/Dowa.png') }}" alt="">
        <img src="{{ asset('img/HSI.png') }}" alt="">
        <img src="{{ asset('img/IAPI.png') }}" alt="">
        <img src="{{ asset('img/IKEA.png') }}" alt="">
        <img src="{{ asset('img/Indosat.png') }}" alt="">
        <img src="{{ asset('img/krakatau steel indonesia.png') }}" alt="">
        <img src="{{ asset('img/LEMIGAS.png') }}" alt="">
        <img src="{{ asset('img/luhribu nagajaya.png') }}" alt="">
        <img src="{{ asset('img/magdatama multi industri.png') }}" alt="">
        <img src="{{ asset('img/mekar prana indah.png') }}" alt="">
        <img src="{{ asset('img/nahdlatul ulama.png') }}" alt="">
        <img src="{{ asset('img/pann multifinance.png') }}" alt="">
        <img src="{{ asset('img/pondok indah group.png') }}" alt="">
        <img src="{{ asset('img/PPBI.png') }}" alt="">
        <img src="{{ asset('img/PPLI.png') }}" alt="">
        <img src="{{ asset('img/RS jantung harapan kita.png') }}" alt="">
        <img src="{{ asset('img/SAL.png') }}" alt="">
        <img src="{{ asset('img/Surveyor indonesia.png') }}" alt="">
        <img src="{{ asset('img/YKKBI.png') }}" alt="">
        
    </div>
</section>
<!-- Awards yang didapat-->
<section class="index-services-section">
    <div class="index-services-header">
        <h2>CHECK OUR AWARDS</h2>
    </div>
    <div class="index-services-container">
        <div class="index-service-box fade-up">
            <h3>1st Prize</h3>
            <p>Kawasan Masjid Tugu Marunda</p>
            <img class="fixed-size-img" src="{{ asset('img/Awards/Marunda2png.png') }}" alt="Kawasan Masjid Tugu Marunda" onclick="openFullscreen(this.src)">
        </div>
        <div class="index-service-box fade-up">
            <h3>1st Prize</h3>
            <p>Rusunawa Kalimalang</p>
            <img class="fixed-size-img" src="{{ asset('img/Awards/Rusunawa.png') }}" alt="Rusunawa Kalimalang" onclick="openFullscreen(this.src)">
        </div>
        <div class="index-service-box fade-up">
            <h3>2nd Prize</h3>
            <p>Stadiun Sunter</p>
            <img class="fixed-size-img" src="{{ asset('img/Awards/StadiunSunter.png') }}" alt="Stadiun Sunter" onclick="openFullscreen(this.src)">
        </div>
        <div class="index-service-box fade-up">
            <h3>3rd Prize</h3>
            <p>Golf Clubhouse - Kemayoran</p>
            <img class="fixed-size-img" src="{{ asset('img/Awards/GolfClub.png') }}" alt="Golf Clubhouse - Kemayoran" onclick="openFullscreen(this.src)">
        </div>
        <div class="index-service-box fade-up">
            <h3>4th Prize</h3>
            <p>Bakrie Toll Gate and Rest Area</p>
            <img class="fixed-size-img" src="{{ asset('img/Awards/Bakrie.png') }}" alt="Bakrie Toll Gate and Rest Area" onclick="openFullscreen(this.src)">
        </div>
        <div class="index-service-box fade-up">
            <h3>Participant</h3>
            <p>IA-ITB</p>
            <img class="fixed-size-img" src="{{ asset('img/Awards/IA-ITB.png') }}" alt="IA-ITB" onclick="openFullscreen(this.src)">
        </div>
    </div>
</section>

<!-- Overlay secara penuh jika gambar diklik-->
<div id="fullscreen-overlay" class="fullscreen-overlay" onclick="closeFullscreen()">
    <span class="close-btn" onclick="closeFullscreen()">×</span>
    <img id="fullscreen-image" class="fullscreen-image" src="">
</div>

<!--Projects yang dikerjakan akan ditampilkan disini-->
<section class="index-portfolio-section">
    <div class="index-portfolio-header fade-up">
        <h2>CHECK OUR PROJECTS</h2>
    </div>
    <div class="index-portfolio-container">
        <div class="index-portfolio-item fade-up" data-category="app">
            <img src="{{ asset('img/Project/Masterplan 1.png') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item fade-up" data-category="card">
            <img src="{{ asset('img/Project/Masterplan yanglain 2.png') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item fade-up" data-category="web">
            <img src="{{ asset('img/Project/Office and headquarters 1.png') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item fade-up" data-category="app">
            <img src="{{ asset('img/Project/Residential 1.png') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item fade-up" data-category="card">
            <img src="{{ asset('img/Project/Rumah 1.png') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item fade-up" data-category="web">
            <img src="{{ asset('img/Project/Rumah sakit 2.png') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item fade-up" data-category="app">
            <img src="{{ asset('img/Project/Company 1.png') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item fade-up" data-category="card">
            <img src="{{ asset('img/Project/Masterplan 3.png') }}" alt="Portfolio Item">
        </div>
    </div>
</section>

<!--Team member yang ada di MRS Architects -->
<section class="index-team-section" id="team-section">
    <div class="index-team-header fade-up">
        <h2>OUR TEAM</h2>
    </div>
    <div class="index-team-container">
        <a href="/team" class="index-team-link fade-up">
            <div class="index-team-member">
                <img src="{{ asset('img/PakMaman.png') }}" width="200px" height="200px"  alt="">
                <h3>Ir. Maman R. Samadi, IAI</h3>
                <p>Principal Architect</p>
            </div>
        </a>
        <a href="/team" class="index-team-link fade-up">
            <div class="index-team-member">
                <img src="{{ asset('img/Ir. Stefanus Harko Pradono.png') }}" alt="">
                <h3>Ir. Stefanus Harko Pradono</h3>
                <p>Associate Director</p>
            </div>
        </a>
        <a href="/team" class="index-team-link fade-up">
            <div class="index-team-member">
                <img src="{{ asset('img/Ir. Agus B Sulistyo.png') }}" alt="">
                <h3>Ir. Agus B Sulistyo</h3>
                <p>Associate Director</p>
            </div>
        </a>
        <a href="/team" class="index-team-link fade-up">
            <div class="index-team-member">
                <img src="{{ asset('img/Ir. Ambar Achiranto.png') }}" alt="">
                <h3>Ir. Ambar Achiranto</h3>
                <p>Interior Project Director</p>
            </div>
        </a>
    </div>
</section>

<!--Contact -->
<section class="index-contact-section" id="contact">
    <div class="index-contact-header fade-up">
        <h2>CONTACT US</h2>
    </div>
    <div class="index-contact-container">
        <div class="index-contact-info fade-up">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.2691352736101!2d106.83665174725442!3d-6.192477248919186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f43eba102577%3A0x68dccf60ded01bb9!2sJl.%20Cikini%20IV%20No.20%2C%20RT.15%2FRW.5%2C%20Cikini%2C%20Kec.%20Menteng%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010330!5e0!3m2!1sid!2sid!4v1717605164226!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <div class="index-contact-details fade-up">
                <p><i class="fas fa-map-marker-alt"></i> Address<br>Jl. Cikini IV No.20</p>
                <p><i class="fas fa-phone-alt"></i> Call Us<br>+62 812 3344 9292</p>
                <p><i class="fas fa-envelope"></i> Email Us<br>3asrium@gmail.com</p>
            </div>
        </div>
        <!-- Form contact-->
        <div class="index-contact-form fade-up">
            <form action="/send-email" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                        required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message"
                        required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
