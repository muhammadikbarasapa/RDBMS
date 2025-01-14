@extends('layout')

@section('content')
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Edit Plant</h4>
    <form action="{{route('plants.update', $plant->id)}}" method="POST" class="py-2">
        @csrf
        @method('PATCH')
        <div class="row py-2">
            <div class="col-md-6">
                <label for="kode_plant">Kode Plant</label>
                <input type="text" name="kode_plant" id="kode_plant"
                    class="bg-light form-control @error('kode_plant') is-invalid @enderror" placeholder="B001"
                    value="{{$plant['kode_plant']}}" disabled>
                @error('kode_plant')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="name">Name Plant</label>
                <input type="text" name="name" id="name"
                    class="bg-light form-control @error('name') is-invalid @enderror" placeholder="Bunga Matahari"
                    value="{{$plant['name']}}">
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
                    <option value="Bunga" {{$plant['type'] == 'Bunga' ? 'selected' : '-'}}>Bunga</option>
                    <option value="Obat" {{$plant['type'] == 'Obat' ? 'selected' : '-'}}>Obat</option>
                    <option value="Buah-Buahan" {{$plant['type'] == 'Buah-Buahan' ? 'selected' : '-'}}>Buah-Buahan
                    </option>
                    <option value="Kacang-Kacangan" {{$plant['type'] == 'Kacang-Kacangan' ? 'selected' : '-'}}>
                        Kacang-Kacangan</option>
                    <option value="Rumput" {{$plant['type'] == 'Rumput' ? 'selected' : '-'}}>Rumput</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-12">
                <label for="additional">Notes</label>
                <textarea name="additional" id="additional"
                    class="bg-light form-control @error('additional') is-invalid @enderror" rows="5"
                    cols="10">{{$plant['additional']}}</textarea>
                @error('additional')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-12">
                <label for="growth">Growth</label>
                <select name="growth" id="growth" class="bg-light form-control @error('growth') is-invalid @enderror">
                    <option hidden selected disabled>--select growth--</option>
                    <option value="Tunas" {{$plant['growth'] == 'Tunas' ? 'selected' : ''}}>Tunas</option>
                    <option value="Tumbuh Cabang dan Daun" {{$plant['growth'] == 'Tumbuh Cabang dan Daun' ? 'selected' : ''}}>Tumbuh Cabang dan Daun</option>
                    <option value="Berbunga atau Berbuah" {{$plant['growth'] == 'Berbunga atau Berbuah' ? 'selected' : ''}}>Berbunga atau Berbuah</option>
                </select>
                @error('growth')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom">
            <button type="submit" class="btn btn-primary mr-3">Save Update</button>
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