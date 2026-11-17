<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'roleID' => ['required', 'integer', 'exists:roles,roleID'],
            'departmentID' => ['nullable', 'integer', 'exists:departments,departmentID'],
            'device_name' => ['sometimes', 'required', 'string', 'max:255'],
        ]);

        $employee = Employee::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'phone' => $validated['phone'],
            'roleID' => $validated['roleID'],
            'departmentID' => $validated['departmentID'] ?? null,
        ]);

        $token = $employee->createToken(
            $validated['device_name'] ?? 'api-token'
        )->plainTextToken;

        return response()->json([
            'employee' => $employee,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'device_name' => ['sometimes', 'required', 'string', 'max:255'],
        ]);

        $employee = Employee::where('email', $validated['email'])->first();

        if (
            ! $employee ||
            ! Hash::check($validated['password'], $employee->password)
        ) {
            return response()->json([
                'message' => 'Invalid email or password.'
            ], 401);
        }

        if (! $employee->isCurrentEmployee) {
            return response()->json([
                'message' => 'This employee account is inactive.'
            ], 403);
        }

        $token = $employee->createToken(
            $validated['device_name'] ?? 'api-token'
        )->plainTextToken;

        return response()->json([
            'employee' => $employee,
            'token' => $token,
        ]);
    }

    public function user(Request $request): JsonResponse
    {
        return response()->json([
            'employee' => $request->user()
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    }
}
