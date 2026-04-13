<?php
// --- 2. Access Modifiers: public, private, protected ---

class BankAccount
{
    public $holderName;        // everyone can read/write
    private $balance = 0;      // only this class can access
    protected $accountNumber;  // this class + child classes can access

    public function __construct($name, $accNum)
    {
        $this->holderName    = $name;
        $this->accountNumber = $accNum;
    }

    // Public method to change private balance safely
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function getBalance()
    {
        return $this->balance;
    }

    // Protected method: only this class and child classes can call
    protected function logTransaction($amount)
    {
        echo "Logged: {$amount} added to account {$this->accountNumber}<br>";
    }
}

// Demo for BankAccount
echo "<h2>2. Access Modifiers</h2>";
$account = new BankAccount("Ali", "123456");

$account->deposit(1000);
echo "Balance: " . $account->getBalance() . "<br>";
// echo $account->balance; // This would fail: private property

// Note: child class can access protected things; see inheritance example next.
