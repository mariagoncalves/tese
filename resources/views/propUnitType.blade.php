@extends('layouts.default')
@section('content')
    <h2>Tipos de Unidades</h2>
    <div ng-controller="propUnitTypeController">

        <!-- Table-to-load-the-data Part -->
        <table class="table" ng-init="getPropUnitTypes()">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>State</th>
                <th>Updated_On</th>
                <th>Acção</th>
                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Adicionar Novo Tipo de Unidade</button></th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="unit_type in propUnitTypes">
                <td>[[ unit_type.language[0].pivot.prop_unit_type_id ]]</td>
                <td>[[ unit_type.language[0].pivot.name ]]</td>
                <td>[[ unit_type.state ]]</td>
                <td>[[ unit_type.language[0].pivot.updated_at ]]</td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', unit_type.id)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete">Histórico</button>
                </td>
            </tr>
            </tbody>
        </table>

        <div>
            <posts-pagination></posts-pagination>
        </div>
        <!-- End of Table-to-load-the-data Part -->
        <!-- Modal (Pop up when detail button clicked) -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">[[form_title]]</h4>
                    </div>
                    <div class="modal-body">
                        <form name="frmUnitTypes" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prop_unit_type_name" name="prop_unit_type_name" placeholder="" value="@]]name]]"
                                           ng-model="propUnitType.language[0].pivot.name" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.contact_number.$invalid && frmUnitTypes.prop_unit_type_name.$touched">Name field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">State:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="active" ng-model="propUnitType.state" required>Active
                                    </label>
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="inactive" ng-model="propUnitType.state" required>Inactive
                                    </label>
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.position.$invalid && frmUnitTypes.position.$touched">State field is required</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmUnitTypes.$invalid">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footerContent')
    <script src="{{ asset('app/controllers/propunittype.js') }}"></script>
@stop
