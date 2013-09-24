<?php
namespace Cpm\Http;

class CurlClient implements IClient {

  /** @var resource cURL handle */
  private $_handle;


  /**==============**
   * Public Methods *
   **==============**/

  /** Construct */
  public function __construct() {
    $this->_handle = curl_init();
    $this->_opt(CURLOPT_HEADER, false);
    $this->_opt(CURLOPT_RETURNTRANSFER, true);
  }


  /** Destruct */
  public function __destruct() {
    curl_close($this->_handle);
  }


  /**
   * Set a request header
   *
   * @param string $name
   * @param string $value
   * @return CurlHttpClient
   */
  public function set($name, $value) {
    $this->_opt(CURLOPT_HTTPHEADER, array(sprintf('%s: %s', $name, $value)));
    return $this;
  }


  /**
   * Set the request URL.
   *
   * @param string $url
   * @return CurlHttpClient
   */
  public function url($url) {
    $this->_opt(CURLOPT_URL, $url);
    return $this;
  }


  /**
   * Make a GET request.
   *
   * @param bool $execute
   * @return CurlHttpClient|array
   */
  public function get($execute) {
    return $execute ? $this->execute() : $this;
  }


  /**
   * Make a POST request.
   *
   * @param mixed $data
   * @param bool $execute
   * @return CurlHttpClient|array 
   */
  public function post($data, $execute) {
    $this->_opt(CURLOPT_POST, true);
    $this->_opt(CURLOPT_POSTFIELDS, $data);
    return $execute ? $this->execute() : $this;
  }

  
  /**
   * Execute the HTTP request.
   *
   * @return array Contains `'body'` (string) and `'status`' (int) 
   */
  public function execute() {
    $body = curl_exec($this->_handle); 
    $status = curl_getinfo($this->_handle, CURLINFO_HTTP_CODE);
    return array(
      'body' => $body,
      'status' => $status
    );
  }


  /**===============**
   * Private Methods *
   **===============**/

  /**
   * Set the value of a `CURLOPT_` constant on the internal cURL handle using `curl_setopt`.
   *
   * @param int $opt
   * @param mixed $value
   * @return void
   */
  private function _opt($opt, $value) {
    curl_setopt($this->_handle, $opt, $value);
  }


  /**=============**
   * Class Methods *
   **=============**/

  /**
   * Factory: make and return a new `CurlHttpClient`.
   *
   * @return CurlHttpClient
   */
  public static function make() {
    return new self();
  }
}
