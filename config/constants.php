<?php

return [
    "DELIVERY_TYPE" => ["D"=>"Delivery", "T"=>"Take Way"],
    "DELIVERY_STATUS" => ["P"=>"Pending", "R"=>"Ready"],
    "PENDING" => "P",

    "ORDER_NOTIFICATION_METHODS" => explode(",", trim(env("ORDER_NOTIFICATION_METHODS"))),
];