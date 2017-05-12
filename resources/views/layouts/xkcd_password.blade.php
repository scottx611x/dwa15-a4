@extends('layouts.app')

@section('xkcd_single')


        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $xkcdpassword->user->name }}'s XkcdPassword
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>XkcdPassword</th>
                    <th>Created At</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
@endsection