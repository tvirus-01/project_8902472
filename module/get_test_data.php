<?php
$conn = new mysqli("localhost", "id11131192_root", "Sa20921210", "id11131192_fb_lead_data");

if (isset($_POST['gpdata'])) {
	$q = "SELECT * FROM `fb_group_data`";
	$result = $conn->query($q);

	foreach ($result as $key) {
		$group_name = $key['group_name'];
		$group_id = $key['group_id'];
		$group_dtl = $key['group_dtl'];

		$w = '';
		$w .= '<div class="row"><div class="col ml-3">';
		$w .= '<a href="user_view.html?" class="btn btn-link w-100"><h5 class="text-primary float-left">'.$group_name.'</h5></a>';
		$w .= '<span class="text-secondary ml-3">'.$group_dtl.'</span>';
		$w .= '</div></div>';

		echo $w;
	}
}

if (isset($_POST['userdata'])) {
	$q = "SELECT * FROM `fb_user_data`";
	$result = $conn->query($q);

	foreach ($result as $key) {
		$w = '';
		$w .= '<tr>';
		$w .= '<td>'.$key['name'].'</td>';
		$w .= '<td>'.$key['uid'].'</td>';
		$w .= '<td>'.$key['city'].'</td>';
		$w .= '<td>'.$key['phone'].'</td>';
		$w .= '<td>'.$key['email'].'</td>';
		$w .= '<td>'.$key['gender'].'</td>';
		$w .= '</tr>';

		echo $w;
	}
}