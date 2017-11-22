<?php
include 'connect.php';

$sql = "SELECT color,quantityAvailable from Products";
$result = mysqli_query($conn,$sql);
$labels = array();
$data = "";
while($row = mysqli_fetch_assoc($result))
{
  array_push($labels, $row['color']);
  $data = $data.$row['quantityAvailable'].',';
}
$data = array_map('intval', explode(",", $data));

unset($data[9]);

$arrDatasets = array(array('label' => "Shirts Remaining",'data' => $data,  'backgroundColor' => array( 'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                        ), 'borderColor' => array('rgba(255,99,132,1)',
                                              'rgba(54, 162, 235, 1)',
                                              'rgba(255, 206, 86, 1)',
                                              'rgba(75, 192, 192, 1)',
                                              'rgba(153, 102, 255, 1)',
                                              'rgba(255, 159, 64, 1)'
                                            ), 'borderWidth' => '1'));

$arrReturn = array('labels' => $labels, 'datasets' => $arrDatasets);

echo json_encode($arrReturn);

?>
