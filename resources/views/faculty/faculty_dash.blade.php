@extends('layouts.faculty_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              




   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
   
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="panel-body widget-shadow">

 <!--  <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addfaculty"> Add question</button> -->

<style type="text/css">
  #numrows{
    width: 200px;
    padding: 10px;
  } 

  #for_numrows{
    margin-left: 12px;
  } 
  #for_filter_by{
    margin-left: 12px;
  } 
  #filter_by{
    width: 150px;
    float: right;
    margin-bottom: 5px;
  }
  #filter_input{
    margin-bottom: 5px;
  }
</style>


  <br>
  <br>
  <a href="{{route('report_pdf')}}" target="__BLANK" class="btn btn-info" style="margin:10px;"> <i class="fa fa-download"></i> </a>
          
    <div class="table-responsive">
      <table id="customers" class="tablemanager">
    <thead>
      <tr>
         <th>Serial <i class="fa fa-sort"></i></th>
         <th>Teacher Name <i class="fa fa-sort"></i></th>
         <th>Department <i class="fa fa-sort"></i></th>
         <th>Batch <i class="fa fa-sort"></i></th>
         <th>Shift <i class="fa fa-sort"></i></th>
         <th>Course <i class="fa fa-sort"></i></th>
         <th>Total performance <i class="fa fa-sort"></i></th>
         <th class="disableSort">Details</th>
         <th>Total Student <i class="fa fa-sort"></i></th>
         @foreach($questiondata as $question)

           <th>{{$question->questionname}} <i class="fa fa-sort"></i> </th>


         @endforeach
         
      </tr>
    </thead>
       <tbody>
           @php 
              $i=1;
              @endphp
                    @foreach($feedbackdata as $feedback)
                     
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$feedback->tname}}</td>
                  <td>{{$feedback->department}}</td>
                  <td>{{$feedback->batch}}</td>
                  <td>{{$feedback->shift}}</td>
                  <td>{{$feedback->course}}</td>
                  <td>{{round((($feedback->tone*100)/(5*$feedback->tstudent)+($feedback->ttwo*100)/(5*$feedback->tstudent)+($feedback->tthree*100)/(5*$feedback->tstudent)+($feedback->tfour*100)/(5*$feedback->tstudent)+($feedback->tfive*100)/(5*$feedback->tstudent)+($feedback->tsix*100)/(5*$feedback->tstudent)+($feedback->tseven*100)/(5*$feedback->tstudent)+($feedback->teight*100)/(5*$feedback->tstudent)+($feedback->tnine*100)/(5*$feedback->tstudent)+($feedback->tten*100)/(5*$feedback->tstudent))/10,2)}} %</td>
                  <td> <a href="{{route('faculty_report_details',$feedback->tid)}}" class="btn btn-success">Details</a> </td>
                  <td>{{$feedback->tstudent}}</td>
                  <td>{{round(($feedback->tone*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->ttwo*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tthree*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tfour*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tfive*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tsix*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tseven*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->teight*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tnine*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tten*100)/(5*$feedback->tstudent),2)}} %</td>

                  
               
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  
           
</div>


          
          </div>      









        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
  <script src="{{asset('admin/js/sort.js')}}"></script>
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <!--//scrolling js-->
  <!-- Bootstrap Core JavaScript -->
   <script src="{{asset('admin/js/bootstrap.js')}}"> </script>
    <script type="text/javascript">
    // basic usage
    $('.tablemanager').tablemanager({
      firstSort: [[3,0],[2,0],[1,'asc']],
      disable: ["last"],
      appendFilterby: true,
      dateFormat: [[4,"mm-dd-yyyy"]],
      debug: true,
      vocabulary: {
    voc_filter_by: 'Filter By',
    voc_type_here_filter: 'Filter...',
    voc_show_rows: 'Rows Per Page'
  },
      pagination: true,
      showrows: [20,30,40,50,100],
      disableFilterBy: [1]
    });
    // $('.tablemanager').tablemanager();
  </script>
  <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>








</div>
    </div>
</div>


</body>
</html>
@endsection

