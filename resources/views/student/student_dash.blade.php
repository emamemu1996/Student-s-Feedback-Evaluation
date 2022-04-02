@extends('layouts.student_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   


                    <div class="panel-body widget-shadow">
          
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
          
    <div class="table-responsive">
      <table id="customers" class="tablemanager">
    <thead>
      <tr>
         <th>Serial</th>
         <th>Teacher Name</th>
         <th>Course Name</th>
         <th>Session</th>
         <th> Action</th>
         
      </tr>
    </thead>
       <tbody>
           @php 
              $i=1;
              @endphp
                    @foreach($assignteacher as $assigntea)
                     
                <tr>
                  <td scope="row">{{$i++}}</td>
                  <td>{{$assigntea->tname}}</td>
                  <td>{{$assigntea->course}}</td>
                  <td>{{$assigntea->session}}</td>
                  
                  @php

                   $checkfeed = DB::table('feedback')->where('teacherid',$assigntea->teacherid)->where('studentid',$checkstudent->id)->where('batch',$checkstudent->batch)->where('shift',$checkstudent->shift)->first(); 

                   @endphp


                
                    @if($checkfeed)
         
                   <td>Done</td>
                  

                  @else

                    <td> 
                    <a href="{{route('feedback.show',$assigntea->teacherid)}}">Feedback</a>

                  </td>
                  @endif

             
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  
            
</div>


          
          </div>      




  
 
 
  
 
                    
       

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="./js/jquery-1.12.3.min.js"></script> -->
    <script src="{{asset('admin/js/sort.js')}}"></script>
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


</body>
</html>
@endsection


        
