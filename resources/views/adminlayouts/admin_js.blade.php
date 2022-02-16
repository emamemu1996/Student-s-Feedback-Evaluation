<link href="css/jqvmap.css" rel='stylesheet' type='text/css' />
            <script src="js/jquery.vmap.js"></script>
            <script src="js/jquery.vmap.sampledata.js" type="text/javascript"></script>
            <script src="js/jquery.vmap.world.js" type="text/javascript"></script>
            <script type="text/javascript">
              jQuery(document).ready(function() {
                jQuery('#vmap').vectorMap({
                  map: 'world_en',
                  backgroundColor: '#fff',
                  color: '#696565',
                  hoverOpacity: 0.8,
                  selectedColor: '#696565',
                  enableZoom: true,
                  showTooltip: true,
                  values: sample_data,
                  scaleColors: ['#585858', '#696565'],
                  normalizeFunction: 'polynomial'
                });
              });
            </script>

 
  </div>
  <!-- Classie -->
    <script src="{{asset('admin/js/classie.js')}}"></script>
    <script>
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;
        
      showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
      };
      
      function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
          classie.toggle( showLeftPush, 'disabled' );
        }
      }
    </script>
  <!--scrolling js-->
  <script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <!--//scrolling js-->
  <!-- Bootstrap Core JavaScript -->
   <script src="{{asset('admin/js/bootstrap.js')}}"> </script>
</body>
</html>