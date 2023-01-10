<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Student Data</h1>

<table >
  <tr>
    <td><h2>Shubha Mandal.com</h2></td>
    <td>
        <h2>Sm School ERP</h2>
        <p>Address: Jatrabari, Dhaka1204</p>
        <p>Phone: 01822823912</p>
        <p>Email: shubhamandal70@gmail.com</p>

    </td>
    
  </tr>
  
</table>
<table id="customers">
  <tr>
    <th>SL No</th>
    <th>Student Details</th>
    <th>Student Data</th>
  </tr>
  
  <tr>
    <td>1</td>
    <td>Name</td>
    <td>{{ $details['student_info']['name'] }}</td>
  </tr> 
  <tr>
  <tr>
    <td>2</td>
    <td>Student ID No</td>
    <td>{{ $details['student_info']['id_no'] }}</td>
  </tr> 
  <tr>
    <td>3</td>
    <td>Student Roll</td>
    <td>{{ $details->roll }}</td>
  </tr> 
  <tr>
    <td>4</td>
    <td>Father's Name</td>
    <td>{{ $details['student_info']['fname'] }}</td>
  </tr> 
  <tr>
    <td>5</td>
    <td>Mother's Name</td>
    <td>{{ $details['student_info']['mname'] }}</td>
  </tr> 
  <tr>
    <td>6</td>
    <td> Mobile</td>
    <td>{{ $details['student_info']['mobile'] }}</td>
  </tr> 
  <tr>
    <td>7</td>
    <td>Address  </td>
    <td>{{ $details['student_info']['address'] }}</td>
  </tr> 
  <tr>
    <td>8</td>
    <td>Gender  </td>
    <td>{{ $details['student_info']['gender'] }}</td>
  </tr> 
  <tr>
    <td>9</td>
    <td>Date Of Birth  </td>
    <td>{{ date('d M Y',strtotime($details['student_info']['dob'])) }}</td>
    

    
  </tr> 
  <tr>
    <td>10</td>
    <td>Discount   </td>
    <td>{{ $details['student_discount']['discount'] }} %</td>
  </tr> 
  <tr>
    <td>11</td>
    <td>Religion   </td>
    <td>{{ $details['student_info']['religion'] }}</td>
  </tr> 
  <tr>
    <td>12</td>
    <td>Year</td>
    <td>{{ $details['student_year_info']['name'] }}</td>
  </tr> 
  <tr>
    <td>13</td>
    <td>Class   </td>
    <td>{{ $details['student_class_info']['name'] }}</td>
  </tr> 
  <tr>
    <td>14</td>
    <td>Group   </td>
    <td>{{ $details['group_info']['name'] }}</td>
  </tr> 
  <tr>
    <td>15</td>
    <td>Shift   </td>
    <td>{{ $details['shift_info']['name'] }}</td>
  </tr> 
  
  
 
</table>
<br>
<i style="font-size:15px; float: right;margin-top:15px;">Print Date : {{ date('d-m-Y h:i A') }}</i>

</body>
</html>


