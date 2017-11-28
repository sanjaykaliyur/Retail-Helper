<?php
include 'connect.php';

$result = oci_parse($conn,"SELECT color,quantityAvailable from Products");
oci_execute($result);
$labels = array();
$data = "";
while($row = oci_fetch_array($result, OCI_BOTH)) != false)
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
