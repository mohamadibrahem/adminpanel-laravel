  <footer class="main-footer">
    <div class="pull-left hidden-xs">
      <b>اصدار</b> 0.1.1
    </div>
    <strong>جميع الحقوق محفوظة 2019 <a href="http://mohamadibrahem.ml/">Mohamad Ibrahem</a>.</strong>
    
  </footer>
  <style>
		.control-sidebar-subheading,.control-sidebar-heading, .control-sidebar-subheading + p{
			display:none;
		}
  </style>
  <aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
    </ul>
    <div class="tab-content">
	<h4>Skins</h4>
      <div class="tab-pane" id="control-sidebar-home-tab">
			
      </div>
    </div>
  </aside>
</div>


<!-- jQuery 3 -->
<script src="{{ url('public/backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('public/backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ url('public/backend/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ url('public/backend/bower_components/morris.js/morris.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('public/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ url('public/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url('public/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('public/backend/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('public/backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ url('public/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ url('public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('public/backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('public/backend/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/backend/dist/js/demo.js') }}"></script>



@yield('javascript')