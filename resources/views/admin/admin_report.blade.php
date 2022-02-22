

@include('adminlayouts.admin_css')




  <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="forms">
     
          <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4>View User:</h4>
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
         <th>Teacher Name</th>
         <th>Department</th>
         <th>Batch</th>
         <th>Shift</th>
         <th>Course</th>
         <th> Action</th>
         
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

                  
               
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  
           <div class="d-flex justify-content-center">
                {!! $feedbackdata->appends(['sort' => 'science-stream'])->links() !!}
            </div>  
</div>


          
          </div>      







































          
      </div>
    </div>




   @include('adminlayouts.admin_js')