<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <section class="p-4">
  <div class="relative bg-clip-border bg-white text-gray-700 flex h-full min-h-[314px] w-full flex-col items-center justify-center rounded-xl !bg-gray-900 px-8">
    <div class="container mx-auto text-center">
      <h2 class="block antialiased tracking-normal font-sans text-4xl font-semibold leading-[1.3] text-white mb-4">Pricing</h2>
      <p class="block antialiased font-sans text-xl font-normal leading-relaxed text-white mb-8 opacity-70">Choose the perfect plan for your dining experience</p>
    </div>
  </div>
  <div class="px-10 pt-8 pb-16 -mt-16 lg:px-30 xl:px-40">
    <div class="grid gap-20 md:grid-cols-2 lg:grid-cols-2">
      <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md lg:h-max lg:scale-105 z-10 translate-y-0">
        <div class="p-6 text-center w-full">
          <h5 class="antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-green-500 flex justify-center mt-2 mb-2">Entrada</h5>
          <ul class="flex flex-col items-left justify-start gap-3 pt-6 mt-2 mb-5">
            <div class="">
              <li class="flex items-center w-full gap-2 py-1 text-gray-700">
                <div class="mb-4 w-full">
                  <div class="relative h-11">
                    <input type="textarea" name="Message" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 disabled:cursor-not-allowed transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent placeholder:opacity-0 focus:placeholder:opacity-100 text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-gray-900" placeholder=" " /><label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">Enter your message </label></div>
                </div>
              </li>
            </div>
          </ul><button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full flex items-center justify-center gap-4" type="button">Enviar <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
            </svg></button>
        </div>
      </div>
      <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md lg:h-max lg:scale-105 z-10 translate-y-0">
        <div class="p-6 text-center">
          <h5 class="antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-green-500 flex justify-center mt-2 mb-2">Premium Plan</h5>
          <h3 class="antialiased tracking-normal font-sans text-3xl font-semibold leading-snug text-blue-gray-900 flex justify-center mt-5 mb-2">$19.99<span class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-blue-gray-900 self-end -translate-y-1">/per month</span></h3>
          <ul class="flex flex-col items-center justify-start gap-3 pt-6 mt-2 mb-5">
            <div class="">
              <li class="flex items-center gap-2 py-1 text-gray-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                </svg>
                <p class="block antialiased font-sans text-base leading-relaxed font-normal text-inherit">Online ordering</p>
              </li>
              <li class="flex items-center gap-2 py-1 text-gray-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                </svg>
                <p class="block antialiased font-sans text-base leading-relaxed font-normal text-inherit">24/7 support</p>
              </li>
              <li class="flex items-center gap-2 py-1 text-gray-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                </svg>
                <p class="block antialiased font-sans text-base leading-relaxed font-normal text-inherit">Special events access</p>
              </li>
            </div>
          </ul><button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full flex items-center justify-center gap-4" type="button">join <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
            </svg></button>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>