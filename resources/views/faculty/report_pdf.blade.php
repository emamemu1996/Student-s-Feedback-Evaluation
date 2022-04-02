
 
<!DOCTYPE html>
<html>    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF</title>
    <style>
       
        body {
            font-family: 'kalpurush';
        }

  .main {
  position: fixed;
  top: 0;
  left: 0;
  border: 12px solid green;
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
   

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 10px;
  border: 0.5px solid black;
}

.option{
  line-height:0.4;
}
</style>
    
</head>
<body>



    

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


</body>
