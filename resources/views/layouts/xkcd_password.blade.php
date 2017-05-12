@extends('layouts.app')

@section('xkcd_single')


        <div class="panel panel-default">
            <div class="panel-heading">
                <b>{{ $xkcdpassword->user->name }}'s XkcdPassword </b>
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
                                <form action="/xkcdpassword/{{ $xkcdpassword->id }}" method="POST">
                                    <input id="password_edit" type="text" name="updated_password" value="{{ $xkcdpassword->password }}"/>
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button>Update</button>
                                </form>

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
                                    <button>Delete</button>
                                </form>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection