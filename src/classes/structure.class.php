<?php
use PHPMailer\PHPMailer;
require 'phpmailer\PHPMailer.php';
require 'phpmailer\SMTP.php';
require 'phpmailer\Exception.php';

function sendmail($body,$subject,$to){
    
    $mail = new PHPMailer\PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;  
        // $mail->SMTPDebug = 1;                                 //Enable SMTP authentication
        $mail->Username   = 'swaggersharma69@gmail.com';                     //SMTP username
        $mail->Password   = '@DhAnU143';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('swaggersharma69@gmail.com', 'IMS');
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($to);               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

$servername = 'localhost';
$username = 'root';
$serverpass = '';
$database = 'myrl';
$con = mysqli_connect($servername, $username, $serverpass, $database);
if (!$con) {
    die;
}
class Session
{
    public static function init()
    {
        // session_start();
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = filter_var($value);
    }

    public static function get($key)
    {
        return (isset($_SESSION[$key]) ? filter_var($_SESSION[$key]) : null);
    }

    public static function forget($key)
    {
        unset($_SESSION[$key]);
    }

    public static function isset($key)
    {
        return (isset($_SESSION[$key])) ? true : false;
    }

    public static function unset()
    {
        session_unset();
    }

    public static function destroy()
    {
        session_destroy();
    }
}

class Structure
{
    // This class contains visual elements which can be initialized for easier access
    // and easier sitewide changes
    public static function checkLogin()
    {
        if (Session::isset('user_logged_type') == false) {
            // Structure::redirectHome();
        }
    }

    public static function header($title)
    {
        define('DIRROOT',__DIR__.'/../');
        error_reporting(7);
        isset($_SESSION) ?: session_start();
        // echo '<pre>';
        // print_r($_SERVER);die;
        
        $servername = 'localhost';
        $username = 'root';
        $serverpass = '';
        $database = 'myrl';
        $con = mysqli_connect($servername, $username, $serverpass, $database);
        if (!$con) {
            die;
        }
        $uri   = rtrim(dirname(filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_URL)), '/\\');

        $dot = "";
        if (Structure::endsWith($uri, "admin") || Structure::endsWith($uri, "student") || Structure::endsWith($uri, "teacher")) {
            $dot = "../";
        }

?>
        <!-- HTML Code -->
        <?php
        if (isset($_SESSION['uid'])) { ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <base href="http://localhost/ims/src/">
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- CSS -->
                <link rel="stylesheet" href="theme/css/home.css">
                <link rel="stylesheet" href="theme/css/table.css">
                <link rel="stylesheet" href="theme/css/form.css">
                <!-- FontAwesome -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
                <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
                <!-- FontAwesome -->
                <title><?= $title ?></title>
            </head>

            <body>
                <!-- SideBar Navigation -->
                <nav>
                    <!-- Name and Logo -->
                    <div class="logo-details">
                        <div class="logo-icon">
                            <i class="fa-solid fa-infinity"></i>
                        </div>
                        <span class="logo_name">Infinity</span>
                    </div>
                <?php } ?>
                <!-- Name and Logo complete-->
            <?php
            return $con;
        }


        public static function footer()
        {
            ?>
                <?php
                if (isset($_SESSION['uid'])) { ?>
                    </div>
                    <!-- Dashboard overview complete -->
                    </div>
                    <!-- Dashboard content complete -->
                    </section>
                    <!-- Dashboard Section complete -->
                    <script src="theme/javascript/home.js"></script>
                    <script src="theme/javascript/validation.js"></script>
            </body>

            </html>
        <?php } ?>
<?php
        }

        public static function nakedURL($extra = "")
        {
            $host  = filter_input(INPUT_SERVER, "HTTP_HOST", FILTER_DEFAULT);
            $uri   = rtrim(dirname(filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_URL)), '/\\');
            return "http://$host$uri/$extra";
        }

        public static function redirect($extra = "")
        {
            $host  = filter_input(INPUT_SERVER, "HTTP_HOST", FILTER_DEFAULT);
            $uri   = rtrim(dirname(filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_URL)), '/\\');
            header("Location: http://$host$uri/$extra");
        }

        public static function redirectHome()
        {
            $host  = filter_input(INPUT_SERVER, "HTTP_HOST", FILTER_DEFAULT);
            $uri   = rtrim(dirname(filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_URL)), '/\\');

            header("Location: http://$host" . str_replace(array("admin", "student", "teacher"), "", $uri));
        }

        public static function currentURL()
        {
            if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === 'on') {
                $link = "https";
            } else {
                $link = "http";
            }
            $link .= "://";
            $link .= filter_input(INPUT_SERVER, "HTTP_HOST", FILTER_SANITIZE_URL);
            $link .= filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_URL);
            return $link;
        }

        public static function endsWith($string, $endString)
        {
            $len = strlen($endString);
            if ($len == 0) {
                return true;
            }
            return (substr($string, -$len) === $endString);
        }

        public static function errorPage($error)
        {
            // Structure::header("Error - Project");
            echo '<script>alert("'.$error . '")</script>';
            Structure::footer();
        }

        public static function errorBox($title, $error)
        {
            echo ('<main role="main" class="container mt-3">
          <h1 class="display-4 text">' . $title . '</h1>
          <hr>
          <div class="alert alert-danger" role="alert">' . $error . '</div>
        </main>');
        }

        public static function successBox($title, $message, $link = "")
        {
            echo ('<main role="main" class="container mt-3">
          <h1 class="display-4 text">' . $title . '</h1>
          <hr>
          <div class="alert alert-success" role="alert">' . $message . '</div>
        </main>');
        }

        public static function topHeading($heading)
        {
            $home = str_replace(basename(filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_URL)), "", Structure::currentURL());
            echo ('<div class="row">
        <div class="col col-sm-10">
          <h1 class="">' . $heading . '</h1>
        </div>
        <div class="col col-sm-1 pt-3">
       
        </div>');
        }

        public static function is_int_present($int)
        {
            return (isset($int) && !empty($int) && (is_numeric($int) ? true : false) == true);
        }

        public static function if_input_exists($key, $type)
        {
            if ($type == "POST") {
                $key = filter_input(INPUT_POST, $key, FILTER_DEFAULT);
            } else {
                $key = filter_input(INPUT_GET, $key, FILTER_DEFAULT);
            }

            return (isset($key) && empty($key)) ? true : false;
        }

        public static function if_all_inputs_exists(array $keys, $type)
        {
            $array = "";
            if ($type == "POST" || $type == "post") {
                $array = $_POST;
            } elseif ($type == "GET" || $type == "get") {
                $array = $_GET;
            } else {
                $array = $_REQUEST;
            }

            $count = 0;
            foreach ($keys as $key) {
                if (isset($array[$key]) || array_key_exists($key, $array)) {
                    $count++;
                }
            }

            return count($keys) === $count;
        }

        public static function get_input_var($key, $input_type)
        {
            return filter_input($input_type, $key, FILTER_DEFAULT);
        }
    }

    function _esc($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
