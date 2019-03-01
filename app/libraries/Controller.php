<?php
  /**
   * Base Controller class
   *
   * This loads the models and views.
   */

  class Controller
  {
    /**
     * Loads model
     *
     * @param String $model
     *
     * @return new $model()
     */
    public function model($model) {
      // Require model file
      require_once '../app/models/'.$model . '.php';

      // Instantiate model
      return new $model();
    }

    /**
     * Load the view and the data
     *
     * @param String $view
     * @param Array $data
     *
     * @return
     */
    public function view($view, $data=[]) {
      // Check for the view file
      if (file_exists('../app/views/' . $view . '.php')) {
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist.
        die('View does not exist');
      }
    }

  }
