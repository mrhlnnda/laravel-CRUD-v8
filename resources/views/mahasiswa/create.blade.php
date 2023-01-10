<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form x-data="mahasiswaForm()" @submit.prevent='submitForm' class="bg-white rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Nama
                            </label>
                            <input x-model="formData.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                NIM
                            </label>
                            <input x-model="formData.nim" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text" placeholder="NIM">
                            
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Tahun Angkatan
                            </label>
                            <input x-model="formData.tahun_angkatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text" placeholder="YYYY-MM-DD">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Pembimbing
                            </label>
                            <input x-model="formData.pembimbing" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text" placeholder="Pembimbing">
                        </div>

                        <div class="flex items-center justify-between">
                            <button class="bg-indigo-50 hover:bg-indigo-100 font-bold py-2 px-4 border border-blue-700 rounded" type="submit">
                                Tambah
                            </button>
                        </div>
                        <script>
                            function mahasiswaForm() {
                                return {
                                    errors:{},
                                    formData: {
                                        'name':'',
                                        'nim':'',
                                        'tahun_angkatan':'',
                                        'pembimbing':'',
                                    },
                                    submitForm() {
                                        fetch('/mahasiswa/store', {
                                            method:"POST",
                                            body:JSON.stringify(this.formData),
                                            headers:{
                                                "X-CSRF-TOKEN":"{{ csrf_token() }}",
                                                'Content-Type':'application/json',
                                                'Accept':"application/json"
                                            }
                                        })
                                        .then(res=>res.json())
                                        .then((data)=>{
                                            
                                            if(data.status == 'ok' ){
                                                this.formData.name = '';
                                                this.formData.nim = '';
                                                this.formData.tahun_angkatan = '';
                                                this.formData.pembimbing = '';
                                                window.location.replace( "{{ route('mahasiswa') }}");
                                            }
                                        }).catch((e)=>{
                                            console.log(e);
                                        })
                                    }
                                }
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>