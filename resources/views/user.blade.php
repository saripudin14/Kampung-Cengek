<x-app-layout>
    <div class="py-12">
        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" flex font-bold p-6 text-gray-900 item items-center justify-between">
                    <h2>List Produk</h2>
                    <a href="{{ route('products.create') }}">
                        <button
                            class="bg-yellow-400 px-10 py-2 w-full rounded-end font-semibold flex items-center justify-center gap-2">
                            Tambah Produk
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </a>

                </div>


                <div class="grid md:grid-cols-3 grid-cols-1 py-3 pl-3 gap-6 pr-3">
                    @foreach ($products as $product)
                        <div>
                            <img src="{{url('storage/', $product->foto)}}">
                            <div class="my-2">
                                <p class="text-xl"> {{ $product->nama }} </p>
                                <p class="font-semibold text-gray-500"> Rp. {{ number_format($product->harga) }} </p>
                            </div>
                            <a href="{{ route('products.edit', $product) }}">
                                <button
                                    class="bg-yellow-400 px-10 py-2 w-full rounded-end font-semibold flex items-center justify-center gap-2">
                                    Edit
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 4.232a1 1 0 011.536 0l3 3a1 1 0 010 1.536l-9 9a1 1 0 01-.414.242l-4 1a1 1 0 01-1.212-1.212l1-4a1 1 0 01.242-.414l9-9zM16 7l-1.5-1.5M8 16l-4 4" />
                                    </svg>
                                </button>
                            </a>



                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>