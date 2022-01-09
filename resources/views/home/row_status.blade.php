<a class="section section-banner d-none d-xl-block"
   href="/"
   target="_blank" style="background-image: url({{url('images/background-02-1920x60.jpg')}});
   background-image: -webkit-image-set( url({{url('images/background-02-1920x60.jpg')}}) 1x,
   url({{url('images/background-02-3840x120.jpg')}}) 2x )">
    Наші вітання, {{auth()->check() ? auth()->user()->name : 'Гість'}} </a>
