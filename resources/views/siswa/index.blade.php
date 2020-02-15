@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header">Daftar Siswa</div>
                <a href="{{route('siswa.create')}}"
                      class="btn btn-primary float-right">
                      Tambah data
                      </a>
                      </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table table-responsive">
                              <table class="table">
                              <thead>
                              <tr>
                                   <th>Nomor</th>
                                   <th>NIS</th>
                                   <th>Nama</th>
                                   <th>Alamat</th>
                                   <th>Kelas</th>
                                   <th>Mata Pelajaran</th>
                                   <th colspan="3">Aksi</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @php $no=1; @endphp
                                        @foreach($siswa as $data)
                                        <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{$data->nis}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->alamat}}</td>
                                        <td>{{$data->kelas->kelas}}</td>
                                        <td>
                                            @foreach ($data->mapel as $value)
                                            <ul>
                                            <li>{{ $value->nama }}</li>
                                            </ul>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('siswa.show', $data->id)}}" class="btn btn-info">Show</td></a>
                                        <td>
                                            <a href="{{route('siswa.edit', $data->id)}}" class="btn btn-success">Edit</td></a>
                                        <td>
                                            <form action="{{route('siswa.destroy', $data->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Apakah anda yakin ?');"
                                                class="btn btn-danger">
                                                DELETE
                                                </button>
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
    </div>
</div>
@endsection
