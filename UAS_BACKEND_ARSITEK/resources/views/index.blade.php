@extends('layouts.app')

@section('content')
<div class="index-hero-section">
    <div class="index-overlay-index"></div>
    <div class="index-content-index">
        <h1 class="index-h1">Professional Architecture With MRS</h1>
        <p class="index-p">We are a team of talented architects</p>
        <div class="index-services">
            <div class="index-service">
                <i class="fas fa-puzzle-piece" style="color: #ff9c00;"></i>
                <h3 class="index-h3">heheheha</h3>
            </div>
            <div class="index-service">
                <i class="fas fa-bullseye" style="color: #ff9c00;"></i>
                <h3 class="index-h3">heheheha</h3>
            </div>
            <div class="index-service">
                <i class="fas fa-search" style="color: #ff9c00;"></i>
                <h3 class="index-h3">heheheha</h3>
            </div>
            <div class="index-service">
                <i class="fas fa-gem" style="color: #ff9c00;"></i>
                <h3 class="index-h3">heheheha</h3>
            </div>
        </div>
    </div>
</div>
<div class="index-main-content-container">
    <section class="index-info-section">
        <div class="index-content-and-sidebar">
            <div class="index-text-container">
                <h2>Best Architecture Company LOL</h2>
                <p>lorem ipsum lorem ipsum sampe kamu muntah muntah heheheha</p>
                <ul>
                    <li><i class="fas fa-check"></i> LOREM IPSUMMMMMMMMMMMMMMMMMMMM</li>
                    <li><i class="fas fa-check"></i> HEHEHEHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</li>
                    <li><i class="fas fa-check"></i> WWKWKKWKWKWKWKWKWKKWKWKWKWKWKKWKWKWKWKWKWKWKWKWKWK</li>
                </ul>
                <p>lorem ipsum lorem ipsum sampe kamu muntah muntah heheheha p p p p p balap pppppp</p>
            </div>
            <div class="index-image-container">
                <img src="{{ asset('img/husky.jpg') }}" alt="">
            </div>
        </div>
        <div class="index-sidebar">
            <h3>Recent Articles</h3>
            <div class="index-articles-container">
                @foreach($articles as $article)
                    <div class="index-article-snippet">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->article_title }}" style="width: 100px; height: 75px;">
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
<section class="index-clients-section">
    <div class="index-clients-logos">
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
<section class="index-feature-section">
    <div class="index-feature-image-container">
        <img src="{{ asset('img/puppy-ai.jpg') }}" alt="Feature Image">
    </div>
    <div class="index-feature-text-container">
        <h2>Est labore ad</h2>
        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip.</p>
        <div class="index-feature-item">
            <i class="fas fa-box"></i>
            <div>
                <h3>Est labore ad</h3>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip.</p>
            </div>
        </div>
        <div class="index-feature-item">
            <i class="fas fa-shopping-basket"></i>
            <div>
                <h3>Harum esse qui</h3>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
            </div>
        </div>
        <div class="index-feature-item">
            <i class="fas fa-broadcast-tower"></i>
            <div>
                <h3>Aut occaecati</h3>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere.</p>
            </div>
        </div>
        <div class="index-feature-item">
            <i class="fas fa-video"></i>
            <div>
                <h3>Beatae veritatis</h3>
                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta.</p>
            </div>
        </div>
    </div>
</section>
<section class="index-services-section">
    <div class="index-services-header">
        <h2>CHECK OUR SERVICES</h2>
    </div>
    <div class="index-services-container">
        <div class="index-service-box">
            <i class="fas fa-heartbeat"></i>
            <h3>Nesciunt Mete</h3>
            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure
                perferendis tempore et consequatur.</p>
        </div>
        <div class="index-service-box">
            <i class="fas fa-broadcast-tower"></i>
            <h3>Eosle Commodi</h3>
            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut
                nesciunt dolorem.</p>
        </div>
        <div class="index-service-box">
            <i class="fas fa-tv"></i>
            <h3>Ledo Markt</h3>
            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci
                eos earum corrupti.</p>
        </div>
        <div class="index-service-box">
            <i class="fas fa-cube"></i>
            <h3>Asperiores Commodit</h3>
            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident
                adipisci neque.</p>
        </div>
        <div class="index-service-box">
            <i class="fas fa-tasks"></i>
            <h3>Velit Doloremque</h3>
            <p>Cumque et suscipit saepe. Est maiores autem enim facilis aut ut ipsum corporis aut. Sed animi at
                autem alias eius labore.</p>
        </div>
        <div class="index-service-box">
            <i class="fas fa-comments"></i>
            <h3>Dolori Architecto</h3>
            <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti
                recusandae ducimus enim.</p>
        </div>
    </div>
</section>
<section class="index-portfolio-section">
    <div class="index-portfolio-header">
        <h2>CHECK OUR PORTFOLIO</h2>
        <div class="index-portfolio-filters">
            <button class="index-filter-btn active" data-filter="all">All</button>
            <button class="index-filter-btn" data-filter="app">App</button>
            <button class="index-filter-btn" data-filter="card">Card</button>
            <button class="index-filter-btn" data-filter="web">Web</button>
        </div>
    </div>
    <div class="index-portfolio-container">
        <div class="index-portfolio-item" data-category="app">
            <img src="{{ asset('img/husky.jpg') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item" data-category="card">
            <img src="{{ asset('img/puppy-ai.jpg') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item" data-category="web">
            <img src="{{ asset('img/husky.jpg') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item" data-category="app">
            <img src="{{ asset('img/puppy-ai.jpg') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item" data-category="card">
            <img src="{{ asset('img/husky.jpg') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item" data-category="web">
            <img src="{{ asset('img/puppy-ai.jpg') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item" data-category="app">
            <img src="{{ asset('img/husky.jpg') }}" alt="Portfolio Item">
        </div>
        <div class="index-portfolio-item" data-category="card">
            <img src="{{ asset('img/puppy-ai.jpg') }}" alt="Portfolio Item">
        </div>
    </div>
</section>

<section class="index-rating-carousel">
    <div class="index-carousel-container">
        <div class="index-rating-item">
            <img src="{{ asset('img/husky.jpg') }}" alt="Customer Avatar" class="index-customer-avatar">
            <p class="index-customer-name">Nnana Badman</p>
            <p class="index-customer-role">CEO of PT. Gagacor</p>
            <div class="index-star-rating">
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
            </div>
            <p class="index-rating-text">Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            </p>
        </div>
        <div class="index-rating-item">
            <img src="{{ asset('img/puppy-ai.jpg') }}" alt="Customer Avatar" class="index-customer-avatar">
            <p class="index-customer-name">Koroto Manhatty</p>
            <p class="index-customer-role">Owner of PT. Pasti Bisa</p>
            <div class="index-star-rating">
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
                <span class="fas fa-star" style="color: #ff9c00;"></span>
            </div>
            <p class="index-rating-text">Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            </p>
        </div>
    </div>
</section>

<section class="index-team-section" id="team-section">
    <div class="index-team-header">
        <h2>OUR TEAM</h2>
    </div>
    <div class="index-team-container">
        <div class="index-team-member">
            <img src="{{ asset('img/husky.jpg') }}" alt="">
            <h3>Walter Husk</h3>
            <p>Chief Executive Officer</p>
        </div>
        <div class="index-team-member">
            <img src="{{ asset('img/husky.jpg') }}" alt="">
            <h3>Husk White</h3>
            <p>Product Manager</p>
        </div>
        <div class="index-team-member">
            <img src="{{ asset('img/husky.jpg') }}" alt="">
            <h3>Uskhy Huss</h3>
            <p>CTO</p>
        </div>
    </div>
</section>

<section class="index-contact-section" id="contact">
    <div class="index-contact-header">
        <h2>CONTACT US</h2>
    </div>
    <div class="index-contact-container">
        <div class="index-contact-info">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.2691352736101!2d106.83665174725442!3d-6.192477248919186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f43eba102577%3A0x68dccf60ded01bb9!2sJl.%20Cikini%20IV%20No.20%2C%20RT.15%2FRW.5%2C%20Cikini%2C%20Kec.%20Menteng%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010330!5e0!3m2!1sid!2sid!4v1717605164226!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <div class="index-contact-details">
                <p><i class="fas fa-map-marker-alt"></i> Address<br>Jl. Cikini IV No.20</p>
                <p><i class="fas fa-phone-alt"></i> Call Us<br>+62 812 3344 9292</p>
                <p><i class="fas fa-envelope"></i> Email Us<br>3asrium@gmail.com</p>
            </div>
        </div>
        <!-- Contact Form -->
        <div class="index-contact-form">
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
