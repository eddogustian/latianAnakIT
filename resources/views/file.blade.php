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
            <table class="table table-bordered" id="table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Filename</th>
                    <th>File</th>
                    <th>waktu bikin</th>
                    <th>waktu update</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->name }}</td>
                        <td><img src="{{ url('uploads/file/'.$datas->file) }}" style="width: 150px; height: 150px;"> </td>
                        <td>{{ $datas->created_at }}</td>
                        <td>{{ $datas->updated_at }}</td>
                        <td>
                            <form action="{{ route('file.destroy', $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('file.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
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
    <!-- /.main-section -->
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
@endsection