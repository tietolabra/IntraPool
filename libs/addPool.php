<?php
require_once 'phpErrors.php';
require_once 'db.php';
require_once 'userData.php';

function addPool() {
    global $db;
    global $userData;

    $dayStart = ' '.$_POST['startTime'].':00';
    $dayEnd = ' '.$_POST['endTime'].':00';

    $date1 = new DateTime($_POST['startDate']);
    $date2 = new DateTime($_POST['endDate']);
    $days = $date1->diff($date2);
    $currentDate = $date1;

    $weekdays = [];
    $daynames = ["sunday"=>false, "monday"=>false, "tuesday"=>false, "wednesday"=>false, "thursday"=>false, "friday"=>false, "saturday"=>false];
    $postWeekdays = $_POST['weekDays'];

    foreach($postWeekdays as $day) {
        $daynames[$day] = true;
    }
    
    for ($i = 0; $i < $days->d; $i++) {
        if ($daynames[date('w', $currentDate->getTimestamp())]) {
            addNewPool($currentDate.$dayStart, $currentDate.$dayEnd);
        }
        $currentDate->modify("+1 day");
    }

    foreach ($_POST as $name => $param) {
        if (is_array($param)) {
            print($name.':<br>');
            foreach ($param as $p) {
                print($p.'<br>');
            }
        }
        else print($name.' : '.$param.'<br>');
    }
}

function addNewPool($start, $end) {
    global $db;
    global $userData;

    $stmt = $db->prepare("INSERT INTO `pools` (`driver`, `seats`, `startTime`, `endTime`, `company`) VALUES (?,?,?,?,?)");
    $stmt->bind_param("iissi", $userData['id'], $_POST['seats'], $start, $end, $userData['companyID']);
    if ($stmt->execute()) {
        //SUCCESS
        print("Succesfully added: ".$start." - ".$end);
    }
    else throw new Exception("Failed to add database entry!");
}

?>