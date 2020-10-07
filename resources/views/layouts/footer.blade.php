
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 Jdcaselaw</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="public/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/js/adminlte.min.js"></script>
    <script src="{{asset('public/js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
   @include('sweet::alert')
</script>
<script type="text/javascript">
    $(document).ready(function() {
var parts = $(location).attr('href').split("/");
var last_part = parts[parts.length-1];
    $(function(){
    var current = location.pathname;
    $('.nav-item a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if(last_part=='' && $this.attr('href')== './'){
            $this.addClass('active');
        }
        if($this.attr('href')== last_part){
        // console.log($this.parent().parent().parent(first-child))

            $this.addClass('active');
            $this.parent().parent().parent().children()[0].classList.add('active')
            $this.parent().parent().parent().addClass('menu-open')
        }
        
    })
})
})
</script>
</body>
</html>
