@extends('layout.main')
@section('title', 'Dashborad')
@section('content')


<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
       
       <div class="bg-white rounded-lg shadow dark:border w-full md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
           <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
               <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                   Profile 
               </h1>
               <form class="space-y-4 md:space-y-6" method="post" id="user_update" action="/dashboard">
                   @csrf                                                                           
                   <div class="form-wrapper flex gap-8">
                    <input type="hidden" id="id" name="id" value="{{$user->id}}">
                       <div class="left w-3/6">
                           <div>
                               <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                               <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter the First name" value="{{ $user->first_name }}">
                               @if($errors->has('first_name'))
                                   <div class="text-red-500">{{ $errors->first('first_name') }}</div>
                               @endif
                           </div>
                           <div>
                               <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                               <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter the Last name" value="{{ $user->last_name }}">
                               @if($errors->has('last_name'))
                                   <div class="text-red-500">{{ $errors->first('last_name') }}</div>
                               @endif
                           </div>
                           <div>
                               <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                               <div class="m-2 flex items-center ps-2 border border-gray-200 rounded dark:border-gray-700">
                                   <input id="bordered-radio-1" type="radio" value="1" {{ $user->gender == '1' ? 'checked' : '' }} name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                   <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Male</label>
                               </div>
                               <div class="m-2 flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                   <input id="bordered-radio-2" type="radio" value="0"  {{ $user->gender == '0' ? 'checked' : '' }} name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                   <label for="bordered-radio-2" class="w-full py-4 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                               </div>
                               <div class="m-2 flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700"> 
                                   <input id="bordered-radio-3" type="radio" value="2" {{ $user->gender == '2' ? 'checked' : '' }} name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                   <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transgender</label>
                               </div>
                               @if($errors->has('gender'))
                                   <div class="text-red-500">{{ $errors->first('gender') }}</div>
                               @endif
                           </div>
                           <div>
                               <label for="laravel-checkbox-list" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hobbies</label>

                               <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                               @php
                            $selectedHobbies = json_decode($user->hobbies);
                            @endphp
                                   @foreach($hobbie as $hobbies)
                                   <li class="w-full dark:border-gray-600">
                                       <div class="flex items-center ps-3">
                                           <input id="laravel-checkbox-list" name="hobbies[]" type="checkbox" value="{{$hobbies->id}}" {{ in_array($hobbies->id, $selectedHobbies) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                           <label for="laravel-checkbox-list" class="w-full py-3 ms-1 text-sm font-medium text-gray-900 dark:text-gray-300">{{$hobbies->name}}</label>
                                       </div>
                                   </li>
                                   @endforeach
                                  
                               </ul>
                           </div>
                           <div>
                               <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile No</label>
                               <input type="text" name="mobile_number" id="mobile_number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter the Mobile No"  pattern="[0-9]{10}" value="{{ $user->mobile_number }}">
                               @if($errors->has('mobile_number'))
                                   <div class="text-red-500">{{ $errors->first('mobile_number') }}</div>
                               @endif
                           </div>
                       </div>
                       <div class="right w-3/6">

                           <div>
                               <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                               <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter the email address"  value="{{ $user->email }}" >
                               @if($errors->has('email'))
                                   <div class="text-red-500">{{ $errors->first('email') }}</div>
                               @endif
                           </div>
                           <div>
                               <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                               <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter the password">
                           </div>
                           <div>
                               <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                               <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter the confirm password">
                           </div>
                           <div>
                               <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Country</label>
                               <select id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option value="">Choose a Country</option>
                                   @foreach($contry as $contrys)
                                   <option value="{{$contrys->id}}" {{ $contrys->id == $user->country_id  ? 'selected' : '' }}>{{$contrys->name}}</option>
                                   @endforeach
                                   
                               </select>
                           </div>
                           <div>
                               <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an State</label>
                               <select id="state" name="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                   <option value="">Choose a State</option>
                                   @foreach($states as $state)
                                   <option value="{{$state->id}}" {{ $state->id == $user->state_id   ? 'selected' : '' }}>{{$state->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div>
                               <label for="district" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an District </label>
                               <select id="district" name="district" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option value="">Choose a district</option>
                                   @foreach($districts as $district)
                                   <option value="{{$district->id}}" {{ $district->id == $user->district_id    ? 'selected' : '' }}>{{$district->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div>
                               <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City  </label>
                               <input type="text" name="city" id="city"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter the city name" value="{{$user->city}}">
                               @if($errors->has('city'))
                                   <div class="text-red-500">{{ $errors->first('city') }}</div>
                               @endif
                              
                           </div>
                       </div>
                   </div>
                   <div class="flow-root mt-6">  
                           <div class="float-left">
                          <a href="/logout"> <button type="button" class="mr-auto w-[10rem] text-left text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</button></a>
                           </div>
                           <div class="float-right">
                           <button type="submit" class="mr-auto w-[10rem] text-left text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

                           </div>
                       </div>
               </form>
           </div>
       </div>
   </div>

   
@push('scripts')
<script src="../../js/user_update.js"></script>
@endpush
@endsection