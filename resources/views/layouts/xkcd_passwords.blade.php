@extends('layouts.app')

@section('xkcd_list')

    @if (count($xkcdpasswords) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $xkcdpasswords[0]->user->name }}'s XkcdPasswords
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>XkcdPasswords</th>
                    <th>Created At</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($xkcdpasswords as $xkcdpassword)
                        <tr>
                            <!-- Password -->
                            <td class="table-text">
                                <div>{{ $xkcdpassword->password }}</div>
                            </td>
                            <!-- Created At -->
                            <td class="table-text">
                                <div>{{ $xkcdpassword->created_at }}</div>
                            </td>
                            <!-- View Password -->
                            <td>
                                <form action="/xkcdpassword/{{ $xkcdpassword->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('GET') }}
                                    <button>View</button>
                                </form>
                            </td>
                            <!-- Delete Password -->
                            <td>
                                <form action="/xkcdpassword/{{ $xkcdpassword->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection