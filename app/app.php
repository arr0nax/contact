<?php
date_default_timezone_set('America/Los_Angeles');
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/contact.php';
session_start();
if (empty($_SESSION['list_of_contacts'])) {
  $_SESSION['list_of_contacts'] = array();
};

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

$app->get('/', function() use ($app) {
  return $app['twig']->render('/root.html.twig', array('list_of_contacts'=>$_SESSION['list_of_contacts']));
});

$app->post('/new_contact', function() use ($app) {
  array_push($_SESSION['list_of_contacts'], new Contact($_POST['first_name'], $_POST['last_name'],$_POST['address'],$_POST['phone_number']));
  return $app['twig']->render('/root.html.twig', array('list_of_contacts'=>$_SESSION['list_of_contacts']));
});

$app->post('/clear_list', function() use ($app) {
  $_SESSION['list_of_contacts'] = array();
  return $app['twig']->render('/root.html.twig', array('list_of_contacts'=>$_SESSION['list_of_contacts']));
});

$app->post('/select_contact', function() use ($app) {
  $clicked = $_POST['clicked'];
  return $app['twig']->render('/contact.html.twig', array('id'=>$clicked));
});

$app->post('/edit_contact', function() use ($app) {
  $_SESSION['list_of_contacts'][$_POST['id']] = new Contact($_POST['first_name'], $_POST['last_name'],$_POST['address'],$_POST['phone_number']);
  return $app['twig']->render('/root.html.twig', array('list_of_contacts'=>$_SESSION['list_of_contacts']));
});

return $app;


 ?>
