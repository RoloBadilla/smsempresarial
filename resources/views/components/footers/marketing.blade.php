<footer class="footer-main">
    <div class="container py-5">
      <div class="row g-4 g-lg-5">
        @include('components.footers.contact-columns', ['titleClass' => 'footer-title', 'listClass' => 'mb-0'])
        <div class="col-md-6 col-lg-4">
          <h2 class="footer-title">Síguenos</h2>
          <p class="mb-3">Conéctate con nosotros en redes sociales:</p>
          @include('components.footers.social')
        </div>
      </div>
    </div>
    @include('components.footers.bottom')
  </footer>