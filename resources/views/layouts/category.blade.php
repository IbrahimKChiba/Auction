
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Tunisian Auction</title>

   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* stylelint-disable selector-list-comma-newline-after */

.blog-header {
  line-height: 1;
  border-bottom: 1px solid #e5e5e5;
}

.blog-header-logo {
  font-family: "Playfair Display", Georgia, "Times New Roman", serif;
  font-size: 2.25rem;
}

.blog-header-logo:hover {
  text-decoration: none;
}

h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display", Georgia, "Times New Roman", serif;
}

.display-4 {
  font-size: 2.5rem;
}
@media (min-width: 768px) {
  .display-4 {
    font-size: 3rem;
  }
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-scroller .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
}

.card-img-right {
  height: 100%;
  border-radius: 0 3px 3px 0;
}

.flex-auto {
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
}

.h-250 { height: 250px; }
@media (min-width: 768px) {
  .h-md-250 { height: 250px; }
}

/* Pagination */
.blog-pagination {
  margin-bottom: 4rem;
}
.blog-pagination > .btn {
  border-radius: 2rem;
}

/*
 * Blog posts
 */
.blog-post {
  margin-bottom: 4rem;
}
.blog-post-title {
  margin-bottom: .25rem;
  font-size: 2.5rem;
}
.blog-post-meta {
  margin-bottom: 1.25rem;
  color: #999;
}

/*
 * Footer
 */
.blog-footer {
  padding: 2.5rem 0;
  color: #999;
  text-align: center;
  background-color: #f9f9f9;
  border-top: .05rem solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}
    </style>
    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <script src="https://use.fontawesome.com/450684a7e9.js"></script>
  
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      <div class="col-md-6">
                        <div class="search">
                             <form action="">
                             <div class="row flex-nowrap justify-content-between align-items-center ">
                              <input type="text" name="recherche" value="" placeholder="Search">                                                       
                              <button type="submit" class="btn btn-danger"><i class="fa fa-search" aria-hidden="true"></i></button>
                           
                              </div>
                          </form>
                        </div>
     
     </div>  
     
     
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/">Tunisian Auction</a>
      </div>
      
      <div class="col-4 d-flex justify-content-end align-items-center">
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-danger" href="{{ url('/home') }}">Home</a>

                    @else
                        <a class="btn btn-danger" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-danger" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
      </div>
    </div>
    
  </header>
  
  <div class="nav-scroller py-1 mb-2">
          <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="#">Immobiler</a>
            <a class="p-2 text-muted" href="#">Véhicules</a>
            <a class="p-2 text-muted"  href="#">Pour la Maison et Jardin</a>
            <a class="p-2 text-muted" href="#">Loisirs et Divertisement</a>
            <a class="p-2 text-muted" href="#">Informatique et Multimedia</a>
            <a class="p-2 text-muted" href="#">Habillement</a>
            <a class="p-2 text-muted" href="#">Autres</a>
          </nav>
    </div>
        <div class="jumbotron p-12 p-md-5 text-white rounded bg-dark">
          <img src="/site/images/auction.jpg" class="mh-100" style="width: 100%; height:500px" alt="image"> 
        </div>
        
    <div class="row mb-2">
    @yield('content')
  </div>
</div>


<footer class="blog-footer">
 <p>
    <a class="text-danger" href="#">Back to top</a>
  </p>
</footer>
</body>
</html>
