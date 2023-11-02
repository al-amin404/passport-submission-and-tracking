<?php
/*
Plugin Name: Passport Submission & Tracking
Plugin URI: https://www.facebook.com/alamin440/
Description: A simple plugin that allows you to perform Create (INSERT), Read (SELECT), Update and Delete submissions, and let users track their submissions. This plugin is specifically made for Travel agencies(eg. LimpidTravels.com) to keep records of their client's passport submissions 
Version: 1.2.0
Author: AL AMIN
Author URI: https://facebook.com/alamin440/
*/ 

register_activation_hook(__FILE__, 'passportSubmissionsTable');

function passportSubmissionsTable() {
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . 'passport_submissions';
  $sql = "CREATE TABLE `$table_name` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `passportNo` varchar(220) DEFAULT NULL,
  `birthDate` varchar(220) DEFAULT NULL,
  `serviceTaken` varchar(220) DEFAULT NULL,
  `country` varchar(220) DEFAULT NULL,
  `status` varchar(220) DEFAULT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `receivedDate` varchar(220) DEFAULT NULL,
  `deliveryDate` varchar(220) NOT NULL,
  PRIMARY KEY(user_id)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
  ";
  if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
}

add_action('admin_menu', 'addAdminPageContent');
add_shortcode('my_crud_shortcode', 'crudAdminPage');

function addAdminPageContent() {
    add_menu_page('Passport Submissions', 'Passport Submissions', 'manage_options' ,__FILE__, 'crudAdminPage', 'dashicons-id', 6);
  }

function crudAdminPage() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'passport_submissions';

  if (isset($_POST['newsubmit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $passportNo = $_POST['passportNo'];
    $birthDate = $_POST['birthDate'];
    $serviceTaken = $_POST['serviceTaken'];
    $country = $_POST['country'];
    $status = $_POST['status'];
    $ref = $_POST['ref'];
    $note = $_POST['note'];
    $receivedDate = date("d F Y");
    $wpdb->query("INSERT INTO $table_name(name,phone,passportNo,birthDate,serviceTaken,country,status,ref,note,receivedDate) 
        VALUES('$name','$phone','$passportNo','$birthDate','$serviceTaken','$country','$status','$ref','$note','$receivedDate')");
    echo "<script>location.replace('');</script>";
  }

  if (isset($_POST['uptsubmit'])) {
    $id = $_POST['uptid'];
    $name = $_POST['uptname'];
    $phone = $_POST['uptphone'];
    $passportNo = $_POST['uptpassportNo'];
    $birthDate = $_POST['uptbirthDate'];
    $serviceTaken = $_POST['uptserviceTaken'];
    $country = $_POST['uptcountry'];
    $status = $_POST['uptstatus'];
    $ref = $_POST['uptref'];
    $note = $_POST['uptnote'];
      if ($status == 'Delivered'){
        $deliveryDate = date("d F Y");
        $wpdb->query(
          "UPDATE $table_name 
           SET 
           name ='$name',
           phone ='$phone',
           passportNo ='$passportNo',
           birthDate ='$birthDate',
           serviceTaken ='$serviceTaken',
           country ='$country',
           status ='$status',
           ref ='$ref',
           note ='$note',
           deliverydate ='$deliveryDate'
           WHERE user_id ='$id'
           ");
       echo "<script>location.replace('admin.php?page=passportCrud%2FPassportCrud.php');</script>";
      } else
      $wpdb->query(
        "UPDATE $table_name 
          SET 
          name ='$name',
          phone ='$phone',
          passportNo ='$passportNo',
          birthDate ='$birthDate',
          serviceTaken ='$serviceTaken',
          country ='$country',
          status ='$status',
          ref ='$ref',
          note ='$note'
          WHERE user_id ='$id'
          ");
      echo "<script>location.replace('admin.php?page=passportCrud%2FPassportCrud.php');</script>";
  }

  if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $wpdb->query("DELETE FROM $table_name WHERE user_id='$del_id'");
    echo "<script>location.replace('admin.php?page=passportCrud%2FPassportCrud.php');</script>";
  }
  ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <style>
    <?php include 'css/PassportCrudStyles.css'; ?>
  </style>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <div class="container justify-content-center">
        <h2>Passport Submission Entry</h2>
    
        <form action="" method="post">
            <input type="text" value="AUTO_GENERATED" disabled><br><br>
            <div class="flex">
              <input type="text" id="name" class="form-control w-4" name="name" placeholder="Enter Name (As in passport)" required>
              <input type="text" id="passportNo" class="form-control w-4" name="passportNo" placeholder="Passport Number" required>
            </div> <br>
            <div class="flex">
              <input type="tel" id="phone" class="form-control w-3" name="phone" maxlength="11" placeholder="Mobile Number">&nbsp
              <label for="birthDate">Date of Birth</label>
              <input type="date" id="birthDate" class="form-control w-4" name="birthDate">
            </div> <br>
            <div class="flex">
              <select id="serviceTaken" class="custom-select custom-select-sm" name="serviceTaken" required>
                  <option selected>Select Service</option>
                  <option value="Manpower">Manpower</option>
                  <option value="Visa Processing">Visa Processing</option>
              </select> 
              <input type="text" id="country" class="form-control w-2" name="country" placeholder="Enter Country Name (Service Taken for)" required>
              <input type="text" id="ref" class="form-control w-2" name="ref" placeholder="Reference">
            </div> <br>
            <select id="status" class="custom-select custom-select-sm" name="status" required>
                <option selected>Select Status</option>
                <option value="Received">Received</option>
                <option value="Processing">Processing</option>
                <option value="Processing Done">Process Done</option>
                <option value="Mofa">Mofa</option>
                <option value="Fingerprint Done">Fingerprint Done</option>
                <option value="Embassy Submited">Embassy Submited</option>
                <option value="BMET Manpower">BMET Manpower</option>
                <option value="Ready to send back">Ready to Send Back</option>
                <option value="Shipped back">Shipped to Courier</option>
                <option value="On-hold">On-hold</option>
                <option value="Failed">Failed</option>
            </select> <br><br>
            <textarea id="note" class="form-control w-4" name="note" maxlength="250" placeholder="Note to Customer"></textarea> <br>
            <button id="newsubmit" class="btn btn-primary" name="newsubmit" type="submit">INSERT</button>
        
        </form>
    </div>
    <br>
    <br>
<div class="position-relative" style="z-index: 1;">
    <?php
            if (isset($_GET['upt'])) {
                $upt_id = $_GET['upt'];
                $result = $wpdb->get_results("SELECT * FROM $table_name WHERE user_id='$upt_id'");
                foreach($result as $print) {
                  $name = $print->name;
                  $phone = $print->phone;
                  $passportNo = $print->passportNo;
                  $birthDate = $print->birthDate;
                  $serviceTaken = $print->serviceTaken;
                  $country = $print->country;
                  $ref = $print->ref;
                  $status = $print->status;
                  $note = $print->note;
                }
                echo "
              <table class='wp-list-table widefat striped'>
                <thead>
                    <tr>
                    <th>UID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Passport Number</th>
                    <th>Date of Birth</th> 
                    <th>Note</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <form action='' method='post'>
                      <tr>
                          <td>$print->user_id <input type='hidden' id='uptid' name='uptid' value='$print->user_id'></td>
                          <td><input type='text' id='uptname' name='uptname' value='$print->name'></td>
                          <td><input type='tel' id='uptphone' name='uptphone' value='$print->phone'></td>
                          <td><input type='hidden' id='uptpassportNo' name='uptpassportNo' value='$print->passportNo'>$print->passportNo</td>
                          <td><input type='date' id='uptbirthDate' name='uptbirthDate' value='$print->birthDate'></td>
                          <td><input type='text' id='uptnote' name='uptnote' value='$print->note'></td>
                          <td><button id='uptsubmit' class='btn btn-primary' name='uptsubmit' type='submit'>Update</button>
                          <a href='admin.php?page=passportCrud%2FPassportCrud.php'><button class='btn btn-primary' type='button'>Cancel</button></a></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                            <select id='uptserviceTaken' class='custom-select custom-select-sm' name='uptserviceTaken' required>
                                <option value='$print->serviceTaken'selected>$print->serviceTaken</option>
                                <option value='Manpower'>Manpower</option>
                                <option value='Visa Processing'>Visa Processing</option>
                            </select>
                        </td>
                        <td><input type='text' id='uptcountry' name='uptcountry' value='$print->country'></td>
                        <td><input type='text' id='uptref' name='uptref' placeholder='Reference' value='$print->ref'></td>
                        <td colspan='2'>
                            <select id='uptstatus' class='custom-select custom-select-sm' name='uptstatus' required>
                                <option value='$print->status' selected>$print->status</option>
                                <option value='Received'>Received</option>
                                <option value='Processing'>Processing</option>
                                <option value='Processing Done'>Process Done</option>
                                <option value='Mofa'>Mofa</option>
                                <option value='Fingerprint Done'>Fingerprint Done</option>
                                <option value='Embassy Submited'>Embassy Submited</option>
                                <option value='BMET Manpower'>BMET Manpower</option>
                                <option value='Ready to send back'>Ready to Send Back</option>
                                <option value='Shipped back'>Shipped to Courier</option>
                                <option value='Delivered'>Delivered</option>
                                <option value='On-hold'>On-hold</option>
                                <option value='Failed'>Failed</option>
                            </select>
                        </td>
                    </tr>
                    </form>
                </tbody>
              </table>";
            }
        ?>
        <br>
        <br>
  <?php
  //ListAllRecordsForAdmin
  require_once('listingAllSubmissions-template.php');
}
//FrontendTracking
require_once('tracking.php');

