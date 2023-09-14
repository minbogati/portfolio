<section id="home" class="main-banner parallaxie" style="background: url({{ asset('backend/img/sliders/'.$data['sliders']->image ?? '') }})">
  <div class="heading">
    <h1>hello i'm {{ $data['sliders']->title }}</h1>
    <p>"{{ $data['sliders']->subtitle1 }}"</p>
    <h3 class="cd-headline clip is-full-width">
      <span>I'M </span>
      <span class="cd-words-wrapper">
        <b class="is-visible">{{ $data['sliders']->subtitle2 }}</b>
        <b>Web Developer</b>
        <b>Web Designer</b>
        <b>Fullstak Developer</b>
        <b>Digital Creator</b>
        <b>Graphics Designer</b>
        <b>Content Writer</b>
      </span>
    </h3>
  </div>
</section>