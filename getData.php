<?php
include("connection.php");

$stu_sql = "SELECT DISTINCT s.id, s.roll_no, s.name, s.email, s.mobile, s.dept, s.created_date, r.subject, r.total, r.mark_obtain, r.result, r.grade FROM student AS s, result AS r WHERE s.id = r.stu_id GROUP BY s.id ORDER BY s.id";

$table = <<<EOT
 ( $stu_sql ) temp
EOT;
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'id', 'dt' => '0',  'field' => 'id' ),
    array( 'db' => 'roll_no', 'dt' => '1',  'field' => 'roll_no'),
    array( 'db' => 'name', 'dt' => '2',  'field' => 'name' ),
    array( 'db' => 'email', 'dt' => '3',  'field' => 'email' ),
    array( 'db' => 'mobile', 'dt' => '4',  'field' => 'mobile' ),
    array( 'db' => 'dept', 'dt' => '5',  'field' => 'dept' ),
    array( 'db' => 'subject',  'dt' => '6',  'field' => 'subject'),
    array( 'db' => 'total', 'dt' => '7' , 'field' => 'total'),
    array( 'db' => 'mark_obtain', 'dt' => '8',  'field' => 'mark_obtain'),
    array( 'db' => 'result', 'dt' => '9', 'field' => 'result'),
    array( 'db' => 'grade', 'dt' => '10', 'field' => 'grade'),
    array( 'db' => 'created_date', 'dt' => 11,  'formatter' => function( $d, $row ) { return date( 'jS M Y', strtotime($d)); }),
    array( 'db' => 'id', 'dt' => '12',  'field' => 'id' )
);

require('ssp_join.class.php');
echo json_encode(
    SSP::simple( $_GET, $link, $table, $primaryKey, $columns )
);
