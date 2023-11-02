<!-- List All Submissions on Admin-page -->
<?php
            $result = $wpdb->get_results("SELECT * FROM $table_name ORDER BY user_id DESC");
            foreach ($result as $print) {
                $sl = $print->user_id; 
                $name = $print->name;
                $phone = $print->phone;
                $passportNo = $print->passportNo;
                $birthDate = $print->birthDate;
                $serviceTaken = $print->serviceTaken;
                $country = $print->country;
                $ref = $print->ref;
                $status = $print->status;
                $note = $print->note;
                ?>

                <div class='d-flex flex-column w-9 p-2 mx-auto shadow-sm bg-light rounded border border-light-subtle'>
                    <p class='serial px-2 py-0 m-0 text-body-secondary font-sm'>Sl.<?php echo $sl; ?></p>
                    <div class='d-inline-flex column-gap-3 my-2'>
                        <p class='px-3 py-2 m-0 shadow-sm bg-body rounded'>Name: <strong><?php echo $name; ?></strong></p>
                        <p class='px-3 py-2 m-0 shadow-sm bg-body rounded'>Passport No: <strong><?php echo $passportNo; ?></strong></p>
                        <p class='px-3 py-2 m-0 shadow-sm bg-body rounded'>Mobile: <strong><?php echo $phone; ?></strong></p>
                        <p class='px-3 py-2 m-0 shadow-sm bg-body rounded'>Date of Birth: <strong><?php echo $birthDate; ?></strong></p>
                    </div>
                    <div class='d-flex flex-row column-gap-3 justify-content-between'>
                        <div class='d-flex flex-column flex-fill flex-grow-4'>
                            <div class='d-inline-flex column-gap-2'>
                                <p class='px-3 py-2 m-0 shadow-sm bg-body rounded'>Service Taken: <strong><?php echo $serviceTaken; ?></strong></p>
                                <p class='px-3 py-2 m-0 shadow-sm bg-body rounded'>Country: <strong><?php echo $country; ?></strong></p>
                                <p class='px-3 py-2 m-0 shadow-sm bg-body rounded'>Status: <strong><?php echo $status; ?></strong></p>
                                <p class='px-3 py-2 m-0 shadow-sm bg-body rounded'>Ref: <strong><?php echo $ref; ?></strong></p>
                            </div>
                            <div class='d-inline-flex column-gap-2 my-2'>
                                <?php
                                if ($print->note !== '') {
                                    echo "<p class='note text-wrap p-3 m-0 w-3 shadow-sm bg-body rounded'>$print->note</p>";
                                };
                                ?>
                                <p class='rvDate p-2 m-0 align-self-end'><small class='text-body-secondary'>Received on: <?php echo $print->receivedDate; ?></small></p>&nbsp;
                                <?php
                                if ($print->deliveryDate !== '') {
                                    echo "<p class='rvDate p-2 m-0 align-self-end'><small class='text-body-secondary'>Delivered on: $print->deliveryDate</small></p>";
                                };
                                ?>
                            </div>
                        </div>
                        <div class='d-flex flex-column justify-content-evenly align-items-center px-2'>
                            <a href='admin.php?page=passportCrud%2FPassportCrud.php&upt=<?php echo $print->user_id; ?>'><button class='btn btn-success' type='button'>Update</button></a>
                            <a href='admin.php?page=passportCrud%2FPassportCrud.php&del=<?php echo $print->user_id; ?>'><button class='btn btn-danger' type='button'>Delete</button></a>
                        </div>
                    </div>
                </div><br>
                <?php
            } ?>