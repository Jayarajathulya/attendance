<?php

session_start();
include '../include/config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn, $_POST['search']['value']); // Search value

## Date search value
$searchByFromdate = mysqli_real_escape_string($conn, $_POST['searchByFromdate']);
$searchByTodate = mysqli_real_escape_string($conn, $_POST['searchByTodate']);
## Search Query
$searchQuery = array();
if ($searchValue != '') {
    $searchQuery[] = "(name like '%" . $searchValue . "%' or date like '%" . $searchValue . "%' or attendance like '%" . $searchValue . "%')";
}




// Date filter
if ($searchByFromdate != '' && $searchByTodate != '') {
    $searchQuery[] = "(date between '" . $searchByFromdate . "' and '" . $searchByTodate . "' and branchcode ='" . $_SESSION['branchcode'] . "')";
}
$WHERE = " WHERE branchcode ='" . $_SESSION['branchcode'] . "'";
if (count($searchQuery) > 0) {
    $WHERE = " WHERE " . implode(' and ', $searchQuery);
}
    
## Total number of records without filtering
$sel = mysqli_query($conn, "select count(*) as allcount from attendance_taken ". $WHERE);
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($conn, "select count(*) as allcount from attendance_taken " . $WHERE);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from attendance_taken " . $WHERE . " order by ". $columnName . " " . $columnSortOrder . " limit " . $row . "," . $rowperpage ;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
        "name" => $row['name'],
        "departmentname" => $row['departmentname'],
        "tower"  => $row['tower'],
        "floor" => $row['floor'],
        "room" => $row['room'],
        "branchcode" => $row['branchcode'],
        "date" => $row['date'],
        "attendance" => $row['attendance'],
    );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
die;
