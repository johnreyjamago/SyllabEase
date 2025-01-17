<!-- @-extends('layouts.adminNav') -->
@extends('layouts.adminSidebar')
@include('layouts.modal')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyllabEase</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url("{{ asset('assets/Wave1.png') }}");
            background-repeat: no-repeat;
            background-position: top;
            background-attachment: fixed;
            min-width: 100vh;
            background-size: contain;
        }
        </style>
</head>

<body>
    <div class="p-4 mt-14 flex items-center justify-center">
        <div class="max-w-md bg-gradient-to-r from-[#FFF] to-[#dbeafe] w-[560px] p-6 px-8 rounded-lg shadow-lg">
            <img class="edit_user_img text-center mt-4 w-[220px] m-auto mb-6" src="/assets/Edit Course.png" alt="SyllabEase Logo">
            <form action="{{ route('admin.updateCourse', $course->course_id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Use the PUT method for updating --}}

                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div class="">
                        <div>
                            <label for="course_code">Course Code</label>
                        </div>
                        <input type="text" name="course_code" id="course_code" class="px-1 py-[6px] w-[100px] border-[#a8a29e] border rounded" value="{{ $course->course_code }}" required></input>
                    </div>

                    <div class="">
                        <div>
                            <label for="course_title">Course Title</label>
                        </div>
                        <input type="text" name="course_title" id="course_title" class="px-1 py-[6px] w-[260px] border-[#a8a29e] border rounded" value="{{ $course->course_title }}" required></input>
                    </div>
                </div>

                <div class="">
                    <div>
                        <label for="curr_id">Curriculum</label>
                    </div>
                    <select name="curr_id" id="curr_id" class="select2 px-1 py-[6px] w-[300px] border rounded border-[#a8a29e]" required>
                        @foreach ($curricula as $curriculum)
                        <option value="{{ $curriculum->curr_id }}" {{ $course->curr_id == $curriculum->curr_id ? 'selected' : '' }}>
                            {{ $curriculum->curr_code }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid gap-6 mt-6 mb-6 md:grid-cols-3">
                    <div class="">
                        <div>
                            <label for="course_unit_lec">Unit Lec</label>
                        </div>
                        <input type="text" name="course_unit_lec" id="course_unit_lec" class="px-1 py-[6px] w-[120px] border-[#a8a29e] border rounded" value="{{ $course->course_unit_lec }}" required></input>
                    </div>

                    <div class="">
                        <div>
                            <label for="course_unit_lab">Unit Lab</label>
                        </div>
                        <input type="text" name="course_unit_lab" id="course_unit_lab" class="px-1 py-[6px] w-[120px] border-[#a8a29e] border rounded" value="{{ $course->course_unit_lab }}" required></input>
                    </div>

                    <div class="">
                        <div>
                            <label for="course_credit_unit">Credit Unit</label>
                        </div>
                        <input type="text" name="course_credit_unit" id="course_credit_unit" class="px-1 py-[6px] w-[120px] border-[#a8a29e] border rounded" value="{{ $course->course_credit_unit }}" required></input>
                    </div>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div class="">
                        <div>
                            <label for="course_hrs_lec">Lec Hours</label>
                        </div>    
                        <input type="text" name="course_hrs_lec" id="course_hrs_lec" class="px-1 py-[6px] w-[120px] border-[#a8a29e] border rounded" value="{{ $course->course_hrs_lec }}" required></input>
                    </div>

                    <div class="">
                        <div>
                            <label for="course_hrs_lab">Lab Hours</label>
                        </div>
                        <input type="text" name="course_hrs_lab" id="course_hrs_lab" class="px-1 py-[6px] w-[120px] border-[#a8a29e] border rounded" value="{{ $course->course_hrs_lab }}" required></input>
                    </div>
                </div>

                <div class="mb-6">
                    <div>
                        <label for="course_pre_req">Pre Requisite</label>
                    </div>
                    <input type="text" name="course_pre_req" id="course_pre_req" class="px-1 py-[6px] w-[400px] border-[#a8a29e] border rounded" value="{{ $course->course_pre_req }}" required></input>
                </div>

                <div class="">
                    <div>
                        <label for="course_co_req">Co Requisite</label>
                    </div>
                    <input type="text" name="course_co_req" id="course_co_req" class="px-1 py-[6px] w-[400px] border-[#a8a29e] border rounded" value="{{ $course->course_co_req }}" required></input>
                </div>

                <div class="grid gap-6 mt-6 md:grid-cols-3">
                    <div class="">
                        <div>
                            <label for="course_year_level">Year Level</label>
                        </div>
                        <select name="course_year_level" id="course_year_level" value="{{ $course->course_year_level }}" class="select` px-1 py-[6px] w-[120px] border rounded border-[#a8a29e]" required>
                            <option value="1st Year" {{ $course->course_year_level == '1st Year' ? 'selected' : '' }}>1st Year</option>
                            <option value="2nd Year" {{ $course->course_year_level == '2nd Year' ? 'selected' : '' }} >2nd Year</option>
                            <option value="3rd Year" {{ $course->course_year_level == '3rd Year' ? 'selected' : '' }} >3rd Year</option>
                            <option value="4th Year" {{ $course->course_year_level == '4th Year' ? 'selected' : '' }} >4th Year</option>
                            <option value="5th Year" {{ $course->course_year_level == '5th Year' ? 'selected' : '' }}>5th Year </option>
                        </select>
                    </div>
                    <div class="">
                        <div>
                            <label for="course_semester">Semester</label>
                        </div>
                        <select name="course_semester" id="course_semester" class="select1 px-1 py-[6px] w-[160px] border rounded border-[#a8a29e]" required>
                            <option value="1st Semester" {{ $course->course_semester == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                            <option value="2nd Semester" {{ $course->course_semester == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                            <option value="Mid Year" {{ $course->course_semester == 'Mid Year' ? 'selected' : '' }}>Mid Year</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="text-white font-semibold px-6 py-2 rounded-lg m-2 mt-8 mb-4 bg-blue">Update Course</button>
                </div>
                </form>
        </div>
    </div>
</body>

</html>

@endsection