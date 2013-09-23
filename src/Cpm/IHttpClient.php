<?php
namespace Cpm;


interface IHttpClient {

  /**
   * Set a request header
   *
   * @param string $name
   * @param string $value
   * @return HttpClient
   */
  public function set($name, $value);


  /**
   * Set the request URL.
   *
   * @param string $url
   * @return HttpClient
   */
  public function url($url);


  /**
   * Make a GET request.
   * 
   * @param bool $execute
   * @return HttpClient|array
   */
  public function get($execute);


  /**
   * Make a POST request.
   *
   * @param mixed $data
   * @param bool $execute
   * @return HttpClient|array
   */
  public function post($data, $execute);


  /**
   * Execute the HTTP request.
   *
   * @return array Contains `'body'` (string) and `'status`' (int) 
   */
  public function execute(); 


  /**
   * Factory: make and return a new `HttpClient`.
   *
   * @return HttpClient
   */
  public static function make();
}
