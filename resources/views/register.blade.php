@extends('layouts.app')
@section('body')

    <div class="h-2 bg-primary"></div>

    <div class="container mx-auto p-8 w-1/2 xs:w-full">


            <div class="bg-white rounded shadow">
                <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase">
                    Create An Account
                </div>

                <form class="bg-grey-lightest px-10 py-10">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <input class="border w-full p-3" name="name" type="text" placeholder="Your name">
                    </div>
                    <div class="mb-3">
                        <input class="border w-full p-3" name="email" type="text" placeholder="E-Mail">
                    </div>
                    <div class="mb-3">
                        <input class="border w-full p-3" name="phone" type="text" placeholder="Your Phone no:">
                    </div>
                    <div class="mb-6">
                        <input class="border w-full p-3" name="password" type="password" placeholder="***password">
                    </div>
                    <div class="mb-6">
                        <input class="border w-full p-3" name="password" type="password" placeholder="***confirm password">
                    </div>
                    <div class="flex">
                        <button class="bg-blue-700 hover:bg-teal-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                            Register
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <span class=" font-bold text-primary hover:text-primary-dark no-underline">Already have an account?</span>
                        <a href="{{route('login')}}" class=" border-teal-400 hover:bg-blue-900 hover:text-white-600 shadow text-white-600 hover:text-black p-2 w-1/6 text-center ">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
