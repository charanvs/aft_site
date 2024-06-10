<header class="top-header top-header-bg py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 mb-2 mb-md-0">
                <div id="google_translate_element" class="text-md-left text-center"></div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'en,hi,ta,pa', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="header-right d-flex flex-column flex-md-row justify-content-md-end text-center text-md-left">
                    <ul class="list-unstyled mb-0 d-flex flex-column flex-md-row">
                        <li class="mb-2 mb-md-0 mr-md-3">
                            <i class='bx bx-home-alt mr-1'></i>
                            <a href="#" class="text-decoration-none">West Block-VIII, R.K.Puram, New Delhi</a>
                        </li>
                        <li class="mb-2 mb-md-0 mr-md-3">
                            <i class='bx bx-phone-call mr-1'></i>
                            <a href="tel:+91-(123)-456-7890" class="text-decoration-none">+1 (123) 456 7890</a>
                        </li>
                        <li>
                            <i class='bx bx-envelope mr-1'></i>
                            <a href="mailto:hello@atoli.com" class="text-decoration-none">pbnewdelhi@mail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

    <!-- Start Navbar Area -->
    <div class="navbar-area bg-info">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="" class="logo-one" alt="Logo">
                <img src="" class="logo-two" alt="Logo">
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="" class="logo-one" alt="Logo">
                        <img src="" class="logo-two" alt="Logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                               <a href="{{ route('home') }}" class="nav-link {{ isActiveRoute('home') }}">
                                Home
                            </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('members.page') }}" class="nav-link {{ isActiveRoute('members.page') }}">
                                    Members

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ areActiveRoutes(['services', 'daily_cause_list.page']) }}">
                                 Case Management

                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('daily_cause_list.page') }}" class="nav-link">
                                            Daily Cause List
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="team.html" class="nav-link">
                                            Search Orders
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Daily Orders
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ areActiveRoutes(['judgements', 'judgements.page', 'judgements.reportable', 'judgements.largebench']) }}">
                                    Judgements
                                        <i class='bx bx-chevron-down'></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('judgements.page') }}" class="nav-link">
                                            Judgements in AFT PB
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('judgements.reportable') }}" class="nav-link">
                                            Reportable Judgements

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('judgements.largebench') }}" class="nav-link">
                                            Large Bench Orders
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="restaurant.html" class="nav-link">
                                            Review Cases Of Regional Branches

                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="reservation.html" class="nav-link">
                                            Large Bench Circulars
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Regional Benches
                                        <i class='bx bx-chevron-down'></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="book.html" class="nav-link">
                                            Chandigarh
                                        </a>

                                    </li>

                                    <li class="nav-item">
                                        <a href="team.html" class="nav-link">
                                            Chennai
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Guwhati
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Jabalpur
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Jaipur
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Kochi
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Kolkata
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Lucknow
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Mumbai
                                        </a>

                                    </li>

                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Srinagar
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">

                                        Act & Rules
                                    <i class='bx bx-chevron-down'></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="book.html" class="nav-link">
                                            AFT Act & Rules
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="team.html" class="nav-link">
                                            Army Act & Rules
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            Air Force Act & Rules

                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="restaurant.html" class="nav-link">
                                            Navy Act & Rules
                                        </a>
                                    </li>
                                </ul>
                            </li>



                            <li class="nav-item">
                                <a href="{{ route('vacancies.page') }}" class="nav-link {{ isActiveRoute('vacancies.page') }}">
                                    Vacancies
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">
                                    RTI
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <!-- Banner Area -->
    <div class="banner-area" style="height: 400px;">
        <div class="container">
            <div class="banner-content">
                <h1>AFT-PB</h1>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->
