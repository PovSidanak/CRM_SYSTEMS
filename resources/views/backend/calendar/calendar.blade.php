@extends('admin.admin_dashboard')
@section('admin')
    <style>
        label>span {
            color: red;
            margin-left: 3px;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px aliceblue inset;
            -webkit-text-fill-color: black;
        }

        .fc-toolbar-title {
            color: black
        }

        .card-body {
            border: none !important;
        }

        div.fc-event-main {
            color: aliceblue !important;
        }

        .fc .fc-daygrid-day-number,
        .fc .fc-col-header-cell-cushion {
            color: black;
        }

        .fc .fc-timegrid-axis-cushion,
        .fc .fc-timegrid-slot-label-cushion {
            color: black;
        }
    </style>

    <div class="page-content" style="background-color: aliceblue; justify-content: center;">
        {{-- For Search --}}
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search events"
                        style="height: 5vh; background-color: aliceblue;">
                    <div class="input-group-append" style="height: 5vh;">
                        <button id="searchButton" class="btn btn-primary">{{ __('Search') }}</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                    <button id="exportButton" class="btn btn-primary">{{ __('Export Calendar') }}</button>
                </div>
                <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                    @if (Auth::user()->can('add.event'))
                    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                        data-bs-target="#varyingModal">
                        {{ __('Add') }}
                    </button>
                    @endif
                </div>

            </div>
        </div>

        <div class="card" style="background-color: aliceblue; border:none; display: flex;justify-content: center;">
            <div class="card-body">
                <div id="calendar"></div>

            </div>
        </div>
    </div>


    {{-- Create form --}}
    <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: aliceblue;">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel" style="color: black;">Create Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{ route('store.schedules') }}" class="forms-sample">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label"
                                style="color: gray;">{{ __('Title') }}<span>*</span></label>
                            <input type="text" id='title' name='title' class="form-control"
                                style="color: black;background-color:aliceblue" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label"
                                style="color: gray;">{{ __('Start') }}<span>*</span></label>
                            <input type='date' id='start' name='start' value='{{ now()->toDateString() }}'
                                class="form-control" style="color: black;background-color:aliceblue" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label"
                                style="color: gray;">{{ __('End') }}<span>*</span></label>
                            <input type='date' id='end' name='end'value='{{ now()->toDateString() }}'
                                class="form-control" style="color: black;background-color:aliceblue" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label"
                                style="color: gray;">{{ __('Description') }}<span>*</span></label>
                            <textarea type="text" id="description" name="description" class="form-control"
                                style="color: black;background-color:aliceblue" required></textarea>

                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label"
                                style="color: gray;">{{ __('Color') }}<span>*</span></label>
                            <input type="color" id="color" name="color" class="form-control"
                                style="color: black;background-color:aliceblue" required>
                        </div>
                        <button type="submit" value="Save" class="btn btn-primary me-2">Save</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendarEl = document.getElementById('calendar');
        var events = [];
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: '/events',
            editable: true,

            // Deleting The Event
            eventContent: function(info) {
                var eventTitle = info.event.title;
                var eventElement = document.createElement('div');
                eventElement.innerHTML = '<span style="cursor: pointer;">❌</span> ' + eventTitle;

                // Add click event listener to the 'X' element
                eventElement.querySelector('span').addEventListener('click', function() {
                    swal.fire({
                        title: 'Are you sure you want to delete this event?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            var eventId = info.event.id;
                            $.ajax({
                                method: 'get',
                                url: '/delete/events/' + eventId,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(response) {
                                    console.log('Event deleted successfully.');
                                    calendar
                                        .refetchEvents(); // Refresh events after deletion
                                },
                                error: function(error) {
                                    console.error('Error deleting event:', error);
                                }
                            });
                        }
                    });
                });
                return {
                    domNodes: [eventElement]
                };
            },

            // Drag And Drop

            eventDrop: function(info) {
                var eventId = info.event.id;
                var newStartDate = info.event.start;
                var newEndDate = info.event.end || newStartDate;
                var newStartDateUTC = newStartDate.toISOString().slice(0, 10);
                var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                $.ajax({
                    method: 'post',
                    url: `/update/events/${eventId}`,
                    data: {
                        '_token': "{{ csrf_token() }}",
                        start_date: newStartDateUTC,
                        end_date: newEndDateUTC,
                    },
                    success: function() {
                        swal.fire({
                            icon: 'success',
                            title: 'Event moved successfully.'
                        });
                        calendar.refetchEvents(); // Refresh events after successful update
                    },
                    error: function(error) {
                        console.error('Error moving event:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error moving event!',
                            text: 'An error occurred while moving the event.' // Optional: Provide a specific error message
                        });
                    }
                });
            },

            // Event Resizing
            eventResize: function(info) {
                var eventId = info.event.id;
                var newEndDate = info.event.end;
                var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                $.ajax({
                    method: 'post',
                    url: `/events/${eventId}/resize`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        end_date: newEndDateUTC
                    },
                    success: function(response) {
                        swal.fire({
                            icon: 'success',
                            title: 'Event Resize Successfully.'
                        });
                        calendar.refetchEvents();
                    },
                    error: function(error) {
                        console.error('Error resizing event:', error);
                    }
                });
            },
        });

        calendar.render();

        document.getElementById('searchButton').addEventListener('click', function() {
            var searchKeywords = document.getElementById('searchInput').value.toLowerCase();
            filterAndDisplayEvents(searchKeywords);
        });


        function filterAndDisplayEvents(searchKeywords) {
            $.ajax({
                method: 'GET',
                url: `/events/search?title=${searchKeywords}`,
                success: function(response) {
                    calendar.removeAllEvents();
                    calendar.addEventSource(response);
                },
                error: function(error) {
                    console.error('Error searching events:', error);
                }
            });
        }


        // Exporting Function
        document.getElementById('exportButton').addEventListener('click', function() {
            var events = calendar.getEvents().map(function(event) {
                return {
                    title: event.title,
                    start: event.start ? event.start.toISOString() : null,
                    end: event.end ? event.end.toISOString() : null,
                    color: event.backgroundColor,
                };
            });

            var wb = XLSX.utils.book_new();

            var ws = XLSX.utils.json_to_sheet(events);

            XLSX.utils.book_append_sheet(wb, ws, 'Events');

            var arrayBuffer = XLSX.write(wb, {
                bookType: 'xlsx',
                type: 'array'
            });

            var blob = new Blob([arrayBuffer], {
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            });

            var downloadLink = document.createElement('a');
            downloadLink.href = URL.createObjectURL(blob);
            downloadLink.download = 'events.xlsx';
            downloadLink.click();
        })
    </script>
@endsection
