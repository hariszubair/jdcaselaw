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
            <h1 class="m-0">Category</h1>
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
               <table id="category_table" class="table" width="100%" style="font-size: 12px">
                    <thead>
                        <tr>
                          <th>#</th>
                            <th class="th-sm" style="width: 70%">Name</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $key=>$category)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$category->name}}</td>
                          <td><div style="display: flex;"><button type="button" class="btn btn-primary edit_category_button"   name="{{$category->name}}" cat_id="{{$category->id}}"><i class="fas fa-edit"></i></button>
                            @if(Auth::user()->hasRole('Admin'))
                            <form action="{{ url('/delete_category', ['id' => $category->id]) }}" method="post" name='delete_category_form{{$category->id}}' style="margin-bottom: 0">
                            
                            @csrf
                            @method('delete')
                              <button style="margin-left: 5px" type="button" class="btn btn-danger delete_category_button" name="{{$category->id}}"><i class="fas fa-trash"></i></button></form>@endif</div></td>
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
        <form action="add_category" method="post">
          @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Please Add Category" required>
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
        <form action="edit_category" method="post">
          @csrf
<div class="modal fade" id="editcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Please Add Category" required id='edit_category_name'>
                    <input style="display: none" type="number" class="form-control" name="id" required id='edit_category_id'>
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
    $('#category_table').DataTable();
});
  $(".edit_category_button").click(function(){
    $('#edit_category_name').val($(this).attr('name'));
    $('#edit_category_id').val($(this).attr('cat_id'));
    $('#editcategoryModal').modal('show')
});
$(".delete_category_button").click(function(){
  var temp =$(this);
    swal({
      title: "Are you sure?",
      text: 'This will delete the record permanently',
      icon: "info",
      buttons: true,
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
      $('form[name="delete_category_form'+temp.attr('name')+'"]').submit();      
    }
      else{
      return false;
      } 
    })

});
$('#exampleModal').on('shown.bs.modal', function () {
    $('input:text:visible:first', this).focus();
})
$('#editcategoryModal').on('shown.bs.modal', function () {
    $('input:text:visible:first', this).focus();
})  
</script>
@endsection()