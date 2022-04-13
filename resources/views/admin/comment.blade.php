

@include('adminlayouts.admin_css')




  <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
       


          <p>Student’s Feedback Evaluation Comment</p>

 
         
<style type="text/css">
  #numrows{
    width: 100px;
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
         <th width="10%">Serial <i class="fa fa-sort"></i></th>
         <th width="20%">Student Name <i class="fa fa-sort"></i></th>
         <th>Comment</th>
         <th width="20%">Date time</th>
       
         
      </tr>
    </thead>
       <tbody>
           @php 
              $i=1;
              @endphp
                    @foreach($feedbackdata as $feedback)
                     
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$feedback->names}}</td>
                  <td>{{$feedback->comment}}</td>
                  <td>{{$feedback->created_at}}</td>
           
                  
               
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  

          
      </div>
    </div>














   @include('adminlayouts.admin_js')