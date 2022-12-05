<?php

include('includes/dbconnection.php');

// $connect = new PDO("mysql:host=localhost;dbname=hbmsdb", "root", "");


if (isset($_POST["rating_data"])) {
    $data = array(
        ':user_name'        =>    $_POST["user_name"],
        ':user_rating'        =>    $_POST["rating_data"],
        ':room_id'        =>    $_POST["room_id"]
    );

    $query = "
	INSERT INTO review_table 
	(user_name, user_rating, room_id) 
	VALUES (:user_name, :user_rating, :room_id)
	";

    $statement = $dbh->prepare($query);

    $statement->execute($data);

    echo "Your Review & Rating Successfully Submitted";
}

if (isset($_POST["action"])) {
    $data = array(
        ':room_id'        =>    $_POST["room_id"]
    );
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;


    $sql = "SELECT * from review_table 
    where review_table.room_id=:room_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rmid', $rmid, PDO::PARAM_STR);
    $query->execute($data);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    

    // $rmid = intval($_GET['rmid']);
    // $query = "SELECT * from review_table 
    // where review_table.room_id=:rmid";
    // $result = $connect->query($query, PDO::FETCH_ASSOC);

    foreach ($result as $row) {

        if ($row["user_rating"] == '5') {
            $five_star_review++;
        }

        if ($row["user_rating"] == '4') {
            $four_star_review++;
        }

        if ($row["user_rating"] == '3') {
            $three_star_review++;
        }

        if ($row["user_rating"] == '2') {
            $two_star_review++;
        }

        if ($row["user_rating"] == '1') {
            $one_star_review++;
        }

        $total_review++;

        $total_user_rating = $total_user_rating + $row["user_rating"];
    }

    $average_rating = $total_user_rating / $total_review;

    $output = array(
        'average_rating'    =>    number_format($average_rating, 1),
        'total_review'        =>    $total_review,
        'five_star_review'    =>    $five_star_review,
        'four_star_review'    =>    $four_star_review,
        'three_star_review'    =>    $three_star_review,
        'two_star_review'    =>    $two_star_review,
        'one_star_review'    =>    $one_star_review
    );

    echo json_encode($output);
}
