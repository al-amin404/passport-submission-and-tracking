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
    $result = $wpdb->get_results("SELECT * FROM $table_name WHERE passportNo='$srch_id' ORDER BY user_id DESC");

    if ($result) { ?>
        <header class='card-header'> <h3>My Passports / Tracking</h3> </header> <?php
      foreach($result as $print) {
        $name = $print->name;
        $phone = $print->phone;
        $passportNo = $print->passportNo;
        $serviceTaken = $print->serviceTaken;
        $status = $print->status;
        $note = $print->note;
        if($serviceTaken == 'Visa Processing') {
          include 'tracking-visa-processing.php'; 
        } else include 'tracking-manpower.php';
      }
    } else {
      echo "<strong><h4>No results found. Check your Passport number and Try again.</h4></strong>";
    }
  }

  wp_die(); // Always include this line at the end of the AJAX callback function
}