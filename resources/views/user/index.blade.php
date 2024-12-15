@extends('layout.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .form-container {
        max-width: 400px;
        margin: 0 auto;
    }
    select, button {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 16px;
    }
</style>

<div id="wrap-option">
    <!-- Konten akan dimasukkan dengan AJAX -->
</div>

@if($reports->isEmpty())
    <p>No reports found.</p>
@else
    @foreach($reports as $report)
        <div class="p-4 border rounded-lg shadow mb-4">
            <h3 class="text-xl font-semibold">{{ $report->type }}</h3>
            <p>{{ $report->detail }}</p>
            <img src="{{ asset('storage/' . $report->gambar) }}" alt="Report Image" class="w-full max-h-48 object-cover my-2">
            <p class="text-gray-500">Wilayah: {{ $report->provinsi }} > {{ $report->kota }} > {{ $report->kecamatan }} > {{ $report->kelurahan }}</p>
            <button class="text-blue-500">Like</button>
            <button class="text-green-500">Comment</button>
        </div>
    @endforeach
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Panggil API untuk mendapatkan data provinsi
        $.ajax({
            method: "GET",
            url: "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
            dataType: "json",
            success: function(response) {
                let options = '<option value="">-- Select a Province --</option>';
                response.forEach(province => {
                    options += `<option value="${province.id}">${province.name}</option>`;
                });

                $('#wrap-option').html(`
                    <div class="form-container">
                        <h3>Select Input with Search</h3>
                        <form id="searchForm">
                            <label for="options">Choose a province:</label>
                            <select id="options" name="options">${options}</select>
                            <button type="button" id="searchButton">Search</button>
                        </form>
                        <div id="result" style="margin-top: 20px; font-size: 16px; color: #333;"></div>
                    </div>
                `);
            },
            error: function(error) {
                $('#wrap-option').html('<p>Failed to load options. Please try again later.</p>');
            }
        });

        $(document).on('click', '#searchButton', function() {
            const selectedValue = $('#options').val();
            if (!selectedValue) {
                alert('Please select a province!');
            } else {
                alert(`You selected province with ID: ${selectedValue}`);
            }
        });
    });
</script>
@endsection
