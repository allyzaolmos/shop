<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Online Shopping</title>
        <meta charset=utf-8 >
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="Online Shopping" > 
		<meta name="description" content="Online Shopping" > 
        <meta name="author" content="Geko Business Solutions Corp.">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        
        @include('include.favicon')
        @include('include.tempcss')
        @include('include.topnav')

    </head>

    <div>
        @include('include.headboardpic')
        </div>

        <body style="overflow-x:hidden;">
            <div id="wrap" class="boxed ">
                <div class="grey-bg">
                    @include('include.content')
                    @include('include.sidebar')
                    
                    
                </div>
            </div>
        </body>


   <div>
    @include('include.tempjs')
    @include('include.brands')
    @include('include.shopinfo')
    @include('include.footer')
    
   </div>
</html>