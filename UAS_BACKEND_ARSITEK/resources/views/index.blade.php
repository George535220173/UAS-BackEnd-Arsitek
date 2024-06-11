@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="overlay-index"></div>
    <div class="content-index">
        <h1>Professional Architecture With MRS</h1>
        <p>We are a team of talented architects</p>
        <div class="services">
            <div class="service">
                <i class="fas fa-puzzle-piece" style="color: #ff9c00;" ></i>
                <h3>heheheha</h3>
            </div>
            <div class="service">
                <i class="fas fa-bullseye" style="color: #ff9c00;"></i>
                <h3>heheheha</h3>
            </div>
            <div class="service">
                <i class="fas fa-search" style="color: #ff9c00;"> </i>
                <h3>heheheha</h3>
            </div>
            <div class="service">
                <i class="fas fa-gem" style="color: #ff9c00;"></i>
                <h3>heheheha</h3>
            </div>
        </div>
    </div>
</div>
<section class="info-section">
    <div class="text-container">
        <h2>Best Architecture Company LOL</h2>
        <p>lorem ipsum lorem ipsum sampe kamu muntah muntah heheheha</p>
        <ul>
            <li><i class="fas fa-check"></i> LOREM IPSUMMMMMMMMMMMMMMMMMMMM</li>
            <li><i class="fas fa-check"></i> HEHEHEHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</li>
            <li><i class="fas fa-check"></i> WWKWKKWKWKWKWKWKWKWKKWKWKWKWKWKKWKWKWKWKWKWKWKWKWKWK</li>
        </ul>
        <p>lorem ipsum lorem ipsum sampe kamu muntah muntah heheheha p p p p p balap pppppp</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
    </div>
</section>
<section class="clients-section">
    <div class="clients-logos">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
        <img src="{{ asset('img/husky.jpg') }}" alt="">
    </div>
</section>
<section class="feature-section">
    <div class="feature-image-container">
        <img src="{{ asset('img/puppy-ai.jpg') }}" alt="Feature Image">
    </div>
    <div class="feature-text-container">
        <h2>Est labore ad</h2>
        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip.</p>
        <div class="feature-item">
            <i class="fas fa-box"></i>
            <div>
                <h3>Est labore ad</h3>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip.</p>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-shopping-basket"></i>
            <div>
                <h3>Harum esse qui</h3>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-broadcast-tower"></i>
            <div>
                <h3>Aut occaecati</h3>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere.</p>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-video"></i>
            <div>
                <h3>Beatae veritatis</h3>
                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta.</p>
            </div>
        </div>
    </div>
</section>
<section class="services-section">
    <div class="services-header">
        <h2>CHECK OUR SERVICES</h2>
    </div>
    <div class="services-container">
        <div class="service-box">
            <i class="fas fa-heartbeat"></i>
            <h3>Nesciunt Mete</h3>
            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-broadcast-tower"></i>
            <h3>Eosle Commodi</h3>
            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-tv"></i>
            <h3>Ledo Markt</h3>
            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-cube"></i>
            <h3>Asperiores Commodit</h3>
            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-tasks"></i>
            <h3>Velit Doloremque</h3>
            <p>Cumque et suscipit saepe. Est maiores autem enim facilis aut ut ipsum corporis aut. Sed animi at autem alias eius labore.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-comments"></i>
            <h3>Dolori Architecto</h3>
            <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
        </div>
    </div>
</section>

<section class="portfolio-section">
    <div class="portfolio-header">
        <h2>CHECK OUR PORTFOLIO</h2>
    </div>
    <div id="portfolioCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($projects->chunk(4) as $chunk)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <div class="container">
                        <div class="row">
                            @foreach ($chunk as $project)
                                <div class="col-6 col-md-6 mb-3 d-flex align-items-stretch">
                                    <div class="image-container">
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="img-fluid portfolio-image">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#portfolioCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#portfolioCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section class="rating-carousel">
    <div class="carousel-container">
        <div class="rating-item">
            <img src="{{ asset('img/husky.jpg') }}" alt="Customer Avatar" class="customer-avatar">
            <p class="customer-name">Nnana Badman</p>
            <p class="customer-role">CEO of PT. Gagacor</p>
            <div class="star-rating">
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
            </div>
            <p class="rating-text">Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>
        </div>
        <div class="rating-item">
            <img src="{{ asset('img/puppy-ai.jpg') }}" alt="Customer Avatar" class="customer-avatar">
            <p class="customer-name">Koroto Manhatty</p>
            <p class="customer-role">Owner of PT. Pasti Bisa</p>
            <div class="star-rating">
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
            </div>
            <p class="rating-text">Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>
        </div>
    </div>
</section>

<section class="team-section">
    <div class="team-header">
        <h2>OUR TEAM</h2>
    </div>
    <div class="team-container">
        <div class="team-member">
            <img src="{{ asset('img/husky.jpg') }}" alt="">
            <h3>Walter Husk</h3>
            <p>Chief Executive Officer</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('img/husky.jpg') }}" alt="">
            <h3>Husk White</h3>
            <p>Product Manager</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('img/husky.jpg') }}" alt="">
            <h3>Uskhy Huss</h3>
            <p>CTO</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('img/husky.jpg') }}" alt="">
            <h3>Hushie Huck</h3>
            <p>Accountant</p>
        </div>
    </div>
</section>

<section class="contact-section" id="contact">
    <div class="contact-header">
        <h2>CONTACT US</h2>
    </div>
    <div class="contact-container">
        <div class="contact-info">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.2691352736101!2d106.83665174725442!3d-6.192477248919186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f43eba102577%3A0x68dccf60ded01bb9!2sJl.%20Cikini%20IV%20No.20%2C%20RT.15%2FRW.5%2C%20Cikini%2C%20Kec.%20Menteng%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010330!5e0!3m2!1sid!2sid!4v1717605164226!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <div class="contact-details">
                <p><i class="fas fa-map-marker-alt"></i> Address<br>Jl. Cikini IV No.20</p>
                <p><i class="fas fa-phone-alt"></i> Call Us<br>+62 812 3344 9292</p>
                <p><i class="fas fa-envelope"></i> Email Us<br>3asrium@gmail.com</p>
            </div>
        </div>
<!-- Contact Form -->
        <div class="contact-form">
            <form action="/send-email" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit">Send Message</button>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
