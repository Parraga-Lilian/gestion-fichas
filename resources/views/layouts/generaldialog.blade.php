@section('failDelete')
    @if (session()->has('failedAdminDeleting'))
        <!-- Button trigger modal -->
        <div class="modal fade show" id="failedDeleting" tabindex="-1" role="dialog"
        data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"
        aria-labelledby="exampleModalCenterTitle" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Importante!</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="javascript:document.getElementById('failedDeleting').style.display='none'" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                Este usuario pertenece a la administración, no se puede borrar.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:document.getElementById('failedDeleting').style.display='none'">Aceptar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
            </div>
        </div>
    @endif
@endsection

@section('okDelete')
    @if (session()->has('successDeleting'))
        <!-- Button trigger modal -->
        <div class="modal fade show" id="successDeleting" tabindex="-1" role="dialog"
        data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"
        aria-labelledby="successDeletingTitle" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Importante!</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="javascript:document.getElementById('successDeleting').style.display='none'" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                Usuario borrado correctamente.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:document.getElementById('successDeleting').style.display='none'">Aceptar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
            </div>
        </div>
    @endif
@endsection

@section('okEmployeeEdit')
    @if (session()->has('successEdit'))
        <!-- Button trigger modal -->
        <div class="modal fade show" id="successEdit" tabindex="-1" role="dialog"
        data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"
        aria-labelledby="successEditTitle" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">¡Mensaje!</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="javascript:document.getElementById('successEdit').style.display='none'" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                Perfil modificado correctamente.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:document.getElementById('successEdit').style.display='none'">Aceptar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
            </div>
        </div>
    @endif
@endsection

@section('okBusinessEdit')
    @if (session()->has('successEdit'))
        <!-- Button trigger modal -->
        <div class="modal fade show" id="successEdit" tabindex="-1" role="dialog"
        data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"
        aria-labelledby="successEditTitle" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">¡Mensaje!</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="javascript:document.getElementById('successEdit').style.display='none'" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                Información del negocio modificada correctamente.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:document.getElementById('successEdit').style.display='none'">Aceptar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
            </div>
        </div>
    @endif
@endsection

@section('employee_delete')
    @if (session()->has('success_employee_delete'))
        <!-- Button trigger modal -->
        <div class="modal fade show" id="success_employee_delete" tabindex="-1" role="dialog"
        data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"
        aria-labelledby="success_employee_deleteTitle" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">¡Mensaje!</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="javascript:document.getElementById('success_employee_delete').style.display='none'" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                Empleado borrado correctamente.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:document.getElementById('success_employee_delete').style.display='none'">Aceptar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
            </div>
        </div>
    @endif
@endsection

@section('evaluacion_rendir')
    @if (session()->has('success_evaluacion'))
        <!-- Button trigger modal -->
       
    @endif
@endsection

@section('okEmployeeEdit')
    <!-- Success dialog -->
    @if (session()->has('successEdit'))
    <!-- Button trigger modal -->
    <div class="modal fade show" id="successEdit" tabindex="-1" role="dialog"
    data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="fly-in-up"
    aria-labelledby="successEdit" style="display: block;">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">¡Mensaje!</h5>
            <button type="button" class="close" data-dismiss="modal"
            onclick="javascript:document.getElementById('successEdit').style.display='none'" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
            Empleado modificado correctamente.
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"
            onclick="javascript:document.getElementById('successEdit').style.display='none'">Aceptar</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
        </div>
    </div>
    @endif
@endsection
