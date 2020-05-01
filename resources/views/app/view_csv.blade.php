@extends('layouts.main')

@section('content')
<div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Membership Information Table</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form 1.1</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
                    @csrf
                    <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />
                    
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        @if (isset($csv_header_fields))
                            <tr>
                                @foreach ($csv_header_fields as $csv_header_field)
                                    <th>{{ $csv_header_field }}</th>
                                @endforeach
                            </tr>
                        @endif
                        @foreach ($csv_data as $row)
                            <tr>
                                @foreach ($row as $key => $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                            <tr>
                                @foreach ($csv_data[0] as $key => $value)
                                    <td>
                                        <select name="fields[{{ $key }}]">
                                             @foreach (config('app.db_fields') as $db_field)
                                                <option value="{{ (\Request::has('header')) ? $db_field : $loop->index }}"
                                                    @if ($key === $db_field) selected @endif>{{ $db_field }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endforeach
                            </tr>
                    </table>
                </div>
                <div style="padding-top:2vmin;">
                    <button type="submit" class="btn btn-primary">
                        Import Data
                    </button>
                </div>
                </form>
        </div>
    </div>
</div>


@endsection