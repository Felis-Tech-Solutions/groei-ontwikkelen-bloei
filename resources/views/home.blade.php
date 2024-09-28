@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- @dump($data->get('title')) -->


@endsection
@section('aboutus')
<div class="px-6 py-32 lg:px-8">
  <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
    <p class="text-base font-semibold leading-7 text-indigo-600">Wie ben ik</p>
    <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Susanne Feer</h1>
    <p class="mt-6 text-xl leading-8">Aliquet nec orci mattis amet quisque ullamcorper neque, nibh sem. At arcu, sit dui mi, nibh dui, diam eget aliquam. Quisque id at vitae feugiat egestas ac. Diam nulla orci at in viverra scelerisque eget. Eleifend egestas fringilla sapien.</p>
    <div class="mt-10 max-w-2xl">
      <p>Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius sit neque erat velit. Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id.</p>
</div>

<div class="py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Diensten</h2>
    </div>
    <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      <li>
        <p class="mt-6 text-lg leading-8 text-gray-600"> Rouw & verlies</p>
        <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
        <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">Lindsay Walton</h3>
        <p class="text-base leading-7 text-gray-600">Front-end Developer</p>
      </li>
      <li>
        <p class="mt-6 text-lg leading-8 text-gray-600"> Rouw & verlies</p>
        <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
        <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">Lindsay Walton</h3>
        <p class="text-base leading-7 text-gray-600">Front-end Developer</p>
      </li>
      <li>
        <p class="mt-6 text-lg leading-8 text-gray-600"> Rouw & verlies</p>
        <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
        <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">Lindsay Walton</h3>
        <p class="text-base leading-7 text-gray-600">Front-end Developer</p>
      </li>

      <!-- More people... -->
    </ul>
  </div>
</div>

<section class="w-full px-6 py-24 sm:py-32 lg:px-8">
  <div class="max-w-2xl mx-auto">
    <div id="testimonial-slider" class="relative overflow-hidden">
      <div class="flex transition-transform duration-300" id="slides">
        <!-- Testimonial 1 -->
        <figure class="w-full flex-shrink-0">
          <p class="sr-only">5 out of 5 stars</p>
          <div class="flex gap-x-1 text-indigo-600">
            <!-- Star icons (use SVGs as in your original code) -->
            <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>
            <!-- Add more stars as needed -->
          </div>
          <blockquote class="mt-10 text-xl font-semibold leading-8 tracking-tight text-gray-900 sm:text-2xl sm:leading-9">
            <p>“Qui dolor enim consectetur do et non ex amet culpa sint in ea non dolore. Enim minim magna anim id minim eu cillum sunt dolore aliquip.”</p>
          </blockquote>
          <figcaption class="mt-10 flex items-center gap-x-6">
          <div class="text-sm leading-6">
              <div class="font-semibold text-gray-900">Judith Black</div>
              <div class="mt-0.5 text-gray-600">CEO of Workcation</div>
            </div>
            <img class="h-12 w-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=1024&h=1024&q=80" alt="">

          </figcaption>
        </figure>
        
        <!-- Testimonial 2 -->
        <figure class="w-full flex-shrink-0">
          <p class="sr-only">5 out of 5 stars</p>
          <div class="flex gap-x-1 text-indigo-600">
            <!-- Star icons -->
            <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>
          </div>
          <blockquote class="mt-10 text-xl font-semibold leading-8 tracking-tight text-gray-900 sm:text-2xl sm:leading-9">
            <p>“Amet elit laborum culpa irure incididunt adipisicing culpa amet officia exercitation.”</p>
          </blockquote>
          <figcaption class="mt-10 flex items-center gap-x-6">
            <img class="h-12 w-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=1024&h=1024&q=80" alt="">
            <div class="text-sm leading-6">
              <div class="font-semibold text-gray-900">John Doe</div>
              <div class="mt-0.5 text-gray-600">Founder of Example Inc.</div>
            </div>
          </figcaption>
        </figure>

        <!-- Testimonial 3 -->
        <figure class="w-full flex-shrink-0">
          <p class="sr-only">5 out of 5 stars</p>
          <div class="flex gap-x-1 text-indigo-600">
            <!-- Star icons -->
            <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>
          </div>
          <blockquote class="mt-10 text-xl font-semibold leading-8 tracking-tight text-gray-900 sm:text-2xl sm:leading-9">
            <p>“Eu non aute velit id velit Lorem elit anim pariatur.”</p>
          </blockquote>
          <figcaption class="mt-10 flex items-center gap-x-6">
            <img class="h-12 w-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=1024&h=1024&q=80" alt="">
            <div class="text-sm leading-6">
              <div class="font-semibold text-gray-900">Alice Johnson</div>
              <div class="mt-0.5 text-gray-600">Director at Example Co.</div>
            </div>
          </figcaption>
        </figure>
      </div>

      <!-- Navigation Buttons -->
      <div class="absolute inset-y-0 left-0 flex items-center">
        <button id="prevBtn" class="bg-white p-2 rounded-full shadow-md hover:bg-gray-200">
          &lt;
        </button>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center">
        <button id="nextBtn" class="bg-white p-2 rounded-full shadow-md hover:bg-gray-200">
          &gt;
        </button>
      </div>
    </div>
  </div>
</section>

<script>
  const slides = document.getElementById('slides');
  const totalSlides = slides.children.length;
  let currentIndex = 0;

  function showSlides(index) {
    slides.style.transform = `translateX(-${index * 100}%)`;
  }

  document.getElementById('nextBtn').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalSlides; // Loop back to the first
    showSlides(currentIndex);
  });

  document.getElementById('prevBtn').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // Loop back to the last
    showSlides(currentIndex);
  });

  // Initialize to show first 3 slides
  showSlides(0);
</script>

<style>
  #testimonial-slider {
    width: 100%;
    overflow: hidden;
  }
  #slides {
    display: flex;
  }
  figure {
    flex: 0 0 33.333%; /* Show 3 testimonials at once */
  }
</style>



<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->


@endsection