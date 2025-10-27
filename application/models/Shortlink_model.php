<?php
class Shortlink_model extends CI_Model {

    // Create short link
    public function create($original_url) {
        // Generate a random 6-character code
        $short_code = substr(md5(uniqid(rand(), true)), 0, 6);

        $data = [
            'original_url' => $original_url,
            'short_code' => $short_code
        ];

        $this->db->insert('short_links', $data);
        return $short_code;
    }

    // Get original URL from short code
    public function get_original($short_code) {
        $query = $this->db->get_where('short_links', ['short_code' => $short_code]);
        return $query->row_array();
    }
}
