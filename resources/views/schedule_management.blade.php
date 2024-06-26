@extends('layouts.user_type.auth')

@section('content')

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-4 col-xl-9 col-lg-6 col-md-6">
        <div class="card mb-4" data-scheduled-classes="{{ json_encode($scheduledClasses) }}">
            <div id='calendar'></div>
        </div>
      </div>
      @if(Auth::user()->role->name == 'admin')
        <div class="col-4 col-xl-3 col-lg-4 col-md-4 mx-right">
          <div class="card z-index-0">
            <div class="card-body">
              <form id="add_subject_form" action="{{url('schedule_management')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <select class="form-control mt-3" name="group" placeholder="Назва групи" aria-label="Group" aria-describedby="group-addon">
                        <option value="">Оберіть групу</option>
                    @foreach ($all_groups as $one_group)
                        <option value="{{ $one_group->id }}">{{ $one_group->name }}</option>
                    @endforeach
                  </select>
                  <select class="form-control mt-3" name="subject" placeholder="Назва предмета" aria-label="Subject" aria-describedby="subject-addon">
                        <option value="">Оберіть предмет</option>
                    @foreach ($all_subjects as $one_subject)
                        <option value="{{ $one_subject->id }}">{{ $one_subject->name }}</option>
                    @endforeach
                  </select>
                  <select class="form-control mt-3" name="teacher" aria-label="Teacher" aria-describedby="teacher-addon">
                        <option value="">Хто його викладає</option>
                    @foreach ($all_teachers as $one_teacher)
                      <option value="{{ $one_teacher->id }}">{{ $one_teacher->surname }}</option>
                    @endforeach
                  </select>
                  <input type="date" class="form-control mt-3" name="conduction_date" placeholder="" aria-label="" aria-describedby="day-addon">
                  <div class="row mt-3">
                    <span>Початок і кінець пари</span>
                    <div class="col-6">
                        <input type="time" class="form-control" name="begin_time" placeholder="Початок" aria-label="" aria-describedby="time-addon">
                    </div>
                    <div class="col-6">
                        <input type="time" class="form-control" name="end_time" placeholder="Кінець" aria-label="" aria-describedby="time-addon">
                    </div>
                  </div>
                  @error('role')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Додати предмет</button>
                </div>
              </form>

              <form id="delete_subject_form" method="POST" action="{{route('schedule.destroy')}}">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="groupId" value="">
                  <input type="hidden" name="subjectId" value="">
                  <input type="hidden" name="teacherId" value="">
                  <input type="hidden" name="conductionDate" value="">
                  <input type="hidden" name="startTime" value="">
                  <input type="hidden" name="endTime" value="">
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Видалити предмет</button>
                  </div>
                </form>

            </div>
          </div>
        </div>
      @endif      
    </div>
  </div>

@endsection

