<div class="banner text-center">
    <div class="container">





      <nav>
        <h1 class="logo">MotherNature</h1>
    </nav>

    <div class="hero">
        <img src="{{asset('usr_assets/images/tom.jpg')}}" alt="image" class="annimate-img">
        
        <div class="group">
            <div class="group-text">
                <h2><span class="class1">Looking</span></h2>
                <h2><span class="class2">Good</span></h2>
                <h2><span class="class3">and stunning</span></h2>
    
            </div>
    
            <div class="group-text">
                <h2><span class="class4">also</span></h2>
                <h2><span class="class5">Serene</span></h2>
                <h2><span class="class6">and Pretty</span></h2>
    
            <!-- </div>
            <button class="btn">Explore</button>
        </div> -->

    </div>
    <!-- background-color: red;padding-right: 34.507;padding-left: 43px;margin-top: 565px; -->



      {{-- <div class="row">
        <div class="col-lg-9 mx-auto">
          <h1 class="mb-5">What Would You <br> Like To Read Today?</h1>
          <ul class="list-inline widget-list-inline">
            
            @foreach ($categories as $category)
              <li class="list-inline-item"><a href="{{route('filter_by_category', $category->id) }}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div> --}}
    </div>
  
    
    {{-- <svg class="banner-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
        stroke-miterlimit="10" />
      <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
      <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
        stroke-miterlimit="10" />
    </svg> --}}
    
    {{-- <svg class="banner-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g filter="url(#filter0_d)">
        <path class="path"
          d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z" />
        <path
          d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z"
          stroke="#040306" stroke-miterlimit="10" />
      </g>
      <defs>
        <filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979" filterUnits="userSpaceOnUse"
          color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
          <feOffset dy="4" />
          <feGaussianBlur stdDeviation="2" />
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
        </filter>
      </defs>
    </svg> --}}
  
    
    {{-- <svg class="banner-shape-3" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
        stroke-miterlimit="10" />
      <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
      <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
        stroke-miterlimit="10" />
    </svg> --}}
  
    
    {{-- <svg class="banner-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1"
        stroke-width="2" />
    </svg> --}}
  </div>




  <style>

nav{
    min-height: 10vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo{
    color: green;
    font-size: 1.2rem;
    overflow: hidden;
}
.hero{
    height: 101vh;
    margin: 0 12%;
}

.hero img{
    width: 100%;
    height: 35%;
    object-fit: cover;
}

.group{
    position: absolute;
    left: 50%;
    top: 53%;
    transform: translate(-50%,-50%);
    color: rgb(233, 22, 22);
    display: flex;
    flex-direction: column;
}

.group-text{
    display: flex;
    font-size: 1.1rem;
}
.group-text span{
    padding: 0 .5rem;
    text-shadow:54px 100px 80px rgba(0, 0, 0, 0.07);
    display: block;
    color: rebeccapurple;
}

.group-text h2{
    overflow: hidden;
}
.group-text h2, .h2{
  font-size: 34px;
}

.btn{
    margin: 1rem;
    padding: .5rem 2rem;
    background-color: white;
    border: none;
    font-size: inherit;
    font-weight: 400;
    font-size: .8rem;
}

  </style>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"
  integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ==" crossorigin="anonymous" 
  referrerpolicy="no-referrer"></script>

  <Script>

const tl = gsap.timeline({
    default: {duration: .75, ease: "Power3.easeOut"} //Set default timeline
})

tl.fromTo(".annimate-img",
 {scale: 1.4, 
    borderRadius: "0rem"},

 {scale: 1,
     borderRadius: "1rem", 
     delay: 0.25,
    duration: 2,
    ease: "elastic.out(2.5,2.5)"
    })

    tl.fromTo(".class1", {x: "100%" , opacity: .5}, {x:0, opacity: 1}, "<30%")
    tl.fromTo(".class2", {y: "100%" , opacity: .5}, {y:0, opacity: 1}, "<30%")
    tl.fromTo(".class3", {x: "-100%" , opacity: .5}, {x:0, opacity: 1}, "<30%")
    tl.fromTo(".class4", {x: "100%" , opacity: .5}, {x:0, opacity: 1}, "<30%")
    tl.fromTo(".class5", {x: "100%" , opacity: .5}, {x:0, opacity: 1}, "<30%")
    tl.fromTo(".class6", {y: "-100%" , opacity: .5}, {y:0, opacity: 1}, "<30%")
    tl.fromTo(".btn", {y: 20 , opacity: 0}, {y:0, opacity: 1}, "<") //,borderRadius: "1rem"

    const logo = document.querySelector(".logo")
    const letter = logo.textContent.split("")

    console.log(letter)
    logo.textContent = ""

    letter.forEach((letter) =>{
        logo.innerHTML += `<span class="letter">${letter}</span>`//Backtick or Grave accent

    })

    gsap.set(".letter", {display: "inline-block"})
    gsap.fromTo(".letter",{y: "100%"}, {y:0, delay:1, stagger: .05, ease: "back.in"}) //, repeat: -1

  </Script>