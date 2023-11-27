<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));


switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'country':
        $error = array();        

        $country = isset($_POST['country']) ? trim($_POST['country']) : '';
        if (empty($country)) {
            $error[] = urlencode('Please enter a country');
        }
        if (strlen($country) > 50){
            $error[] = urlencode('Your country is to long');
        }

        $last_update = isset($_POST['last_update']) ? $_POST['last_update'] : date("Y-m-d H:m:s");
        if (empty($last_update) || !strtotime($last_update)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $last_update = date("Y-m-d H:i:s", strtotime($last_update));
        }

        if (empty($error)) {
            $query = 'INSERT INTO
                country
                    (country, last_update)
                VALUES
                    ("' . $country . '",
                     "' . $last_update . '")';
        } else {
          
          if(!is_array($error)) {
            $error = [$error];
          }
          $errorString = join('<br/>', array_map('urlencode', $error));
          header('Location:country.php?action=add' . '&error=' . $errorString);
        }
        break;
    
    case 'city':
        $error = array();

        $city = isset($_POST['city']) ? trim($_POST['city']) : '';
        if (empty($city)) {
            $error[] = urlencode('Please enter a city');
        }
        if (strlen($city) > 50){
            $error[] = urlencode('Your city name is to long');
        }
        
        $country_id = isset($_POST['country_id']) ? trim($_POST['country_id']) : '';
        if (empty($country_id)) {
            $error[] = urlencode('Please enter a country');
        }

        $last_update = isset($_POST['last_update']) ? $_POST['last_update'] : date("Y-m-d H:m:s");
        if (empty($last_update) || !strtotime($last_update)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $last_update = date("Y-m-d H:i:s", strtotime($last_update));
        }

        if (empty($error)) {
            $query = 'INSERT INTO
                city
                    (city, country_id, last_update)
                VALUES
                    ("' . $city . '",
                     "' . $country_id . '",
                     "' . $last_update . '")';
        } else {
          
          if(!is_array($error)) {
            $error = [$error];
          }
          $errorString = join('<br/>', array_map('urlencode', $error));
          header('Location:city.php?action=add' . '&error=' . $errorString);
        }
        break;
    case 'address':
        $error = array();

        $address1 = isset($_POST['address1']) ? trim($_POST['address1']) : '';
        if (empty($address1)) {
            $error[] = urlencode('Please enter an address');
        }
        if (strlen($address1) > 50){
            $error[] = urlencode('Your address is to long');
        }

        $address2 = isset($_POST['address2']) ? trim($_POST['address2']) : '';
        if (empty($address2)) {
            $error[] = urlencode('Please enter a second address');
        }
        if (strlen($address2) > 50){
            $error[] = urlencode('Your second address is to long');
        }

        $district = isset($_POST['district']) ? trim($_POST['district']) : '';
        if (empty($district)) {
            $error[] = urlencode('Please enter a district');
        }
        if (strlen($district) > 20){
            $error[] = urlencode('Your district name is to long');
        }

        $city_id = isset($_POST['city_id']) ? trim($_POST['city_id']) : '';
        $postal_code = isset($_POST['postal_code']) ? trim($_POST['postal_code']) : '';
        if (empty($postal_code)) {
            $error[] = urlencode('Please enter a postal code');
        }
        if (strlen($postal_code) > 10){
            $error[] = urlencode('Your postal code is to long');
        }

        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        if (empty($phone)) {
            $error[] = urlencode('Please enter a phone');
        }
        if (strlen($phone) > 20){
            $error[] = urlencode('Your phone number is to long');
        }

        $last_update = isset($_POST['last_update']) ? $_POST['last_update'] : date("Y-m-d H:m:s");
        if (empty($last_update) || !strtotime($last_update)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $last_update = date("Y-m-d H:i:s", strtotime($last_update));
        }

        if (empty($error)) {
            $query = 'INSERT INTO
                address1
                    (address1, address2, district, city_id, postal_code, phone, last_update)
                VALUES
                    ("' . $address1 . '",
                     "' . $address2 . '",
                     "' . $district . '",
                     ' . $city_id . ',
                     "' . $postal_code . '",
                     "' . $phone . '",
                     "' . $last_update . '")';
        } else {
          
          if(!is_array($error)) {
            $error = [$error];
          }
          $errorString = join('<br/>', array_map('urlencode', $error));
          header('Location:address1.php?action=add' . '&error=' . $errorString);
        }
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'country':
        $error = array();

        $country = isset($_POST['country']) ? trim($_POST['country']) : '';
        if (empty($country)) {
            $error[] = urlencode('Please enter a country');
        }
        if (strlen($country) > 50){
            $error[] = urlencode('Your country is to long');
        }

        $last_update = isset($_POST['last_update']) ? $_POST['last_update'] : date("Y-m-d H:m:s");
        if (empty($last_update) || !strtotime($last_update)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $last_update = date("Y-m-d H:i:s", strtotime($last_update));
        }

        if (empty($error)) {
            $query = 'UPDATE
                    country
                SET 
                    country = "' . $country . '",
                    last_update = "' . $last_update . '"
                WHERE
                    country_id = ' . $_POST['country_id'];
        } else {
          if(!is_array($error)) {
              $error = [$error];
            }

          $errorString = join('<br/>', array_map('urlencode', $error));
          header('Location:country.php?action=edit&id=' . $_POST['country_id'] . '&error=' . $errorString);
        }
        break;
    
    case 'city':
        $error = array();

        $city = isset($_POST['city']) ? trim($_POST['city']) : '';
        if (empty($city)) {
            $error[] = urlencode('Please enter a city');
        }
        if (strlen($city) > 50){
            $error[] = urlencode('Your city name is to long');
        }
        
        $country_id = isset($_POST['country_id']) ? trim($_POST['country_id']) : '';
        if (empty($country_id)) {
            $error[] = urlencode('Please enter a country');
        }

        $last_update = isset($_POST['last_update']) ? $_POST['last_update'] : date("Y-m-d H:m:s");
        if (empty($last_update) || !strtotime($last_update)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $last_update = date("Y-m-d H:i:s", strtotime($last_update));
        }

        if (empty($error)) {
            $query = 'UPDATE 
                    city 
                SET
                    city = "' . $city . '",
                    country_id = ' . $country_id . ',
                    last_update = "' . $last_update . '"
                WHERE
                    city_id = ' . $_POST['city_id'];

        } else {
            if (!is_array($error)) {
                $error = [$error];
            }

            $errorString = join('<br/>', array_map('urlencode', $error));
            header('Location: city.php?action=add' . '&error=' . $errorString);
        }
        break;
    case 'address':
        $error = array();

        $address1 = isset($_POST['address1']) ? trim($_POST['address1']) : '';
        if (empty($address1)) {
            $error[] = urlencode('Please enter an address');
        }
        if (strlen($address1) > 50){
            $error[] = urlencode('Your address is to long');
        }

        $address2 = isset($_POST['address2']) ? trim($_POST['address2']) : '';
        if (empty($address2)) {
            $error[] = urlencode('Please enter a second address');
        }
        if (strlen($address2) > 50){
            $error[] = urlencode('Your second address is to long');
        }

        $district = isset($_POST['district']) ? trim($_POST['district']) : '';
        if (empty($district)) {
            $error[] = urlencode('Please enter a district');
        }
        if (strlen($district) > 20){
            $error[] = urlencode('Your district name is to long');
        }

        $city_id = isset($_POST['city_id']) ? trim($_POST['city_id']) : '';
        $postal_code = isset($_POST['postal_code']) ? trim($_POST['postal_code']) : '';
        if (empty($postal_code)) {
            $error[] = urlencode('Please enter a postal code');
        }
        if (strlen($postal_code) > 10){
            $error[] = urlencode('Your postal code is to long');
        }

        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        if (empty($phone)) {
            $error[] = urlencode('Please enter a phone');
        }
        if (strlen($phone) > 20){
            $error[] = urlencode('Your phone number is to long');
        }

        $last_update = isset($_POST['last_update']) ? $_POST['last_update'] : date("Y-m-d H:m:s");
        if (empty($last_update) || !strtotime($last_update)) {
            $error[] = urlencode('Please enter a valid date');
        } else {
            // Convierte la fecha al formato deseado (Y-m-d H:i:s)
            $last_update = date("Y-m-d H:i:s", strtotime($last_update));
        }

        if (empty($error)) {
            $query = 'UPDATE 
                    address1 
                SET
                    address1 = "' . $address1 . '",
                    address2 = "' . $address2 . '",
                    district = "' . $district . '",
                    city_id = ' . $city_id . ',
                    postal_code = "' . $postal_code . '",
                    phone = "' . $phone . '",
                    last_update = "' . $last_update . '"
                WHERE
                    address_id = ' . $_POST['address_id'];

        } else {
            if (!is_array($error)) {
                $error = [$error];
            }

            $errorString = join('<br/>', array_map('urlencode', $error));
            header('Location: address1.php?action=add' . '&error=' . $errorString);
        }
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
    <p>Done!</p>
 </body>
</html>