@extends('layouts.auth')


@section('title', __('login'))
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
@section ('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="flex items-center justify-center space-x-2 mx-auto">
            <i class="bi bi-journal-bookmark-fill text-2xl text-primary-600 text-indigo-600 dark:text-primary-400"></i>
            <h1 class="text-xl font-bold text-primary-600 text-indigo-600 dark:text-primary-400">JotN</h1>
        </div>
        {{-- <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" /> --}}
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Log in to your account</h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('login.store') }}" method="POST">
            @csrf

          <div>
            {{-- <label for="email" hidden class="block text-sm/6 font-medium text-gray-900">Email address</label> --}}
            <div class="mt-2">
              <input type="email" name="email" id="email" autocomplete="email" placeholder="Email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
          </div>

          <div>
            <div class="mt-2">
              <input type="password" name="password" id="password" autocomplete="current-password" placeholder="Password" required class="block w-full rounded-md bg-grey px-3 py-1.5 text-base text-gray-900 outline outline-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            <div class="flex items-center justify-between pt-2">
              {{-- <label  for="password" class="block text-sm/6 font-medium text-gray-900">Remember me</label> --}}
              <div class="text-sm">
                <input type="checkbox" name="remember"> Remember Me
              </div>
            </div>
          </div>

          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
          Don't have an account?
          <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign up</a>
        </p>
      </div>
    </div>
@endsection
