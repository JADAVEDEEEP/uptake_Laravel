<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
 
</head>
<body>  
  <header class="container">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow" style="display:flex;justify-content:space-between">
      <h5 class="my-0 mr-md-auto font-weight-bold">Uptake Infotech</h5>
      <nav class="my-2 d-flex">
        <a class="p-2 nav-link" href="{{ route('about-us') }}">About us</a>
        <a class="p-2 nav-link" href="#">Enterprise</a>
        <a class="p-2 nav-link" href="#">Support</a>
        <a class="p-2 nav-link" href="#">Pricing</a>
      </nav>
      <a class="btn btn-outline-primary" href="{{ route('regist-name') }}">Sign up</a>
    </div>
    <div class="row">               
        <div class="content-column mt-5 col-lg-5 col-md-6 col-sm-12 order-2">
            <div class="inner-column">
                <div class="sec-title">
                    <span class="title ">About Company</span>
                    <h2>We are leader in <br>Industrial market Since 1992</h2>
                </div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</div>
                <ul class="list-style-one">
                    <li>Lorem Ipsum is simply dummy tex</li>
                    <li>Consectetur adipisicing elit</li>
                    <li>Sed do eiusmod tempor incididunt</li>
                </ul>
                <div class="btn-box">
                    <a href="#" class="theme-btn btn-style-one">Contact Us</a>
                </div>
            </div>
        </div>
       
        <!-- Image Column -->
        <div class="image-column mt-5 col-lg-6 col-md-12 col-sm-12">
            <div class="inner-column wow fadeInLeft">
                <figure class="image-1"><a href="#" class="lightbox-image" data-fancybox="images"><img src="https://i.ibb.co/QP6Nmpf/image-1-about.jpg" alt=""></a></figure>
                <figure class="image-2"><a href="#" class="lightbox-image" data-fancybox="images"><img src="https://i.ibb.co/JvN0NVB/image-2-about.jpg" alt=""></a></figure>
            </div>
        </div>
    </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
              <li><a class="text-muted" href="#">Team feature</a></li>
              <li><a class="text-muted" href="#">Stuff for developers</a></li>
              <li><a class="text-muted" href="#">Another one</a></li>
              <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
              <li><a class="text-muted" href="#">Another resource</a></li>
              <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    </header>
</body>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
</body>
</html>
