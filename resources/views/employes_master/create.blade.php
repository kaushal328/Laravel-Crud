<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Master') }}
        </h2>
    </x-slot>

    <div class="container py-6">
        <h1 class="text-2xl font-bold mb-4">Create User</h1>
        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            <div class="row">
                <!-- Name -->
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" onkeypress="return accept_text(event);"  required>
                     @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                </div>

                <!-- Birthday -->
                <div class="mb-3 col-md-6">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror"   required>
                     @error('birthday')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                </div>

                <!-- Gender -->
                <div class="mb-3 col-md-12">
                    <label class="form-label">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderMale" value="male"    required>
                        <label class="form-check-label" for="genderMale">Male</label>

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderFemale" value="female"  required>
                        <label class="form-check-label" for="genderFemale">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderOther" value="other"  required>
                        <label class="form-check-label" for="genderOther">Other</label>
                    </div>
                       @error('gender')
                        <div class="invalid-feedback">
                         {{ $message }}
                         </div>
                         @enderror
                </div>

                <!-- State -->
                <div class="mb-3 col-md-6">
                    <label for="state_id" class="form-label">State</label>
                    <select name="state_id" id="state_id" class="form-select  @error('gender') is-invalid @enderror" required>
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" >{{ $state->state_name }}</option>
                        @endforeach
                    </select>
                     @error('state_id')
                                            <div class="invalid-feedback">
                                             {{ $message }}
                                             </div>
                                             @enderror
                </div>

                <!-- City -->
                <div class="mb-3 col-md-6">
                    <label for="city_id" class="form-label">City</label>
                    <select name="city_id" id="city_id" class="form-select  @error('city_id') is-invalid @enderror" required>

                    </select>
                </div>


                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email ID</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                </div>


                <div class="mb-3 col-md-6">
                    <label for="mobile_no" class="form-label">Mobile No</label>
                    <input type="text" name="mobile_no" id="mobile_no" maxlength="10" onkeypress="return accept_number(event);" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no') }}" required >
                </div>


                <div class="mb-3 col-md-6">
                    <label for="profile_photo" class="form-label">Profile Photo</label>
                    <input type="file" name="profile_photo" id="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror" accept="image/*">
                </div>


                <div class="mb-3 col-md-6">
                    <label for="skills" class="form-label">Skills</label>
                    <select name="skills[]" id="skills" class="form-select @error('skills') is-invalid @enderror" multiple>

                        <option value="1">Java</option>
                        <option value="2">Python</option>
                        <option value="3">PHP</option>
                        <option value="4">Excel</option>
                    </select>
                </div>



                <div class="mb-3 col-md-6">
                    <label for="certificates" class="form-label">Upload Certificates</label>
                    <input type="file" name="certificates[]" id="certificates" class="form-control @error('certificates') is-invalid @enderror" multiple accept="image/*" accept=".pdf">
                </div>


                <div class="mb-3 col-md-12">
                    <label class="form-label">Profession</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="profession" id="professionSalaried" value="salaried" {{ old('profession') == 'salaried' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="professionSalaried">Salaried</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="profession" id="professionSelfEmployed" value="self-employed" {{ old('profession') == 'self-employed' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="professionSelfEmployed">Self-employed</label>
                    </div>
                </div>


                <div class="mb-3 company-name-container col-md-6" style="display: {{ old('profession') == 'salaried' ? 'block' : 'none' }};">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control" onkeypress="return accept_text(event);" >
                </div>


                <div class="mb-3 job-started-from-container col-md-6" style="display: {{ old('profession') == 'salaried' ? 'block' : 'none' }};">
                    <label for="job_started_from" class="form-label">Job Started From</label>
                    <input type="date" name="job_started_from" id="job_started_from" class="form-control"  >
                </div>


                <div class="mb-3 business-name-container col-md-6" style="display: {{ old('profession') == 'self-employed' ? 'block' : 'none' }};">
                    <label for="business_name" class="form-label">Business Name</label>
                    <input type="text" name="business_name" id="business_name" class="form-control" onkeypress="return accept_text(event);">
                </div>


                <div class="mb-3 location-container col-md-6" style="display: {{ old('profession') == 'self-employed' ? 'block' : 'none' }};">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" id="location" class="form-control" onkeypress="return accept_text(event);">
                </div>


                <div id="education-container" class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Education</label>
                        <input type="text" name="education[]" class="form-control" onkeypress="return accept_text(event);">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year of Completion</label>
                        <input type="number" name="year_of_completion[]" class="form-control" value="{{ old('year_of_completion.0') }}" min="2000" max="{{ date('Y') }}">
                    </div>
                    <button type="button" id="add-education" class="btn btn-primary mb-5">Add More</button>
                </div>

                <div class="flex items-center justify-center mt-4">
                  <x-primary-button class="ms-3">
                               {{ __('Submit') }}
                           </x-primary-button>
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
