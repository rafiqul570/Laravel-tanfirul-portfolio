@include('pages.inc.header')
@include('pages.inc.navbar')
@include('pages.inc.hero')
@include('pages.inc.about')


  <!-- Projects Section -->
  <section class="py-5 bg-light" id="projects">
    <div class="container">
      <h2 class="text-center mb-5" data-aos="fade-up">My Portfolio</h2>

      <!-- Portfolio Cards -->
      <div class="row g-4">
        @if($posts->isEmpty())
              
        <h2 class="mt-5">Data Not Found....</h2>
        
        @else
        
        @forelse($posts as $post)
        <div class="col-md-4 project-item" data-category="laravel" data-aos="fade-up">
          <a href="#">
            <div class="card project-card">
            <img src="{{asset('uploads/image/'.$post->post_image)}}" class="card-img-top" alt="Project">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text"></p>
            </div>
          </div>
          </a>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </section>


  <!-- Contact Section -->
<section class="py-5" id="contact">
  <div class="container" data-aos="fade-up">
    <h2 class="text-center mb-4">Contact Me</h2>
    <form class="row g-3" action="{{ route('contact.store') }}" method="POST">
      @csrf
      <div class="col-md-6">
        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
      </div>
      <div class="col-md-6">
        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
      </div>
      <div class="col-md-6">
        <input type="number" name="phone" class="form-control" placeholder="Your Phone" required>
      </div>
      <div class="col-md-6">
        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
      </div>
      <div class="col-12">
        <textarea class="form-control" name="message" rows="4" placeholder="Your Message" required></textarea>
      </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-dark px-5">Send</button>
      </div>
    </form>
  </div>
</section>

@include('pages.inc.footer')


