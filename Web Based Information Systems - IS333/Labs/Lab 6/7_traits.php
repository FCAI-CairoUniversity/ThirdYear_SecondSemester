<?php
// --- 7. Trait (code reuse) ---

trait Greeting {
    // You can have methods in traits
    public function sayHello() {
        echo "Hello from " . static::class . "!<br>";
    }

    // And even properties (but be careful with name conflicts)
    public $greetingPrefix = "Hi, ";
}

trait Logging {
    // Static property in trait
    public static $logLevel = "INFO";

    public function info($message) {
        echo "[INFO] " . $message . "<br>";
    }
}

// Class can use multiple traits
class User {
    use Greeting, Logging;

    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function introduce() {
        echo $this->greetingPrefix . $this->name . " here!<br>";
    }
}

echo "<h2>7. Traits (multiple)</h2>";
$user = new User("Kareem");
$user->introduce();
$user->sayHello();
$user->info("User logged in.");
echo "Log level: " . User::$logLevel . "<br>";