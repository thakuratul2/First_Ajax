<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection failed: " . mysqli_connect_error());

$limt = 3;

$page = "";

if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
}
else{
    $page = 1;
}
$offet = ($page - 1) * $limt;
$sql = "SELECT * FROM students LIMIT {$offet}, {$limt}";
$result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));

$output = "";
if(mysqli_num_rows($result) > 0){
    $output .= '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                    <th width="100px">
                     Id
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>';
                while($row = mysqli_fetch_assoc($result)){
                    $output .=  "<tr><td align='center'>{$row["id"]}</td><td>{$row["first_name"]} {$row["lastname"]}</td><td>{$row["Email"]}</td></tr>";
                }
                 
            $output .= "</table>";
            $sql_total = "SELECT * FROM students";
            $records = mysqli_query($conn, $sql_total) or die("Query failed: " . mysqli_error($conn));
            $total_records = mysqli_num_rows($records);
            $total_pages = ceil($total_records / $limt);
            $output .= '<div id="page">';
            for($i=1; $i <= $total_pages; $i++){
               $output .= "<a href='' class='active' id='{$i}'>{$i}</a>";
            }
            $output .= "</div>";
          

            echo $output;
}else{
    echo "No data found";
}
?>