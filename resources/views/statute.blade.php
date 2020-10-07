@extends('layouts.master')

  <link rel="stylesheet" href="public/css/jquery.dataTables.min.css">


@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Statute</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              
            <div class="card card-outline">
              <div class="card-header" style="display: inline-flex;">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
 Add 
</button>
              </div>
              <div class="card-body">
               <table id="statute_table" class="table" width="100%" style="font-size: 12px">
                    <thead>
                        <tr>
                          <th>#</th>
                            <th class="th-sm" style="width: 70%">Name</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($statutes as $key=>$statute)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$statute->name}}</td>
                          <td><div style="display: flex;"><button type="button" class="btn btn-primary edit_statute_button"   name="{{$statute->name}}" cat_id="{{$statute->id}}"><i class="fas fa-edit"></i></button>
                            @if(Auth::user()->hasRole('Admin'))
                            <form action="{{ url('/delete_statute', ['id' => $statute->id]) }}" method="post" name='delete_statute_form{{$statute->id}}' style="margin-bottom: 0">
                            
                            @csrf
                            @method('delete')
                              <button style="margin-left: 5px" type="button" class="btn btn-danger delete_statute_button" name="{{$statute->id}}"><i class="fas fa-trash"></i></button></form>@endif</div></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- Modal -->
        <form action="add_statute" method="post">
          @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Statute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Statute Name</label>
                    <input type="text" class="form-control" name="statute_name" placeholder="Please Add Statute" required>
                  </div>
                 
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>
        </form>

<!-- edit -->
<!-- Modal -->
        <form action="edit_statute" method="post">
          @csrf
<div class="modal fade" id="editstatuteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Statute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Statute Name</label>
                    <input type="text" class="form-control" name="statute_name" placeholder="Please Add Statute" required id='edit_statute_name'>
                    <input style="display: none" type="number" class="form-control" name="id" required id='edit_statute_id'>
                  </div>
                 
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>
        </form>


@endsection



@section('footer')
<script src="public/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {
    $('#statute_table').DataTable();
});
  $(".edit_statute_button").click(function(){
    $('#edit_statute_name').val($(this).attr('name'));
    $('#edit_statute_id').val($(this).attr('cat_id'));
    $('#editstatuteModal').modal('show')
});
$(".delete_statute_button").click(function(){
  var temp =$(this);
    swal({
      title: "Are you sure?",
      text: 'This will delete the record permanently',
      icon: "info",
      buttons: true,
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
      $('form[name="delete_statute_form'+temp.attr('name')+'"]').submit();      
    }
      else{
      return false;
      } 
    })

});
$('#exampleModal').on('shown.bs.modal', function () {
    $('input:text:visible:first', this).focus();
})
$('#editstatuteModal').on('shown.bs.modal', function () {
    $('input:text:visible:first', this).focus();
})  
</script>
@endsection()