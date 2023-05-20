@include('layouts.header')
<script src="{{ asset('js/jquery1.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css') }}">
<script src="{{ asset('js/bootstraps1.min.js') }}"></script>

<body>
    <header>
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top ">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="d-flex justify-content-between align-items-center flex-sm">
                                    <div class="header-info-left d-flex align-items-center">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12">

                                <div class="main-menu text-center d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>

        <section class="our-client section-padding best-selling">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-12">

                        <div class="section-tittle  mb-40">
                            <h2>Products</h2>
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div class="col-xl-8 col-lg-8 col-md-6">
                            <div class="row justify-content-end">
                                <div class="col-xl-4">
                                    <div class="product_page_tittle">
                                        <div class="short_by">
                                            <select name="product_type" id="product_type">
                                                <option value="0">All
                                                </option>
                                                @foreach ($collections as $collection)
                                                    <option value="{{ $collection->title }}">{{ $collection->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane show active" id="collectionData" role="tabpanel"
                            aria-labelledby="nav-one-tab">

                            @include('pages.products')

                        </div>
                    </div>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>
        </section>

    </main>

    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    @include('layouts.scripts')

</body>

</html>
