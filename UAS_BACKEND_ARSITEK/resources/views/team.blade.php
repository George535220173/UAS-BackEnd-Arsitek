@extends('layouts.app')

@section('content')

<div class="body-service">
    <div class="header-service">
        <div class="container-header">
            <h1>Our Team</h1>
            <p>Meet the talented and dedicated team behind MRS Architects. Our team members are experts in their fields, bringing years of experience and a passion for architecture to every project.</p>
        </div>
    </div>

    <nav>
        <a href="#">Home</a> / <span>Our Team</span>
    </nav>

    <div class="main-service">

        <aside>
            <h2>Team Members</h2>
            <ul id="team-list">
                <li class="active">John Doe, S.Ars</li>
                <li>Jane Smith, S.Ars</li>
                <li>Robert Johnson, S.Ars</li>
                <li>Emily Davis, S.Ars</li>
            </ul>

            <div class="contact-box-service">
                <div class="contact-text-cluster-service">
                    <img src="/img/headset.png" width="50px" height="50px">
                    <h3>CONTACT</h3>
                    <div style="display: flex; align-items: center;">
                        <img src="/img/mic.png" width="20px" height="20px" style="margin: 10px;">
                        <span>+62 21 31900081</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <img src="/img/mail.png" width="20px" height="20px" style="margin: 10px;">
                        <span>mrsarchitects@yahoo.com</span>
                    </div>
                </div>
            </div>
        </aside>

        <section class="team-details">
            <div class="team-member">
                <img src="/img/john_doe.png" alt="John Doe">
                <h3>John Doe, S.Ars</h3>
                <p>John is the founder and principal architect of MRS Architects. With over 20 years of experience in the industry, John has led numerous successful projects and is known for his innovative designs and attention to detail.</p>
            </div>

            <div class="team-member">
                <img src="/img/jane_smith.png" alt="Jane Smith">
                <h3>Jane Smith, S.Ars</h3>
                <p>Jane is a senior architect at MRS Architects. She specializes in sustainable design and has a keen eye for integrating green solutions into her projects. Jane has been with the firm for over 10 years.</p>
            </div>

            <div class="team-member">
                <img src="/img/robert_johnson.png" alt="Robert Johnson">
                <h3>Robert Johnson, S.Ars</h3>
                <p>Robert is an architect at MRS Architects with a focus on commercial projects. He has a background in structural engineering and ensures that all designs are both functional and aesthetically pleasing.</p>
            </div>

            <div class="team-member">
                <img src="/img/emily_davis.png" alt="Emily Davis">
                <h3>Emily Davis, S.Ars</h3>
                <p>Emily is a junior architect at MRS Architects. She brings fresh ideas and a modern approach to the team. Emily is passionate about residential design and creating spaces that are both beautiful and livable.</p>
            </div>
        </section>
    </div>
</div>

@endsection
