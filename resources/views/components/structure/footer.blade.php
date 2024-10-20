

<footer class="bg-google-decoration">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
                <x-application-logo class="h-8" />
                <div class="flex justify-center items-center">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PROFILE</span>
                    <span class="self-center text-2xl font-semibold whitespace-nowrap  text-primary">AI</span>
                </div>
            </a>
            <ul class="flex flex-wrap items-center mt-4 md:mt-0 mb-6 text-sm font-medium text-gray-200 sm:mb-0 d">
                <li>
                    <a href="{{route('terms.show')}}" class="hover:underline me-4 md:me-6">Terminos de uso</a>
                </li>
                <li>
                    <a href="{{route('policy.show')}}" class="hover:underline me-4 md:me-6">Política de privacidad</a>
                </li>
                <li>
                    <a href="{{route('legal.licencias')}}" class="hover:underline me-4 md:me-6">Licencia</a>
                </li>
                <li>
                    <a href="https://github.com/dovaldev" class="hover:underline me-4 md:me-6"">Github</a>
                </li>

                <li>
                    <a href="https://github.com/dovaldev/laravel-cloudinary-hackathon" class="hover:underline">Repositorio Github</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-600 sm:mx-auto  lg:my-8" />
        <span class="block text-sm text-accent sm:text-center ">Haacktom Cloudinary 2024 <a href="/" class="text-primary">dovaldev</a>.</span>
    </div>
</footer>

