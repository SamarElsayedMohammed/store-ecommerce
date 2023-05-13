      @props(['pageTitle'=>"Home"])

      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">{{$pageTitle}}</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">

                {{$links}}

                 <li class="breadcrumb-item active">{{$pageTitle}}</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-primary  btn-glow px-2" id="dropdownBreadcrumbButton"
            type="button" >Actions</button>
          </div>
        </div>
      </div>