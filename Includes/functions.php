<?php
if (!isset($_SESSION)) { session_start(); }

/**Several of these following code segments belong to https:/www.github.com/banago
 * banago's free php resources were incredibly helpful in teaching me how to use php stylistic elements 
 * 
 * Displays site name.
 */
function site_name()
{
    echo config('site_name');
}

/**
 * Displays site url provided in config.
 */
function site_url()
{
    echo config('site_url');
}

/**
 * Displays site version.
 */
function site_version()
{
    echo config('version');
}

/**
 * Website navigation.
 */
function nav_menu($sep = ' | ')
{
    $nav_menu = '';
    $nav_items = config('nav_menu');
    
    foreach ($nav_items as $uri => $name) {
        $query_string = str_replace('page=', '', $_SERVER['QUERY_STRING'] ?? '');
        $class = $query_string == $uri ? ' active' : '';
        $url = config('site_url') . '/' . (config('pretty_uri') || $uri == '' ? '' : '?page=') . $uri;
        
        // Add nav item to list. See the dot in front of equal sign (.=)
        $nav_menu .= '<a href="' . $url . '" title="' . $name . '" class="item ' . $class . '">' . $name . '</a>' . $sep;
    }

    echo trim($nav_menu, $sep);
}

/**
 * Displays page title. It takes the data from
 * URL, it replaces the hyphens with spaces and
 * it capitalizes the words.
 */
function page_title()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';

    echo ucwords(str_replace('-', ' ', $page));
}

/**
 * Displays page content. It takes the data from
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function page_content()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path = getcwd() . '/' . config('content_path') . '/' . $page . '.phtml';

    if (! file_exists($path)) {
        $path = getcwd() . '/' . config('content_path') . '/404.phtml';
    }

    echo file_get_contents($path);
}

/**
 * Starts everything and displays the template.
 */
function init()
{
    require config('template_path') . '/template.php';
}

# Returns TRUE if given password is correct password for this user name.
function is_password_correct($name, $password) {
  $db = new PDO("mysql:host=localhost;dbname=wiki", "root", "");
  $name = $db->quote($name);
  $rows = $db->query("SELECT password FROM users WHERE name = $name");
  if ($rows) {
    foreach ($rows as $row) {
      $correct_password = $row["password"];
      return $password === $correct_password;
    }
  } else {
    return FALSE;   # user not found
  }
}

/*
end banago
*/

/*
function user_exist($name) { //done dont even think about touch
  $db = new PDO("mysql:host=localhost;dbname=wiki", "root", "");
  $name = $db->quote($name);
  $rows = $db->query("SELECT name FROM users WHERE name = $name");
  if ($rows) {
    foreach ($rows as $row) {
      $user = $row["password"];
      return $user !== $name; #user found
    }
  } else {
    return FALSE; #user not found
  }
}

function register($name, $password) { //done do not touch
  $db = mysqli_connect("localhost", "root", "", "wiki");
  $query = "INSERT INTO users VALUES ('$name', '$password')";
  if (!mysqli_query($db, $query)) {
    die('Error '.mysqli_error($db));
  } 
}

function post_article($stitle, $title, $body) { //done do not touch
  $db = mysqli_connect("localhost", "root", "", "wiki");
  $stitle = $_REQUEST["short_title"];
  $title = $_REQUEST["title"];
  $body = $_REQUEST["body"];
  $query = "INSERT INTO articles VALUES ('$stitle', '$title', '$body')";
  if (empty($stitle) || empty($title) || empty($body)) { //this took me WAY too long to figure out. Okay? A simple if statement. Way too long. I am actually ashamed of myself.
    redirect("/Content/writearticle.phtml", "Please provide a short title, title, and body.");
  } elseif (!mysqli_query($db, $query)) {
    return redirect("/Content/writearticle.phtml", "Article with short title $stitle already exists!");
    // die('Error '.mysqli_error($db));
  } else {
    redirect ("/Content/viewarticle.phtml?short_title=$stitle", "Article Posted!");
    exit();
  }
}

function get_articles() {
  $db = mysqli_connect("localhost", "root", "", "wiki");
  // $query = "SELECT * FROM articles";
  return $db->query("SELECT * FROM articles");
}

function get_article($stitle) {
  $db = mysqli_connect("localhost", "root", "", "wiki");
  // $query = "SELECT * FROM articles";
  return $db->query("SELECT * FROM articles WHERE short_title = '{$stitle}'");
}

function update_title($stitle, $title) {
  $db = mysqli_connect("localhost", "root", "", "wiki");
  if (empty($title)){
    redirect("/Content/viewarticle.phtml?short_title=$stitle", "Please provide title text");
  } else{
    $db->query("UPDATE articles SET title = '$title' WHERE short_title = '$stitle'");
    redirect("/Content/viewarticle.phtml?short_title=$stitle", "Succesfully updated title!");
  }
}

function update_body($stitle, $body) {
  $db = mysqli_connect("localhost", "root", "", "wiki");
  if (empty($body)){
    redirect("/Content/viewarticle.phtml?short_title=$stitle", "Please provide title text");
  } else{
    $db->query("UPDATE articles SET body = '$body' WHERE short_title = '$stitle'");
    redirect("/Content/viewarticle.phtml?short_title=$stitle", "Succesfully updated body!");
  }
}

function update_article($stitle, $title, $body) {
  $db = mysqli_connect("localhost", "root", "", "wiki");
  if (empty($body) && empty($title)){
    redirect("/Content/viewarticle.phtml?short_title=$stitle", "Please provide title/body text");
  } else{
    $db->query("UPDATE articles SET title = '$title' WHERE short_title = '$stitle'");
    $db->query("UPDATE articles SET body = '$body' WHERE short_title = '$stitle'");
    redirect("/Content/viewarticle.phtml?short_title=$stitle", "Succesfully updated title and body!");
  }
}

# Redirects current page to user.phtml if user is not logged in.
function ensure_logged_in() {
  if (!isset($_SESSION["name"])) {
    redirect("/Content/user.phtml", "You must log in before you can view that page.");
  }
}

# Redirects current page to the given URL and optionally sets flash message.
function redirect($url, $flash_message = NULL) {
  if ($flash_message) {
    $_SESSION["flash"] = $flash_message;
  }
  # session_write_close();
  header("Location: $url");
  die;
}

*/

?>