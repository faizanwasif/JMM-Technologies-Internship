@extends('layouts.app')

@section('menu')

    <div id="main">
        <span style="color: #333" class="text-3xl cursor-pointer" onclick="openNav()">&#9776;</span>
    </div>
    
    {{-- NAV MENU --}}
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#" class="nav-item hover:bg-gray-700">
            <img src="/assets/contact-2.png" alt="" class="inline-block mr-2" width="25" height="25">
            Contacts
        </a>
        <a href="#" class="nav-item hover:bg-gray-700">
            <img src="/assets/activity.png" alt="" class="inline-block mr-2" width="25" height="25">
            Activities
        </a>
        <a href="#" class="nav-item hover:bg-gray-700">
            <img src="/assets/tag.png" alt="" class="inline-block mr-2" width="25" height="25">
            Tags
        </a>
        <a href="#" class="nav-item hover:bg-gray-700">
            <img src="/assets/note.png" alt="" class="inline-block mr-2" width="25" height="25">
            Notes
        </a>
        
    </div>

@endsection