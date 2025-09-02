@extends('layouts.app')

@section('title', 'Sign In - Travelstride')

@section('content')
<div class="min-h-screen bg-travelstride-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-travelstride-gray-900">Sign in to Travelstride</h2>
            <p class="mt-2 text-sm text-travelstride-gray-600">
                Reveal savings up to $700 per person!
            </p>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <div class="space-y-6">
                <!-- Google Sign In -->
                <div>
                    <button class="w-full flex justify-center py-3 px-4 border border-travelstride-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-travelstride-gray-700 hover:bg-travelstride-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-travelstride-green transition-colors">
                        <i class="fab fa-google text-travelstride-red mr-3"></i>
                        Continue With Google
                    </button>
                </div>

                <!-- Email Sign In -->
                <div>
                    <button class="w-full flex justify-center py-3 px-4 border border-travelstride-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-travelstride-gray-700 hover:bg-travelstride-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-travelstride-green transition-colors">
                        <i class="fas fa-envelope text-travelstride-blue mr-3"></i>
                        Continue With Email
                    </button>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-travelstride-gray-300" />
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-travelstride-gray-500">Or sign in with</span>
                    </div>
                </div>

                <!-- Email Form -->
                <form class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-travelstride-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-travelstride-gray-300 rounded-md shadow-sm placeholder-travelstride-gray-400 focus:outline-none focus:ring-travelstride-green focus:border-travelstride-green sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-travelstride-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-travelstride-gray-300 rounded-md shadow-sm placeholder-travelstride-gray-400 focus:outline-none focus:ring-travelstride-green focus:border-travelstride-green sm:text-sm">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-travelstride-green focus:ring-travelstride-green border-travelstride-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-travelstride-gray-900">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-travelstride-green hover:text-travelstride-green-dark transition-colors">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn-primary w-full">
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="text-center">
                    <p class="text-sm text-travelstride-gray-600">
                        Don't have an account? 
                        <a href="#" class="font-medium text-travelstride-green hover:text-travelstride-green-dark transition-colors">
                            Sign up
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 