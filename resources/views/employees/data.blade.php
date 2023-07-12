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
                    <th>Id Mahasiswa</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Phone</th>
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
                        <td>{{ $row->idemployees }}</td>
                        <td>{{ $row->fullname }}</td>
                        <td>{{ $row->gender=='L' ? 'Laki-Laki': 'Perempuan' }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->emailaddress }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ url('employees/'.$row->idemployees) }}" class="btn btn-info btn-sm me-2" title="Edit Data">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <form onsubmit="return deleteData('{{ $row->fullname }}')" style="display: inline" method="POST" action="{{ url('employees/'.$row->idemployees) }}">
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