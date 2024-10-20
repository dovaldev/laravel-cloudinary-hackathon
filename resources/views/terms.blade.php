<x-guest-layout>
    <div class="pt-">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-3xl mt-6 p-6 bg-google-decoration shadow-md overflow-hidden sm:rounded-lg prose *:text-white [&>p>strong]:text-primary [&>p>a]:text-primary [&>ul>li>strong]:text-primary  [&>a]:text-primary [&>h1]:text-primary [&>h2]:text-primary-ligth">
                {!! $terms !!}
            </div>
        </div>
    </div>
</x-guest-layout>
