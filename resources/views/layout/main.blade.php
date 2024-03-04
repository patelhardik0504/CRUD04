<!DOCTYPE html>
<html>
<head>
<title>Test Task - @yield('title')</title>
<meta name="csrf-token" content="{{csrf_token()}}">
@vite('resources/css/app.css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
<div class="container mx-auto px-[300px]">
@if($errors->has('error'))
    <div class="alert alert-danger" id="errorAlert">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Hello user!</strong>
  <span class="block sm:inline">{{ $errors->first('error') }}.</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3"  onclick="closeAlert(1)">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
    </div>
@endif
@if(session('succeed'))
    <div class="alert alert-danger" id="succeedAlert">
    <div class="bg-yellow-100 border border-yellow-400 text-black-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Hello user!</strong>
  <span class="block sm:inline">{{ session('succeed') }}.</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeAlert(2)">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
    </div>
@endif

@yield('content')
</div>
</body>

@stack('scripts')


<script src="../../js/common.js"></script>

</html>