<?php
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
        isset($_SESSION) ?: session_start();
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
                <base href="http://localhost/ims1/src/">
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- CSS -->
                <link rel="stylesheet" href="src/css/style.css">
                <link rel="stylesheet" href="src/css/tab.css">
                <!-- FontAwesome -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
                <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
                <!-- FontAwesome -->
                <title>Admin</title>
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
                    <script src="src/javascript/home.js"></script>
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
            echo ('<main role="main" class="container mt-3">
            <h1 class="display-4 text">Error</h1>
            <hr>
            <div class="alert alert-danger" role="alert">' . _esc($error) . '</div>
            </main>');
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
          <a class="btn btn-primary btn-small" href="' . $link . '" role="button">Go back!</a>
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
