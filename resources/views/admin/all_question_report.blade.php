

@include('adminlayouts.admin_css')




  <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="forms">
     
          <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4>All Question Report</h4>
            </div>


            
        
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



  <br>
  <br>
          
    <div class="table-responsive">
      <table id="customers">
    <thead>
      <tr>
         <th>Serial</th>
         @foreach($questiondata as $question)

           <th>{{$question->questionname}}</th>


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







































          
      </div>
    </div>




   @include('adminlayouts.admin_js')