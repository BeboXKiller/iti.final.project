@extends('admin.app')

@section('content')
    <div class="fixed inset-0 z-50 bg-gray-100" id="admin-signin-page">
        <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <h2 class="mt-6 text-center text-3xl font-heading font-bold text-primary">Admin Sign In</h2>
                    <p class="mt-2 text-center text-sm text-gray-600">Or <a href="#"
                            class="font-medium text-secondary hover:text-accent" onclick="showAdminSignUp()">create a new
                            admin account</a></p>
                </div>
                <div class="auth-card bg-white py-8 px-4 shadow rounded-lg sm:px-10">
                    <form class="space-y-6">
                        <div>
                            <label for="admin-email" class="block text-sm font-medium text-gray-700">Admin Email</label>
                            <div class="mt-1">
                                <input id="admin-email" name="email" type="email" autocomplete="email" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm form-input">
                            </div>
                        </div>

                        <div>
                            <label for="admin-password" class="block text-sm font-medium text-gray-700">Password</label>
                            <div class="mt-1 relative">
                                <input id="admin-password" name="password" type="password" autocomplete="current-password"
                                    required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm form-input pr-10">
                                <span class="absolute right-3 top-2 toggle-password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="admin-remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                <label for="admin-remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-primary hover:text-accent">Forgot password?</a>
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                                Sign in to Dashboard
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection