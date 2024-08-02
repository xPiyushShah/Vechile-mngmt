<?php

namespace App\Models;

use CodeIgniter\Model;

class Push_subscription_model extends Model {

    protected $table = 'push_subscriptions'; 
    protected $primaryKey = 'id'; 

    protected $allowedFields = ['endpoint', 'auth_key', 'p256dh_key']; 
    public function save_subscription($endpoint, $authKey, $p256dhKey) {
        $data = array(
            'endpoint' => $endpoint,
            'auth_key' => $authKey,
            'p256dh_key' => $p256dhKey
        );

        $this->insert($data);
    }

    public function get_subscriptions() {
        return $this->findAll();
    }
}
