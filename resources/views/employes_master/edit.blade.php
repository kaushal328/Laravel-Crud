<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>


    <div class="container py-6">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>

        <form action="{{ route('employee.update',['employee'=>$id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id" class="form-control" value="{{ $id }}" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            <div class="row">
                <!-- Name -->
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $employee->name }}" required>
                </div>

                <!-- Birthday -->
                <div class="mb-3 col-md-6">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday', $employee->birthday) }}" required>
                </div>

                <!-- Gender -->
                <div class="mb-3 col-md-12">
                    <label class="form-label">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderMale" value="male" {{ old('gender', $employee->gender) == 'male' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genderMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderFemale" value="female" {{ old('gender', $employee->gender) == 'female' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genderFemale">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderOther" value="other" {{ old('gender', $employee->gender) == 'other' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genderOther">Other</label>
                    </div>
                </div>

                <!-- State -->
                <div class="mb-3 col-md-6">
                    <label for="state_id" class="form-label">State</label>
                    <select name="state_id" id="state_id" class="form-select @error('gender') is-invalid @enderror" required>
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ old('state_id', $employee->state_id) == $state->id ? 'selected' : '' }}>{{ $state->state_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- City -->
                <div class="mb-3 col-md-6">
                    <label for="city_id" class="form-label">City</label>
                    <select name="city_id" id="city_id" class="form-select city_id @error('city_id') is-invalid @enderror" required>
                        <!-- Options will be populated via AJAX -->
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email ID</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $employee->email) }}" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="mobile_no" class="form-label">Mobile No</label>
                   <input type="text" name="mobile_no" id="mobile_no" onkeypress="return accept_number(event);" maxlength="10" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no', $employee->mobile_no) }}" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="profile_photo" class="form-label">Profile Photo</label>
                    <input type="file" name="profile_photo" id="profile_photo" class="form-control" accept="image/*">
                    @if($employee->profile_photo)
                        <img src="{{ asset('storage/profile_photos/'.$employee->profile_photo) }}" alt="Profile Photo" class="w-16 h-16 object-cover rounded-full mt-2">
                    @endif
                </div>

                <div class="mb-3 col-md-6">
                    <label for="skills" class="form-label @error('skills') is-invalid @enderror">Skills</label>
                   <select name="skills[]" id="skills" class="form-select @error('skills') is-invalid @enderror" multiple>
                       <option value="1" {{ in_array('1', $employee->skills) ? 'selected' : '' }}>Java</option>
                       <option value="2" {{ in_array('2', $employee->skills) ? 'selected' : '' }}>Python</option>
                       <option value="3" {{ in_array('3', $employee->skills) ? 'selected' : '' }}>PHP</option>
                       <option value="4" {{ in_array('4', $employee->skills) ? 'selected' : '' }}>Excel</option>
                   </select>

                </div>

                <div class="mb-3 col-md-6">
                    <label for="certificates" class="form-label">Upload Certificates</label>
                    <input type="file" name="certificates[]" id="certificates" class="form-control @error('certificates') is-invalid @enderror" multiple accept=".pdf, .doc, .docx">
                    <!-- Display existing certificates -->
                    @if($employee->certificates)
                        @foreach($employee->certificates as $certificate)
                            <a href="{{ asset('storage/certificates/'.$certificate->filename) }}" target="_blank">{{ $certificate->filename }}</a><br>
                        @endforeach
                    @endif
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Profession</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="profession" id="professionSalaried" value="salaried" {{ old('profession', $employee->profession) == 'salaried' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="professionSalaried">Salaried</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="profession" id="professionSelfEmployed" value="self-employed" {{ old('profession', $employee->profession) == 'self-employed' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="professionSelfEmployed">Self-employed</label>
                    </div>
                </div>

                <div class="mb-3 company-name-container col-md-6" style="display: {{ old('profession', $employee->profession) == 'salaried' ? 'block' : 'none' }};">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $employee->company_name) }}" onkeypress="return accept_text(event);">
                </div>

                <div class="mb-3 job-started-from-container col-md-6" style="display: {{ old('profession', $employee->profession) == 'salaried' ? 'block' : 'none' }};">
                    <label for="job_started_from" class="form-label">Job Started From</label>
                    <input type="date" name="job_started_from" id="job_started_from" class="form-control" value="{{ old('job_started_from', $employee->job_started_from) }}">
                </div>

                <div class="mb-3 business-name-container col-md-6" style="display: {{ old('profession', $employee->profession) == 'self-employed' ? 'block' : 'none' }};">
                    <label for="business_name" class="form-label">Business Name</label>
                    <input type="text" name="business_name" id="business_name" class="form-control" value="{{ old('business_name', $employee->business_name) }}" onkeypress="return accept_text(event);">
                </div>

                <div class="mb-3 location-container col-md-6" style="display: {{ old('profession', $employee->profession) == 'self-employed' ? 'block' : 'none' }};">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $employee->location) }}" onkeypress="return accept_text(event);">
                </div>

                <div id="education-container" class="col-md-12">

                    @foreach($employee->education as $index => $edu)

                        <div class="mb-3">
                            <label class="form-label">Education</label>
                            <input type="text" name="education[]" class="form-control" value="{{  $edu }}" onkeypress="return accept_text(event);">
                        </div>
                    @endforeach
                     @foreach( $employee->year_of_completion as $year)
                        <div class="mb-3">
                            <label class="form-label">Year of Completion</label>
                            <input type="number" name="year_of_completion[]" class="form-control" value="{{  $year }}" min="2000" max="{{ date('Y') }}">
                        </div>
                           @endforeach

                    <button type="button" id="add-education" class="btn btn-primary">Add More</button>
                </div>

               <div class="flex items-center justify-center mt-4">
                                 <x-primary-button class="ms-3">
                                              {{ __('Update') }}
                                          </x-primary-button>
                                          </div>
                           </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
    <script src="{{ asset('js/employee.js')}}"></script>
    <script>

        var state_route = '{{route("get.cities")}}';
    </script>
</x-app-layout>
