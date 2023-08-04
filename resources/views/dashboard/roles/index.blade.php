<x-dashboard.layouts.admin-layout title="Roles">

    <x-dashboard.layouts.breadcrumb page="All Roles" pageTitle="Roles">

        <x-slot:links>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i>Roles </a></li>
        </x-slot:links>

    </x-dashboard.layouts.breadcrumb>

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-tooltip">Show ROles</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <x-dashboard.layouts.alert type="danger" />
                        <x-dashboard.layouts.alert type="success" />

                        <div class="card-content collapse show ">

                            <div class="table-responsive card-body card-dashboard">
                                <table class="table display nowrap table-striped table-bordered scroll-horizontal">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Users #</th>
                                            <th>Created At</th>
                                            <th colspan="2">controles</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td><a href="#">{{ $role->name }}</a>
                                                </td>
                                                <td>{{ $role->mangers_count }}</td>
                                                <td>{{ $role->created_at }}</td>
                                                <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                                <td>
                                                    <form action="#" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</x-dashboard.layouts.admin-layout>
