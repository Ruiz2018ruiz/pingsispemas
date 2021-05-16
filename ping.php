<?php
    //Create a table showing the results
    $iplist = array(
        array ("172.21.68.101","BD PGSQL 01"),
        array ("172.21.68.102","BD PGSQL 02"),
        array ("172.21.68.202","BD PGSQL 02"),       
        array ("172.21.68.32","BD BI"), 
        array ("172.21.68.36","BD sdafkajsdfijoo"),    
    );

    $i = count($iplist);

    $results = [];

    for($j=0;$j<$i;$j++){
        $ip = $iplist[$j][0];
        $ping = exec("ping -n 1 $ip", $output, $status);
        $results[] = $status;
    }
    //Table
    echo '<font face=Courier New>';

    echo "<table border=1 style=border-collapse:collapse>
    <th colspan=4> Ping Monitoring</th>
    <tr>
        <td aling=right width=20>#</td>
        <td width=100>Ip</td>
        <td width=100>Status</td>
        <td width=250>Descripsion</td>
    </tr>";
foreach($results as $item =>$k){
    echo '<tr>';
        echo '<td aling=right>'.$item.'</td>';
        echo '<td>'.$iplist[$item][0].'</td>';
        if($results[$item]==0){
            echo '<td style=color:green>Online</td>'; 
        }
        else{
            echo '<td style=color:red>Offline</td>'; 
        }
        echo '<td>'.$iplist[$item][1].'</td>';
    echo '/tr>';
}
    echo "</table>";
    echo '</font>'
?>
