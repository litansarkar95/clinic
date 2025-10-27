<?php
class Shortlink extends CI_Controller {

    // Generate short link
    public function generate($invoice_id) {
    

        $original_url = base_url("billinfo/invoice/$invoice_id");
        $short_code = $this->shortlink_model->create($original_url);
        $short_link = base_url("s/$short_code");

        echo "Short link: <a href='$short_link'>$short_link</a>";
    }

    // Redirect from short link to original
    public function redirect($short_code) {
      

        $link = $this->shortlink_model->get_original($short_code);
        if ($link) {
            redirect($link['original_url']);
        } else {
            show_404();
        }
    }
}
