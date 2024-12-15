    @extends('layout.app')

    @section('content')
    @extends('layout.app')

    @section('content')
    <div class="bg-[#F6F6D9] min-h-screen flex justify-center items-center">
        <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold italic text-[#FF800] mb-6 text-center">Keluhan</h1>

            <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Provinsi -->
                <div class="mb-4">
                    <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi*</label>
                    <select id="provinsi" name="provinsi" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#FF8000]">
                        <option value="">Pilih</option>
                    </select>
                </div>

                <!-- Kota/Kabupaten -->
                <div class="mb-4">
                    <label for="kota" class="block text-sm font-medium text-gray-700">Kota/Kabupaten*</label>
                    <select id="kota" name="kota" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#FF8000]" disabled>
                        <option value="">Pilih</option>
                    </select>
                </div>

                <!-- Kecamatan -->
                <div class="mb-4">
                    <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan*</label>
                    <select id="kecamatan" name="kecamatan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#FF8000]" disabled>
                        <option value="">Pilih</option>
                    </select>
                </div>

                <!-- Kelurahan -->
                <div class="mb-4">
                    <label for="kelurahan" class="block text-sm font-medium text-gray-700">Kelurahan*</label>
                    <select id="kelurahan" name="kelurahan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#FF8000]" disabled>
                        <option value="">Pilih</option>
                    </select>
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type*</label>
                    <select id="type" name="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#FF8000]">
                        <option value="kejahatan" selected>Kejahatan</option>
                    </select>
                </div>

                <!-- Detail Keluhan -->
                <div class="mb-4">
                    <label for="detail" class="block text-sm font-medium text-gray-700">Detail Keluhan*</label>
                    <textarea id="detail" name="detail" rows="4" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#FF8000]"></textarea>
                </div>

                <!-- Gambar Pendukung -->
                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Pendukung*</label>
                    <input type="file" id="gambar" name="gambar" class="mt-1 block w-full text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#FF8000] file:bg-gray-200 file:text-gray-700 file:py-1 file:px-3 file:border-none">
                </div>

                <!-- Checkbox -->
                <div class="mb-4 flex items-start">
                    <input type="checkbox" id="konfirmasi" name="konfirmasi" class="h-4 w-4 text-[#FF8000] border-gray-300 rounded focus:ring focus:ring-[#FF8000]">
                    <label for="konfirmasi" class="ml-2 block text-sm text-gray-700">Laporan yang disampaikan sesuai dengan kebenaran.</label>
                </div>

                <!-- Tombol Kirim -->
                <div class="text-center">
                    <button type="submit" class="bg-[#00463E] hover:bg-[#006655] text-white font-semibold py-2 px-4 rounded-md transition duration-300">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function () {
        // Load Provinsi
        $.ajax({
            url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
            type: "GET",
            success: function (response) {
                response.forEach(prov => {
                    $('#provinsi').append(`<option value="${prov.id}">${prov.name}</option>`);
                    
                });
            }
        });

        // Load Kota/Kabupaten
        $('#provinsi').on('change', function () {
            let provId = $(this).val();
            $('#kota').prop('disabled', false).html('<option value="">Pilih</option>');
            $.ajax({
                url: `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provId}.json`,
                type: "GET",
                success: function (response) {
                    response.forEach(kota => {
                        $('#kota').append(`<option value="${kota.id}">${kota.name}</option>`);
                    });
                }
            });
        });

        // Load Kecamatan
        $('#kota').on('change', function () {
            let kotaId = $(this).val();
            $('#kecamatan').prop('disabled', false).html('<option value="">Pilih</option>');
            $.ajax({
                url: `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kotaId}.json`,
                type: "GET",
                success: function (response) {
                    response.forEach(kec => {
                        $('#kecamatan').append(`<option value="${kec.id}">${kec.name}</option>`);
                    });
                }
            });
        });

        // Load Kelurahan
        $('#kecamatan').on('change', function () {
            let kecId = $(this).val();
            $('#kelurahan').prop('disabled', false).html('<option value="">Pilih</option>');
            $.ajax({
                url: `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecId}.json`,
                type: "GET",
                success: function (response) {
                    response.forEach(desa => {
                        $('#kelurahan').append(`<option value="${desa.id}">${desa.name}</option>`);
                    });
                }
            });
        });
    });

    </script>
    @endsection

