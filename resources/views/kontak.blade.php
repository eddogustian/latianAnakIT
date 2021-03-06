
@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Nadyne Prata -  Table Kontak</h1>
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <hr>
            
       {!! Form::open(array('route' => 'import.file.kontak','method'=>'POST','files'=>'true')) !!}

        <div class="row">

           <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}

                    <div class="col-md-9">

                    {!! Form::file('sample_file', array('class' => 'form-control')) !!}

                    {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}

                    </div>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            {!! Form::submit('Upload',['class'=>'btn btn-primary']) !!}

            </div>

        </div>

       {!! Form::close() !!}
            <table class="table table-bordered" id="table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->email }}</td>
                        <td>{{ $datas->nohp }}</td>
                        <td>{{ $datas->alamat }}</td>
                        <td>
                            <form action="{{ route('kontak.destroy', $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('kontak.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.content -->
    </section>
<script>
  $(function () {
  $('#table').dataTable({
    paging: true,
    fixedHeader: {
      header: true
    },
        dom: 'Bfrtip',
        buttons: [
      {
        extend: 'excel',
        text: 'Excel <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
      },
        {
        extend: 'csv',
        text: 'CSV <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
      },
      {
        extend: 'pdf',
        text: 'PDF <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
      },
      
            'copy',
            'colvis'
        ],
    
  });
});
 </script>
    <!-- /.main-section -->
@endsection