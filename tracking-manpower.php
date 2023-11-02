<div class='mx-2 my-4 shadow p-3 bg-body-white rounded'>
            <div>
                <?php echo "<h6>Passport No: <mark><strong>$passportNo</strong></mark> </h6>"; ?>
              <div class='track'> <?php
                if ($status == 'Received') {
                  echo "
                  <div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Received</span> </div>
                  <div class='step'> <span class='icon'> <i class='fa fa-clock'></i> </span> <span class='text'> Processing</span> </div>
                  <div class='step'> <span class='icon'> <i class='fa fa-clipboard-check'></i> </span> <span class='text'> Work Done </span> </div>
                  <div class='step'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Returned to Customer</span> </div>
                  ";
                } elseif ($status == 'On-hold') {
                  echo "
                  <div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Received</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clock'></i> </span> <span class='text'> On-hold</span> </div>
                  <div class='step'> <span class='icon'> <i class='fa fa-clipboard-check'></i> </span> <span class='text'> Work Done </span> </div>
                  <div class='step'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Returned to Customer</span> </div>
                ";
                } elseif ($status == 'Processing') {
                  echo "
                  <div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Received</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clock'></i> </span> <span class='text'> Processing</span> </div>
                  <div class='step'> <span class='icon'> <i class='fa fa-clipboard-check'></i> </span> <span class='text'> Work Done </span> </div>
                  <div class='step'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Returned to Customer</span> </div>
                  ";
                } elseif ($status == 'Failed') {
                  echo "
                  <div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Received</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clock'></i> </span> <span class='text'> Processing</span> </div>
                  <div class='step'> <span class='icon'> <i class='fa fa-clipboard-check'></i> </span> <span class='text'> Work Done </span> </div>
                  <div class='step active'> <span class='icon'> <i class='fas fa-exclamation'></i> </span> <span class='text'>Failed & Returned</span> </div>
                  ";
                } elseif ($status == 'Shipped back') {
                  echo "
                  <div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Received</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clock'></i> </span> <span class='text'> Processing</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clipboard-check'></i> </span> <span class='text'> Work Done </span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Delivered to Customer</span> </div>
                  ";
                } elseif ($status == 'Delivered') {
                  echo "
                  <div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Received</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clock'></i> </span> <span class='text'> Processing</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clipboard-check'></i> </span> <span class='text'> Work Done </span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Delivered to Customer</span> </div>
                  ";
                } else {
                  echo "
                  <div class='step active'> <span class='icon'> <i class='fa fa-check'></i> </span> <span class='text'>Received</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clock'></i> </span> <span class='text'> Processing</span> </div>
                  <div class='step active'> <span class='icon'> <i class='fa fa-clipboard-check'></i> </span> <span class='text'> Work Done </span> </div>
                  <div class='step '> <span class='icon'> <i class='fa fa-box'></i> </span> <span class='text'>Returned to Customer</span> </div>
                  ";
                }
                ?>
              </div>
                <?php
                  echo "
                    <div class='card'>
                      <div class='card-body row'>
                        <div class='col'> Name:<br><p><strong>$name</strong></p></div>
                        <div class='col'> Service Taken:<br><p><strong>$serviceTaken</strong></p></div>
                        <div class='col'> Status:<br><p><strong>$status</strong></p></div>
                        <div class='col'> Mobile:<br><p><strong>$phone</strong></p></div>
                      </div>
                    </div><br> 
                  ";
                  if ($note != "") {
                    echo "
                    <div class='container border border-secondary-subtle p-2'><p class='notes'><strong>Note:</strong> $note</p></div><br>
                    ";
                  }
                ?>
            </div>
</div>