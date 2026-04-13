```markdown
# PHP OOP Practice Challenges

This document contains practical, code‑oriented challenges that match the OOP topics you studied (based on the given code examples).

---

## 1. Classes & Objects

### Challenge 1: Product class

- Create a `Product` class with properties: `name`, `price`, `stock`.
- Add a constructor to set all three.
- Add a method `getLabel()` that returns something like:  
  `"Laptop (Price: 15000, Stock: 3)"`.
- Instantiate at least two products and echo their labels.

### Challenge 2: Todo item

- Create a `TodoItem` class with `title`, `completed` (boolean).
- Add methods: `complete()`, `reopen()`, `isCompleted()`.
- Build a small script that creates an array of `TodoItem` objects and loops over them to print their state.

---

## 2. Access Modifiers

### Challenge 3: Secure bank account

- Start from your `BankAccount` example.
- Make `balance` **private** and add:
  - `withdraw($amount)` (only if there is enough balance).
  - A **protected** method `logTransaction($type, $amount)` used internally.
- Try to access `$account->balance` directly to see the error.

### Challenge 4: Protected property in child

- Create `UserBase` with `protected $id` and `public function getId()`.
- Create `AdminUser extends UserBase` that sets `$id` in its constructor.
- Show that `$admin->id` fails but `$admin->getId()` works.

---

## 3. Constructors, Destructors, Magic Methods

### Challenge 5: Session tracker

- Create class `SessionUser` with properties: `username`, `loginTime`.
- In `__construct`, set both and echo “User X logged in at Y”.
- In `__destruct`, echo “User X logged out”.
- Create a small script that creates and unsets the object manually (`unset($user)`), watching the destructor trigger.

### Challenge 6: `__toString` practice

- Create class `Order` with `id`, `total`, `status`.
- Implement `__toString()` so `echo $order;` prints a readable label.
- Create a few orders and echo them directly.

---

## 4. Inheritance

### Challenge 7: Shape hierarchy

- Create parent class `Shape` with properties `$name` and method `describe()`.
- Create child classes: `Circle`, `Rectangle`.
- Each child should override `describe()` and add its own specific info (radius, width/height).
- Use an array of `Shape` objects (both `Circle` and `Rectangle`) and loop through calling `describe()`.

### Challenge 8: Employee types

- Create parent class `Employee` with `name`, `baseSalary`, method `getMonthlyPay()`.
- Create children:
  - `Developer` adds `bonus`.
  - `Manager` adds `teamSize`.
- Override `getMonthlyPay()` in each child with different logic.
- Loop through a list of employees and print their pays.

---

## 5. Abstract Classes & Methods

### Challenge 9: Payment methods

- Create abstract class `PaymentMethod` with:
  - abstract `pay(float $amount)`.
  - normal method `printReceipt()`.
- Create `CreditCardPayment` and `PaypalPayment` that implement `pay()`.
- Write a function `processPayment(PaymentMethod $method, $amount)` that calls both `pay()` and `printReceipt()`.

### Challenge 10: Transport modes

- Abstract class `Transport` with abstract `move()` and property `$speed`.
- Child classes `CarTransport`, `BikeTransport`, `PlaneTransport` each implement `move()` differently.
- Put them in an array and call `move()` polymorphically.

---

## 6. Interfaces

### Challenge 11: Loggable & Cacheable

- Create interfaces:
  - `Loggable` (method `log($message)`).
  - `Cacheable` (method `cacheKey(): string`).
- Make a `Product` class implement both.
- Build a function `debugItem(Loggable $item)` that calls `log("Debug...")`.

### Challenge 12: Authenticatable

- Interface `Authenticatable` with methods `login()`, `logout()`.
- Implement in `AdminUser` and `CustomerUser` with different echo messages.
- Accept any `Authenticatable` in a function `runAuthDemo(Authenticatable $user)`.

---

## 7. Traits

### Challenge 13: Reusable Logging trait

- Create trait `LoggingTrait` with method `logInfo($message)` (echo with class name).
- Use it in `FileStorage` and `DatabaseStorage` classes.
- Show that both can call `$this->logInfo()`.

### Challenge 14: Timestamp trait

- Trait `HasTimestamps` with properties `$createdAt`, `$updatedAt` and methods `touchCreated()`, `touchUpdated()`.
- Use it in `Post` and `Comment` classes.
- Simulate creating and updating posts/comments, echoing timestamps.

---

## 8. Static Methods & Properties

### Challenge 15: ID generator

- Class `IdGenerator` with static property `$lastId` and static method `nextId()` that increments and returns it.
- Use it in multiple other classes (`User`, `Order`) to assign IDs without instantiating `IdGenerator`.
- Show that calling `IdGenerator::nextId()` from different places continues the same sequence.

### Challenge 16: Configuration

- Class `Config` with static property `$settings` (array) and methods:
  - `set($key, $value)`.
  - `get($key, $default = null)`.
- Use `Config::set()` in one place and `Config::get()` in multiple other classes.

---

## 9. Namespaces & Multiple Files

### Challenge 17: Models namespace

- In `src/Models/Product.php`, declare `namespace App\Models;` and define `Product`.
- In `public/index.php`, `require_once` that file, then:
  - Use `new \App\Models\Product(...)`.
  - Then import with `use App\Models\Product;` and use `new Product(...)`.

### Challenge 18: Two User classes in different namespaces

- `src/Models/User.php` → `namespace App\Models;` class `User` with `greet()`.
- `src/Auth/User.php` → `namespace App\Auth;` class `User` with `login()`.
- In `index.php`, include both and:
  - Instantiate using full names.
  - Then alias with:
    - `use App\Models\User as ModelUser;`
    - `use App\Auth\User as AuthUser;`.

### Challenge 19: Utilities namespace with static helpers

- `src/Utils/StringUtils.php` → `namespace App\Utils;` class `StringUtils` with static `camelCase()`, `snakeCase()`.
- In `index.php`, import with `use App\Utils\StringUtils;` and call `StringUtils::camelCase("hello_world")`, etc.
```