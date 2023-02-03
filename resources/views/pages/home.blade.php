@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2">
                <a href="{{ route('padi.create') }}"><button type="submit" class="btn btn-primary">Tambah Data</button></a>
            </div>
            <form action="{{ route('search') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Semua Varietas" name="varietas" id="input1">
                    <input type="number" class="form-control" placeholder="Hasil Panen" name="panen" id="input2">
                    <input type="text" class="form-control" placeholder="Umur Padi (lebih)" name="umur" id="input3">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
            <div class="card">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Varietas</th>
                        <th scope="col">Hasil Panen</th>
                        <th scope="col">Hama</th>
                        <th scope="col">Dampak</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                            <tr>
                                <th>{{ $key+1 }}</th>
                                <th>{{ $data->varietas }}</th>
                                <td>{{ $data->hasil_sebelum }}</td>
                                <td>{{ $data->hama }}</td>
                                <td>{{ $data->hasil_terkena }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('padi.edit', $data->id) }}">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </a>
                                    <form action="{{ route('padi.destroy',$data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection
