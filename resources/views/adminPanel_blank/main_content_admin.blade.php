<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      @include('adminPanel_blank.above_card_admin')
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            {{-- <p class="main"> This place for main content</p> --}}
            @yield('content2')
         
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>