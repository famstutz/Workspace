<?php
class HttpResponse implements Response {
    public function addHeader($name, $value) {
        header($name . ': ' . $value);
    }

    public function flush() {
        flush();
    }

    public function setStatus($status) {
        return http_response_code($status);
    }

    public function write($data) {
        return http_send_data($data);
    }
}
?>
