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
            <h1 class="m-0">Punishment</h1>
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
               <table id="punishment_table" class="table" width="100%" style="font-size: 12px">
                    <thead>
                        <tr>
                          <th>#</th>
                            <th class="th-sm" style="width: 70%">Name</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($punishments as $key=>$punishment)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$punishment->name}}</td>
                          <td><div style="display: flex;"><button type="button" class="btn btn-primary edit_punishment_button"   name="{{$punishment->name}}" cat_id="{{$punishment->id}}"><i class="fas fa-edit"></i></button>
                            @if(Auth::user()->hasRole('Admin'))
                            <form action="{{ url('/delete_punishment', ['id' => $punishment->id]) }}" method="post" name='delete_punishment_form{{$punishment->id}}' style="margin-bottom: 0">
                            
                            @csrf
                            @method('delete')
                              <button style="margin-left: 5px" type="button" class="btn btn-danger delete_punishment_button" name="{{$punishment->id}}"><i class="fas fa-trash"></i></button></form>@endif</div></td>
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
        <form action="add_punishment" method="post">
          @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Punishment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Punishment Name</label>
                    <input type="text" class="form-control" name="punishment_name" placeholder="Please Add Punishment" required>
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
        <form action="edit_punishment" method="post">
          @csrf
<div class="modal fade" id="editpunishmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Punishment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Punishment Name</label>
                    <input type="text" class="form-control" name="punishment_name" placeholder="Please Add Punishment" required id='edit_punishment_name'>
                    <input style="display: none" type="number" class="form-control" name="id" required id='edit_punishment_id'>
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
    $('#punishment_table').DataTable();
});
  $(".edit_punishment_button").click(function(){
    $('#edit_punishment_name').val($(this).attr('name'));
    $('#edit_punishment_id').val($(this).attr('cat_id'));
    $('#editpunishmentModal').modal('show')
});
$(".delete_punishment_button").click(function(){
  var temp =$(this);
    swal({
      title: "Are you sure?",
      text: 'This will delete the record permanently',
      icon: "info",
      buttons: true,
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
      $('form[name="delete_punishment_form'+temp.attr('name')+'"]').submit();      
    }
      else{
      return false;
      } 
    })

});
$('#exampleModal').on('shown.bs.modal', function () {
    $('input:text:visible:first', this).focus();
})
$('#editpunishmentModal').on('shown.bs.modal', function () {
    $('input:text:visible:first', this).focus();
})  
</script>
@endsection()