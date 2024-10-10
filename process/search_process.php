<?php

require_once "../classes/Player.php";

if (isset($_POST['position'])) {
    $position_search = htmlspecialchars($_POST['position']); 

    if (empty($position_search)) {
        echo "<h1 class='text-light'> Please select a position to search </h1>";
        exit();
    }

    try {
        $pl = new Player();
        $result = $pl->search_by_posid($position_search);

        if (!$result) {
            echo "<h2 class='text-light bg-danger p-3 px-5'> No results found for the selected position </h2>";
            exit();
        }

        $resp = '
        <div class="container py-5">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h3 style="margin-bottom:30px;" class="text-center">Search Results</h3> 
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Player Details</th>
                            </tr>
                        </thead>
                        <tbody>';

        foreach ($result as $res) {
            $rfname = htmlspecialchars($res['player_firstname']);
            $rlname = htmlspecialchars($res['player_lastname']);
            
            $resp .= '
            <tr>
                <td>' . $rfname . '</td>
                <td>' . $rlname . '</td>
                <td><a href="view_details.php?player_id=' . htmlspecialchars($res['player_id']) . '">View Details</a></td>
            </tr>';
        }

        $resp .= '
                        </tbody>
                    </table>
                </div>
            </div>
        </div>';
        echo $resp;

    } catch (Exception $e) {
        echo "<h2 class='text-light bg-danger p-3 px-5'> Error occurred: " . htmlspecialchars($e->getMessage()) . "</h2>";
    }
}
?>
