<?php
  /**
   * Core Class for App
   * Creates the URL's for the MVC structure
   * URL Format -/controller/methods/params
   */

  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
      $url = $this->getUrl();

      // Look in controllers for first value
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        // set as current cotroller
        $this->currentController = ucwords($url[0]);
        // unset index 0
        unset($url[0]);
      }

      //  require controller
      require_once '../app/controllers/' . $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check for second part of the url (method)
      if (isset($url[1])) {
        // Check for method in controller
        if (method_exists($this->currentController, $url[1])) {
          $this->currentMethod = $url[1];
          // Unset index 1
          unset($url[1]);
        }
      }

      // Get parameters
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
      if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/'); // get rid of trailing slash
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        return $url;
      }
    }
  }
