 <!-- footer content -->
   <div class="clearfix"></div>
        <footer>
           @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong> {{ Session::get('success') }}</strong>
            </div>
          @endif

          @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong> {{ Session::get('error') }}</strong>
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


