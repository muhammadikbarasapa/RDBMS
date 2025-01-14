@extends('layout')

@section('content')
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Create New Plant</h4>
    <form action="{{route('plants.store')}}" method="POST" class="py-2">
        @csrf
        <div class="row py-2">
            <div class="col-md-6">
                <label for="kode_plant">Kode Plant</label>
                <input type="text" name="kode_plant" id="kode_plant" class="bg-light form-control @error('kode_plant') is-invalid @enderror" placeholder="B001">
                @error('kode_plant')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="name">Name Plant</label>
                <input type="text" name="name" id="name" class="bg-light form-control @error('name') is-invalid @enderror" placeholder="Bunga Matahari">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-12">
                <label for="lastname">Type</label>
                <select name="type" id="type" class="bg-light form-control @error('type') is-invalid @enderror">
                    <option hidden selected disabled>--select type--</option>
                    <option value="Bunga">Bunga</option>
                    <option value="Obat">Obat</option>
                    <option value="Buah-Buahan">Buah-Buahan</option>
                    <option value="Kacang-Kacangan">Kacang-Kacangan</option>
                    <option value="Rumput">Rumput</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-12">
                <label for="additional">Notes</label>
                <textarea name="additional" id="additional" class="bg-light form-control @error('additional') is-invalid @enderror" rows="5" cols="10"></textarea>
                @error('additional')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom">
            <button type="submit" class="btn btn-primary mr-3">Save</button>
            <a href="{{route('plants.index')}}" class="btn border button">Cancel</a>
        </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div>
                <b>Plants</b>
                <p>see all plants data</p>
            </div>
            <div class="ml-auto">
                <a href="{{route('plants.index')}}" class="btn danger">Go to Page</a>
            </div>
        </div>
    </form>
</div>
@endsection
