@extends('layout.main')

@section('content')
   <h3>DATA PEGAWAI</h3> 
    <div class="card">
        <div class="card-header">
        <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('employees/add') }}'">
            <i class="fas fa-plus-circle"></i> Add New Data
        </button>
        </div>
        <div class="card-body">
            @if (session('msg'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        @endif    
        <form method="GET">
          <div class="row mb-3">
            <label for="search" class="col-sm-2 col-form-label">Search Data</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm " placeholder="Please Input Key For Search Data..." name="search" autofocus value="{{ $search }}">              
            </div>
        </div>  
        </form>
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Employees</th>
                    <th>No Badge</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @php
                $nomor = 1 + (($employees->currentPage() - 1)* $employees->perPage());
              @endphp
                @foreach ($employees as $row)
                    <tr>
                        {{-- <th>{{ $loop->iteration }}</th> --}}
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $row->id_employees }}</td>
                        <td>{{ $row->no_badge }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jabatan }}</td>
                        <td>{{ $row->tanggal}}</td>
                        <td>{{ $row->jam_masuk }}</td>
                        <td>{{ $row->jam_keluar }}</td>
                        <td>{{ $row->keterangan=='H' ? 'Hadir': 'Sakit': 'Cuti' : 'Izin': 'Tanpa Keterangan' }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ url('employees/'.$row->id_employees) }}" class="btn btn-info btn-sm me-2" title="Edit Data">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <form onsubmit="return deleteData('{{ $row->nama }}')" style="display: inline" method="POST" action="{{ url('employees/'.$row->id_employees) }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                                </form>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{-- {{ $employees->links() }} --}}
                      {!! $employees->appends(Request::except('page'))->render() !!}
                    </div>
    </div>
    <script>
        function deleteData(name){
            pesan = confirm('Yakin data mahasiswa ini dihapus?');
            if(pesan) return true;
            else return false;
        }
    </script>
@endsection