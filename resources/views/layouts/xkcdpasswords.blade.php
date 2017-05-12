@extends('app')

@section('xkcdpasswords')

    @if (count($xkcdpasswords) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current XkcdPasswords
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>XkcdPasswords</th>
                    <th>&nbsp;</th>
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
                            <!-- Delete Password -->
                            <td>
                                <form action="/xkcdpassword/{{ $xkcdpassword->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button>Delete Password</button>
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