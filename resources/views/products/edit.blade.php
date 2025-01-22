<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Heading -->
                <div class="flex items-center justify-between font-bold px-6 py-4 bg-gray-100 border-b border-gray-200">
                    <h2 class="text-lg text-gray-900">Edit Produk</h2>
                    @include('products.partials.delete-product', ['product' => $product])
                </div>

                <!-- Form Container -->
                <div class="py-6 px-6" x-data="{ imageUrl: '/storage/{{$product->foto}}' }">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('product.update', $product) }}"
                        enctype="multipart/form-data" class="flex gap-8">
                        @csrf
                        @method('PUT')
                        <!-- Image Preview -->
                        <div class="w-1/2">
                            <img :src="imageUrl" alt="Image Preview" class="rounded-md w-full h-auto object-cover" />
                        </div>

                        <!-- Input Fields -->
                        <div class="w-1/2">
                            <!-- Foto -->
                            <div class="mb-4">
                                <x-input-label for="foto" :value="__('Foto Produk')" />
                                <input id="foto" class="block mt-1 w-full border p-3 rounded-md" type="file" name="foto"
                                    accept="image/*" @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                            </div>

                            <!-- Nama -->
                            <div class="mb-4">
                                <x-input-label for="nama" :value="__('Nama Produk')" />
                                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                                    :value="$product->nama" />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>

                            <!-- Harga -->
                            <div class="mb-4">
                                <x-input-label for="harga" :value="__('Harga Produk')" />
                                <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga"
                                    x-data="{ value: '{{ number_format($product->harga ?? 0, 0, ',', '.') }}' }"
                                    x-on:input="value = $el.value.replace(/[^\d]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                                    x-bind:value="value" />
                                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                            </div>



                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <x-input-label for="deskripsi" :value="__('Deskripsi Produk')" />
                                <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi"
                                    :value="$product->deskripsi" />
                                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end mt-6">
                                <x-primary-button class="py-3 px-6">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>