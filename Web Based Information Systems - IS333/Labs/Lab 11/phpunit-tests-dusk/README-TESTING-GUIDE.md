# Laravel PHPUnit Testing Guide

This is a Laravel 13 project configured for testing with PHPUnit and Laravel Dusk for browser testing.

## Project Overview

- **Laravel Version**: 13.x
- **PHP Version**: 8.3+
- **Testing Framework**: PHPUnit 12.x
- **Browser Testing**: Laravel Dusk 8.x
- **Database**: SQLite (for testing)
- **Project Location**: `H:\Work\Laravel\2026\Testing\phpunit-tests`

## Project Structure

```
phpunit-tests/
├── app/                    # Application code
│   ├── Http/               # HTTP controllers, middleware
│   ├── Models/             # Eloquent models
│   └── Providers/          # Service providers
├── config/                 # Configuration files
├── database/              # Database files
│   ├── factories/         # Model factories
│   ├── migrations/        # Database migrations
│   └── seeders/          # Database seeders
├── public/                # Public assets
├── resources/             # Views, CSS, JS
├── routes/                # Route definitions
├── storage/               # Logs, cache
├── tests/                 # Test files
│   ├── Browser/           # Laravel Dusk browser tests
│   ├── Feature/           # Feature tests
│   ├── Unit/              # Unit tests
│   ├── DuskTestCase.php   # Base class for browser tests
│   └── TestCase.php       # Base class for all tests
├── vendor/                # Composer dependencies
├── .env                   # Environment configuration
├── phpunit.xml            # PHPUnit configuration
├── composer.json          # Composer dependencies
├── package.json           # NPM dependencies
└── vite.config.js         # Vite configuration
```

## Testing Dependencies (from composer.json)

```json
"require-dev": {
    "fakerphp/faker": "^1.23",
    "laravel/dusk": "^8.6",
    "laravel/pint": "^1.27",
    "mockery/mockery": "^1.6",
    "nunomaduro/collision": "^8.6",
    "phpunit/phpunit": "^12.5.12"
}
```

---

## Step 1: Environment Setup

### Prerequisites
- PHP 8.3 or higher
- Composer
- Node.js and npm
- Chrome/Chromium browser (for Dusk)

### Install Dependencies

```powershell
composer install
```

### Create Environment File

```powershell
# If .env doesn't exist, create it from example
php artisan key:generate
```

### Database Setup

```powershell
# Create SQLite database file
touch database/database.sqlite

# Run migrations
php artisan migrate
```

### Install Frontend Dependencies

```powershell
npm install
npm run build
```

---

## Step 2: Running Tests

### Run All Tests

```powershell
php artisan test
```

Or directly with PHPUnit:

```powershell
./vendor/bin/phpunit
```

### Run Specific Test Suites

**Unit Tests Only:**
```powershell
./vendor/bin/phpunit --testsuite=Unit
```

**Feature Tests Only:**
```powershell
./vendor/bin/phpunit --testsuite=Feature
```

### Run a Specific Test File

```powershell
./vendor/bin/phpunit tests/Unit/BoxUnitTest.php
```

### Run Tests with Coverage

```powershell
./vendor/bin/phpunit --coverage-html coverage
```

---

## Step 3: PHPUnit Configuration (phpunit.xml)

The `phpunit.xml` file configures:

```xml
<testsuites>
    <testsuite name="Unit">
        <directory>tests/Unit</directory>
    </testsuite>
    <testsuite name="Feature">
        <directory>tests/Feature</directory>
    </testsuite>
</testsuites>
```

Environment variables for testing:
- `DB_CONNECTION=sqlite` - Using SQLite in-memory database
- `DB_DATABASE=:memory:` - In-memory database for fast tests
- `CACHE_STORE=array` - Array cache driver
- `SESSION_DRIVER=array` - Array session driver
- `QUEUE_CONNECTION=sync` - Synchronous queue

---

## Step 4: Browser Testing with Laravel Dusk

### What is Laravel Dusk?

Laravel Dusk provides an expressive, easy-to-use browser automation and testing API. It uses ChromeDriver to control a headless Chrome browser.

### Setup ChromeDriver

Dusk requires ChromeDriver to run browser tests.

**Option 1: Using Dusk's ChromeDriver**
```powershell
php artisan dusk:chrome-driver --detect
```

**Option 2: Manual ChromeDriver**
1. Download ChromeDriver from: https://chromedriver.chromium.org/downloads
2. Ensure it matches your Chrome browser version
3. Add ChromeDriver to your PATH or use the bundled version

### Running Browser Tests (Dusk)

**Important:** Dusk requires TWO running processes:

1. **Start ChromeDriver** (Terminal 1):
```powershell
chromedriver.exe --port=9515
```

2. **Start Laravel Server** (Terminal 2):
```powershell
php artisan serve --port=8010
```

3. **Run Dusk Tests** (Terminal 2):
```powershell
php artisan dusk
```

### Dusk Test Structure

Example test in `tests/Browser/ExampleTest.php`:

```php
<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ExampleTest extends DuskTestCase
{
    public function test_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8010')
                ->waitForText('Let\'s get started')
                ->assertSee('Let\'s get started');
        });
    }
}
```

### Common Dusk Methods

| Method | Description |
|--------|-------------|
| `visit($url)` | Navigate to URL |
| `click($selector)` | Click an element |
| `type($selector, $value)` | Type text into input |
| `assertSee($text)` | Assert text is visible |
| `assertDontSee($text)` | Assert text is not visible |
| `waitForText($text)` | Wait for text to appear |
| `waitFor($selector)` | Wait for element to appear |
| `screenshot($name)` | Take a screenshot |

---

## Step 5: Test Categories

### Unit Tests (`tests/Unit/`)

Unit tests test individual methods or small units of code in isolation.

Example: `tests/Unit/BoxUnitTest.php`

```php
<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Box;

class BoxUnitTest extends TestCase
{
    public function test_box_calculation(): void
    {
        $box = new Box();
        // Test specific unit logic
    }
}
```

**Run Unit Tests:**
```powershell
./vendor/bin/phpunit tests/Unit/
```

### Feature Tests (`tests/Feature/`)

Feature tests test larger parts of the application, like HTTP endpoints, database interactions, etc.

Example: `tests/Feature/AlphaFeatureTest.php`

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlphaFeatureTest extends TestCase
{
    public function test_homepage_returns_view(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
```

**Run Feature Tests:**
```powershell
./vendor/bin/phpunit tests/Feature/
```

### Browser Tests (`tests/Browser/`)

Browser tests test the application through a real browser using Dusk.

**Run Browser Tests:**
```powershell
php artisan dusk
```

---

## Step 6: Test Case Base Classes

### TestCase (tests/TestCase.php)

Base class for all tests. Provides:
- Application bootstrap
- Helper methods for testing

```php
<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    //
}
```

### DuskTestCase (tests/DuskTestCase.php)

Base class for browser tests using Dusk.

```php
<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    //
}
```

---

## Step 7: Common Issues and Solutions

### Issue 1: ChromeDriver Connection Failed

**Error:**
```
Failed to connect to localhost port 9515 after 2211 ms: Could not connect to server
```

**Solution:** Start ChromeDriver first:
```powershell
chromedriver.exe --port=9515
```

### Issue 2: Dusk Test Can't Find Application

**Error:**
```
Unable to locate Dusk's ChromeDriver binary
```

**Solution:**
```powershell
php artisan dusk:chrome-driver --detect
```

### Issue 3: Server Not Running

**Error:**
```
Did not see expected text [started] within element [body]
```

**Solution:** Start the Laravel development server:
```powershell
php artisan serve --port=8010
```

### Issue 4: Database Not Reset Between Tests

**Solution:** Use `RefreshDatabase` trait in your test:

```php
use Illuminate\Foundation\Testing\RefreshDatabase;

class MyTest extends TestCase
{
    use RefreshDatabase;
    // ...
}
```

### Issue 5: Port Already in Use

**Solution:** Use a different port:
```powershell
php artisan serve --port=8080
```

Then update your Dusk test to use the new port.

---

## Step 8: Running Tests in Different Modes

### Watch Mode (Auto-run on file changes)

```powershell
./vendor/bin/phpunit --watch
```

### Parallel Testing

```powershell
./vendor/bin/phpunit --parallel
```

### Debug Mode

```powershell
./vendor/bin/phpunit --debug
```

### Verbose Output

```powershell
./vendor/bin/phpunit --verbose
```

---

## Step 9: CI/CD Integration

### GitHub Actions Example

Create `.github/workflows/tests.yml`:

```yaml
name: Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest

    steps:
    - uses: actions/checkout@v4

    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.3'

    - name: Install Dependencies
      run: composer install --no-interaction

    - name: Run Tests
      run: ./vendor/bin/phpunit
```

---

## Step 10: Best Practices

1. **Test One Thing**: Each test should verify one specific behavior
2. **Descriptive Names**: Use clear test method names like `test_user_can_login`
3. **Isolate Tests**: Tests should not depend on each other
4. **Use Fixtures**: Use model factories for consistent test data
5. **Clean Up**: Use `tearDown` or Laravel's refresh database to clean up
6. **Mock External Services**: Use Mockery to mock external API calls
7. **Fast Tests**: Keep unit tests fast; use Feature tests for slower integrations

---

## Summary of Commands

| Command | Description |
|---------|-------------|
| `composer install` | Install PHP dependencies |
| `npm install` | Install Node dependencies |
| `npm run build` | Build frontend assets |
| `php artisan test` | Run all tests |
| `./vendor/bin/phpunit` | Run PHPUnit directly |
| `./vendor/bin/phpunit --testsuite=Unit` | Run only unit tests |
| `./vendor/bin/phpunit --testsuite=Feature` | Run only feature tests |
| `php artisan dusk` | Run browser tests |
| `php artisan serve --port=8010` | Start development server |
| `chromedriver.exe --port=9515` | Start ChromeDriver |
| `php artisan dusk:chrome-driver --detect` | Install Dusk ChromeDriver |

---

## Files in This Project

### Tests Directory Structure

```
tests/
├── Browser/
│   ├── AlphaTest.php
│   ├── BetaTest.php
│   ├── ExampleTest.php
│   └── windows/chrome-win/chromedriver.exe
├── Feature/
│   ├── AlphaFeatureTest.php
│   └── BetaFeatureTest.php
├── Unit/
│   └── BoxUnitTest.php
├── DuskTestCase.php
└── TestCase.php
```

### Configuration Files

- `phpunit.xml` - PHPUnit configuration
- `composer.json` - PHP dependencies
- `package.json` - Node dependencies
- `.env` - Environment variables

---

## Getting Help

- Laravel Testing Documentation: https://laravel.com/docs/testing
- PHPUnit Documentation: https://phpunit.de/documentation.html
- Laravel Dusk Documentation: https://laravel.com/docs/dusk