<head>
    <style>
        body { background: black; color: white; }
#track_report {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#track_report td, #track_report th {
  border: 1px solid #ddd;
  padding: 8px;
}

/*#track_report tr:nth-child(even){background-color: #f2f2f2;}

#track_report tr:hover {background-color: #ddd;}*/

#track_report th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #f0F0F0;
  color: black;
}
    </style>
</head>
<center><h2>Users Login Report</h2></center>
 <table  id="track_report" border="0" cellpadding="0" cellspacing="0" height="100%" width="60%" id="bodyTable">
     <tr>
         <th>S.No</th>
         <th>Name</th>
         <th>today First Login</th>
         <th>Last Logged In Time</th>
         <th>Total Time Spent</th>
     </tr>
     <?php
     if($trcking_data)
     {
        $y=1;
        foreach ($trcking_data as $track) {
            $hours = floor($track['todaytimer'] / 3600);
            $mins = floor($track['todaytimer'] / 60 % 60);
            $secs = floor($track['todaytimer'] % 60); 

$timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
           echo "<tr><td>".$y."</td>";
           echo "<td>".$track['first_name']." ".$track['last_name']."</td>";
           echo "<td>".date('Y-m-d H:i:s',strtotime($track['login_time']))."</td>";
           echo "<td>".$track['last_login']."</td>";
           echo "<td>".$timeFormat."</td></tr>";
           $y++;
        }
     }
     ?>
 </table> 