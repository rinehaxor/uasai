@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('bis.update', $bis->id ) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="bis" class="form-label">bis</label>
                            <input type="text" class="form-control" id="bis" name="bis" value="{{$bis->bis}}">
                            @error('bis')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rombongan" class="form-label">Rombongan</label>
                            <input type="text" class="form-control" id="rombongan" name="rombongan" placeholder="Nama rombongan">
                            @error('rombongan')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="waktu_datang" class="form-label">waktu_datang</label>
                            <input type="text" class="form-control" id="waktu_datang" name="waktu_datang" placeholder="Nama Varietas" value="{{$bis->waktu_datang}}">
                            @error('waktu_datang')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="waktu_pulang" class="form-label">waktu_pulang</label>
                            <input type="text" class="form-control" id="waktu_pulang" name="waktu_pulang" placeholder="Nama waktu_pulang" value="{{$bis->waktu_pulang}}">
                            @error('waktu_pulang')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="asal" class="form-label">asal</label>
                            <input type="text" class="form-control" id="asal" name="asal" placeholder="Nama asal" value="{{$bis->asal}}">
                            @error('asal')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>
@endsection