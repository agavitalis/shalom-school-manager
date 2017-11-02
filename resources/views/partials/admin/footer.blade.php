 <!-- footer content -->
 
 
   <div class="clearfix"></div>
        <footer>
           @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ Session::get('success') }}
            </div>
          @endif

          @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
              {{ Session::get('error') }}
            </div>
          @endif
          <div class="pull-right">
            Powered By  <a href="https://oasis.com.ng">Oasis Professional Services</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


