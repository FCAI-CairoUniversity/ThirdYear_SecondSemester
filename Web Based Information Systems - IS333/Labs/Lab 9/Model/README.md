// To run the project 
1. composer update --no-scripts
2. composer install
3. php artisan serve
# Run the following in your terminal
php artisan serve

#check out the following routes
/students
/students/1
/students/create
/students/1/edit

********************************************************

//To Start the tutorial
# Create a laravel project
laravel new db_test

Find out about database configuration
1. Check .env and find related database info
2. Check the database/database.sqlite
3. Check config/database.php to see what to change to use different DBMS 
4. To view current database configuration use the command: "php artisan db:show"
5. Check out the laravel docs for databases: [text](https://laravel.com/docs/13.x/database)

Using Eloquent ORM >> Models
1. Create a sample model
# Generate a model and a migration, factory, seeder
php artisan make:model Student -mfs
2. examine file Models/Student.php
3. Find the created migration database/migration/XXX_create_students_table
4. Modify it by adding your desired columns and constraints
# Replace up function in your migration file with the following
public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name', 100);
            $table->string('student_email', 100)->unique()->index();
            $table->enum('student_gender', ['male', 'female', 'other']);
            $table->string('student_image_path')->nullable();
            $table->timestamps();
        });
    } 
5. Check out differnt columns datatypes and modifiers: 
https://laravel.com/docs/13.x/migrations#available-column-types
https://laravel.com/docs/13.x/migrations#column-modifiers
# Run the migration to create the table in database
php artisan migrate
6. check out the newly created "Student" table in your database
# To reset all the migrations
php artisan migrate:reset
# To check the status of all migrations
php artisan migrate:status

Factories and Seeders
1. Check out database/factories/StudentFactory.php
to see how you can control the data which is going to be seeded later
# Replace definitions function with the following
public function definition(): array
    {
        return [
            'student_name' => $this->faker->name(),
            'student_email' => $this->faker->unique()->safeEmail(),
            'student_gender' => $this->faker->randomElement(['male', 'female']),
            'student_image_path' => null,
        ];
    }
2. Check out database/seeders/StudentSeeder.php
to see how many records are going to be seeded using the format from the factory
# Replace run function with the following
 public function run(): void
    {
        Student::factory(10)->create();
    }
3. Check out database/seeders/DatabaseSeeder.php
to see how you can add and call the different seeders
# Make sure to add the following before the end of the run function
 $this->call(StudentSeeder::class);

# To run the database seeders
php artisan db:seed

Resource controller to utilize the student Model
1. Create a resource contoller for Student Model
# To create the controller
php artisan make:controller StudentController --resource --model=Student
# Replace the class in StudedentController With the following
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'view to create student';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "store";
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return 'view to create student';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        return "destroy";
    }
}
2. Add the link to your controller in routes file "web.php"
Route::resource('students', StudentController::class);

To test the application functionality so far
# Run the following in your terminal
php artisan serve

#check out the following routes
/students
/students/1
/students/create
/students/1/edit