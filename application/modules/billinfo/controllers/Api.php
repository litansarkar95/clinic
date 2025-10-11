<?php
class Api extends MX_Controller
{
public function __construct() {
    parent::__construct();
    $this->load->model('item_model');
}

public function items_search() {
    $term = $this->input->get('term');
    $result = $this->item_model->search_items($term);
    echo json_encode($result);
}
}
