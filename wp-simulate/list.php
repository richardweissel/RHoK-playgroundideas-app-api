<?php

$apiUrl = "http://playgroundideas.endzone.io/app-api";
$userId = $_GET["userId"];
//NB: In Wordpress calls to the Json API should use wp_ methods & pass the WP user id

$actionMessage = "";
if (isset($_GET["action"])) {
	$action = $_GET["action"];
	if ($action == "delete") { //delete a saved playground
		$designId = $_GET["designId"];
		$jsonurl = $apiUrl."/playgrounds/delete.php?userId=".$userId."&designId=".$designId;
		//echo $jsonurl;
		$json = curl_get_contents($jsonurl);
		$response = json_decode($json);
		//echo var_dump($response);
		if ($response == null) {
			$actionMessage = '<p class="error">Delete server error: unable to delete playground</p>';
		} else if ($response->status == "success") {
			$actionMessage = '<p class="success">Delete successful</p>';
		} else {
			$actionMessage = '<p class="error">'.$response->message.'</p>';
		}
	}
}


$jsonurl = $apiUrl."/playgrounds/get.php?userId=".$userId;
$json = curl_get_contents($jsonurl);
$response = json_decode($json);
$playgrounds = $response->playground;
$hasPlaygrounds = count($playgrounds)>0;

?>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
			}
			th {
				background-color: lightblue;
			}
			table, th, td {
				border: 1px solid black;
				padding: 4px
			}
			.error {
				font-weight: bold;
				color: red;
			}
			.success {
				font-weight: bold;
				color: green;
			}
		</style>
	</head>
	<body>
		<!--
		URL: <?= $jsonurl; ?>

		JSON: <?= $json; ?>
		-->
		<h1>Welcome user <?= $userId ?></h1>
		<a href="Build/app.php?userId=<?= $userId  ?>">Start a new design</a>
		<hr />
		<?= $actionMessage ?>
		<?php
		if ($hasPlaygrounds) { ?>
			<h5>Your saved playground ideas</h5>
			<table>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th></th>
					<th>Screenshot</th>
					<th>Saved at</th>
					<th>Updated at</th>
					<th>Screenshot Name</th>
					<th>Model</th>
				</tr>
				<?php
				foreach ($playgrounds as $p) { ?>
					<tr>
						<td><?= $p->id ?></td>
						<td><?= $p->name ?></td>
						<td><a href="Build/app.php?userId=<?= $userId  ?>&designId=<?= $p->id ?>">Edit this design</a></td>
						<td><a href="list.php?action=delete&userId=<?= $userId  ?>&designId=<?= $p->id ?>">Delete this design</a></td>
						<td><img src="<?= $p->Screenshot_Url ?>" /></td>
						<td><?= date_format(date_create($p->created_at), "d-M-y H:i") ?></td>
						<td><?= date_format(date_create($p->updated_at), "d-M-y H:i")  ?></td>
						<td><?= $p->screenshot ?></td>
						<td><?= $p->model ?></td>
					</tr>
				<?php } ?>
			</table>
			<small>NB: Times are server time (Uk).</small>
			<?php
		} else { ?>
			You don't have any saved playground ideas yet.
		<?php } ?>
	</body>
</html>

<?php


function curl_get_contents($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

?>
