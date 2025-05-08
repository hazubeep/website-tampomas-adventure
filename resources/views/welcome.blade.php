@extends('layouts.home')

@section('content')
    <main>
        <article>
            <section class="hero-section" id="home">
                <div class="container">
                    <div class="hero-grid">
                        <div class="hero-content will-animate">
                            <h1 class="hero-title">Petualangan di Mulai - Apakah Kamu siap Untuk Bergabung?</h1>
                            <p class="hero-description">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt nulla similique
                                facilis, natus voluptate obcaecati unde explicabo totam hic quibusdam veritatis eos
                                aspernatur maiores dignissimos.
                            </p>

                            <a href="#" class="btn btn-primary btn-explore">
                                Mulai Penjelajahan <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="hero-image will-animate">
                            <img class="featured-image" src="{{ asset('./images/hero-4.jpg') }}" alt="hero">
                            <div class="location-tag">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kawasan Gunung Tampomas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="stats-section">
                <div class="container">
                    <p class="pill-badge">Statistik</p>
                    <div class="stats-grid">
                        <div class="stat-item will-animate">
                            <div class="stat-number" data-target="200">0</div>
                            <h3 class="stat-label">Hiking Events</h3>
                            <p class="stat-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deserunt, nulla.</p>
                        </div>
                        <div class="stat-item will-animate">
                            <div class="stat-number" data-target="25">0</div>
                            <h3 class="stat-label">Countries In Trail Guides</h3>
                            <p class="stat-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deserunt, nulla.</p>
                        </div>
                        <div class="stat-item will-animate">
                            <div class="stat-number" data-target="98">0</div>
                            <h3 class="stat-label">Pendaki Puas</h3>
                            <p class="stat-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deserunt, nulla.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-section" id="about">
                <div class="container">
                    <p class="pill-badge">About us</p>
                    <div class="about-grid">
                        <div class="about-image will-animate">
                            <img src="{{ asset('./images/hero-3.jpg') }}" alt="Mountain landscape">
                        </div>
                        <div class="about-content will-animate">
                            <h2 class="section-title">Get to Know About Us</h2>
                            <p class="section-description">Elevate every step, embrace every trail. Adventure
                                awaits—let's make it unforgettable</p>
                            <p class="about-text">We are passionate about the great outdoors and dedicated to helping
                                you make the most of your hiking adventures. Founded by a team of outdoor enthusiasts,
                                our mission is to provide comprehensive resources and high-quality gear to novice and
                                seasoned hikers. We believe that everyone should have the opportunity to explore
                                nature's beauty, and we strive to make every hike a memorable experience.</p>
                        </div>
                    </div>
                    <h2 class="section-title">Fasilitas</h2>
                    <div class="features-grid">
                        <div class="feature-card will-animate">
                            <div class="feature-icon">
                                <i class="fas fa-campground"></i>
                            </div>
                            <h3>Area Camping</h3>
                            <p> Tempat nyaman untuk berkemah di alam terbuka.</p>
                        </div>

                        <div class="feature-card will-animate">
                            <div class="feature-icon">
                                <i class="fas fa-sun"></i>
                            </div>
                            <h3>Pemandangan Sunrise</h3>
                            <p>Nikmati matahari terbit dari puncak Tampomas.</p>
                        </div>

                        <div class="feature-card will-animate">
                            <div class="feature-icon">
                                <i class="fas fa-hiking"></i>
                            </div>
                            <h3>Jalur Pendakian</h3>
                            <p>Tersedia beberapa jalur dengan tingkat kesulitan berbeda.</p>
                        </div>

                        <div class="feature-card will-animate">
                            <div class="feature-icon">
                                <i class="fas fa-camera-retro"></i>
                            </div>
                            <h3>Spot Foto Alam</h3>
                            <p>Abadikan momen dengan latar alam yang memesona.</p>
                        </div>

                        <div class="feature-card will-animate">
                            <div class="feature-icon">
                                <i class="fas fa-restroom"></i>
                            </div>
                            <h3>Toilet & Mushola</h3>
                            <p> Fasilitas bersih untuk kenyamanan pengunjung.</p>
                        </div>

                        <div class="feature-card will-animate">
                            <div class="feature-icon">
                                <i class="fas fa-store-alt"></i>
                            </div>
                            <h3> Warung Pendaki</h3>
                            <p>Tersedia makanan dan minuman ringan di basecamp.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="articles-section" id="artikel">
                <div class="container">
                    <p class="pill-badge">Articles</p>
                    <h2 class="section-title">Choose Your Favorite Articles</h2>
                    <p class="section-description">
                        Explore our collection of hiking articles, from trail guides and gear reviews to personal
                        adventures and expert tips. Find inspiration for your next mountain journey!
                    </p>

                    <div class="articles-grid">

                        @foreach ($articles as $article)
                            <div class="article-card will-animate">
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Backpacking Guide">
                                <div class="article-content">
                                    <h3>{{ $article->title }}</h3>
                                    <p class="article-excerpt">{{ Str::words($article->content, 10, '...') }}</p>
                                    <div class="article-footer">
                                        <div class="article-meta">
                                            <span class="date">May 7, 2025</span>
                                        </div>
                                        <a href="{{route('articles.show', $article->id)}}" class="btn btn-primary">Read</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="articles-action">
                        <a href="/articles" class="btn btn-primary">
                            View More Articles <i class="fas fa-newspaper"></i>
                        </a>
                    </div>
                </div>
            </section>

            <section class="gallery-section" id="gallery">
                <div class="container">
                    <p class="pill-badge">Our Gallery</p>
                    <h2 class="section-title">Capture The Beauty of Mount Tampomas</h2>
                    <p class="section-description">Explore stunning views and memorable moments from our adventures in
                        Mount Tampomas</p>

                    <div class="gallery-grid">
                        @foreach ($galleries as $gallery)
                            <div class="gallery-item will-animate">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image 1">
                                <div class="gallery-overlay">
                                    <h3>{{ $gallery->title }}</h3>
                                    <p>{{ $gallery->content }}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="gallery-action">
                        <a href="/gallery" class="btn btn-primary">
                            View More Photos <i class="fas fa-images"></i>
                        </a>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <div class="container">
                    <div class="cta-content" style="background-image: url('{{ asset('./images/hero-4.jpg') }}')">
                        <h2 class="cta-title">Ready for Your Next Adventure?</h2>
                        <p class="cta-description">Join Thrilliz today and explore the most breathtaking trails,
                            expert-led tours, and top-tier hiking gear.</p>
                        <a href="/register" class="btn btn-cta">
                            Start your Journey <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </section>
        </article>
    </main>
@endsection
