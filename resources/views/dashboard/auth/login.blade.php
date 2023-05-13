<x-dashboard.layouts.login>

          <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src={{asset('dashboard/app-assets/images/logo/logo-dark.png')}} alt="branding logo">
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login To Dashboard</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">

                   <x-dashboard.layouts.alert type="danger"/>
                   <x-dashboard.layouts.alert type="success"/>
                   

                    <form class="form-horizontal form-simple" action="{{route('admin.store.login')}}" method="POST" >
                      @csrf
                      <fieldset class="form-group position-relative has-icon-left mb-0">

                        <x-form.input type="text" class="form-control-lg input-lg"  id="user-email" name="email" placeholder="Your Username" required/>

                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">

                         <x-form.input type="password" class="form-control-lg input-lg"  id="user-password" name="password" placeholder="Your Password" required/>

                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-md-left">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember" name="remember_me">
                            <label for="remember-me"> Remember Me</label>
                          </fieldset>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

</x-dashboard.layouts.login>