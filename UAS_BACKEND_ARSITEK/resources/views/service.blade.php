@extends('layouts.app')

@section('content')

<div class="body-service">
    <div class="header-service">
        <div class="container-header">
            <h1>Service Details</h1>
            <p>Odium et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequuntur at
                a odio voluptas.</p>
        </div>
    </div>

    <nav>
        <a href="#">Home</a> / <span>Service Details</span>
    </nav>

    <div class="main-service">

        <aside>
            <h2>Services List</h2>
            <ul id="services-list">
                <li class="active">Web Design</li>
                <li>Web Development</li>
                <li>Product Management</li>
                <li>Graphic Design</li>
                <li>Marketing</li>
            </ul>
            <div class="download-catalog">
                <h3>Download Catalog</h3>
                <ul>
                    <li><a href="#">Catalog PDF</a></li>
                    <li><a href="#">Catalog DOC</a></li>
                </ul>
            </div>

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


        <section class="service-details">
            <img src="/img/amazin.PNG" alt="Service Image">
            <h3>Temporibus et in vero dicta aut</h3>
            <p>Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque
                consequatur. Voluptatem debitis veritatis natus dolores.</p>
        </section>
    </div>
    @endsection