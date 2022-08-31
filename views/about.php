<?php

    include_once 'config/connection.php';
    include_once 'models/poll/functions.php';

?>

<div class="container abt">
    <img src="assets/img/abt.jpg" alt="Author" class="img-fluid"/>
    <div class="abt-txt">
        <p>Mateja Jukic</p>
        <h4>147/17</h4>
    </div>
    <?php
        if(isset($_SESSION['user'])):
    ?>
    <form class="poll-form" method="post" action="models/poll/voting.php">
        <table>
            <tr>    
                <th>
                    <?php

                        $pitanje="SELECT id, poll FROM poll WHERE active=1";
                        $rez1 = executeSingleQuery($pitanje);
                        echo $rez1->poll;
                    ?>
                </th>
            </tr>
            <?php
                $query = "SELECT * FROM poll_options po INNER JOIN poll p on po.poll_id = p.id";
                $rez = executeQuery($query);
                foreach($rez as $p) {
                    echo "<tr><td><input type='radio' name='poll-vote' class='poll-option' value='".$p->id."'</td>".$p->poll_option."</tr>";
                }
            ?>
        </table>

        <button class="form-control btn btn-submit poll-btn" name="vote-btn">Vote!</button>
    </form>
    <?php endif ?>
</div>
<div class="container">
    <a href="models/data_exports.php?data=word" style="text-align: center; display: block;">Download author export</a>
</div>