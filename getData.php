<?php
include 'connect.php';
$result = oci_parse($conn,"SELECT color,qtyAvailable from Products");
oci_execute($result);
$labels = array();
$data = "";
while($row = oci_fetch_array($result, OCI_BOTH))
{
  array_push($labels, $row['COLOR']);
  $data = $data.$row['QTYAVAILABLE'].',';
}
$data = array_map('intval', explode(",", $data));
unset($data[9]);
$arrDatasets = array(array('label' => "Shirts Remaining",'data' => $data,  'backgroundColor' => array( 'rgba(0, 0, 0, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(0, 206,0, 0.2)',
                          'rgba(255, 102, 153, 0.2)',
                          'rgba(200,0, 0, 0.2)',
                          'rgba(255, 255, 0, 0.2)'
                        ), 'borderColor' => array('rgba(0,0,0,1)',
                                              'rgba(54, 162, 235, 1)',
                                              'rgba(0, 206, 0, 1)',
                                              'rgba(255, 102, 153, 1)',
                                              'rgba(200, 0, 0, 1)',
                                              'rgba(255, 255, 0, 1)'
                                            ), 'borderWidth' => '1'));
$arrReturn = array('labels' => $labels, 'datasets' => $arrDatasets);
echo json_encode($arrReturn);
?>
