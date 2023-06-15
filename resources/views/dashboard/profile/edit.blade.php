<x-dashboard.layouts.admin-layout title="Shipping Method">

    <x-dashboard.layouts.breadcrumb page="Edit" pageTitle="Shipping Method">

        <x-slot:links>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i> Settings </a></li>
        </x-slot:links>

    </x-dashboard.layouts.breadcrumb>

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-tooltip">Edite Shipping Method</h4>
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

                        <form class="form" method="POST" action="{{ route('admin.profile.update') }}">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ auth('admin')->user()->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-form.input type="text" class="form-control" id="user-password"
                                                name="name" placeholder="Your Password" id="issueinput3"
                                                label='true' labelName='Name'
                                                value="{{ auth('admin')->user()->name }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-form.input type="email" class="form-control" id="issueinput4"
                                                name="email" placeholder="Your Email" id="issueinput3" label='true'
                                                labelName='Email' value="{{ auth('admin')->user()->email }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-form.input type="password" class="form-control" id="user-password"
                                                name="password" placeholder="Your Password" id="issueinput3"
                                                label='true' labelName='password'
                                                  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-form.input type="pssword" class="form-control" id="issueinput4"
                                                name="password_confirmation" placeholder="Your Password confirmation" id="issueinput3" label='true'
                                                labelName='Password confirmation'   />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <x-form.form-actions />
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-dashboard.layouts.admin-layout>
