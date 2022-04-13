

@include('adminlayouts.admin_css')




  <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
       


          <p>Student’s Feedback Evaluation</p>

     <br> 
            <div class="row-one">
          <div class="col-md-4 widget">
            <div class="stats-left" style="width:50%;">
              
              <h5>Total </h5>
              <h4>Students</h4>

            </div>
            <div class="stats-right" style="width:50%;">
              <label> {{$students}}</label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          
            
          <div class="col-md-4 widget states-mdl">
            <div class="stats-left" style="width:50%;">
              <h5>Total</h5>
              <h4>Teachers</h4>
            </div>
            <div class="stats-right" style="width:50%;">
              <label>{{$teacher_name}} </label>
            </div>
        
            <div class="clearfix"> </div> 
          </div>
          <div class="col-md-4 widget states-last">
            <div class="stats-left" style="width:50%;">
              <h5>Total </h5>
              <h4>Chairmans</h4>
            </div>
            <div class="stats-right" style="width:50%;">
              <label>{{$faculty}}</label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          <div class="clearfix"> </div> 
        </div>
        <br><br>


       <div class="row-one">
          <div class="col-md-4 widget">
            <div class="stats-left" style="width:50%;">
              
              <h5>Total </h5>
              <h4>Shift</h4>

            </div>
            <div class="stats-right" style="width:50%;">
              <label> {{$shift}}</label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          
            
          <div class="col-md-4 widget states-mdl">
            <div class="stats-left" style="width:50%;">
              <h5>Total</h5>
              <h4>Batch</h4>
            </div>
            <div class="stats-right" style="width:50%;">
              <label>{{$batch}} </label>
            </div>
        
            <div class="clearfix"> </div> 
          </div>
          <div class="col-md-4 widget states-last">
            <div class="stats-left" style="width:50%;">
              <h5>Total </h5>
              <h4>Course</h4>
            </div>
            <div class="stats-right" style="width:50%;">
              <label>{{$course}}</label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          <div class="clearfix"> </div> 
        </div>
        <br><br>
      


          
      



<div class="table-responsive">
  <p align="center">Top 10 Teachers</p>
      <table id="customers">
    <thead>
      <tr>
         <th>Serial</th>
         <th>Name</th>
         <th>Rating</th>
         
      </tr>
    </thead>
       <tbody>
           @php 
              $i=1;
              @endphp
                    @foreach($users as $user)
                     
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->fstatus}}</td>

                  
                 
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  
           
</div>




</div>
    </div>





   @include('adminlayouts.admin_js')