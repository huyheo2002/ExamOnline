<?php

if($db){
    $db->createTable("permission_groups", [
        "id" => ['int(10)', 'unsigned', 'auto_increment', 'primary key'],
        "name" => ['varchar(255)', 'unique', 'not null'],
        "created_at" => ['TIMESTAMP', 'NOT NULL', 'DEFAULT CURRENT_TIMESTAMP'],
        "updated_at" => ['TIMESTAMP', 'NULL', 'DEFAULT NULL', 'ON UPDATE CURRENT_TIMESTAMP']
    ]);
    
    $db->createTable("permissions", [
        "id" => ['int(10)', 'unsigned', 'auto_increment', 'primary key'],
        "name" => ['varchar(255)', 'unique', 'not null'],
        "key" => ['varchar(255)', 'unique', 'not null'],
        "permisstion_group_id" => ['int(10)', 'unsigned', 'not null'],
        "created_at" => ['TIMESTAMP', 'NOT NULL', 'DEFAULT CURRENT_TIMESTAMP'],
        "updated_at" => ['TIMESTAMP', 'NULL', 'DEFAULT NULL', 'ON UPDATE CURRENT_TIMESTAMP']
    ], [
        "permisstion_group_id" => "permission_groups(id)"
    ]);
    
    $db->createTable("roles_permissions", [
        "permission_id" => ['int(10)'],
        "role_id" => ['int(10)'],
        "created_at" => ['TIMESTAMP', 'NOT NULL', 'DEFAULT CURRENT_TIMESTAMP'],
        "updated_at" => ['TIMESTAMP', 'NULL', 'DEFAULT NULL']
    ]);
    
    $db->createTable("roles", [
        "id" => ['int(10)', 'primary key'],
        "name" => ['varchar(255)'],
        "created_at" => ['TIMESTAMP', 'NOT NULL', 'DEFAULT CURRENT_TIMESTAMP'],
        "updated_at" => ['TIMESTAMP', 'NULL', 'DEFAULT NULL']
    ]);
    
    $db->createTable("users", [
        "id" => ['int(10)', 'unsigned', 'auto_increment', 'primary key'],
        "name" => ['varchar(50)'],
        "email" => ['varchar(50)'],
        "username" => ['varchar(50)'],
        "password" => ['varchar(50)'],
        "phone" => ['varchar(50)', 'NULL'],
        "address" => ['varchar(50)'],
        "school_id" => ['int(10)', 'NULL'],
        "type" => ['int(10)', 'NULL'],
        "parent_id" => ['int(10)', 'NULL'],
        "verified_at" => ['TIMESTAMP', 'NULL', 'DEFAULT NULL'],
        "social_type" => ['int(10)'],    
        "social_id" => ['varchar(50)', 'unique', 'NULL'],
        "social_name" => ['varchar(50)', 'NULL'],
        "social_nickname" => ['varchar(50)', 'NULL'],
        "social_avatar" => ['varchar(50)', 'NULL'],
        "description" => ['varchar(50)', 'NULL']    
    ]);
}

