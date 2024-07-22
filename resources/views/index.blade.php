<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Princípios de Desenvolvimento de Software - Chatbot Saúde</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <section class="p-4">
  <div class="relative bg-clip-border bg-white text-gray-700 flex h-full min-h-[314px] w-full flex-col items-center justify-center rounded-xl !bg-gray-900 px-8">
    <div class="container mx-auto text-center">
      <h2 class="block antialiased tracking-normal font-sans text-4xl font-semibold leading-[1.3] text-white mb-4">Princípios de Desenvolvimento de Software</h2>
      <p class="block antialiased font-sans text-xl font-normal leading-relaxed text-white mb-8 opacity-70">Chatbot Saúde</p>
    </div>
  </div>
  <div class="px-10 pt-8 pb-16 -mt-16 lg:px-30 xl:px-40">
    <div class="grid gap-20 md:grid-cols-2 lg:grid-cols-2">
      <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-full lg:scale-105 z-10 translate-y-0">
        <div class="p-6 text-center w-full">
          <h5 class="antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-green-500 flex justify-center mt-2 mb-2">Entrada</h5>
          <ul class="flex flex-col items-left justify-start gap-3 pt-6 mt-2 mb-5">
            <div class="">
              <li class="flex items-center w-full gap-2 py-1 text-gray-700">
                <div class="mb-4 w-full">
                  <div class="relative h-11">Mensagem</label></div>
                    <textarea id="inputPergunta" name="inputPergunta" class="description  font-sans outline outline-0 focus:outline-0 font-normal text-blue-gray-700 bg-transparent peer w-full h-50 bg-gray-100 sec p-3 h-60 border border-gray-300 -none" spellcheck="false" placeholder="Insira sua pergunta"></textarea>
                </div>
              </li>
            </div>
          </ul><button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full flex items-center justify-center gap-4" type="button">Enviar <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
            </svg></button>
        </div>
      </div>
      <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-full lg:scale-105 z-10 translate-y-0">
        <div class="p-6 text-center w-full">
          <h5 class="antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-red-500 flex justify-center mt-2 mb-2">Saída</h5>
          <ul class="flex flex-col items-left justify-start gap-3 pt-6 mt-2 mb-5">
            <div class="">
              <li class="flex items-center w-full gap-2 py-1 text-gray-700">
                <div class="mb-4 w-full">
                  <div class="relative h-12">O chatbot vai responder a sua mensagem.</label></div>
                    <textarea id="outputPergunta" name="outputPergunta" class="description  font-sans outline outline-0 focus:outline-0 font-normal text-blue-gray-700 bg-transparent peer w-full h-50 bg-gray-100 sec p-3 h-60 border border-gray-300 -none" spellcheck="false" disabled></textarea>
                </div>
              </li>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>