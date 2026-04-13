<?php
// --- 9. Namespaces ---

// Namespace: a way to group related classes and avoid naming conflicts
// Think of it like folders for classes: MyApp\Shopping\Cart, MyApp\Blog\Post, etc.

// Example 1: defining a namespace and using it

namespace MyApp\Utils;

class StringHelper {
    public static function shout($text) {
        return strtoupper($text) . "!!!";
    }
}

class NumberHelper {
    public static function double($n) {
        return $n * 2;
    }
}

// Example 2: another namespace with same class name but different meaning

namespace MyApp\Models;

class User {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function greet() {
        return "Hello, I'm " . $this->name;
    }
}

// Example 3: another User class in a different namespace

namespace MyApp\Auth;

class User {
    public $username;

    public function __construct($username) {
        $this->username = $username;
    }

    public function login() {
        return "User {$this->username} logged in.";
    }
}