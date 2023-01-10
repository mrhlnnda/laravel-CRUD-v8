<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mahasiwsa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('mahasiswa.create') }}" class="bg-indigo-50 hover:bg-indigo-100 font-bold py-2 px-4 border border-blue-700 rounded">
                        Tambah Mahasiswa
                    </a>
                    <div 
                        class="py-6"
                        x-cloak
                        x-data="{
                            isLoading: true,
                            mahasiswas: {}
                        }"
                        x-init="fetch('/mahasiswa/list')
                                .then(response => response.json())
                                .then(data => {
                                    mahasiswas = data
                                    isLoading = false
                                })">
                        <table x-show="!isLoading" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th style="text-align: left;" class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nama</th>
                                    <th style="text-align: left;" class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">NIM</th>
                                    <th style="text-align: left;" class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Tahun Angkatan</th>
                                    <th style="text-align: left;" class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Pembimbing</th>
                                    <th style="text-align: left;" class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"></th>
                                </tr>
                            </thead>
                            <tbody class='bg-white dark:bg-slate-800'>
                                <template x-for="mahasiswa in mahasiswas" :key="mahasiswa.id">
                                    <tr>
                                        <td x-text="mahasiswa.name" class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 p-2"></td>
                                        <td x-text="mahasiswa.nim" class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 p-2"></td>
                                        <td x-text="mahasiswa.tahun_angkatan" class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 p-2"></td>
                                        <td x-text="mahasiswa.pembimbing" class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 p-2"></td>
                                        <td  class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 p-2">
                                            <a x-bind:href="'{{ route('mahasiswa.edit') . '/' }}'+ mahasiswa.id" class="bg-indigo-50 hover:bg-indigo-100 border border-blue-700 rounded px-2 mr-2">Update</button>
                                            <a x-bind:href="'{{ route('mahasiswa.delete') . '/' }}'+ mahasiswa.id" class="bg-indigo-50 hover:bg-indigo-100 border border-blue-700 rounded px-2 mr-2">Delete</a>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
