<?php

// Front-end Tracking
add_shortcode('my_crud_display_shortcode', 'crudVisitorPage');

function crudVisitorPage() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'passport_submissions';
  ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
<style>
  <?php include 'css/PassportCrudStyles.css'; ?>
</style>

  <div class="wrap">
    <h2>Check Passport Status</h2>
    <form id="search-form" method="post">
      <div>
        <div><input type="text" id="passportNo" name="passportNo" placeholder="Enter passport no." required></div><br>
        <div><button id="search" name="search" type="button">Search</button></div>
      </div>
    </form>
    <br>
    <br>
  </div>

  <div id="search-results"></div>

  <script>
    document.getElementById('search').addEventListener('click', function() {
      var passportNo = document.getElementById('passportNo').value;

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          document.getElementById('search-results').innerHTML = xhr.responseText;
        }
      };

      xhr.open('POST', '<?php echo admin_url("admin-ajax.php"); ?>', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send('action=search_users&passportNo=' + encodeURIComponent(passportNo));
    });
  </script>
  
  <?php
}

// AJAX callback for searching users
add_action('wp_ajax_search_users', 'searchUsers');
add_action('wp_ajax_nopriv_search_users', 'searchUsers');
function searchUsers() {
  if (isset($_POST['passportNo'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'passport_submissions';

    $srch_id = $_POST['passportNo'];
    $result = $wpdb->get_results("SELECT * FROM $table_name WHERE passportNo='$srch_id'");

    if ($result) { ?>
        <header class='card-header'> <h3>My Passports / Tracking</h3> </header> <?php
      foreach($result as $print) {
        $name = $print->name;
        $phone = $print->phone;
        $passportNo = $print->passportNo;
        $serviceTaken = $print->serviceTaken;
        $status = $print->status;
        $note = $print->note;
        ?>

        <div class='container'>
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
                          <div class='col'> Name:<br><strong>$name</strong></div>
                          <div class='col'> Service Taken:<br><strong>$serviceTaken</strong></div>
                          <div class='col'> Status:<br><strong>$status</strong></div>
                          <div class='col'> Mobile:<br><strong>$phone</strong></div>
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
<?php
      }
    } else {
      echo "<strong><h4>No results found.</h4></strong>";
    }
  }

  wp_die(); // Always include this line at the end of the AJAX callback function
}