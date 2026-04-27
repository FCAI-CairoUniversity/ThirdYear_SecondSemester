<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return "Index: Display a listing of the users";
    }

    public function create()
    {
        return "create: Show the form for creating a new user";
    }

    public function store(Request $request)
    {
        return "store: Store a newly created user in storage";
    }

    public function show(string $id)
    {
        return "show: Display the specified user with ID $id";
    }

    public function edit(string $id)
    {
        return "edit: Show the form for editing the specified user with ID $id";
    }

    public function update(Request $request, string $id)
    {
        return "update: Update the specified user in storage with ID $id";
    }

    public function destroy(string $id)
    {
        return "destroy: Remove the specified user from storage with ID $id";
    }
}