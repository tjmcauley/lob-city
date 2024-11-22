<x-app-layout>
    <x-slot name="header">
        <style>
            h1 {
                font-size: 150px
            }

            h2 {
                font-size: 50px
            }

            header {    
                height: 800px;
                width: 100vw;
                overflow: hidden;
            }

            img {
                object-fit: cover;
                opacity: 0.4;
                z-index: -1;
            }

            section {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-family: 'Helvetica';
            }
        </style>
        
        <img src="https://24.media.tumblr.com/4f128698c69f95a8881793b021cf2014/tumblr_mjan9lpopZ1rfimo0o1_400.gif" style="width:100%;">
            <section>
                <center>
                    <h1>Lob City</h1>
                    <h2>Hoopers' Network</h2>
                </center>
            </section>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
