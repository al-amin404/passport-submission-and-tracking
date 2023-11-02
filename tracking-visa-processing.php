<div class='mx-2 my-4 shadow p-3 bg-body-white rounded'>
        <div>
            <?php echo "<h6>Passport No: <mark><strong>$passportNo</strong></mark> </h6>"; 
            echo "
            <div class='card'>
                <div class='card-body row'>
                    <div class='col'> Name:<br><p><strong>$name</strong></p></div>
                    <div class='col'> Service Taken:<br><p><strong>$serviceTaken</strong></p></div>
                    <div class='col'> Status:<br><p><strong>$status</strong></p></div>
                    <div class='col'> Mobile:<br><p><strong>$phone</strong></p></div>
                </div>
            </div> 
            ";
            if ($note != "") {
            echo "
            <div class='container border border-secondary-subtle p-2'><p class='notes'><strong>Note:</strong> $note</p></div><br>
            ";
            }
            ?>
            <div class='tracking-div'><?php
                if ($status == 'Received') {
                  echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>MoFa</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Tasheer fingerprint</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Okala & Stamping</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'Mofa') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>MoFa</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Tasheer fingerprint</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Okala & Stamping</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'Fingerprint Done') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>MoFa</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Tasheer fingerprint</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Okala & Stamping</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>BMET fingerprint & Manpower</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'Embassy Submited') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>MoFa</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Tasheer fingerprint</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Okala & Stamping</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>BMET fingerprint & Manpower</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Process Done</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Delivered</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'BMET Manpower') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>MoFa</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Tasheer fingerprint</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Okala & Stamping</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>BMET fingerprint & Manpower</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Process Done</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Delivered</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'Process Done') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>MoFa</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Tasheer fingerprint</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Okala & Stamping</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>BMET fingerprint & Manpower</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Process Done</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Delivered</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'Delivered') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>MoFa</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Tasheer fingerprint</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Okala & Stamping</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>BMET fingerprint & Manpower</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Process Done</div>
                        </div>
                        <div class='tracking-item last d-flex align-items-end'>
                            <div class='tracking-icon active blinker'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Delivered</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'Failed') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Failed Processing</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Returned to customer</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'Failed and Returned') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Failed Processing</div>
                        </div>
                        <div class='tracking-item last d-flex align-items-end'>
                            <div class='tracking-icon active blinker'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Returned to customer</div>
                        </div>
                    </div>
                  ";
                } elseif ($status == 'On-hold') {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>On-hold</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>MoFa</div>
                        </div>
                        <div class='tracking-item-pending d-flex align-items-center'>
                            <div class='tracking-icon pending'></div>
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Tasheer fingerprint</div>
                        </div>
                    </div>
                  ";
                } else {
                    echo "
                    <div class='tracking-list d-flex d-sm-flex flex-column justify-content-center mb-6 w-100'>
                        <div class='tracking-item d-flex d-sm-flex align-items-center'>
                            <div class='tracking-icon active'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded'>Received</div>
                        </div>
                        <div class='tracking-item d-flex align-items-center'>
                            <div class='tracking-icon active blinker'></div>  
                            <div class='tracking-content shadow-sm p-2 bg-body-tertiary rounded position-absolute left-8rem'>Processing</div>
                        </div>
                    </div>
                  ";
                };
                ?>
            </div>
        </div><br>
</div>