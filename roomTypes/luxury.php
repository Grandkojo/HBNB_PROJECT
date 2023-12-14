<div class="row mt-3">

    <?php
    include "roomTypes/index_luxury.php";
    ?>
    <?php
    foreach ($result as $room) {
    ?>

        <div class="col-md-2">
            <!-- <div class="col-md-3"> -->
            <div class="image-container ms-1">
                <img class="modals shadow" href="#" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $room['ID'] ?>" src="<?php echo $room['PICTURE'] ?>" alt="1">
                <a class="modals" href="#" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $room['ID'] ?>"><span>
                        <strong>
                            <p class="ms-3" style="font-size: larger; font-family:'Times New Roman', Times, serif"><?php echo $room['LOCATION'] ?>
                        </strong><br>$<?php echo $room['PRICE'] ?> per night</p>
                    </span>
                </a>
            </div>
        </div>


        <div class="modal fade custom-modal" id="myModal<?php echo $room['ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $room['NAME'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="modal-body">
                        <small>
                            <h5>Utilities</h5>
                        </small>
                        <div class="container">
                            <?php
                            foreach ($utility as $util) {
                            ?>
                                <div class="row">
                                    <div class="col-1">
                                        <?php if ($room['AC_AVAILABILITY'] == "AVAILABLE") { ?>
                                            <img src="<?php echo $util['ICON']; ?>" alt="utility" style="width: 20px; height: 20px;">
                                        <?php } elseif ($room['AC_AVAILABILITY'] == "N/A") { ?>
                                            <img src="<?php echo $util['ICON']; ?>" alt="utility" style="width: 20px; height: 20px;">
                                        <?php } ?>
                                    </div>
                                    <?php
                                    ?>
                                    <div class="col-4">
                                        <small><?php echo $util['NAME']; ?></small><br>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <br>
                        <div class="container-fluid">
                            <p style="word-wrap: break-word;"> <?php echo $room['DESCRIPTION']; ?></p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <p><strong>$<?php echo $room['PRICE'] ?></strong> night</p>
                        <br>
                        <form action="booking_confirmed.php?state=right" method="post">
                            <input type="submit" value="Continue" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
exit;
?>